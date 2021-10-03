<!-- Add Member Use Case Modal -->
<div class="modal fade" id="addJiraMonitoring"  role="dialog" aria-labelledby="addMemberAssignmentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addMemberAssignmentLabel">Add Jira Monitoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">

                <form role="form" method="post" action="<?= base_url() ?>pages/JiraSoftware/add_monitoring_jira">

                    <div class="form-group">
                        <label class="required">Use Case Name</label>
                        <select class="form-control select2usecase" id="id_usecase" name="id_usecase" required="required" data-placeholder="Choose Use Case" style="width: 100%;">
                            <option value=""></option>
                            <?php
                            foreach ($usecase as $md) {
                                echo '<option class="text-uppercase" value="' . $md->id_usecase . '">' . $md->nama_usecase . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">Key</label>
                        <input id="key" name="key" class='form-control' required="required" data-placeholder="Input Key" style="width: 100%;" type="text" placeholder="Input Key">
                    </div>

                    <div class="form-group">
                        <label class="required">Kanban</label>
                        <select class="boks form-control" id="kanban" name="kanban" required="required">
                            <option disabled selected value="">Choose Kanban</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="required">To Do</label>
                        <input id="todo" name="todo" class='form-control' required="required" data-placeholder="Input To Do" style="width: 100%;" type="text" placeholder="Input To Do">
                    </div>
                    <div class="form-group">
                        <label class="required">In Progress</label>
                        <input id="in_progress" name="in_progress" class='form-control' required="required" data-placeholder="Input In Progress" style="width: 100%;" type="text" placeholder="Input In Progress">
                    </div>
                    <div class="form-group">
                        <label class="required">Done</label>
                        <input id="done" name="done" class='form-control' required="required" data-placeholder="Input Done" style="width: 100%;" type="text"placeholder="Input Done">
                    </div>
                    <input type="hidden" name="code" value="private">
                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add To Jira Monitoring</button>

                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add Member Use Case Modal -->

<!-- edit Member Use Case Modal -->
<?php

foreach ($data_monitoring_jira as $monitor) {
?>
    <div class="modal fade" id="editJiraMonitoring<?= $monitor->id_jiramonitor ?>"  role="dialog" aria-labelledby="addMemberAssignmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberAssignmentLabel">Edit Jira Monitoring</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">

                    <form role="form" method="post" action="<?= base_url() ?>pages/JiraSoftware/update_monitoring">
                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="nik">ID</label>
                            <input type="text" class="form-control" id="id_jiramonitor" name="id_jiramonitor" value="<?= $monitor->id_jiramonitor ?>">
                            <input type="hidden" id="id_jiramonitor" name="id_jiramonitor" value="<?= $monitor->id_jiramonitor ?>">
                        </div>
                        <div class="form-group">
                            <label class="required">Use Case Name</label>
                            <select class="form-control " style="width: 100%;" id="id_usecase" name="id_usecase" required="required">
                                <option disabled value="">Choose Usecases</option>
                                <?php
                                foreach ($usecase as $st) {
                                    if ($monitor->id_usecase == $st->id_usecase) { ?>
                                        <option value="<?= $st->id_usecase ?>" class=" <?= $st->id_usecase ?>" selected><?= $st->nama_usecase ?></option>;
                                    <?php } else { ?>
                                        <option value="<?= $st->id_usecase ?>" class=" <?= $st->id_usecase ?>"><?= $st->nama_usecase ?></option>;
                                <?php     }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">Key</label>
                            <input value="<?= $monitor->key ?>" id="key" name="key" class='form-control' required="required" data-placeholder="Input Key" style="width: 100%;" type="text">
                        </div>

                        <div class="form-group">
                            <label class="required">Kanban</label>
                            <select class="boks form-control" id="kanban" name="kanban" required="required">

                                <?php

                                if ($monitor->kanban == "No") { ?>
                                    <option value="<?= $monitor->kanban ?>" class="<?= $monitor->kanban ?>" selected><?= $monitor->kanban ?> </option>;
                                    <option value="Yes">Yes</option>';
                                <?php } else { ?>
                                    <option value="<?= $monitor->kanban ?>" class="<?= $monitor->kanban ?>" selected><?= $monitor->kanban ?></option>;
                                    <option value="No">No</option>';
                                <?php  } ?>

                                ?>


                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">To Do</label>
                            <input value="<?= $monitor->todo ?>" id="todo" name="todo" class='form-control' required="required" data-placeholder="Input To Do" style="width: 100%;" type="text">
                        </div>
                        <div class="form-group">
                            <label class="required">In Progress</label>
                            <input value="<?= $monitor->in_progress ?>" id="in_progress" name="in_progress" class='form-control' required="required" data-placeholder="Input In Progress" style="width: 100%;" type="text">
                        </div>
                        <div class="form-group">
                            <label class="required">Done</label>
                            <input value="<?= $monitor->done ?>" id="done" name="done" class='form-control' required="required" data-placeholder="Input Done" style="width: 100%;" type="text">
                        </div>
                        <input type="hidden" name="code" value="private">
                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit To Jira Monitoring</button>

                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- edit of Add Member Use Case Modal -->

<!-- Delete Confirmation-->
<?php
foreach ($data_monitoring_jira as $monitor) {
?>
    <div class="modal fade" id="deleteMonitor<?= $monitor->id_jiramonitor ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure want to delete this data?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/JiraSoftware/delete_monitoring_jira/<?= $monitor->id_jiramonitor ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->