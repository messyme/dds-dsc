<script type="text/javascript">
    google.charts.setOnLoadCallback(draw_graphSQL);
    google.charts.setOnLoadCallback(draw_graphNOSQL);
    google.charts.setOnLoadCallback(draw_graphHADOOP);
    google.charts.setOnLoadCallback(draw_graphspark);
    google.charts.setOnLoadCallback(draw_graphclassification);
    google.charts.setOnLoadCallback(draw_graphclustering);
    google.charts.setOnLoadCallback(draw_graphAssociation);
    google.charts.setOnLoadCallback(draw_graphRegression);

    google.charts.setOnLoadCallback(draw_graphSupervised);
    google.charts.setOnLoadCallback(draw_graphUnsupervised);
    google.charts.setOnLoadCallback(draw_graphReinforcement);
    google.charts.setOnLoadCallback(draw_de_airflow);
    google.charts.setOnLoadCallback(draw_de_pentaho);
    google.charts.setOnLoadCallback(draw_de_docker);
    google.charts.setOnLoadCallback(draw_de_kafka);

    function draw_de_pentaho() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($de_pentaho as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Pentaho',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            bar: {
                groupWidth: "80%"
            },
            colors: ['#f0ad4e'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('de_pentaho'));

        chart.draw(data, options);

    };

    function draw_de_docker() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total Members'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($de_docker as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );
        var options = {
            title: 'Docker/Kubernetas',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            bar: {
                groupWidth: "80%"
            },
            colors: ['#f0ad4e'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('de_docker'));

        chart.draw(data, options);

    };

    function draw_de_kafka() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level', 'color: #e5e4e2');
        data.addColumn('number', 'Total Members'.toUpperCase(), 'color: #e5e4e2');
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($de_kafka as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );
        var options = {
            title: 'Kafka',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            bar: {
                groupWidth: "80%"
            },
            colors: ['#f0ad4e'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('de_kafka'));

        chart.draw(data, options);

    };

    function draw_de_airflow() {
        var data = new google.visualization.DataTable();

        data.addColumn('string', 'Proficiency Level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });

        data.addRows(
            <?php
            $resultd = array();
            foreach ($de_airflow as $value) {
                $resultd[] = array(strtoupper($value->proficiency_level), (int)$value->counter, $value->counter);
            }
            echo $d = json_encode($resultd);
            ?>
        );
        var options = {
            title: 'Airflow',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            bar: {
                groupWidth: "80%"
            },
            colors: ['#f0ad4e'],
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('de_airflow'));

        chart.draw(data, options);

    };

    // SQL
    function draw_graphSQL() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_SQL->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'SQL',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#00B6CB'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphSQL'));

        chart.draw(data, options);
    } // end bar chart SQL

    // NOSQL
    function draw_graphNOSQL() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_NOSQL->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'NOSQL',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#00B6CB'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphNOSQL'));

        chart.draw(data, options);
    } // end bar chart NOSQL

    // HADOOP
    function draw_graphHADOOP() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_HADOOP->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'HADOOP',
            legend: {
                position: 'top',
                alignment: 'left'
            },

            bar: {
                groupWidth: "80%"
            },
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },

            width: '100%',
            vAxis: {
                title: 'Total'
            },
            bar: {
                groupWidth: "80%"
            },
            colors: ['#F10096'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphHADOOP'));

        chart.draw(data, options);
    } // end bar chart hadoop

    // spark
    function draw_graphspark() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_spark->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Spark',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#F10096'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphspark'));

        chart.draw(data, options);
    } // end bar chart spark

    // classification
    function draw_graphclassification() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_classification->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Classification',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#F66D00'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphclassification'));

        chart.draw(data, options);
    } // end bar chart classification

    // clustering
    function draw_graphclustering() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_clustering->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Clustering',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#F66D00'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphclustering'));

        chart.draw(data, options);
    } // end bar chart clustering


    // Association
    function draw_graphAssociation() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_Association->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Association',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#F66D00'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphAssociation'));

        chart.draw(data, options);
    } // end bar chart Association

    // Regression
    function draw_graphRegression() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_Regression->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Regression',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['#F66D00'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphRegression'));

        chart.draw(data, options);
    } // end bar chart Regression

    // Supervised learning
    function draw_graphSupervised() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_Supervised->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Supervised',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphSupervised'));

        chart.draw(data, options);
    } // end bar chart Supervised

    // Unupervised learning
    function draw_graphUnsupervised() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_Unsupervised->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Unpervised',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphUnsupervised'));

        chart.draw(data, options);
    } // end bar chart Unupervised

    // Reinforcement
    function draw_graphReinforcement() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'proficiency level');
        data.addColumn('number', 'Total Members'.toUpperCase());
        data.addColumn({
            role: 'annotation'
        });


        data.addRows(
            <?php
            $resultd = array();
            foreach ($graph_Reinforcement->result() as $value) {
                $resultd[] = array(strtoupper($value->value), (int)$value->total, $value->total);
            }
            echo $d = json_encode($resultd);
            ?>
        );

        var options = {
            title: 'Reinforcement',
            hAxis: {
                title: 'Proficiency Level',
                format: 'Total',
                viewWindow: {
                    min: [7, 30, 0],
                    max: [17, 30, 0]
                }
            },
            legend: {
                position: 'top',
                alignment: 'left'
            },
            bar: {
                groupWidth: "80%"
            },
            width: '100%',
            vAxis: {
                title: 'Total'
            },
            colors: ['rgb(124, 179, 66)'],
        };

        var chart = new google.visualization.ColumnChart(
            document.getElementById('graphReinforcement'));

        chart.draw(data, options);
    } // end bar chart Reinforcement
</script>