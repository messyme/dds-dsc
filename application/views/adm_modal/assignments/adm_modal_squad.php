
        <!-- Add Squad Modal -->
        <div class="modal fade" id="addSquad" role="dialog" aria-labelledby="addSquadModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="addSquadModalLabel">Add Data Squad</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/add_data_squad">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_squad">Squad Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_squad" name="nama_squad" placeholder="Example: XYZ" required="required">
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_tribe">Tribe Name</label>
                            <select class="form-control select2tribe" id="id_tribe" name="id_tribe" required="required">
                                <option value=""></option>
                                <?php
                                    foreach($tribe->result() as $t){
                                        echo '<option value="'.$t->id_tribe.'">'.$t->id_tribe.' - '.$t->nama_tribe.'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Squad</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
    <!-- end of Add Squad Modal -->

    <!-- Edit Squad Modal -->
    <?php
        foreach($squad->result() as $s){
    ?>
    <div class="modal fade" id="editSquad<?= $s->id_squad ?>" role="dialog" aria-labelledby="editSquadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSquadLabel">Edit Squad</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/Assignments/edit_data_squad">
                        <div class="form-group ml-auto" hidden>
                            <label class="required" for="id_squad">ID</label>
                            <input type="number" class="boks form-control" id="id_squad" name="id_squad" value="<?= $s->id_squad ?>">
                            <input type="hidden" name="id_squad" value="<?= $s->id_squad ?>">
                        </div>
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_squad">Squad Name</label>
                            <input type="text" class="form-control text-uppercase" id="nama_squad" name="nama_squad" value="<?= $s->nama_squad ?>" required="required">
                        </div>
                        <div class="form-group">
                            <label class="required" for="id_tribe">Tribe Name</label>
                            <select class="form-control" id="id_tribe" name="id_tribe" required="required">
                                <option disabled value="">Choose Tribe</option>
                                <?php
                                    foreach($tribe->result() as $t){
                                    if($t->id_tribe == $s->id_tribe){
                                        echo '<option value="'.$t->id_tribe.'" class="'.$t->id_tribe.'" selected>'.$t->id_tribe.' - '.$t->nama_tribe.'</option>';
                                    } else {
                                        echo '<option value="'.$t->id_tribe.'" class="'.$t->id_tribe.'">'.$t->id_tribe.' - '.$t->nama_tribe.'</option>'; 
                                    }
                                    }
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Squad</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- End of Edit Squad Modal -->

    <!-- Delete Confirmation-->
    <?php
        foreach ($squad->result() as $s) {
    ?>
    <div class="modal fade" id="deleteModal<?= $s->id_squad ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/Assignments/delete_data_squad/<?= $s->id_squad ?>">Delete</a>
        </div>
        </div>
    </div>
    </div>
    <?php } ?>
    <!-- end of Delete Confirmation-->