<!-- Body Section -->

<body>
    <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
        <div class="row justify-content-center align-items-center text-center">
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
            <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
        </div>
    </div>
    <div class="container-fluid p-4" id="bg-template-graph">

        <h1 class="mb-4 text-center">Dashboard Capability Profiling</h1>
        <hr>

        <div class="row justify-content-center align-items-center text-center">
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Summary</a>
            <a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_1">Statistics & Mathematics - EDA - Business Understanding - Analytics</a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_2">Programming Languages - Data Visualizations</a>
            <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_3">Database - Big Data - Data Mining - Data Engineer - Machine Learning </a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_4">Deep Learning - Computer Vision - NLP - High Performance Computing - RPA</a>
        </div>



        <hr>

        <br>
        <br>
        <center>
            <h3 class="mb-4" style="background-color:rgb(0, 182, 203); color:white">Database</h3>
        </center>
        <br>
        <!-- div row -->
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>SQL</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphSQL" style="height: 200px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column1" class="table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(0, 182, 203); color:white">SQL Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($SQL_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column2" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(0, 182, 203); color:white">SQL Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($SQL_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>NoSQL</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphNOSQL" style="height: 200px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column3" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(0, 182, 203); color:white">NOSQL Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($NOSQL_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column4" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(0, 182, 203); color:white">NOSQL Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($NOSQL_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end div -->

        <!-- div row -->
        <br>
        <br>
        <center>
            <h3 class="mb-4" style="background-color:rgb(241, 0, 150); color:white">Big Data</h3>
        </center>
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>HADOOP</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphHADOOP" style="height: 200px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column5" class="table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(241, 0, 150); color:white">Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($HADOOP_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column6" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(241, 0, 150); color:white">Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($HADOOP_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Spark</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphspark" style="height: 200px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column7" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(241, 0, 150); color:white">Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($spark_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column8" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(241, 0, 150); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($spark_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end div -->

        <!-- div row -->
        <br>
        <br>
        <center>
            <h3 class="mb-4" style="background-color:rgb(246,109,0); color:white">Data Mining</h3>
        </center>
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Classification</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphclassification" style="height: 200px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column9" class="table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($classification_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column10" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($classification_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Clustering</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphclustering" style="height: 200px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column11" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($clustering_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column12" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($clustering_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end div -->

        <!-- div row -->

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Association</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphAssociation" style="height: 200px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column16" class="table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Association_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column13" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Association_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Regression</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphRegression" style="height: 200px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column14" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Regression_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column15" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(246,109,0); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Regression_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end div -->

        <h3 class="mb-4 text-center" style="background-color:#f0ad4e; color:white">Data Engineer</h3>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Airflow</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="de_airflow" style="height: 280px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_airflow_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_airflow_proficiency as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Pentaho</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="de_pentaho" style="height: 280px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_pentaho_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_pentaho_proficiency as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Docker/Kubernetas</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="de_docker" style="height: 280px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_docker_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_docker_proficiency as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Kafka</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="de_kafka" style="height: 280px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_kafka_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#f0ad4e;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($de_kafka_proficiency as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- div row -->
        <br>
        <br>
        <center>
            <h3 class="mb-4" style="background-color:rgb(124, 179, 66); color:white">Machine Learning</h3>
        </center>
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Supervised Learning</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphSupervised" style="height: 200px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column17" class="table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(124, 179, 66); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Supervised_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="one_column18" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(124, 179, 66); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Supervised_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Unsupervised Learning</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="graphUnsupervised" style="height: 200px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column19" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(124, 179, 66); color:white"> Expert</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Unsupervised_expert->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="one_column20" class="display table table-striped table-bordered dt-responsive" width="100%">
                            <thead>
                                <tr>
                                    <th style="background-color: rgb(124, 179, 66); color:white"> Proficient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($Unsupervised_proficient->result() as $sm) {
                                ?>
                                    <tr>
                                        <td><?= $sm->nama_member ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end div -->

        <!-- div row -->
        <br><br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-12 text-center"><strong>Reinforcement Learning </strong></h5>
        </div>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4" data-aos="zoom-in-right" data-aos-duration="1000">
                <div id="graphReinforcement" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(124, 179, 66);color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($Reinforcement_expert->result() as $sm) {
                        ?>
                            <tr>
                                <td><?= $sm->nama_member ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(124, 179, 66);color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($Reinforcement_proficient->result() as $sm) {
                        ?>
                            <tr>
                                <td><?= $sm->nama_member ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end div -->
    </div>


    <script>
        $(document).ready(function() {
            $('.skill_dt').dataTable({
                "scrollY": "200px",
                "scrollCollapse": true,
                "paging": false,
                "bFilter": false,
                "info": false
            });
        });
    </script>

</body>