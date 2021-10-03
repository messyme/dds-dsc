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
            <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_1">Statistics & Mathematics - EDA - Business Understanding - Analytics</a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_2">Programming Languages - Data Visualizations</a>
            <a class="monitoring-nav col-sm-2 col-md-2 " href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_3">Database - Big Data - Data Mining - Data Engineer - Machine Learning </a>
            <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_4">Deep Learning - Computer Vision - NLP - High Performance Computing - RPA</a>
        </div>

        <hr>
        <br>

        <h3 class="mb-4 text-center" style="background-color:#0072f0; color:white">Statistics</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Descriptive</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Inferential</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="statistics_descriptive" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_descriptive_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_descriptive_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>


            <div class="col-md-2">
                <div id="statistics_inferential" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_inferential_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_inferential_proficients as $data) : ?>
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

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Probability</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Time Series</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="statistics_probability" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_probability_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_probability_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="statistics_time_series" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_time_series_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#0072f0;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($statistics_time_series_experts as $data) : ?>
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

        <h3 class="mb-4 text-center" style="background-color:#00b6cb; color:white">Mathematics</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Calculus</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Linear Algebra</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="mathematics_calculus" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#00b6cb;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mathematics_calculus_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#00b6cb;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mathematics_calculus_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="mathematics_linear_algebra" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#00b6cb;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mathematics_linear_algebra_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#00b6cb;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($mathematics_linear_algebra_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>

        <h3 class="mb-4 text-center" style="background-color:#f10096; color:white">Exploratory Data Analysis</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-12 text-center"><strong>EDA</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-4" data-aos="zoom-in-right" data-aos-duration="1000">
                <div id="eda_eda" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-4">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f10096;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($eda_eda_experts as $data) : ?>
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
                        <?php foreach ($eda_eda_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-4 text-center" style="background-color:#f66d00; color:white">Business Understanding</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Customer</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Growth Hacking</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="business_understanding_customer" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($business_understanding_customer_experts as $data) : ?>
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
                        <?php foreach ($business_understanding_customer_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="business_understanding_growth_hacking" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($business_understanding_growth_hacking_experts as $data) : ?>
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
                        <?php foreach ($business_understanding_growth_hacking_proficients as $data) : ?>
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

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Marketing</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Product</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="business_understanding_marketing" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($business_understanding_marketing_experts as $data) : ?>
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
                        <?php foreach ($business_understanding_marketing_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="business_understanding_product" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#f66d00;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($business_understanding_product_experts as $data) : ?>
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
                        <?php foreach ($business_understanding_product_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <h3 class="mb-4 text-center" style="background-color:#ffa800; color:white">Analytics Level</h3>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Descriptive</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Diagnostic</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="analytics_level_descriptive" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_descriptive_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_descriptive_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="analytics_level_diagnostic" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_diagnostic_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_diagnostic_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <h5 class="col-md-6 text-center"><strong>Predictive</strong></h5>
            <h5 class="col-md-6 text-center"><strong>Prescriptive</strong></h5>
        </div>

        <br>

        <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="col-md-2">
                <div id="analytics_level_predictive" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_predictive_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_predictive_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <div id="analytics_level_prescriptive" style="height: 280px" width="100%" height="100%"></div>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Experts</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_prescriptive_experts as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-2">
                <table id="skill_dt" class="background-color display table table-striped table-bordered dt-responsive skill_dt" style="width:100%; ">
                    <thead style="background-color:#ffa800;color:white">
                        <tr>
                            <th>Proficients</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($analytics_level_prescriptive_proficients as $data) : ?>
                            <tr>
                                <td class="text-uppercase"> <?= $data->nama_member; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br><br><br />
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