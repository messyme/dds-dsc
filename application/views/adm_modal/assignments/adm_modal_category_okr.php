<!-- Add CategoryOkr Modal -->
<div class="modal fade" id="addCategoryOkr"  role="dialog" aria-labelledby="addCategoryOkrModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- header -->
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryOkrModalLabel">Add Data Category OKR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- eof header -->
            <!-- body -->
            <div class="modal-body">
                <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/add_data_category_okr">
                    <div class="form-group ml-auto">
                        <label class="required" for="nama_category_okr">Category OKR Name</label>
                        <input type="text" class="text-uppercase form-control" id="nama_category_okr" name="nama_category_okr" placeholder="example : Satuan Tugas" required="required">
                    </div>
                    <input type="hidden" name="code" value="private">

                    <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-block" id="submit">Add Data Category OKR</button>
                </form>
            </div>
            <!-- eof body -->
        </div>
    </div>
</div>
<!-- end of Add category_okr Modal -->

<!-- edit category_okr modal -->
<?php
foreach ($category_okr->result() as $bd) {
?>
    <div class="modal fade" id="editCategoryOkr<?= $bd->id_category_okr ?>"  role="dialog" aria-labelledby="editCategoryOkr" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryOkr">Edit Data Category OKR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- eof header -->
                <!-- body -->
                <div class="modal-body">
                    <form role="form" method="post" action="<?= base_url() ?>pages/OtherDataAssignment/edit_data_category_okr">
                        <div class="form-group ml-auto">
                            <label class="required" for="nama_category_okr">Category OKR Name</label>
                            <input type="text" class="text-uppercase form-control" id="nama_category_okr" name="nama_category_okr" value="<?= $bd->nama_category_okr ?>" required="required">
                            <input type="hidden" name="id_category_okr" id="id_category_okr" value="<?= $bd->id_category_okr ?>">
                        </div>
                        <input type="hidden" name="code" value="private">

                        <button type="button" class="btn btn-danger btn-block" id="close" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" id="submit">Edit Data Category OKR</button>
                    </form>
                </div>
                <!-- eof body -->
            </div>
        </div>
    </div>
<?php } ?>
<!-- eof edit category_okr modal -->

<!-- Delete Confirmation-->
<?php
foreach ($category_okr->result() as $bd) {
?>
    <div class="modal fade" id="deleteCategoryOkr<?= $bd->id_category_okr ?>"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a id="btn-delete" class="btn btn-danger" href="<?= base_url() ?>pages/OtherDataAssignment/delete_data_category_okr/<?= $bd->id_category_okr ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- end of Delete Confirmation-->