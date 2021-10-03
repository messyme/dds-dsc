<!-- Edit Usecase Modal -->
<div class="modal fade" id="editUsecase<?= $usecase->id_usecase ?>" role="dialog" aria-labelledby="editUsecaseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUsecaseLabel">Edit Use Case</h5>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_usecase">

                    <div class="form-group ml-auto" hidden>
                        <label class="required" for="id_usecase">ID</label>
                        <input type="number" class="boks form-control" id="id_usecase" name="id_usecase" value="<?= $usecase->id_usecase ?>">
                        <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_usecase">Use Cases Names</label>
                        <input type="text" class="form-control text-uppercase" id="nama_usecase" name="nama_usecase" value="<?= $usecase->nama_usecase ?>" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="id_squad">Squads Names</label>
                        <select class="select2squad form-control" id="id_squad" name="id_squad" required="required">
                            <option disabled value="">Choose Squads</option>
                            <?php
                            foreach ($squad->result() as $s) {
                                if ($s->id_squad == $usecase->id_squad) {
                                    echo '<option value="' . $s->id_squad . '" class="' . $s->id_squad . '" selected>' . $s->id_squad . ' - ' . $s->nama_squad . '</option>';
                                } else {
                                    echo '<option value="' . $s->id_squad . '" class="' . $s->id_squad . '">' . $s->id_squad . ' - ' . $s->nama_squad . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto" id="usecase_type">
                        <label class="required" for="usecase_type">Use Case Type</label>
                        <input class="form-control" value="<?= $usecase->jenis_analisis ?>" type="text" placeholder="Example : Descriptive, Diagnostic, Predictive, Perspective" id="usecase_type" name="usecase_type" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="id_usecase_status">Status Usecase</label>
                        <select class=" form-control" id="id_usecase_status_edit" name="id_usecase_status" required="required">
                            <option selected disabled>Choose Usecase Status</option>
                            <?php
                            foreach ($usecase_status->result() as $st) {
                                if ($st->id_usecase_status == $usecase->id_usecase_status) {
                                    echo '<option value="' . $st->id_usecase_status . '" class="' . $st->id_usecase_status . '" selected>' . $st->id_usecase_status . ' - ' . $st->deskripsi_status . '</option>';
                                } else {
                                    echo '<option value="' . $st->id_usecase_status . '" class="' . $st->id_usecase_status . '">' . $st->id_usecase_status . ' - ' . $st->deskripsi_status . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required" for="level">Use Case Level</label>
                        <select class="select2squad form-control" id="level" name="level" required="required">
                            <option disabled value="">Choose Squads</option>
                            <?php
                            foreach ($workload_point->result() as $s) {
                                if ($s->id_workload_point_usecase == $usecase->level_usecase) {
                                    echo '<option value="' . $s->id_workload_point_usecase . '" class="' . $s->id_workload_point_usecase . '" selected>' . $s->id_workload_point_usecase . ' - ' . $s->nama_workload_usecase_level . '</option>';
                                } else {
                                    echo '<option value="' . $s->id_workload_point_usecase . '" class="' . $s->id_workload_point_usecase . '">' . $s->id_workload_point_usecase . ' - ' . $s->nama_workload_usecase_level . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label for="usecase_started" id="label_usecase_started_edit">Use Case Started</label>
                        <input class="form-control" type="date" id="usecase_started_edit" name="usecase_started" value="<?= $usecase->usecase_started ?>">
                    </div>

                    <div class="form-group ml-auto">
                        <label for="usecase_finished" id="label_usecase_finished_edit">Use Case Finished</label>
                        <input class="form-control" type="date" id="usecase_finished_edit" name="usecase_finished" value="<?= $usecase->usecase_finished ?>">
                    </div>


                    <?php

                    foreach ($member_usecase->result() as $m) {
                    ?>
                        <input type="hidden" name="list_member[]" value="<?= $m->nik ?>">
                  <?php
                    }
                    ?>

                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Use Case</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End of Edit Usecase Modal -->

<!-- Delete Confirmation-->
<div class="modal fade" id="deleteModal<?= $usecase->id_usecase ?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_usecase/<?= $usecase->id_usecase ?>">
                <div class="modal-body">Are you sure want to delete this data?</div>

                <?php

                foreach ($member_usecase->result() as $m) {
                ?>
                    <input type="hidden" name="list_member[]" value="<?= $m->nik ?>">
                <?php
                }
                ?>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="btn-delete">Delete</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Delete Usecase -->

<!-- Add Usecase Data Source -->
<div class="modal fade" id="addDataSource" role="dialog" aria-labelledby="addDataSourceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addDataSourceLabel">Add Data Source</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_data_source">
                    <div class="form-group ml-auto">
                        <label class="required" for="data_source_name">Data Source Name</label>
                        <input type="text" class="text-uppercase form-control" id="data_source_name" name="data_source_name" placeholder="contoh : Membuat Design Web" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="data_source_detail">Data Source Detail</label>
                        <input type="text" class="text-uppercase form-control" id="data_source_detail" name="data_source_detail" placeholder="contoh : Membuat Design Web Menggunakan Figma" required="required">
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Source</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Data Source -->

<!-- Edit Usecase Data Source -->
<?php
foreach ($data_source->result() as $ds) {
?>
    <div class="modal fade" id="editDataSource<?= $ds->id_data_source ?>" role="dialog" aria-labelledby="editDataSourceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataSourceLabel">Edit Data Source</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_data_source">
                        <div class="form-group ml-auto">
                            <label class="required" for="data_source_name">Data Source Name</label>
                            <input type="text" class="text-uppercase form-control" id="data_source_name" name="data_source_name" value="<?= $ds->data_source_name ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="data_source_detail">Data Source Detail</label>
                            <input type="text" class="text-uppercase form-control" id="data_source_detail" name="data_source_detail" value="<?= $ds->data_source_detail ?>" required="required">
                        </div>

                        <input type="hidden" name="id_data_source" value="<?= $ds->id_data_source ?>">

                        <input type="hidden" name="id_usecase" value="<?= $ds->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Source</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Data Source -->

<!-- Delete Usecase Data Source -->
<?php
foreach ($data_source->result() as $ds) {
?>

    <div class="modal fade" id="deleteDataSource<?= $ds->id_data_source ?>" role="dialog" aria-labelledby="deleteDataSourceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteDataSourceLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_data_source/<?= $ds->id_data_source ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $ds->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Data Source -->


<!-- Add Usecase Output -->
<div class="modal fade" id="addOutput" role="dialog" aria-labelledby="addOutputLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addOutputLabel">Add Output</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_output">
                    <div class="form-group ml-auto">
                        <label class="required" for="output_name">Output Name</label>
                        <input type="text" class="text-uppercase form-control" id="output_name" name="output_name" placeholder="contoh : Membuat Design Web" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="output_description">Output Description</label>
                        <input type="text" class="text-uppercase form-control" id="output_description" name="output_description" placeholder="contoh : Membuat Design Web Menggunakan Figma" required="required">
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Output</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Output -->

<!-- Edit Usecase Output -->
<?php
foreach ($output->result() as $o) {
?>
    <div class="modal fade" id="editOutput<?= $o->id_output_usecase ?>" role="dialog" aria-labelledby="editOutputLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOutputLabel">Edit Output</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_output">
                        <div class="form-group ml-auto">
                            <label class="required" for="output_name">Output Name</label>
                            <input type="text" class="text-uppercase form-control" id="output_name" name="output_name" value="<?= $o->output_name ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="output_description">Output Description</label>
                            <input type="text" class="text-uppercase form-control" id="output_description" name="output_description" value="<?= $o->output_description ?>" required="required">
                        </div>

                        <input type="hidden" name="id_output_usecase" value="<?= $o->id_output_usecase ?>">

                        <input type="hidden" name="id_usecase" value="<?= $o->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Output</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Output -->

<!-- Delete Usecase Output -->
<?php
foreach ($output->result() as $o) {
?>

    <div class="modal fade" id="deleteOutput<?= $o->id_output_usecase ?>" role="dialog" aria-labelledby="deleteOutputLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOutputLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_output/<?= $o->id_output_usecase ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $o->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Output -->

<!-- Add Usecase Problem -->
<div class="modal fade" id="addProblem" role="dialog" aria-labelledby="addProblemLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addProblemLabel">Add Problem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_problem">
                    <div class="form-group ml-auto">
                        <label class="required" for="descriptions">Descriptions</label>
                        <input type="text" class="text-uppercase form-control" id="descriptions" name="descriptions" placeholder="Example : No Feedback Yet" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Quarter</label>
                        <select class="form-control" id="quarter" name="quarter" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <option value="q1">Q1</option>
                            <option value="q2">Q2</option>
                            <option value="q3">Q3</option>
                            <option value="q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="year" name="year" placeholder="Example : 2021" required="required">
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Problem</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Problem -->
<!-- Edit Usecase Problem -->
<?php
foreach ($problem->result() as $o) {
?>
    <div class="modal fade" id="editProblem<?= $o->id_usecase_kendala ?>" role="dialog" aria-labelledby="editProblemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProblemLabel">Edit Problem</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_problem">
                        <div class="form-group ml-auto">
                            <label class="required" for="descriptions">Descriptions</label>
                            <input type="text" class="text-uppercase form-control" id="descriptions" name="descriptions" value="<?= $o->descriptions ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="quarter">Quarter</label>
                            <select class="form-control" id="quarter" name="quarter" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <option value="q1" <?php if ($o->quarter == 'q1') { ?> selected <?php } ?>>Q1</option>
                                <option value="q2" <?php if ($o->quarter == 'q2') { ?> selected <?php } ?>>Q2</option>
                                <option value="q3" <?php if ($o->quarter == 'q3') { ?> selected <?php } ?>>Q3</option>
                                <option value="q4" <?php if ($o->quarter == 'q4') { ?> selected <?php } ?>>Q4</option>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="year" name="year" value="<?= $o->year ?>" required="required">
                        </div>

                        <input type="hidden" name="id_usecase_kendala" value="<?= $o->id_usecase_kendala ?>">

                        <input type="hidden" name="id_usecase" value="<?= $o->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Problem</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Problem -->

<!-- Delete Usecase Problems -->
<?php
foreach ($problem->result() as $o) {
?>

    <div class="modal fade" id="deleteProblem<?= $o->id_usecase_kendala ?>" role="dialog" aria-labelledby="deleteProblemLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProblemLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_problem/<?= $o->id_usecase_kendala ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $o->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Problems -->


<!-- Add Usecase OKR Products -->
<div class="modal fade" id="addOKR" role="dialog" aria-labelledby="addOKRLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addOKRLabel">Add OKR Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_okr_product">
                    <div class="form-group ml-auto">
                        <label class="required" for="kodifikasi">Codification</label>
                        <input type="text" class="text-uppercase form-control" id="kodifikasi" name="kodifikasi" placeholder="Example : A.1/B.1/C.1" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="category_okr">Category OKR</label>
                        <select class="form-control" id="category_okr" name="category_okr" required="required">
                            <option value="" selected disabled>Choose Category</option>
                            <?php
                            foreach ($category_okr->result() as $co) {
                                echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="objective">Objective</label>
                        <input type="text" class="text-uppercase form-control" id="objective" name="objective" placeholder="Example : dashboard" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="key_result">Key Result</label>
                        <input type="text" class="text-uppercase form-control" id="key_result" name="key_result" placeholder="Example : Customer & Marketing Analytic" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="dod">Definition of Done</label>
                        <input type="text" class="text-uppercase form-control" id="dod" name="dod" placeholder="Example : dashboard selesai" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Quarter</label>
                        <input type="text" class="text-uppercase form-control" id="quarter" name="quarter" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="year" name="year" placeholder="Example : 2021" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="assignee">Assignee</label>
                        <select class="form-control" id="select2member1" name="assignee" required="required">
                            <option value="">Choose Assignee</option>
                            <?php
                            foreach ($member_dsc->result() as $md) {
                                echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="complexity">Complexity</label>
                        <select class="form-control" id="complexity" name="complexity" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($complexity_okr->result() as $cx) {
                                echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_output">Type of Output</label>
                        <select class="form-control type_of_output_add_product" id="type_of_output_add_product" name="type_of_output" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($too_okr->result() as $too) {
                                echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="unit">Unit</label>
                        <input type="text" class="text-uppercase form-control add_unit" id="unit" name="unit" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="target">Target</label>
                        <input type="number" class="text-uppercase form-control add_target" id="target" name="target" placeholder="Example : 100/10000/7/24" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="start">Start</label>
                        <input type="date" class="form-control add_start" name="start" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="end">End</label>
                        <input type="date" class="form-control add_end" name="end" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_formula">Type of Formula</label>
                        <select class="form-control" id="type_of_formula" name="type_of_formula" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($tof_okr->result() as $tof) {
                                echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Progress (%)</label>
                        <input type="number" class="form-control " name="progress" placeholder="Example : 50" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Detail Progress</label>
                        <input type="text" class="form-control " name="detail_progress" placeholder="Example : 74 hour per month" required="required" />
                    </div>


                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit"> Add OKR Product</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase OKR Products -->

<!-- Edit Usecase OKR Product -->
<?php
foreach ($okr_product->result() as $op) {
?>
    <div class="modal fade" id="editOKR<?= $op->id_okr_product ?>" role="dialog" aria-labelledby="editOKRLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOKRLabel">Edit OKR Product</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_okr_product">
                        <div class="form-group ml-auto">
                            <label class="required" for="kodifikasi">Codification</label>
                            <input type="text" class="text-uppercase form-control" id="kodifikasi" name="kodifikasi_new" value="<?= $op->kodifikasi ?>" placeholder="Example : A.1/B.1/C.1" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="category_okr">Category OKR</label>
                            <select class="form-control" id="category_okr" name="category_okr_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($category_okr->result() as $co) {
                                    if ($co->id_category_okr == $op->category_okr) {
                                        echo '<option value="' . $co->id_category_okr . '" selected>' . $co->nama_category_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="objective">Objective</label>
                            <input type="text" class="text-uppercase form-control" id="objective" name="objective_new" value="<?= $op->objective ?>" placeholder="Example : dashboard" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="key_result">Key Result</label>
                            <input type="text" class="text-uppercase form-control" id="key_result" name="key_result_new" value="<?= $op->key_result ?>" placeholder="Example : Customer & Marketing Analytic" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="dod">Definition of Done</label>
                            <input type="text" class="text-uppercase form-control" id="dod" name="dod_new" value="<?= $op->definition_of_done ?>" placeholder="Example : dashboard selesai" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="quarter_new">Quarter</label>
                            <input type="text" class="text-uppercase form-control" id="quarter_new" name="quarter_new" value="<?= $op->quarter ?>" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="year" name="year_new" value="<?= $op->year ?>" placeholder="Example : 2021" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="assignee">Assignee</label>
                            <select class="form-control" id="select2member2" name="assignee_new" required="required">
                                <option value="">Choose Assignee</option>
                                <?php
                                foreach ($member_dsc->result() as $md) {
                                    if ($md->nik == $op->assignee) {
                                        echo '<option value="' . $md->nik . '" selected>' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    } else {
                                        echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="complexity">Complexity</label>
                            <select class="form-control" id="complexity" name="complexity_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($complexity_okr->result() as $cx) {
                                    if ($cx->id_complexity_okr == $op->complexity) {
                                        echo '<option value="' . $cx->id_complexity_okr . '" selected>' . $cx->nama_complexity_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_output">Type of Output</label>
                            <select class="form-control type_of_output_product" id="type_of_output_product" name="type_of_output_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($too_okr->result() as $too) {
                                    if ($too->id_too_okr == $op->type_of_output) {
                                        echo '<option value="' . $too->id_too_okr . '" selected>' . $too->nama_too_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Unit</label>
                            <input type="text" class="text-uppercase form-control unit_product" id="unit_product" name="unit" value="<?= $op->unit ?>" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="target">Target</label>

                            <input type="number" class="text-uppercase form-control target_product" id="target_product" name="target" value="<?= $op->target ?>" placeholder="Example : 100/10000/7/24" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="start">Start</label>
                            <input type="date" class="form-control start_product" id="start_product" name="start" value="<?= $op->start ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="end">End</label>
                            <input type="date" class="form-control end_product" id="end_product" name="end" value="<?= $op->end ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_formula">Type of Formula</label>
                            <select class="form-control" id="type_of_formula" name="type_of_formula_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($tof_okr->result() as $tof) {
                                    if ($tof->id_tof_okr == $op->type_of_formula) {
                                        echo '<option value="' . $tof->id_tof_okr . '" selected>' . $tof->nama_tof_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Progress (%)</label>
                            <input type="number" class="form-control " name="progress_new" value="<?= $op->progress ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Detail Progress</label>
                            <input type="text" class="form-control " name="detail_progress_new" value="<?= $op->detail_progress ?>" required="required" />
                        </div>

                        <input type="hidden" name="id_okr_product" value="<?= $op->id_okr_product ?>">

                        <input type="hidden" name="id_usecase" value="<?= $op->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Output</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase OKR Products-->

<!-- Delete Usecase OKR Products -->
<?php
foreach ($okr_product->result() as $op) {
?>

    <div class="modal fade" id="deleteOKR<?= $op->id_okr_product ?>" role="dialog" aria-labelledby="deleteOKRLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOKRLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_okr_product/<?= $op->id_okr_product ?>">

                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $op->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase OKR Product -->

<!-- Add Usecase OKR DSC Team -->
<div class="modal fade" id="addOKRDSCTeam" role="dialog" aria-labelledby="addOKRDSCTeamLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addOKRDSCTeamLabel">Add OKR DSC Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_okr_dsc_team">
                    <div class="form-group ml-auto">
                        <label class="required" for="kodifikasi">Codification</label>
                        <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_dsc_kodifikasi" placeholder="Example : A.1/B.1/C.1" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="category_okr">Category OKR</label>
                        <select class="form-control" id="category_okr" name="okr_dsc_category_okr" required="required">
                            <option value="" selected disabled>Choose Category</option>
                            <?php
                            foreach ($category_okr->result() as $co) {
                                echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_dsc_objective">Objective</label>
                        <input type="text" class="text-uppercase form-control" id="okr_dsc_objective" name="okr_dsc_objective" placeholder="Example : dashboard" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_dsc_key_result">Key Result</label>
                        <input type="text" class="text-uppercase form-control" id="okr_dsc_key_result" name="okr_dsc_key_result" placeholder="Example : Customer & Marketing Analytic" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="dod">Definition of Done</label>
                        <input type="text" class="text-uppercase form-control" id="dod" name="okr_dsc_dod" placeholder="Example : dashboard selesai" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_dsc_quarter">Quarter</label>
                        <input type="text" class="text-uppercase form-control" id="okr_dsc_quarter" name="okr_dsc_quarter" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_dsc_year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="okr_dsc_year" name="okr_dsc_year" placeholder="Example: 2021" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="assignee">Assignee</label>
                        <select class="form-control" id="select2member3" name="okr_dsc_assignee" required="required">
                            <option value="">Choose Assignee</option>
                            <?php
                            foreach ($member_dsc->result() as $md) {
                                echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="complexity">Complexity</label>
                        <select class="form-control" id="complexity" name="okr_dsc_complexity" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($complexity_okr->result() as $cx) {
                                echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_output">Type of Output</label>
                        <select class="form-control type_of_output_add_dsc" id="type_of_output" name="okr_dsc_type_of_output" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($too_okr->result() as $too) {
                                echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="unit">Unit</label>
                        <input type="text" class="text-uppercase form-control add_dsc_unit" id="unit" name="unit" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="target">Target</label>
                        <input type="number" class="text-uppercase form-control add_dsc_target" id="target" name="target" placeholder="Example : 100/10000/7/24" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="start">Start</label>
                        <input type="date" class="form-control add_dsc_start" name="start" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="end">End</label>
                        <input type="date" class="form-control add_dsc_end" name="end" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_formula">Type of Formula</label>
                        <select class="form-control" id="type_of_formula" name="okr_dsc_type_of_formula" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($tof_okr->result() as $tof) {
                                echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Progress (%)</label>
                        <input type="number" class="form-control " name="progress" placeholder="Example : 50" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Detail Progress</label>
                        <input type="text" class="form-control " name="detail_progress" placeholder="Example : 74 hour per month" required="required" />
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add OKR DSC Team</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase OKR DSC Team -->

<!-- Edit Usecase OKR DSC Team -->
<?php
foreach ($okr_dsc->result() as $o) {
?>
    <div class="modal fade" id="editOKRDSCTeam<?= $o->id_okr_dsc ?>" role="dialog" aria-labelledby="editOKRDSCTeamLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOKRDSCTeamLabel">Edit OKR DSC Team</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_okr_dsc_team">
                        <div class="form-group ml-auto">
                            <label class="required" for="kodifikasi">Codification</label>
                            <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_dsc_kodifikasi_new" value="<?= $o->kodifikasi ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="category_okr">Category OKR</label>
                            <select class="form-control" id="category_okr" name="okr_dsc_category_okr_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($category_okr->result() as $co) {
                                    if ($co->id_category_okr == $o->category_okr) {
                                        echo '<option value="' . $co->id_category_okr . '" selected>' . $co->nama_category_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_dsc_objective">Objective</label>
                            <input type="text" class="text-uppercase form-control" id="okr_dsc_objective" name="okr_dsc_objective_new" value="<?= $o->objective ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_dsc_key_result">Key Result</label>
                            <input type="text" class="text-uppercase form-control" id="okr_dsc_key_result" name="okr_dsc_key_result_new" value="<?= $o->key_result ?>" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="dod">Definition of Done</label>
                            <input type="text" class="text-uppercase form-control" id="dod" name="okr_dsc_dod_new" value="<?= $o->definition_of_done ?>" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="okr_dsc_quarter_new">Quarter</label>
                            <input type="text" class="text-uppercase form-control" id="okr_dsc_quarter_new" name="okr_dsc_quarter_new" value="<?= $o->quarter ?>" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_dsc_year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="okr_dsc_year" name="okr_dsc_year_new" value="<?= $o->year ?>" placeholder="Example : 2021" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="assignee">Assignee</label>
                            <select class="form-control" id="select2member4" name="okr_dsc_assignee_new" required="required">
                                <option value="">Choose Assignee</option>
                                <?php
                                foreach ($member_dsc->result() as $md) {
                                    if ($md->nik == $o->assignee) {
                                        echo '<option value="' . $md->nik . '" selected>' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    } else {
                                        echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="complexity">Complexity</label>
                            <select class="form-control" id="complexity" name="okr_dsc_complexity_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($complexity_okr->result() as $cx) {
                                    if ($cx->id_complexity_okr == $o->complexity) {
                                        echo '<option value="' . $cx->id_complexity_okr . '" selected>' . $cx->nama_complexity_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_output">Type of Output</label>
                            <select class="form-control type_of_output_dsc" id="type_of_output_dsc" name="okr_dsc_type_of_output_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($too_okr->result() as $too) {
                                    if ($too->id_too_okr == $o->type_of_output) {
                                        echo '<option value="' . $too->id_too_okr . '" selected>' . $too->nama_too_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Unit</label>
                            <input type="text" class="text-uppercase form-control unit_dsc" id="unit_dsc" name="unit" value="<?= $o->unit ?>" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Target</label>
                            <input type="number" class="text-uppercase form-control target_dsc" id="target_dsc" name="target" value="<?= $o->target ?>" placeholder="Example : 100/10000/7/24" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="start">Start</label>
                            <input type="date" class="form-control start_dsc" name="start" id="start_dsc" value="<?= $o->start ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="end">End</label>
                            <input type="date" class="form-control end_dsc" name="end" id="end_dsc" value="<?= $o->end ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_formula">Type of Formula</label>
                            <select class="form-control" id="type_of_formula" name="okr_dsc_type_of_formula_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($tof_okr->result() as $tof) {
                                    if ($tof->id_tof_okr == $o->type_of_formula) {
                                        echo '<option value="' . $tof->id_tof_okr . '" selected>' . $tof->nama_tof_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Progress (%)</label>
                            <input type="number" class="form-control " name="progress_new" value="<?= $o->progress ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Detail Progress</label>
                            <input type="text" class="form-control " name="detail_progress_new" value="<?= $o->detail_progress ?>" required="required" />
                        </div>


                        <input type="hidden" name="id_okr_dsc" value="<?= $o->id_okr_dsc ?>">

                        <input type="hidden" name="id_usecase" value="<?= $o->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit OKR DSC Team</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase OKR DSC Team -->

<!-- Delete Usecase OKR DSC Team -->
<?php
foreach ($okr_dsc->result() as $o) {
?>

    <div class="modal fade" id="deleteOKRDSCTeam<?= $o->id_okr_dsc ?>" role="dialog" aria-labelledby="deleteOKRDSCTeamLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOKRDSCTeamLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_okr_dsc_team/<?= $o->id_okr_dsc ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $o->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase OKR DSC Team -->

<!-- Add Usecase OKR Member -->
<div class="modal fade" id="addOKRMember" role="dialog" aria-labelledby="addOKRMemberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addOKRMemberLabel">Add OKR Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_okr_member">
                    <div class="form-group ml-auto">
                        <label class="required" for="assignee">Assignee</label>
                        <select class="form-control" id="select2member6" name="okr_member_assignee" required="required">
                            <option value="">Choose Assignee</option>
                            <?php
                            foreach ($member_dsc->result() as $md) {
                                echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="kodifikasi">Codification</label>
                        <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_member_kodifikasi" placeholder="Example : A.1/B.1/C.1" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="category_okr">Category OKR</label>
                        <select class="form-control" id="category_okr" name="okr_member_category_okr" required="required">
                            <option value="" selected disabled>Choose Category</option>
                            <?php
                            foreach ($category_okr->result() as $co) {
                                echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_objective">Objective</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_objective" name="okr_member_objective" placeholder="Example : dashboard" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_key_result">Key Result</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_key_result" name="okr_member_key_result" placeholder="Example : Customer & Marketing Analytic" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="dod">Definition of Done</label>
                        <input type="text" class="text-uppercase form-control" id="dod" name="okr_member_dod" placeholder="Example : dashboard selesai" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_quarter">Quarter</label>
                        <input type="text" class="text-uppercase form-control" id="okr_member_quarter" name="okr_member_quarter" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="okr_member_year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="okr_member_year" name="okr_member_year" placeholder="Example: 2021" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="complexity">Complexity</label>
                        <select class="form-control" id="complexity" name="okr_member_complexity" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($complexity_okr->result() as $cx) {
                                echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_output">Type of Output</label>
                        <select class="form-control type_of_output_add_member" id="type_of_output" name="okr_member_type_of_output" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($too_okr->result() as $too) {
                                echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="unit">Unit</label>
                        <input type="text" class="text-uppercase form-control add_member_unit" id="unit" name="unit" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="target">Target</label>
                        <input type="number" class="text-uppercase form-control add_member_target" id="target" name="target" placeholder="Example : 100/10000/7/24" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="start">Start</label>
                        <input type="date" class="form-control add_member_start" name="start" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="end">End</label>
                        <input type="date" class="form-control add_member_end" name="end" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="type_of_formula">Type of Formula</label>
                        <select class="form-control" id="type_of_formula" name="okr_member_type_of_formula" required="required">
                            <option value="" selected disabled>Choose One</option>
                            <?php
                            foreach ($tof_okr->result() as $tof) {
                                echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                            };
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Progress (%)</label>
                        <input type="number" class="form-control " name="progress" placeholder="Example : 50" required="required" />
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="progress">Detail Progress</label>
                        <input type="text" class="form-control " name="detail_progress" placeholder="Example : 74 hour per month" required="required" />
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add OKR Member</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase OKR Member -->

<!-- Edit Usecase OKR Member-->
<?php
foreach ($okr_member->result() as $om) {
?>
    <div class="modal fade" id="editOKRMember<?= $om->id_okr_member ?>" role="dialog" aria-labelledby="editOKRMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editOKRMemberLabel">Edit OKR Member</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_okr_member">
                        <div class="form-group ml-auto">
                            <label class="required" for="member">Member</label>
                            <select class="form-control" id="select2member7" name="okr_member_member_new" required="required">
                                <option value="">Choose Member</option>
                                <?php
                                foreach ($member_dsc->result() as $md) {
                                    if ($md->nik == $om->member) {
                                        echo '<option value="' . $md->nik . '" selected>' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    } else {
                                        echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="kodifikasi">Codification</label>
                            <input type="text" class="text-uppercase form-control" id="kodifikasi" name="okr_member_kodifikasi_new" value="<?= $om->kodifikasi ?>" placeholder="Example : A.1/B.1/C.1" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="category_okr">Category OKR</label>
                            <select class="form-control" id="category_okr" name="okr_member_category_okr_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($category_okr->result() as $co) {
                                    if ($co->id_category_okr == $om->category_okr) {
                                        echo '<option value="' . $co->id_category_okr . '" selected>' . $co->nama_category_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $co->id_category_okr . '">' . $co->nama_category_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_objective">Objective</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_objective" name="okr_member_objective_new" value="<?= $om->objective ?>" placeholder="Example : dashboard" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_key_result">Key Result</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_key_result" name="okr_member_key_result_new" value="<?= $om->key_result ?>" placeholder="Example : Customer & Marketing Analytic" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="dod">Definition of Done</label>
                            <input type="text" class="text-uppercase form-control" id="dod" name="okr_member_dod_new" value="<?= $om->definition_of_done ?>" placeholder="Example : dashboard selesai" required="required">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_quarter">Quarter</label>
                            <input type="text" class="text-uppercase form-control" id="okr_member_quarter" name="okr_member_quarter_new" value="<?= $om->quarter ?>" placeholder="Example : Q1,Q2,Q3/Q1-Q4" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="okr_member_year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="okr_member_year" name="okr_member_year_new" value="<?= $om->year ?>" placeholder="Example : 2021" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="assignee">Assignee</label>
                            <select class="form-control" id="select2member8" name="okr_member_assignee_new" required="required">
                                <option value="">Choose Assignee</option>
                                <?php
                                foreach ($member_dsc->result() as $md) {
                                    if ($md->nik == $om->assignee) {
                                        echo '<option value="' . $md->nik . '" selected>' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    } else {
                                        echo '<option value="' . $md->nik . '">' . $md->nik . ' - ' . $md->nama_member . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="complexity">Complexity</label>
                            <select class="form-control" id="complexity" name="okr_member_complexity_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($complexity_okr->result() as $cx) {
                                    if ($cx->id_complexity_okr == $om->complexity) {
                                        echo '<option value="' . $cx->id_complexity_okr . '" selected>' . $cx->nama_complexity_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $cx->id_complexity_okr . '">' . $cx->nama_complexity_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_output">Type of Output</label>
                            <select class="form-control type_of_output_member" id="type_of_output_member" name="okr_member_type_of_output_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($too_okr->result() as $too) {
                                    if ($too->id_too_okr == $om->type_of_output) {
                                        echo '<option value="' . $too->id_too_okr . '" selected>' . $too->nama_too_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $too->id_too_okr . '">' . $too->nama_too_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Unit</label>
                            <input type="text" class="text-uppercase form-control unit_member" id="unit" name="unit" value="<?= $om->unit ?>" placeholder="Example :  %/Rp/Hari/Jam" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="unit">Target</label>
                            <input type="number" class="text-uppercase form-control target_member" id="target" name="target" value="<?= $om->target ?>" placeholder="Example : 100/10000/7/24" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="start">Start</label>
                            <input type="date" class="form-control start_member" name="start" value="<?= $om->start ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="end">End</label>
                            <input type="date" class="form-control end_member" name="end" value="<?= $om->end ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="type_of_formula">Type of Formula</label>
                            <select class="form-control" id="type_of_formula" name="okr_member_type_of_formula_new" required="required">
                                <option value="" selected disabled>Choose One</option>
                                <?php
                                foreach ($tof_okr->result() as $tof) {
                                    if ($tof->id_tof_okr == $om->type_of_formula) {
                                        echo '<option value="' . $tof->id_tof_okr . '" selected>' . $tof->nama_tof_okr . '</option>';
                                    } else {
                                        echo '<option value="' . $tof->id_tof_okr . '">' . $tof->nama_tof_okr . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Progress (%)</label>
                            <input type="number" class="form-control " name="progress_new" value="<?= $om->progress ?>" required="required" />
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="progress">Detail Progress</label>
                            <input type="text" class="form-control " name="detail_progress_new" value="<?= $om->detail_progress ?>" required="required" />
                        </div>


                        <input type="hidden" name="id_okr_member" value="<?= $om->id_okr_member ?>">

                        <input type="hidden" name="id_usecase" value="<?= $om->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit OKR Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase OKR Member -->

<!-- Delete Usecase OKR Member -->
<?php
foreach ($okr_member->result() as $om) {
?>

    <div class="modal fade" id="deleteOKRMember<?= $om->id_okr_member ?>" role="dialog" aria-labelledby="deleteOKRMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOKRMemberLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_okr_member/<?= $om->id_okr_member ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $om->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase OKR Member -->


<!-- Add Usecase Training Needs -->
<div class="modal fade" id="addTrainingNeeds" role="dialog" aria-labelledby="addTrainingNeedsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addTrainingNeedsLabel">Add Training Needs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_training_needs">
                    <div class="form-group ml-auto">
                        <label class="required" for="training_needs_name">Training Name</label>
                        <input type="text" class="text-uppercase form-control" id="training_needs_name" name="training_needs_name" placeholder="Example: Data Viz 101, Deep Learning,..." required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="training_needs_quarter">Quarter</label>
                        <select class="text-uppercase form-control" id="training_needs_quarter" name="training_needs_quarter">
                            <option selected disabled>Choose Quarter</option>
                            <option value="q1">Q1</option>
                            <option value="q2">Q2</option>
                            <option value="q3">Q3</option>
                            <option value="q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="training_needs_year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="training_needs_year" name="training_needs_year" placeholder="Example: 2021" required="required">
                    </div>
                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Training Needs</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Training Needs -->

<!-- Edit Usecase Training Needs -->
<?php
foreach ($training_needs->result() as $tn) {
?>
    <div class="modal fade" id="editTrainingNeeds<?= $tn->id_usecase_training_needs ?>" role="dialog" aria-labelledby="editTrainingNeedsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTrainingNeedsLabel">Edit Training Needs</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_training_needs">
                        <div class="form-group ml-auto">
                            <label class="required" for="training_name">Training Name</label>
                            <input type="text" class="text-uppercase form-control" id="training_name" name="training_name" value="<?= $tn->training_name ?>" placeholder="Example: Data Viz 101, Deep Learning,..." required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="training_needs_quarter">Quarter</label>
                            <select class="text-uppercase form-control" id="training_needs_quarter" name="training_needs_quarter" required="required">
                                <option selected disabled>Choose Quarter</option>
                                <?php
                                foreach ($quarter as $q) {
                                    if ($q == $tn->quarter) {
                                        echo '<option value="' . $q . '" class="' . $q . '" selected>' . $q . '</option>';
                                    } else {
                                        echo '<option value="' . $q . '" class="' . $q . '">' . $q . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="training_needs_year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="training_needs_year" name="training_needs_year" value="<?= $tn->year ?>" placeholder="Example: 2021" required="required">
                        </div>

                        <input type="hidden" name="id_usecase_training_needs" value="<?= $tn->id_usecase_training_needs ?>">

                        <input type="hidden" name="id_usecase" value="<?= $tn->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Training Needs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Training Needs -->

<!-- Delete Usecase Training Needs -->
<?php
foreach ($training_needs->result() as $tn) {
?>

    <div class="modal fade" id="deleteTrainingNeeds<?= $tn->id_usecase_training_needs ?>" role="dialog" aria-labelledby="deleteTrainingNeedsLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTrainingNeedsLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_training_needs/<?= $tn->id_usecase_training_needs ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $tn->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Training Needs -->

<!-- Add Usecase Skill Existing -->
<div class="modal fade" id="addSkillExisting" role="dialog" aria-labelledby="addSkillExistingLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addSkillExistingLabel">Add Skill Existing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_skill_existing">
                    <div class="form-group ml-auto">
                        <label class="required" for="skill_existing_name">Skill Name</label>
                        <input type="text" class="text-uppercase form-control" id="skill_existing_name" name="skill_existing_name" placeholder="Example: Data Viz 101, Deep Learning,..." required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="skill_existing_quarter">Quarter</label>
                        <select class="text-uppercase form-control" id="skill_existing_quarter" name="skill_existing_quarter">
                            <option selected disabled>Choose Quarter</option>
                            <option value="q1">Q1</option>
                            <option value="q2">Q2</option>
                            <option value="q3">Q3</option>
                            <option value="q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="skill_existing_year">Year</label>
                        <input type="number" class="text-uppercase form-control" id="skill_existing_year" name="skill_existing_year" placeholder="Example: 2021" required="required">
                    </div>
                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Skill Existing</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Skill Existing -->

<!-- Edit Usecase Skill Existing -->
<?php
foreach ($skill_existing->result() as $se) {
?>
    <div class="modal fade" id="editSkillExisting<?= $se->id_usecase_skill_existing ?>" role="dialog" aria-labelledby="editSkillExistingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillExistingLabel">Edit Skill Existing</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_skill_existing">
                        <div class="form-group ml-auto">
                            <label class="required" for="skill_name">Skill Name</label>
                            <input type="text" class="text-uppercase form-control" id="skill_name" name="skill_name" value="<?= $se->skill_name ?>" placeholder="Example: Data Viz 101, Deep Learning,..." required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="skill_existing_quarter">Quarter</label>
                            <select class="text-uppercase form-control" id="skill_existing_quarter" name="skill_existing_quarter" required="required">
                                <option selected disabled>Choose Quarter</option>
                                <?php
                                foreach ($quarter as $q) {
                                    if ($q == $se->quarter) {
                                        echo '<option value="' . $q . '" class="' . $q . '" selected>' . $q . '</option>';
                                    } else {
                                        echo '<option value="' . $q . '" class="' . $q . '">' . $q . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="skill_existing_year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="skill_existing_year" name="skill_existing_year" value="<?= $se->year ?>" placeholder="Example: 2021" required="required">
                        </div>

                        <input type="hidden" name="id_usecase_skill_existing" value="<?= $se->id_usecase_skill_existing ?>">

                        <input type="hidden" name="id_usecase" value="<?= $se->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Skill Existing</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Skill Existing -->

<!-- Delete Usecase Skill Existing -->
<?php
foreach ($skill_existing->result() as $se) {
?>

    <div class="modal fade" id="deleteSkillExisting<?= $se->id_usecase_skill_existing ?>" role="dialog" aria-labelledby="deleteSkillExistingLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSkillExistingLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_skill_existing/<?= $se->id_usecase_skill_existing ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $se->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Skill Existing -->

<!-- Add Usecase Tools -->
<div class="modal fade" id="addTool" role="dialog" aria-labelledby="addToolLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addToolLabel">Add Tool Needs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_tool">
                    <div class="form-group ml-auto">
                        <label class="required" for="tool">Tool Name</label>
                        <input type="text" class="text-uppercase form-control" id="tool" name="tool" placeholder="Example: Tableau Entreprise, PowerBI,..." required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Quarter</label>
                        <select class="text-uppercase form-control" id="quarter" name="quarter">
                            <option selected disabled>Choose Quarter</option>
                            <option value="q1">Q1</option>
                            <option value="q2">Q2</option>
                            <option value="q3">Q3</option>
                            <option value="q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Year</label>
                        <input type="number" class="text-uppercase form-control" id="year" name="year" placeholder="Example: 2021" required="required">
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Tool Needs</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Tools -->
<!-- Edit Usecase Tools -->
<?php
foreach ($tool_needs->result() as $tn) {
?>
    <div class="modal fade" id="editTool<?= $tn->id_usecase_tool_needs ?>" role="dialog" aria-labelledby="editToolLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editToolLabel">Edit Tool Needs</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_tool">
                        <div class="form-group ml-auto">
                            <label class="required" for="tool">Tool Name</label>
                            <input type="text" class="text-uppercase form-control" id="tool" name="tool_new" value="<?= $tn->tool_name ?>" placeholder="Example: Tableau Entreprise, PowerBI,..." required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="quarter">Quarter</label>
                            <select class="text-uppercase form-control" id="quarter" name="quarter_new">
                                <option selected disabled>Choose Quarter</option>
                                <?php
                                foreach ($quarter as $q) {
                                    if ($q == $tn->quarter) {
                                        echo '<option value="' . $q . '" class="' . $q . '" selected>' . $q . '</option>';
                                    } else {
                                        echo '<option value="' . $q . '" class="' . $q . '">' . $q . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="year" name="year_new" value="<?= $tn->year ?>" placeholder="Example: 2021" required="required">
                        </div>

                        <input type="hidden" name="id_usecase_tool_needs" value="<?= $tn->id_usecase_tool_needs ?>">

                        <input type="hidden" name="id_usecase" value="<?= $tn->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Tool Needs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Tools -->

<!-- Delete Usecase Tools -->
<?php
foreach ($tool_needs->result() as $tn) {
?>

    <div class="modal fade" id="deleteTool<?= $tn->id_usecase_tool_needs ?>" role="dialog" aria-labelledby="deleteToolLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteToolLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_tool/<?= $tn->id_usecase_tool_needs ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $tn->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Tools -->



<!-- Add Usecase Resource -->
<div class="modal fade" id="addResource" role="dialog" aria-labelledby="addResourceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addResourceLabel">Add Resource Needs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_resource">
                    <div class="form-group ml-auto">
                        <label class="required" for="role">Role</label>
                        <input type="text" class="text-uppercase form-control" id="role" name="role" placeholder="Example: Data Engineer, Data Analyst,..." required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quantity">Quantity</label>
                        <input type="number" class="text-uppercase form-control" id="quantity" name="quantity" placeholder="Example: 123" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="level">Level</label>
                        <input type="text" class="text-uppercase form-control" id="level" name="level" placeholder="Example: Senior/Medium/Junior" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="skill">Skill</label>
                        <input type="text" class="text-uppercase form-control" id="skill" name="skill" placeholder="Example: Deep Learning, Python, d3Js,..." required="required">
                    </div>

                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Quarter</label>
                        <select class="text-uppercase form-control" id="quarter" name="quarter">
                            <option selected disabled>Choose Quarter</option>
                            <option value="q1">Q1</option>
                            <option value="q2">Q2</option>
                            <option value="q3">Q3</option>
                            <option value="q4">Q4</option>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="quarter">Year</label>
                        <input type="number" class="text-uppercase form-control" id="year" name="year" placeholder="Example: 2021" required="required">
                    </div>

                    <input type="hidden" name="id_usecase" value="<?= $usecase->id_usecase ?>">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Resource Needs</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Resource -->

<!-- Edit Usecase Resource -->
<?php
foreach ($resource_needs->result() as $rn) {
?>
    <div class="modal fade" id="editResource<?= $rn->id_usecase_resource_needs ?>" role="dialog" aria-labelledby="editResourceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editResourceLabel">Edit Resource Needs</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_resource">
                        <div class="form-group ml-auto">
                            <label class="required" for="role">Role</label>
                            <input type="text" class="text-uppercase form-control" id="role" name="role_new" value="<?= $rn->role ?>" placeholder="Example: Data Engineer, Data Analyst,..." required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="quantity">Quantity</label>
                            <input type="number" class="text-uppercase form-control" id="quantity" name="quantity_new" value="<?= $rn->quantity ?>" placeholder="Example: 123" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="level">Level</label>
                            <input type="text" class="text-uppercase form-control" id="level" name="level_new" value="<?= $rn->level ?>" placeholder="Example: Senior/Medium/Junior" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="skill">Skill</label>
                            <input type="text" class="text-uppercase form-control" id="skill" name="skill_new" value="<?= $rn->skill ?>" placeholder="Example: Deep Learning, Python, d3Js,..." required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="quarter">Quarter</label>
                            <select class="text-uppercase form-control" id="quarter" name="quarter_new">
                                <option selected disabled>Choose Quarter</option>
                                <?php
                                foreach ($quarter as $q) {
                                    if ($q == $rn->quarter) {
                                        echo '<option value="' . $q . '" class="' . $q . '" selected>' . $q . '</option>';
                                    } else {
                                        echo '<option value="' . $q . '" class="' . $q . '">' . $q . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="year">Year</label>
                            <input type="number" class="text-uppercase form-control" id="year" name="year_new" value="<?= $rn->year ?>" placeholder="Example: 2021" required="required">
                        </div>

                        <input type="hidden" name="id_usecase_resource_needs" value="<?= $rn->id_usecase_resource_needs ?>">

                        <input type="hidden" name="id_usecase" value="<?= $rn->id_usecase ?>">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Resource Needs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<!-- End of Edit Usecase Resource -->

<!-- Delete Usecase Resource -->
<?php
foreach ($resource_needs->result() as $rn) {
?>

    <div class="modal fade" id="deleteResource<?= $rn->id_usecase_resource_needs ?>" role="dialog" aria-labelledby="deleteResourceLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteResourceLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete this data?
                </div>
                <div class="modal-footer">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/delete_data_resource/<?= $rn->id_usecase_resource_needs ?>">
                        <div class="form-group ml-auto">
                            <input type="hidden" id="id_usecase" name="id_usecase" value="<?= $rn->id_usecase ?>">
                        </div>

                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<!-- End of Delete Usecase Resource -->


<script>
    $('#label_usecase_started').hide();
    $('#label_usecase_finished').hide();
    $('#usecase_started').hide();
    $('#usecase_finished').hide();

    $('#id_usecase_status').on('change', function() {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if (valueSelected == '1') {
            $('#label_usecase_started').show();
            $('#usecase_started').show();
            $('#label_usecase_finished').hide();
            $('#usecase_finished').hide();
        } else {
            $('#label_usecase_started').show();
            $('#usecase_started').show();
            $('#label_usecase_finished').show();
            $('#usecase_finished').show();
        }
        return false;
    });

    $('#label_usecase_started_edit').hide();
    $('#label_usecase_finished_edit').hide();
    $('#usecase_started_edit').hide();
    $('#usecase_finished_edit').hide();

    if ($('#id_usecase_status_edit').value == '1') {
        $('#label_usecase_started_edit').show();
        $('#usecase_started_edit').show();
        $('#label_usecase_finished_edit').hide();
        $('#usecase_finished_edit').hide();
    } else {
        $('#label_usecase_started_edit').show();
        $('#usecase_started_edit').show();
        $('#label_usecase_finished_edit').show();
        $('#usecase_finished_edit').show();
    }

    $('#id_usecase_status_edit').on('change', function() {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if (valueSelected == '1') {
            $('#label_usecase_started_edit').show();
            $('#usecase_started_edit').show();
            $('#label_usecase_finished_edit').hide();
            $('#usecase_finished_edit').hide();
        } else {
            $('#label_usecase_started_edit').show();
            $('#usecase_started_edit').show();
            $('#label_usecase_finished_edit').show();
            $('#usecase_finished_edit').show();
        }
        return false;
    });

    //add okr product
    $('.type_of_output_add_product').change(function(e) {
        if ($(this).val() == "1") {
            $(".add_unit").prop('disabled', false);
            $(".add_target").prop('disabled', false);
            $(".add_start").prop('disabled', true);
            $(".add_end").prop('disabled', true);
            $(".add_start").append('<input type="date" name="start" value="-">')
            $(".add_end").append('<input type="date" name="end" value="-">')
        };
        if ($(this).val() == "2") {
            $(".add_unit").prop('disabled', true);
            $(".add_target").prop('disabled', true);
            $(".add_start").prop('disabled', false);
            $(".add_end").prop('disabled', false);
            $(".add_unit").append('<input type="hidden" name="unit" value="-">')
            $(".add_target").append('<input type="hidden" name="target" value="-">')
        };

        if ($(this).val() == "3") {
            $(".add_unit").prop('disabled', false);
            $(".add_target").prop('disabled', false);
            $(".add_start").prop('disabled', false);
            $(".add_end").prop('disabled', false);
        };

    });
    //===> stop okr product


    // add okr dsc team
    $('.type_of_output_add_dsc').change(function(e) {
        if ($(this).val() == "1") {
            $(".add_dsc_unit").prop('disabled', false);
            $(".add_dsc_target").prop('disabled', false);
            $(".add_dsc_start").prop('disabled', true);
            $(".add_dsc_end").prop('disabled', true);
            $(".add_dsc_start").append('<input type="date" name="start" value="-">')
            $(".add_dsc_end").append('<input type="date" name="end" value="-">')
        };

        if ($(this).val() == "2") {
            $(".add_dsc_unit").prop('disabled', true);
            $(".add_dsc_target").prop('disabled', true);
            $(".add_dsc_start").prop('disabled', false);
            $(".add_dsc_end").prop('disabled', false);
            $(".add_dsc_unit").append('<input type="hidden" name="unit" value="-">')
            $(".add_dsc_target").append('<input type="hidden" name="target" value="-">')
        };

        if ($(this).val() == "3") {
            $(".add_dsc_unit").prop('disabled', false);
            $(".add_dsc_target").prop('disabled', false);
            $(".add_dsc_start").prop('disabled', false);
            $(".add_dsc_end").prop('disabled', false);
        };


    });
    //===> stop okr dsc team

    //add okr  member
    $('.type_of_output_add_member').change(function(e) {
        if ($(this).val() == "1") {
            $(".add_member_unit").prop('disabled', false);
            $(".add_member_target").prop('disabled', false);
            $(".add_member_start").prop('disabled', true);
            $(".add_member_end").prop('disabled', true);
            $(".add_member_start").append('<input type="date" name="start" value="-">')
            $(".add_member_end").append('<input type="date" name="end" value="-">')
        }
        if ($(this).val() == "2") {
            $(".add_member_unit").prop('disabled', true);
            $(".add_member_target").prop('disabled', true);
            $(".add_member_start").prop('disabled', false);
            $(".add_member_end").prop('disabled', false);
            $(".add_member_unit").append('<input type="hidden" name="unit" value="-">')
            $(".add_member_target").append('<input type="hidden" name="target" value="-">')
        };

        if ($(this).val() == "3") {
            $(".add_member_unit").prop('disabled', false);
            $(".add_member_target").prop('disabled', false);
            $(".add_member_start").prop('disabled', false);
            $(".add_member_end").prop('disabled', false);
        };
    });
    //===> stop okr  member



    //EDIT TYPE of PRODUCT
    if ($(".type_of_output_product").val() == '1') {
        $(".unit_product").prop('disabled', false);
        $(".target_product").prop('disabled', false);
        $(".start_product").prop('disabled', true);
        $(".end_product").prop('disabled', true);
    };

    if ($(".type_of_output_product").val() == '2') {
        $(".unit_product").prop('disabled', true);
        $(".target_product").prop('disabled', true);
        $(".start_product").prop('disabled', false);
        $(".end_product").prop('disabled', false);
    };

    if ($(".type_of_output_product").val() == '3') {
        $(".unit_product").prop('disabled', false);
        $(".target_product").prop('disabled', false);
        $(".start_product").prop('disabled', false);
        $(".end_product").prop('disabled', false);
    };


    if ($(".type_of_output_dsc").val() == '1') {
        $(".unit_dsc").prop('disabled', false);
        $(".target_dsc").prop('disabled', false);
        $(".start_dsc").prop('disabled', true);
        $(".end_dsc").prop('disabled', true);
    };

    if ($(".type_of_output_dsc").val() == '2') {
        $(".unit_dsc").prop('disabled', true);
        $(".target_dsc").prop('disabled', true);
        $(".start_dsc").prop('disabled', false);
        $(".end_dsc").prop('disabled', false);
    };

    if ($(".type_of_output_dsc").val() == '3') {
        $(".unit_dsc").prop('disabled', false);
        $(".target_dsc").prop('disabled', false);
        $(".start_dsc").prop('disabled', false);
        $(".end_dsc").prop('disabled', false);
    };

    if ($(".type_of_output_member").val() == '1') {
        $(".unit_member").prop('disabled', false);
        $(".target_member").prop('disabled', false);
        $(".start_member").prop('disabled', true);
        $(".end_member").prop('disabled', true);
    };

    if ($(".type_of_output_member").val() == '2') {
        $(".unit_member").prop('disabled', true);
        $(".target_member").prop('disabled', true);
        $(".start_member").prop('disabled', false);
        $(".end_member").prop('disabled', false);
    };

    if ($(".type_of_output_member").val() == '3') {
        $(".unit_member").prop('disabled', false);
        $(".target_member").prop('disabled', false);
        $(".start_member").prop('disabled', false);
        $(".end_member").prop('disabled', false);
    };


    $('.type_of_output_product').change(function(e) {
        if ($(this).val() == "1") {
            $(".unit_product").prop('disabled', false);
            $(".target_product").prop('disabled', false);
            $(".start_product").prop('disabled', true);
            $(".end_product").prop('disabled', true);
            $(".start_product").append('<input type="hidden" name="start" value="-">')
            $(".end_product").append('<input type="hidden" name="end" value="-">')
        };
        if ($(this).val() == "2") {
            $(".unit_product").prop('disabled', true);
            $(".target_product").prop('disabled', true);
            $(".start_product").prop('disabled', false);
            $(".end_product").prop('disabled', false);
            $(".unit_product").append('<input type="hidden" name="unit" value="-">')
            $(".target_product").append('<input type="hidden" name="target" value="-">')
        };
        if ($(this).val() == "3") {
            $(".unit_product").prop('disabled', false);
            $(".target_product").prop('disabled', false);
            $(".start_product").prop('disabled', false);
            $(".end_product").prop('disabled', false);
        };


    });

    $('.type_of_output_dsc').change(function(e) {
        if ($(this).val() == "1") {
            $(".unit_dsc").prop('disabled', false);
            $(".target_dsc").prop('disabled', false);
            $(".start_dsc").prop('disabled', true);
            $(".end_dsc").prop('disabled', true);
            $(".start_dsc").append('<input type="hidden" name="start" value="-">')
            $(".end_dsc").append('<input type="hidden" name="end" value="-">')
        };
        if ($(this).val() == "2") {
            $(".unit_dsc").prop('disabled', true);
            $(".target_dsc").prop('disabled', true);
            $(".start_dsc").prop('disabled', false);
            $(".end_dsc").prop('disabled', false);
            $(".unit_dsc").append('<input type="hidden" name="unit" value="-">')
            $(".target_dsc").append('<input type="hidden" name="target" value="-">')
        };
        if ($(this).val() == "3") {
            $(".unit_dsc").prop('disabled', false);
            $(".target_dsc").prop('disabled', false);
            $(".start_dsc").prop('disabled', false);
            $(".end_dsc").prop('disabled', false);
        };
    });

    $('.type_of_output_member').change(function(e) {
        if ($(this).val() == "1") {
            $(".unit_member").prop('disabled', false);
            $(".target_member").prop('disabled', false);
            $(".start_member").prop('disabled', true);
            $(".end_member").prop('disabled', true);
            $(".start_member").append('<input type="hidden" name="start" value="-">')
            $(".end_member").append('<input type="hidden" name="end" value="-">')
        };
        if ($(this).val() == "2") {
            $(".unit_member").prop('disabled', true);
            $(".target_member").prop('disabled', true);
            $(".start_member").prop('disabled', false);
            $(".end_member").prop('disabled', false);
            $(".unit_member").append('<input type="hidden" name="unit" value="-">')
            $(".target_member").append('<input type="hidden" name="target" value="-">')
        };
        if ($(this).val() == "3") {
            $(".unit_member").prop('disabled', false);
            $(".target_member").prop('disabled', false);
            $(".start_member").prop('disabled', false);
            $(".end_member").prop('disabled', false);
        };

    });








    //===> end edit TYPE of PRODUCT
</script>