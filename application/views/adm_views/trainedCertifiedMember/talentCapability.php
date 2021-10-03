    <!-- Body Section -->

    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-center align-items-center text-center">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Talent Capability</a>
				<a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/workload_summary">Workload Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">

            <h1 class="mb-4 text-center">Dashboard Capability Profiling</h1>
            <hr>

            <div class="row justify-content-center align-items-center text-center">
                <a class="monitoring-nav col-sm-2 col-md-2 target" href="<?= base_url() ?>pages/TalentCapability/talent_capability_result">Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_1">Statistics & Mathematics - EDA - Business Understanding - Analytics</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_2">Programming Languages - Data Visualizations</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_3">Database - Big Data - Data Mining - Data Engineer - Machine Learning </a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/TalentCapability/talent_capability_section_4">Deep Learning - Computer Vision - NLP - High Performance Computing - RPA</a>
            </div>

            <hr>
            <br>

            <h3 class="mb-4">Respondent Profiles</h3>
            <div class="row justify-content-center mb-3">

                <div class="mb-2 col-sm-12 col-md-3" data-aos="zoom-in-right" data-aos-duration="1000">
                    <h6 class="text-center">Roles</h6><br>
                    <div id="responden_roles" style="height: 200px" width="100%" height="100%"></div>
                </div>

                <div class="mb-2 col-sm-12 col-md-3" data-aos="fade-up" data-aos-duration="1000">
                    <h6 class="text-center">Level</h6><br>
                    <div id="responden_level" style="height: 200px" width="100%" height="100%"></div>
                </div>

                <div class="mb-2 col-sm-12 col-md-3" data-aos="fade-up" data-aos-duration="1000">
                    <h6 class="text-center">Total Respondent</h6><br>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/responden.png" alt="member-dsc" srcset="" width="50%">
                        <h1><?= $total_responden ?></h1>
                    </div>
                </div>

                <div class="mb-2 col-sm-12 col-md-3" data-aos="zoom-in-left" data-aos-duration="1000">
                    <h6 class="text-center">Total Skill</h6><br>
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="<?= base_url() ?>public/assets/images/member_summary/skill.png" alt="member-organic" srcset="" width="50%">
                        <h1><?= $total_skill ?></h1>
                    </div>
                </div>
            </div>

            <br><br><br />

            <h3 class="mb-4 text-center">Skill List</h3>

            <div class="row justify-content-center mb-6">
                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background-color: #48aac3;">
                            <b> General</b>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-6">
                        <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card">
                                <div class="card-header text-center text-white" style="background-color: #48aac3;">
                                    <b>Mandatory</b>
                                </div>
                                <div class="card-body" style="background-color: #dcdcdc; max-height: 320px; overflow: overlay;">
                                    <ul class="list-group">
                                        <?php if (count($skill_general_mandatory) == 0) : ?>
                                            <li class="list-group-item">no data</li>
                                        <?php else :  ?>
                                            <?php foreach ($skill_general_mandatory as $data) : ?>
                                                <li class="list-group-item"><?= $data->name_category_skill; ?> [<?= $data->name_skill; ?>]</li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card">
                                <div class="card-header text-center text-white" style="background-color: #48aac3;">
                                    <b>Nice to Have</b>
                                </div>
                                <div class="card-body" style="background-color: #dcdcdc; max-height: 320px; overflow: overlay;">
                                    <ul class="list-group">
                                        <?php if (count($skill_general_nice_to_have) == 0) : ?>
                                            <li class="list-group-item">no data</li>
                                        <?php else :  ?>
                                            <?php foreach ($skill_general_nice_to_have as $data) : ?>
                                                <li class="list-group-item"><?= $data->name_category_skill; ?> [<?= $data->name_skill; ?>]</li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <div class="card-header text-center text-white" style="background-color: #48aac3;">
                            <b>Specific</b>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-6">
                        <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card">
                                <div class="card-header text-center text-white" style="background-color: #48aac3;">
                                    <b>Mandatory</b>
                                </div>
                                <div class="card-body" style="background-color: #dcdcdc; max-height: 320px; overflow: overlay;">
                                    <ul class="list-group">
                                        <?php if (count($skill_specific_mandatory) == 0) : ?>
                                            <li class="list-group-item">no data</li>
                                        <?php else :  ?>
                                            <?php foreach ($skill_specific_mandatory as $data) : ?>
                                                <li class="list-group-item"><?= $data->name_category_skill; ?> [<?= $data->name_skill; ?>]</li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1000">
                            <div class="card">
                                <div class="card-header text-center text-white" style="background-color: #48aac3;">
                                    <b>Nice to Have</b>
                                </div>
                                <div class="card-body" style="background-color: #dcdcdc; max-height: 320px; overflow: overlay;">
                                    <ul class="list-group">
                                        <?php if (count($skill_specific_nice_to_have) == 0) : ?>
                                            <li class="list-group-item">no data</li>
                                        <?php else :  ?>
                                            <?php foreach ($skill_specific_nice_to_have as $data) : ?>
                                                <li class="list-group-item"><?= $data->name_category_skill; ?> [<?= $data->name_skill; ?>]</li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <br>

            <hr>

            <br><br />

            <h3 class="mb-4 text-center">Skill Mapping</h3>
            <div class="bd-example">
                <div class="btn-group">
                    <div class="md-12 mb-4  ">
                        <label for="changeFilter">Select Category</label>
                        <select class="form-control" style="width:auto;" id="id_category" onchange="changeSkillMap()">
                            <option value="All Category" selected>All Category</option>
                            <?php foreach ($category_skill->result() as $cs) : ?>
                                <option value="<?= $cs->id_category_skill; ?>"><?= $cs->name_category_skill; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <table id="no_export_idt2" class="display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Skill</th>
                        <th>Category</th>
                        <th>Skill Type</th>
                        <th>Skill Required</th>
                        <th>J1</th>
                        <th>J2</th>
                        <th>J3</th>
                        <th>M1</th>
                        <th>M2</th>
                        <th>M3</th>
                        <th>S1</th>
                        <th>S2</th>
                        <th>S3</th>
                        <th>Provisional Weight</th>
                    </tr>
                </thead>

                <tbody id="skillmap">
                    <?php
                    $i = 1;
                    foreach ($skill_mapping->result() as $sm) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $sm->name_skill ?></td>
                            <td class="text-uppercase"><?= $sm->name_category_skill ?></td>
                            <td class="text-uppercase"><?= $sm->name_skill_list_type ?></td>
                            <td class="text-uppercase"><?= $sm->name_skill_list_require ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->j1]); ?>"><?= $sm->j1 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->j2]); ?>"><?= $sm->j2 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->j3]); ?>"><?= $sm->j3 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->m1]); ?>"><?= $sm->m1 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->m2]); ?>"><?= $sm->m2 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->m3]); ?>"><?= $sm->m3 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->s1]); ?>"><?= $sm->s1 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->s2]); ?>"><?= $sm->s2 ?></td>
                            <td class="text-uppercase" style="background-color: <?php echo ($colors_min_prof[(int)$sm->s3]); ?>"><?= $sm->s3 ?></td>
                            <td class="text-uppercase pw"><?= $sm->provisional_weight ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Skill</th>
                        <th>Category</th>
                        <th>Skill Type</th>
                        <th>Skill Require</th>
                        <th>J1</th>
                        <th>J2</th>
                        <th>J3</th>
                        <th>M1</th>
                        <th>M2</th>
                        <th>M3</th>
                        <th>S1</th>
                        <th>S2</th>
                        <th>S3</th>
                        <th>Provisional Weight</th>
                    </tr>
                </tfoot>
            </table>

            <h3 class="mb-4 text-center">Result Summary</h3>
            <h3 class="mb-4 text-center" style="background-color:#00b6cb; color:white">Overall</h3>
            <hr>

            <table id="no_row_order_9" class="display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:#00b6cb; color:white">No</th>
                        <th style="background-color:#00b6cb; color:white">Category</th>
                        <th style="background-color:#00b6cb; color:white; text-align:center">Average Proficiency Level (Realization)</th>
                        <th style="background-color:#00b6cb; color:white; text-align:center">Average Proficiency Level (Target)</th>
                        <th style="background-color:#00b6cb; color:white; text-align:center">Achievement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($overall_average->result() as $slr) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $slr->name_category_skill ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->real_overall ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->target_overall ?></td>
                            <td class="text-uppercase ac" style="text-align:center"><?= $slr->achievement ?>%</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                        Average Proficiency Level (Realization)<br>
                        <strong><?= $avg_avg_real_overall ?></strong>
                    </td>
                    <td style="text-align:center">
                        Average Proficiency Level (Target)<br>
                        <strong><?= $avg_avg_target_overall ?></strong>
                    </td>
                    <td style="text-align:center">
                        Achievement<br>
                        <strong><?= $avg_achievement_overall ?>%</strong>
                    </td>
                </tr>
            </table>

            <br>
            <h3 class="mb-4 text-center" style="background-color:#f10096; color:white">Junior</h3>
            <hr>

            <table id="no_row_order_10" class="display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:#f10096; color:white">No</th>
                        <th style="background-color:#f10096; color:white">Category</th>
                        <th style="background-color:#f10096; color:white; text-align:center">Average Proficiency Level (Realization)</th>
                        <th style="background-color:#f10096; color:white; text-align:center">Average Proficiency Level (Target)</th>
                        <th style="background-color:#f10096; color:white; text-align:center">Achievement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($junior_average->result() as $slr) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $slr->name_category_skill ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->real_overall ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->target_overall ?></td>
                            <td class="text-uppercase ac" style="text-align:center"><?= $slr->achievement ?>%</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                        Average Proficiency Level (Realization)<br>
                        <strong><?= $avg_avg_real_junior ?></strong>
                    </td>
                    <td style="text-align:center">
                        Average Proficiency Level (Target)<br>
                        <strong><?= $avg_avg_target_junior ?></strong>
                    </td>
                    <td style="text-align:center">
                        Achievement<br>
                        <strong><?= $avg_achievement_junior ?>%</strong>
                    </td>
                </tr>
                <tfoot>
                </tfoot>
            </table>

            <br>
            <h3 class="mb-4 text-center" style="background-color:#f66d00; color:white">Middle</h3>
            <hr>

            <table id="no_row_order_11" class="display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:#f66d00; color:white">No</th>
                        <th style="background-color:#f66d00; color:white">Category</th>
                        <th style="background-color:#f66d00; color:white; text-align:center">Average Proficiency Level (Realization)</th>
                        <th style="background-color:#f66d00; color:white; text-align:center">Average Proficiency Level (Target)</th>
                        <th style="background-color:#f66d00; color:white; text-align:center">Achievement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($middle_average->result() as $slr) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $slr->name_category_skill ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->real_overall ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->target_overall ?></td>
                            <td class="text-uppercase ac" style="text-align:center"><?= $slr->achievement ?>%</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                        Average Proficiency Level (Realization)<br>
                        <strong><?= $avg_avg_real_middle ?></strong>
                    </td>
                    <td style="text-align:center">
                        Average Proficiency Level (Target)<br>
                        <strong><?= $avg_avg_target_middle ?></strong>
                    </td>
                    <td style="text-align:center">
                        Achievement<br>
                        <strong><?= $avg_achievement_middle ?>%</strong>
                    </td>
                </tr>
                <tfoot>
                </tfoot>
            </table>

            <br>
            <h3 class="mb-4 text-center" style="background-color:#7cb342; color:white">Senior</h3>
            <hr>

            <table id="no_row_order_12" class="display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:#7cb342; color:white">No</th>
                        <th style="background-color:#7cb342; color:white">Category</th>
                        <th style="background-color:#7cb342; color:white; text-align:center">Average Proficiency Level (Realization)</th>
                        <th style="background-color:#7cb342; color:white; text-align:center">Average Proficiency Level (Target)</th>
                        <th style="background-color:#7cb342; color:white; text-align:center">Achievement</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($senior_average->result() as $slr) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $slr->name_category_skill ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->real_overall ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $slr->target_overall ?></td>
                            <td class="text-uppercase ac" style="text-align:center"><?= $slr->achievement ?>%</td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
                        Average Proficiency Level (Realization)<br>
                        <strong><?= $avg_avg_real_senior ?></strong>
                    </td>
                    <td style="text-align:center">
                        Average Proficiency Level (Target)<br>
                        <strong><?= $avg_avg_target_senior ?></strong>
                    </td>
                    <td style="text-align:center">
                        Achievement<br>
                        <strong><?= $avg_achievement_senior ?>%</strong>
                    </td>
                </tr>
                <tfoot>
                </tfoot>
            </table>

            <hr>
            <br>
            <br>
            <br>
            <h3 class="mb-4 text-center">Capability Summary</h3>
            <hr>

            <table id="no_row_order_cust" class="background-color display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:rgb(26, 115, 232); color:white; ">No</th>
                        <th style="background-color:rgb(26, 115, 232); color:white; ">Capability</th>
                        <th style="background-color:rgb(26, 115, 232); color:white; text-align:center">Average Score</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($capability_summary->result() as $s) {
                    ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $s->name_skill ?></td>
                            <td class="text-uppercase summary" style="text-align:center"><?= $s->avg_proficiency ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
            <hr>
            <br>
            <br>
            <br>
            <h3 class="mb-4 text-center">Use Case Difficulty</h3>
            <hr>

            <table id="no_row_order_cust_2" class="background-color display table table-striped table-bordered dt-responsive" data-aos="fade-up" data-aos-duration="1000" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="background-color:#00b6cb; color:white">No</th>
                        <th style="background-color:#00b6cb; color:white">Product / Use Cases</th>
                        <th style="background-color:#00b6cb; color:white; text-align:center">Industry</th>
                        <th style="background-color:#00b6cb; color:white; text-align:center; ">Provisional Difficulty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($usecase_difficultly->result() as $s) {
                    ?>

                        <tr>
                            <td><?= $i++ ?></td>
                            <td class="text-uppercase"><?= $s->nama_usecase ?></td>
                            <td class="text-uppercase" style="text-align:center"><?= $s->industry ?></td>
                            <?php
                            foreach ($average_pw->result() as $a) {
                            ?>
                                <?php if ($s->id_usecase ==  $a->id_usecase) { ?>

                                    <td class="text-uppercase difficultly" style="text-align:center">
                                        <p style="color: white;"><?= $a->avg ?></p>
                                    </td>
                                <?php }  ?>
                            <?php
                            }
                            ?>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Product / Use Cases</th>
                        <th>Industry</th>
                        <th>Provisional Difficulty</th>
                    </tr>
                </tfoot>
            </table>
        </div>


        <script>
            function heatMap() {
                $('.pw').each(function() {
                    var text = parseFloat($(this).text());
                    if (1 <= text && text <= 1.32) {
                        $(this).css("background-color", "#0E9D58");
                    } else if (1.33 <= text && text <= 1.65) {
                        $(this).css("background-color", "#4CAF50");
                    } else if (1.66 <= text && text <= 1.99) {
                        $(this).css("background-color", "#6FB242");
                    } else if (2 <= text && text <= 2.32) {
                        $(this).css("background-color", "#82A92E");
                    } else if (2.33 <= text && text <= 2.65) {
                        $(this).css("background-color", "#B6BA25");
                    } else if (2.66 <= text && text <= 2.99) {
                        $(this).css("background-color", "#E4BE12");
                    } else if (3 <= text && text <= 3.32) {
                        $(this).css("background-color", "#F5B503");
                    } else if (3.33 <= text && text <= 3.65) {
                        $(this).css("background-color", "#FEB50b");
                    } else if (3.66 <= text && text <= 3.99) {
                        $(this).css("background-color", "#FCA312");
                    } else if (4 <= text && text <= 4.32) {
                        $(this).css("background-color", "#E8761D");
                    } else if (4.33 <= text && text <= 4.65) {
                        $(this).css("background-color", "#F87025");
                    } else if (4.66 <= text && text <= 4.99) {
                        $(this).css("background-color", "#F6552f");
                    } else if (5 == text) {
                        $(this).css("background-color", "#D83737");
                    }
                });
            };

            heatMap();

            function achievementMap() {
                $('.ac').each(function() {
                    var text = parseFloat($(this).text());
                    if (0 <= text && text <= 10) {
                        $(this).css("background-color", "#fff4e6");
                    } else if (10 <= text && text <= 20) {
                        $(this).css("background-color", "#fff4e6");
                    } else if (20 <= text && text <= 30) {
                        $(this).css("background-color", "#ffe9cc");
                    } else if (30 <= text && text <= 40) {
                        $(this).css("background-color", "#ffdfb3");
                    } else if (40 <= text && text <= 50) {
                        $(this).css("background-color", "#ffd499");
                    } else if (50 <= text && text <= 60) {
                        $(this).css("background-color", "#ffc980");
                    } else if (60 <= text && text <= 70) {
                        $(this).css("background-color", "#ffbe66");
                    } else if (70 <= text && text <= 80) {
                        $(this).css("background-color", "#ffb34d");
                    } else if (80 <= text && text <= 90) {
                        $(this).css("background-color", "#ffa933");
                    } else if (90 <= text && text <= 100) {
                        $(this).css("background-color", "#ff9e1a");
                    } else if (100 <= text && text <= 110) {
                        $(this).css("background-color", "#ff9300");
                    } else if (text > 110) {
                        $(this).css("background-color", "#ff8e00");
                    }
                })
            };
            achievementMap();

            function changeSkillMap() {

                var table = $('#no_export_idt2').DataTable();
                table.destroy();


                var id_category = document.getElementById("id_category").value;

                $.ajax({
                    url: "<?= base_url() ?>pages/TalentCapability/update_table_skill_mapping",
                    method: 'POST',

                    data: {
                        'filter': id_category
                    },
                    // async: false,
                    success: function(data) {
                        var obj = JSON.parse(data)
                        console.log(obj)
                        var datatable = document.getElementById('skillmap')
                        datatable.innerHTML = obj

                        heatMap();

                        $("#no_export_idt2").DataTable();
                    },
                });

            }
        </script>
        <script>
            $(document).ready(function() {
                $('.difficultly').each(function() {
                    var text = parseFloat($(this).text());
                    if (0 <= text && text <= 10) {
                        $(this).css("background-color", "#009933");
                    } else if (10 <= text && text <= 15) {
                        $(this).css("background-color", "##199e2e");
                    } else if (15 <= text && text <= 20) {
                        $(this).css("background-color", "#33a329");
                    } else if (20 <= text && text <= 25) {
                        $(this).css("background-color", "#40a626");
                    } else if (25 <= text && text <= 30) {
                        $(this).css("background-color", "#59ab21");
                    } else if (30 <= text && text <= 35) {
                        $(this).css("background-color", "#80b21a");
                    } else if (35 <= text && text <= 36) {
                        $(this).css("background-color", "#8cb517");
                    } else if (36 <= text && text <= 37) {
                        $(this).css("background-color", "#99b814");
                    } else if (37 <= text && text <= 38) {
                        $(this).css("background-color", "#bfbf0d");
                    } else if (38 <= text && text <= 39) {
                        $(this).css("background-color", "#ccc20a");
                    } else if (39 <= text && text <= 40) {
                        $(this).css("background-color", "#d9c408");
                    } else if (40 <= text && text <= 41) {
                        $(this).css("background-color", "#e6c705");
                    } else if (41 <= text && text <= 42) {
                        $(this).css("background-color", "#f2c903");
                    } else if (42 <= text && text <= 43) {
                        $(this).css("background-color", "#ffcc00");
                    } else if (43 <= text && text <= 45) {
                        $(this).css("background-color", "#ffc200");
                    } else if (45 <= text && text <= 50) {
                        $(this).css("background-color", "#ffb800");
                    } else if (50 <= text && text <= 55) {
                        $(this).css("background-color", "#ffad00");
                    } else if (55 <= text && text <= 57) {
                        $(this).css("background-color", "#ffa300");
                    } else if (57 <= text && text <= 60) {
                        $(this).css("background-color", "#ff9900");
                    } else if (60 <= text && text <= 62) {
                        $(this).css("background-color", "#ff8f00");
                    } else if (62 <= text && text <= 64) {
                        $(this).css("background-color", "#ff8500");
                    } else if (64 <= text && text <= 66) {
                        $(this).css("background-color", "#ff7a00");
                    } else if (66 <= text && text <= 67) {
                        $(this).css("background-color", "#ff7000");
                    } else if (67 <= text && text <= 68) {
                        $(this).css("background-color", "#ff6600");
                    } else if (68 <= text && text <= 69) {
                        $(this).css("background-color", "#ff5c00");
                    } else if (69 <= text && text <= 70) {
                        $(this).css("background-color", "#ff5200");
                    } else if (70 <= text && text <= 73) {
                        $(this).css("background-color", "#ff4700");
                    } else if (73 <= text && text <= 74) {
                        $(this).css("background-color", "#ff3d00");
                    } else if (74 <= text && text <= 76) {
                        $(this).css("background-color", "#ff3300");
                    } else if (76 <= text && text <= 80) {
                        $(this).css("background-color", "#ff2900");
                    } else if (80 <= text && text <= 85) {
                        $(this).css("background-color", "#ff9300");
                    } else if (85 <= text && text <= 90) {
                        $(this).css("background-color", "#ff1400");
                    } else if (90 <= text && text <= 100) {
                        $(this).css("background-color", "#ff0a00");
                    } else if (text > 100) {
                        $(this).css("background-color", "#ff0000");
                    }
                })
            })
        </script>
        <script>
            $(document).ready(function() {
                $('.summary').each(function() {
                    var text = parseFloat($(this).text());
                    if (1 <= text && text <= 1.32) {
                        $(this).css("background-color", "#fff4e6");
                    } else if (1.33 <= text && text <= 1.65) {
                        $(this).css("background-color", "#fff4e6");
                    } else if (1.66 <= text && text <= 1.99) {
                        $(this).css("background-color", "#ffe9cc");
                    } else if (2 <= text && text <= 2.32) {
                        $(this).css("background-color", "#ffdfb3");
                    } else if (2.33 <= text && text <= 2.65) {
                        $(this).css("background-color", "#ffd499");
                    } else if (2.66 <= text && text <= 2.99) {
                        $(this).css("background-color", "#ffc980");
                    } else if (3 <= text && text <= 3.32) {
                        $(this).css("background-color", "#ffbe66");
                    } else if (3.33 <= text && text <= 3.65) {
                        $(this).css("background-color", "#ffb34d");
                    } else if (3.66 <= text && text <= 3.99) {
                        $(this).css("background-color", "#ffa933");
                    } else if (4 <= text && text <= 4.32) {
                        $(this).css("background-color", "#ff9e1a");
                    } else if (4.33 <= text && text <= 4.65) {
                        $(this).css("background-color", "#ff9300");
                    } else if (4.66 <= text && text <= 4.99) {
                        $(this).css("background-color", "#ff980c");
                    } else if (text > 5) {
                        $(this).css("background-color", "#ff8e00");
                    }
                })
            })
        </script>

    </body>

    <!-- End of Body Section -->