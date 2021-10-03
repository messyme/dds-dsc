  <!-- Body Section -->

  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Survey Capability Talent DSC</h1>
        <hr>

        <?php
        if ($this->session->flashdata('msg_add_talent')) {
            echo $this->session->flashdata('msg_add_talent');
        }
        ?>

        <p>This survey aims to map the capabilities of existing DSC resources.
            Please fill in as objectively as possible so that the data can be valid and representative of the actual situation as a basis for further decision making.
            <br>Thank you.
        </p>
        <hr>

        <form role="form" method="post" action="<?= base_url() ?>pages/TalentCapability/add_data_talent_capability" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4 mb-3" hidden>
                    <div class="form-group ml-auto">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value=<?= $member_dsc->nik ?>>
                    </div>
                </div>
                <div class="col-md-4 mb-3 ">
                    <div class="form-group ml-auto">
                        <label for="tools">Analytics Tools</label>
                        <input type="text" class="form-control" id="tools" name="tools" placeholder="Example : Redash">
                    </div>
                </div>
            </div>

            <h5>Assessment Criteria Guide</h5>
            <img src="<?= base_url() ?>public/assets/images/panduan_kriteria_penilaian.png" alt="" class="responsive">
            <hr>
            <div class="row">
                <input type="hidden" class="form-control" id="nik" name="nik" value=<?= $member_dsc->nik ?>>
                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-secondary mb-3">
                                <label class="required" for="statistics">Statistics</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="descriptive">Descriptive</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=1>
                                    </div>
                                    <select class="form-control" id="descriptive" name=value[] required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                        
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->DESCRIPTIVE) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level. '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="inferential">Inferential</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=2>
                                    </div>
                                    <select class="form-control" id="inferential" name=value[] required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->INFERENTIAL) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="probability">Probability</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=3>
                                    </div>
                                    <select class="form-control" id="probability" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PROBABILITY) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="time_series">Time Series</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=4>
                                    </div>
                                    <select class="form-control" id="time_series" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->TIME_SERIES) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-warning mb-3">
                                <label class="required" for="business">Business Understanding</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="customer">Customer</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=18>
                                    </div>
                                    <select class="form-control" id="customer" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->CUSTOMER) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="growth_hacking">Growth Hacking</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=19>
                                    </div>
                                    <select class="form-control" id="growth_hacking" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->GROWTH_HACKING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="marketing">Marketing</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=20>
                                    </div>
                                    <select class="form-control" id="marketing" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->MARKETING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="product">Product</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=21>
                                    </div>
                                    <select class="form-control" id="product" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PRODUCT) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">

                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-info mb-3">
                                <label class="required" for="analytics_level">Analytics Level</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="descriptive_analytics">Descriptive</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=23>
                                    </div>
                                    <select class="form-control" id="descriptive_analytics" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->DESCRIPTIVE_ANALYTICS) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="diagnostic">Diagnostic</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=24>
                                    </div>
                                    <select class="form-control" id="diagnostic" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->DIAGNOSTIC) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="predictive">Predictive</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=25>
                                    </div>
                                    <select class="form-control" id="predictive" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PREDICTIVE) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="prescriptive">Prescriptive</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=26>
                                    </div>
                                    <select class="form-control" id="prescriptive" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PRESCRIPTIVE) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">

                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-secondary mb-3">
                                <label class="required" for="mathematics">Mathematics</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="calculus">Calculus</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=5>
                                    </div>
                                    <select class="form-control" id="calculus" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->CALCULUS) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="linear_algebra">Linear Algebra</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=6>
                                    </div>
                                    <select class="form-control" id="linear_algebra" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->LINEAR_ALGEBRA) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
            
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-primary mb-3">
                                <label class="required" for="big_data">Big Data</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="hadoop">Hadoop</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=33>
                                    </div>
                                    <select class="form-control" id="hadoop" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->HADOOP) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="spark">Spark</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=34>
                                    </div>
                                    <select class="form-control" id="spark" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->SPARK) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-primary mb-3">
                                <label class="required" for="Database">Database</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="sql">SQL</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=31>
                                    </div>
                                    <select class="form-control" id="sql" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->SQL_SQL) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="no_sql">NoSQL</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=32>
                                    </div>
                                    <select class="form-control" id="no_sql" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->NOSQL) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-success mb-3">
                                <label class="required" for="deep_learning">Deep Learning</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="ann">ANN</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=10>
                                    </div>
                                    <select class="form-control" id="ann" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->ANN) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="cnn">CNN</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=11>
                                    </div>
                                    <select class="form-control" id="cnn" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->CNN) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="rnn">RNN</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=12>
                                    </div>
                                    <select class="form-control" id="rnn" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->RNN) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-success mb-3">
                                <label class="required" for="machine_learning">Machine Learning</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="supervised">Supervised Learning</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=7>
                                    </div>
                                    <select class="form-control" id="supervised" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->SUPERVISED_LEARNING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="unsupervised">Unsupervised Learning</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=8>
                                    </div>
                                    <select class="form-control" id="unsupervised" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->UNSUPERVISED_LEARNING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="reinforcement">Reinforcement Learning</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=9>
                                    </div>
                                    <select class="form-control" id="reinforcement" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->REINFORCEMENT_LEARNING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-success mb-3">
                                <label class="required" for="computer_vision">Computer Vision</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="face_recognition">Face Recognition</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=13>
                                    </div>
                                    <select class="form-control" id="face_recognition" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->FACE_RECOGNITION) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="object_detection">Object Detection</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=14>
                                    </div>
                                    <select class="form-control" id="object_detection" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->OBJECT_DETECTION) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="ocr">OCR</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=15>
                                    </div>
                                    <select class="form-control" id="ocr" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->OCR) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-info mb-3">
                                <label class="required" for="data_mining">Data Mining</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="classification">Classification</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=27>
                                    </div>
                                    <select class="form-control" id="classification" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->CLASSIFICATION) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="clustering">Clustering</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=28>
                                    </div>
                                    <select class="form-control" id="clustering" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->CLUSTERING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="association">Association</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=29>
                                    </div>
                                    <select class="form-control" id="association" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->ASSOCIATION) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="regression">Regression</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=30>
                                    </div>
                                    <select class="form-control" id="regression" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->REGRESSION) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-primary mb-3">
                                <label class="required" for="data_engineer">Data Engineer</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="airflow">Airflow</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=35>
                                    </div>
                                    <select class="form-control" id="airflow" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->AIRFLOW) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="pentaho">Pentaho</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=36>
                                    </div>
                                    <select class="form-control" id="pentaho" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PENTAHO) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="docker">Docker</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=37>
                                    </div>
                                    <select class="form-control" id="docker" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->DOCKER_KUBERNETES) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="kafka">Kafka</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=38>
                                    </div>
                                    <select class="form-control" id="kafka" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->KAFKA) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-black box" style="max-width: 27rem;">
                            <div class="card-header bg-light mb-3">
                                <label class="required" for="high_performance">High Performance Computing</label>
                            </diV>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="paralel_computing">Paralel Computing</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=44>
                                    </div>
                                    <select class="form-control" id="paralel_computing" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PARALEL_COMPUTING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="edge_computing">Edge Computing</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=45>
                                    </div>
                                    <select class="form-control" id="edge_computing" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->EDGE_COMPUTING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-danger mb-3">
                                <label class="required" for="programming">Programming Language</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="python">Python</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=46>
                                    </div>
                                    <select class="form-control" id="python" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PYTHON) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="r">R</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=47>
                                    </div>
                                    <select class="form-control" id="r" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->R) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="php">PHP</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=48>
                                    </div>
                                    <select class="form-control" id="php" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PHP) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="node_js">nodeJS</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=49>
                                    </div>
                                    <select class="form-control" id="node_js" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->NODEJS) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="js">Javascript</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=50>
                                    </div>
                                    <select class="form-control" id="js" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->JAVASCRIPT) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="c++">C++</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=51>
                                    </div>
                                    <select class="form-control" id="c++" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->C) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="shell">Shell Scripting</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=52>
                                    </div>
                                    <select class="form-control" id="shell" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->SHELL_SCRIPTING) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="git">Git</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=53>
                                    </div>
                                    <select class="form-control" id="git" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->GIT) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="elastic_search">Elasticsearch</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=54>
                                    </div>
                                    <select class="form-control" id="elastic_search" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->ELASTICSEARCH) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-dark mb-3">
                                <label class="required" for="data_visualizations">Data Visualizations</label>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="python_r">Python/R Library</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=39>
                                    </div>
                                    <select class="form-control" id="python_r" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->PYTHON_R_LIBRARY) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="power_bi">Power BI</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=40>
                                    </div>
                                    <select class="form-control" id="power_bi" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->POWER_BI) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="tableau">Tableau</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=41>
                                    </div>
                                    <select class="form-control" id="tableau" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->TABLEAU) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="google_data">Google Data</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=42>
                                    </div>
                                    <select class="form-control" id="google_data" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->GOOGLE_DATA_STUDIO) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="d3">D3.js</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=43>
                                    </div>
                                    <select class="form-control" id="d3" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->D3_JS) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-info mb-3">
                                <label class="required" for="exploratory">Exploratory Data Analysis</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="exploratory">Exploratory</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=22>
                                    </div>
                                    <select class="form-control" id="exploratory" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->EXPLORATORY_DATA_ANALYSIS) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-4 mb-3">
                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-success mb-3">
                                <label class="required" for="nlp">NLP</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="nlp">NLP</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=16>
                                    </div>
                                    <select class="form-control" id="nlp" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->NLP) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ml-auto">
                        <div class="card text-white box" style="max-width: 27rem;">
                            <div class="card-header bg-success mb-3">
                                <label class="required" for="rpa">Robotic Process Automation(RPA)</label>
                            </div>

                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text required" for="rpa">RPA</label>
                                        <input type="hidden" class="form-control" id="skill" name=skill[] value=17>
                                    </div>
                                    <select class="form-control" id="rpa" name="value[]" required="required">
                                        <option selected disabled>Choose Level</option>
                                        <?php
                                            foreach ($level_skill->result() as $td) {
                                                if ($td->id_proficiency_level == $member_talent->row(0)->RPA) {
                                                    echo '<option value="' . $td->id_proficiency_level . '" selected>' . $td->id_proficiency_level . '</option>';
                                                } else {
                                                    echo '<option value="' . $td->id_proficiency_level . '">' . $td->id_proficiency_level .'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row d-flex justify-content-end">
                <div class="col-md-2 mb-3">
                    <input type="hidden" name="timestamp" value="<?php echo date("Y-m-d\TH:i:s",time()); ?>"/>
                    <input type="hidden" name="code" value="private">
                    <button type="submit" class="btn btn-success btn-block" id="submit">Submit</button>
                </div>
            </div>
        </form>
        <hr>
        <div class="container row">
            <ul class="legend">
                <li><span class="grey"></span>Math&Statistics</li>
                <li><span class="warning"></span>Business Understanding</li>
                <li><span class="info"></span>Data Analytic</li>
                <li><span class="primary"></span>Data Engineer</li>
                <li><span class="success"></span>AI</li>
                <li><span class="danger"></span>Programming</li>
                <li><span class="dark"></span>Data Visualization</li>
                <li><span class="light"></span>High Performance Computing</li>
            </ul>
        </div>
        
        <?php
        if ($this->session->userdata('role') != 'user_logged_in') {
        ?>

        <?php
            if ($footnote->username_admin) {
            ?>
            <div class="$member_talent-4" id="footnote">
                <?= $footnote->username_admin ?> successfully <?= $footnote->activity ?> data <?= $footnote->page ?>-<?= $footnote->table_name ?> with nik: <?= $footnote->name ?> on <?= $footnote->timestamp ?>
            </div>
        <?php
        }
        ?>

        <?php
        }
        ?>
    </div>
  </body>

  <!-- End of Body Section -->
  <style>
      .responsive {
          max-width: 50%;
          height: auto;
          display: block;
          margin-left: auto;
          margin-right: auto;
          /* width: 50%; */
      }

      h5 {
          text-align: center;
      }

      .box {
          box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
      }

      .legend li {
          float: left;
          margin-right: 15px;
          display: inline;
      }

      .legend span {
          border: 1px solid #ccc;
          float: left;
          width: 10px;
          height: 12px;
          margin: 2px;
      }

      /* your colors */
      .legend .primary {
          background-color: #0275d8;
      }

      .legend .success {
          background-color: #5cb85c;
      }

      .legend .info {
          background-color: #5bc0de;
      }

      .legend .warning {
          background-color: #f0ad4e;
      }

      .legend .danger {
          background-color: #d9534f;
      }

      .legend .dark {
          background-color: #292b2c;
      }

      .legend .grey {
          background-color: #808080;
      }

      .legend .light {
          background-color: #f7f7f7;
      }
  </style>