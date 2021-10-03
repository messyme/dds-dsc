@Library('shared-library')_
def deployImage = new DeployImage()
env.nodeName = ""

pipeline {
    parameters {
        string(name: 'PRODUCTION_NAMESPACE',       description: 'Production Namespace',                 defaultValue: 'internal-dsc-prod')
        string(name: 'STAGING_NAMESPACE',          description: 'Staging Namespace',                    defaultValue: 'internal-dsc-stage')
        string(name: 'DEVELOPMENT_NAMESPACE',      description: 'Development Namespace',                defaultValue: 'internal-dsc-dev')

        string(name: 'DOCKER_IMAGE_NAME',          description: 'Docker Image Name',                    defaultValue: 'internal-dsc-web')

        string(name: 'CHAT_ID',                    description: 'chat id of telegram group',            defaultValue: '-383243277')
    }
    agent none
    options {
        skipDefaultCheckout()  // Skip default checkout behavior
    }
    stages {
        stage ( "Kill Old Build" ){
            steps{
                script{
                    KillOldBuild()
        }   }   }
        stage('Checkout SCM') {
            agent { label "PHP" }
            steps {
                checkout scm
                script {
                    echo "get COMMIT_ID"
                    sh 'echo -n $(git rev-parse --short HEAD) > ./commit-id'
                    commitId = readFile('./commit-id')
                }
                stash(name: 'ws', includes:'**,./commit-id') // stash this current workspace
        }   }
        stage('Initialize') {
            parallel {
                stage("Agent: PHP") {
                    agent { label "PHP" }
                    steps {
                        cleanWs()
                           }   }
                stage("Agent: Docker") {
                    agent { label "Docker" }
                    steps {
                        cleanWs()
                        script{
                            if ( env.BRANCH_NAME == 'master' ){
                                envStage = "Production"
                            } else if ( env.BRANCH_NAME == 'release' ){
                                envStage = "Staging"
                            } else if ( env.BRANCH_NAME == 'develop'){
                                envStage = "Development"
        }   }   }   }   }   }
        stage('Test & Build') {
            parallel {
                stage('Unit Test') {
                    agent { label "PHP" }
                    steps {
                        unstash 'ws'
                        script {
                            echo "Do Unit Test Here"
                            sh "/var/lib/jenkins/bin/composer install"
                            sh "chmod -R 775 vendor/kenjis/ci-phpunit-test"
                            sh "php vendor/kenjis/ci-phpunit-test/install.php"
                            sh "rm -f application/tests/controllers/Welcome_test.php"
                            sh "cd application/tests && ../../vendor/bin/phpunit -c phpunit.xml"
                            echo "test unit success"
                            echo "defining sonar-scanner"
                            def scannerHome = tool 'SonarScanner' ;
                            withSonarQubeEnv('SonarQube') {
                                sh "${scannerHome}/bin/sonar-scanner"
                }   }   }   }
                stage('Build') {
                    agent { label "Docker" }
                    steps {
                        unstash 'ws'
                        script{
                            env.nodeName = "${env.NODE_NAME}"
                            sh "docker build --rm --no-cache --pull -t ${params.DOCKER_IMAGE_NAME}:${BUILD_NUMBER}-${commitId} ."
        }   }   }   }   }
        stage ('Deployment'){
            steps{
                node (nodeName as String) { 
                    echo "Running on ${nodeName}"
                    script{
                        if (env.BRANCH_NAME == 'master'){
                            echo "Deploying to ${envStage} "
                            deployImage.to_vsan("${commitId}")
                        } else if (env.BRANCH_NAME == 'release'){
                            echo "Deploying to ${envStage} "
                            deployImage.to_stage("${commitId}")
                        } else if (env.BRANCH_NAME == 'develop'){
                            echo "Deploying to ${envStage} "
                            deployImage.to_vsan("${commitId}")
    }   }   }   }   }   }
    post {
        always{
            node("Docker"){
                TelegramNotif(currentBuild.currentResult) 
	}   }
	failure{
            node(nodeName as String){
                script{
                    sh "docker rmi -f ${params.DOCKER_IMAGE_NAME}:${BUILD_NUMBER}-${commitId}"
}   }   }   }   }

