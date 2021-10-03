<!-- Add Usecase Modal -->
<div class="modal fade" id="addUsecase" role="dialog" aria-labelledby="addUsecaseModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addUsecaseModalLabel">Add Data Use Case</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_usecase">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_usecase">Use Case Name</label>
                        <input type="text" class=" form-control" id="nama_usecase" name="nama_usecase" placeholder="Example : Smart Collection" required="required">
                    </div>
                    <div class="form-group">
                        <label class="required" for="id_squad">Squads Names</label>
                        <select class="form-control select2squad" id="id_squad" name="id_squad" required="required">
                            <option value=""></option>
                            <?php
                            foreach ($squad->result() as $s) {
                                echo '<option value="' . $s->id_squad . '">' . $s->id_squad . ' - ' . $s->nama_squad . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto" id="usecase_type">
                        <label class="required" for="usecase_type">Use Case Type</label>
                        <input class="form-control" type="text" placeholder="Example : Descriptive, Diagnostic, Predictive, Prescriptive" id="usecase_type" name="usecase_type" required="required">
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="id_usecase_status">Status Use Case</label>
                        <select class=" form-control" id="id_usecase_status" name="id_usecase_status" required="required">
                            <option selected disabled>Choose Use Case Status</option>
                            <?php
                            foreach ($usecase_status->result() as $st) {
                                echo '<option value="' . $st->id_usecase_status . '">' . $st->id_usecase_status . ' - ' . $st->deskripsi_status . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto">
                        <label class="required" for="level">Use Case Point</label>
                        <select class=" form-control" id="level" name="level" required="required">
                            <option selected disabled>Choose Level Use Case</option>
                            <?php
                            foreach ($workload_point->result() as $st) {
                                echo '<option value="' . $st->id_workload_point_usecase . '">' . $st->nama_workload_usecase_level . ' - ' . $st->point . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group ml-auto" id="usecase_started">
                        <label for="usecase_started">Use Case Started</label>
                        <input class="form-control" type="date" id="usecase_started" name="usecase_started" required="required">
                    </div>

                    <div class="form-group ml-auto" id="usecase_finished">
                        <label for="usecase_finished">Use Case Finished</label>
                        <input class="form-control" type="date" id="usecase_finished" name="usecase_finished">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Use Case</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Usecase Modal -->

<script>
    $('#usecase_started').hide(); // destination_free field
    $('#usecase_finished').hide(); // destination_paid field

    $('#id_usecase_status').on('change', function() {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if (valueSelected == '1') {
            $('#usecase_started').show();
            $('#usecase_finished').hide();
        } else {
            $('#usecase_started').show();
            $('#usecase_finished').show();
        }
        return false;
    });
</script>