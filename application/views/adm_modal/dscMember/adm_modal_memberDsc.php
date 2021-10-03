    <!-- Add Member Modal -->
    <div class="modal fade" id="addMember"  role="dialog" aria-labelledby="addMemberLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addMemberLabel">Add Data Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/DscMember/add_data_memberdsc" enctype="multipart/form-data">
                        <div class="form-group ml-auto">
                            <label class="required" for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="example : 123456" required="required">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_member">Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_member" name="nama_member" placeholder="example : Ahmad" required="required">
                        </div>

                        <div class="form-group">
                            <label class="required" for="groups">Cluster Education</label>
                            <select class="select2clustered form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                                <option value=""></option>
                                <?php foreach ($cluster_ed->result() as $clustered) { ?>
                                    <option <?php echo $cluster_ed_selected == $clustered->id_cluster_ed ? 'selected="selected"' : '' ?> value="<?php echo $clustered->id_cluster_ed ?>"><?php echo $clustered->cluster_ed_desc ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="required" for="id_ed_bg">Educational Background</label>
                            <select class="select2edbg form-control" id="ed_bg" name="id_ed_bg" required="required">
                                <option value=""></option>
                                <?php foreach ($ed_bg->result() as $edbg) { ?>
                                    <option <?php echo $ed_bg_selected == $edbg->id_cluster_ed ? 'selected="selected"' : '' ?> class="<?php echo $edbg->id_cluster_ed ?>" value="<?php echo $edbg->id_ed_bg ?>"><?php echo $edbg->ed_bg_desc ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="id_status">Status</label>
                            <select class="select2status form-control" id="id_status" name="id_status" required="required">
                                <option value=""></option>
                                <?php
                                foreach ($status->result() as $st) {
                                    echo '<option value="' . $st->id_status . '">' . $st->id_status . ' - ' . $st->nama_status . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_posisi">Position</label>
                            <select class="select2posisi form-control" id="id_posisi" name="id_posisi" required="required">
                                <option value=""></option>
                                <?php
                                foreach ($posisi->result() as $ps) {
                                    echo '<option value="' . $ps->id_posisi . '">' . $ps->id_posisi . ' - ' . $ps->nama_posisi . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_posisi_type">Position Type</label>
                            <select class="select2posisiType form-control" id="id_posisi_type" name="id_posisi_type" required="required">
                                <option value=""></option>
                                <?php
                                foreach ($posisi_type->result() as $pt) {
                                    echo '<option value="' . $pt->id_posisi_type . '">' . $pt->id_posisi_type . ' - ' . $pt->nama_posisi_type . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_posisi_level">Position Level</label>
                            <select class="select2posisiLevel form-control" id="id_posisi_level" name="id_posisi_level" required="required">
                                <option value=""></option>
                                <?php
                                foreach ($posisi_level->result() as $pl) {
                                    echo '<option value="' . $pl->id_posisi_level . '">' . $pl->id_posisi_level . ' - ' . $pl->nama_posisi_level . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="id_band">Band</label>
                            <select class="select2band form-control" id="id_band" name="id_band" required="required">
                                <option value=""></option>
                                <?php
                                foreach ($band->result() as $bd) {
                                    echo '<option value="' . $bd->id_band . '">' . $bd->id_band . ' - ' . $bd->nama_band . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="kontrak_mulai">Contract Started</label>
                            <input class="form-control" type="date" id="kontrak_mulai" name="kontrak_mulai">
                        </div>

                        <div class="form-group ml-auto">
                            <label class="required" for="kontrak_selesai">Contract Finished</label>
                            <input class="form-control" type="date" id="kontrak_selesai" name="kontrak_selesai">
                        </div>

                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Member</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Member Modal -->