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
            <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_2">Programming Languages - Data Visualizations</a>
            <a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_3">Database - Big Data - Data Mining - Data Engineer - Machine Learning </a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_4">Deep Learning - Computer Vision - NLP - High Performance Computing - RPA</a>
        </div>
        <br>
        <br>
        <center>
            <h3 class="mb-4" style="background-color:rgb(124, 179, 66); color:white">Programming</h3>
        </center>
        <hr> <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Python</strong></h5>
            <h5 class="col-md-6 text-center"><strong>R</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="graphPython" style="height: 200px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" data-aos="fade-up" data-aos-duration="1000" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($python_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($python_proficient->result() as $sm) {
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


            <div class="col-md-2">
                <div id="graphR" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($R_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($R_proficient->result() as $sm) {
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
        <br><br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>C++</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Shell Scripting</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="graphCPLUS" style="height: 200px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($CPLUS_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($CPLUS_proficient->result() as $sm) {
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


            <div class="col-md-2">
                <div id="graphshell" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($shell_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($shell_proficient->result() as $sm) {
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

        <br><br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Git</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Elastic Search</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="graphgit" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($git_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($git_proficient->result() as $sm) {
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
            <div class="col-md-2">
                <div id="graphelastic" style="height: 200px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66);  color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($elastic_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(124, 179, 66); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($elastic_proficient->result() as $sm) {
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

        <center>
            <h3 class="mb-4" style="background-color: rgb(26, 115, 232); color:white">Data Visualization</h3>
        </center>
        <hr> <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong> PYTHON/R</strong></h5>
            <h5 class="col-md-6 text-center"><strong>POWER BI</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="graphpythonr" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pythonr_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($pythonr_proficient->result() as $sm) {
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
            <div class="col-md-2">
                <div id="graphpowerbi" style="height: 200px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232);  color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($powerbi_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($powerbi_proficient->result() as $sm) {
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
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-12 text-center"><strong>Tableu </strong></h5>
        </div>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4" data-aos="zoom-in-right" data-aos-duration="1000">
                <div id="graphtableau" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:rgb(26, 115, 232);color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($tableau_expert->result() as $sm) {
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
                    <thead style="background-color:rgb(26, 115, 232);color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($tableau_proficient->result() as $sm) {
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
        <br>
        <br>
        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong> GDS</strong></h5>
            <h5 class="col-md-6 text-center"><strong>D3JS</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="graphGDS" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($GDS_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($GDS_proficient->result() as $sm) {
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
            <div class="col-md-2">
                <div id="graphd3js" style="height: 200px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232);  color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($d3js_expert->result() as $sm) {
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

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color: rgb(26, 115, 232); color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($d3js_proficient->result() as $sm) {
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
<!-- End Body -->