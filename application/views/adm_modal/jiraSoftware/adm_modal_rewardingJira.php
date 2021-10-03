
        <!-- Add Member Use Case Modal -->
        <div class="modal fade" id="addJiraRewarding"  role="dialog" aria-labelledby="addMemberAssignmentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberAssignmentLabel">Add Jira Rewarding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/JiraSoftware/add_member_jira">
                        <div class="form-group">
                          <label class="required">Name</label>
                          <select class="select2" id="nik" name="multinik[]" multiple="multiple" required="required" data-placeholder="Choose Name" style="width: 100%;">
                            <?php
                                foreach($member_dsc->result() as $md){
                                    echo '<option class="text-uppercase" value="'.$md->nik.'">'.$md->nik.' - '.$md->nama_member.'</option>';
                                }
                            ?>
                          </select>
                        </div>
                        <input type="hidden" name="code" value="private">
                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Member To Jira Rewarding</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Member Use Case Modal -->

    <!-- Delete Confirmation-->
    <?php
        foreach ($data_rewarding_jira->result() as $drj) {
    ?>
    <div class="modal fade" id="deleteModal<?= $drj->id ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/JiraSoftware/delete_member_jira/<?= $drj->id ?>">Delete</a>
            </div>
            </div>
        </div>
    </div>
    <!-- end of Delete Confirmation-->
    
    <!-- Update Confirmation-->
    <div class="modal fade" id="updateModal<?= $drj->id ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data <?= $drj->nama_member ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                      <form class="form-horizontal"  action="<?= base_url() ?>pages/JiraSoftware/update_member_jira/<?= $drj->id ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class="row">
                            <div class="form-group form-group-sm col-sm-12">
                                <div class="row">
                                    <label for="epic_tracking" class="col-sm-4 col-form-label">Epic Tracking</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="epic_tracking" name="epic_tracking" value=<?php echo $drj->epic_tracking?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="raw" class="col-sm-6 col-form-label">Raw</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="raw" name="raw" value=<?php echo $drj->raw?> placeholder=<?php echo $drj->raw?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="raw_noa" class="col-sm-6 col-form-label">Raw (NoA)</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="raw_noa" name="raw_noa" placeholder=<?php echo $drj->raw_noa?> value=<?php echo $drj->raw_noa?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key1" class="col-sm-6 col-form-label">Key 1</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key1" name="key1" value=<?php echo $drj->key1?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score1" class="col-sm-6 col-form-label">Score 1</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score1" name="score1" placeholder=<?php echo $drj->score1?> value=<?php echo $drj->score1?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key2" class="col-sm-6 col-form-label">Key 2</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key2" name="key2" value=<?php echo $drj->key2?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score2" class="col-sm-6 col-form-label">Score 2</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score2" name="score2" placeholder=<?php echo $drj->score2?> value=<?php echo $drj->score2?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key3" class="col-sm-6 col-form-label">Key 3</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key3" name="key3" value=<?php echo $drj->key3?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score3" class="col-sm-6 col-form-label">Score 3</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score3" name="score3" placeholder=<?php echo $drj->score3?> value=<?php echo $drj->score3?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key4" class="col-sm-6 col-form-label">Key 4</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key4" name="key4" value=<?php echo $drj->key4?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score4" class="col-sm-6 col-form-label">Score 4</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score4" name="score4" placeholder=<?php echo $drj->score4?> value=<?php echo $drj->score4?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key5" class="col-sm-6 col-form-label">Key 5</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key5" name="key5" value=<?php echo $drj->key5?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score5" class="col-sm-6 col-form-label">Score 5</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score5" name="score5" placeholder=<?php echo $drj->score5?> value=<?php echo $drj->score5?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key6" class="col-sm-6 col-form-label">Key 6</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key6" name="key6" value=<?php echo $drj->key6?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score6" class="col-sm-6 col-form-label">Score 6</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score6" name="score6" placeholder=<?php echo $drj->score6?> value=<?php echo $drj->score6?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key7" class="col-sm-6 col-form-label">Key 7</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key7" name="key7" value=<?php echo $drj->key7?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score7" class="col-sm-6 col-form-label">Score 7</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score7" name="score7" placeholder=<?php echo $drj->score7?> value=<?php echo $drj->score7?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key8" class="col-sm-6 col-form-label">Key 8</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key8" name="key8" value=<?php echo $drj->key8?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score8" class="col-sm-6 col-form-label">Score 8</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score8" name="score8" placeholder=<?php echo $drj->score8?> value=<?php echo $drj->score8?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key9" class="col-sm-6 col-form-label">Key 9</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key9" name="key9" value=<?php echo $drj->key9?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score9" class="col-sm-6 col-form-label">Score 9</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score9" name="score9" placeholder=<?php echo $drj->score9?> value=<?php echo $drj->score9?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key10" class="col-sm-6 col-form-label">Key 10</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key10" name="key10" value=<?php echo $drj->key10?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score10" class="col-sm-6 col-form-label">Score 10</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score10" name="score10" placeholder=<?php echo $drj->score10?> value=<?php echo $drj->score10?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key11" class="col-sm-6 col-form-label">Key 11</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key11" name="key11" value=<?php echo $drj->key11?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score11" class="col-sm-6 col-form-label">Score 11</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score11" name="score11" placeholder=<?php echo $drj->score11?> value=<?php echo $drj->score11?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key12" class="col-sm-6 col-form-label">Key 12</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key12" name="key12" value=<?php echo $drj->key12?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score12" class="col-sm-6 col-form-label">Score 12</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score12" name="score12" placeholder=<?php echo $drj->score12?> value=<?php echo $drj->score12?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key13" class="col-sm-6 col-form-label">Key 13</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key13" name="key13" value=<?php echo $drj->key13?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score13" class="col-sm-6 col-form-label">Score 13</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score13" name="score13" placeholder=<?php echo $drj->score13?> value=<?php echo $drj->score13?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key14" class="col-sm-6 col-form-label">Key 14</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key14" name="key14" value=<?php echo $drj->key14?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score14" class="col-sm-6 col-form-label">Score 14</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score14" name="score14" placeholder=<?php echo $drj->score14?> value=<?php echo $drj->score14?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="key15" class="col-sm-6 col-form-label">Key 15</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="key15" name="key15" value=<?php echo $drj->key15?>>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-sm col-sm-6">
                                <div class="row">
                                    <label for="score15" class="col-sm-6 col-form-label">Score 15</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="score15" name="score15" placeholder=<?php echo $drj->score15?> value=<?php echo $drj->score15?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn-update" class="btn btn-primary">Update</a>
                </div>
                </form>
            </div>
        </div>
    </div>

    <?php } ?>
    <!-- end of Update Confirmation-->