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
            <a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_3">Database - Big Data - Data Mining - Data Engineer - Machine Learning </a>
            <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_4">Deep Learning - Computer Vision - NLP - High Performance Computing - RPA</a>
        </div>

        <hr>
        <br>

        <h3 class="mb-4 text-center" style="background-color:#5cb85c; color:white">Deep Learning</h3>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>ANN</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="dl_ann" style="height: 280px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody class="">
                                <?php foreach ($dl_ann_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($dl_ann_proficiency as $data) : ?>
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
                    <h5 class="col-md-12 text-center"><strong>CNN</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">

                    <div class="col-md-4">
                        <div id="dl_cnn" style="height: 280px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($dl_cnn_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($dl_cnn_proficiency as $data) : ?>
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
            <h5 class="col-md-12 text-center"><strong>RNN</strong></h5>
        </div>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4">
                <div id="dl_rnn" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">

                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                    <thead style="background-color:#5cb85c;color:white">
                        <tr>
                            <th>Expert</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dl_rnn_expert as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt " style="width:100%;">
                    <thead style="background-color:#5cb85c;color:white">
                        <tr>
                            <th>Proficiency</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($dl_rnn_proficiency as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <br>
        <br>
        <hr>

        <h3 class="mb-4 text-center" style="background-color:#5cb85c; color:white">Computer Vision</h3>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-6">
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h5 class="col-md-12 text-center"><strong>Face Recognition</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-4">
                        <div id="cv_face_recognition" style="height: 280px" width="100%" height="100%"></div>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody class="">
                                <?php foreach ($cv_face_recognition_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($cv_face_recognition_proficiency as $data) : ?>
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
                    <h5 class="col-md-12 text-center"><strong>Object Detection</strong></h5>
                </div>

                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">

                    <div class="col-md-4">
                        <div id="cv_object_detection" style="height: 280px" width="100%" height="100%"></div>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Expert</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($cv_object_detection_expert as $data) : ?>
                                    <tr>
                                        <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-4">
                        <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                            <thead style="background-color:#5cb85c;color:white">
                                <tr>
                                    <th>Proficiency</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($cv_object_detection_proficiency as $data) : ?>
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
            <h5 class="col-md-12 text-center"><strong>OCR</strong></h5>
        </div>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4">
                <div id="cv_ocr" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">

                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%;">
                    <thead style="background-color:#5cb85c;color:white">
                        <tr>
                            <th>Expert</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($cv_ocr_expert as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt " style="width:100%;">
                    <thead style="background-color:#5cb85c;color:white">
                        <tr>
                            <th>Proficiency</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($cv_ocr_proficiency as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-4 text-center" style="background-color:#f10096; color:white">Natural Language Processing</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-12 text-center"><strong>NLP</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4">
                <div id="nlp_nlp" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f10096;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($nlp_nlp_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f10096;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($nlp_nlp_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-4 text-center" style="background-color:#f66d00; color:white">High Performance Computing</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Parallel Computing (CUDA/OpenCL)</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Edge Computing (Raspi/OpenVINO)</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">

            <div class="col-md-2" data-aos="zoom-in-right" data-aos-duration="1000">
                <div id="hpc_pc" style="height: 280px" width="100%" height="100%"></div>
            </div>
            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($hpc_pc_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($hpc_pc_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2" data-aos="zoom-in-right" data-aos-duration="1000">
                <div id="hpc_ec" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($hpc_ec_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($hpc_ec_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-4 text-center" style="background-color:#ffa800; color:white">Robotic Process Automation</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-12 text-center"><strong>RPA</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4">
                <div id="rpa_rpa" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rpa_rpa_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($rpa_rpa_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
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