<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/assets/css/login.css">
    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Web Icon -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/logo_insight/logo.png" />
    <!-- CSS Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <title>Verify Data - INSIGHT</title>
  </head>

  <!-- Body Section -->
  <body>
    <div class="container animate__animated animate__rubberBand">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="bg-login p-4">
                <div class="row justify-content-center align-items-center">
                  <img src="<?= base_url() ?>public/assets/images/logo_telkom_color.png" width="20%" alt="" srcset="">
                  <img src="<?= base_url() ?>public/assets/images/logo_db_color.png" width="20%" alt="" srcset="">
                </div>
                <div class="row justify-content-center align-items-center">
                  <img src="<?= base_url() ?>public/assets/images/logo_insight/logo-3.png" width="40%" alt="" srcset="">
                </div>
                <h4 class="text-center mt-2">Hi! There, Have a Nice Day!</h4>
                <p class="text-center mb-4">
                  Please check all the data below and verify it!
                </p>
                <?php
                  // @codeCoverageIgnoreStart
                  if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                  }
                  // @codeCoverageIgnoreEnd
                ?>
                <form method="post" action="<?= base_url() ?>pages/VerifyData/verify" onsubmit="return verifyPassword()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required"for="nama_member">Name</label>
                                <input type="text" class="form-control text-uppercase" id="nama_member" name="nama_member" value="<?= $member_dsc->nama_member ?>" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ml-auto">
                                <label class="required" for="id_status">Status</label>
                                <select class=" form-control" id="id_status" name="id_status" required="required">
                                    <option selected disabled>Choose Status</option>
                                    <?php
                                        foreach($status->result() as $st){
                                            if($member_dsc->id_status == $st->id_status){
                                                echo '<option class="text-uppercase" value="'.$st->id_status.'" selected>'.$st->id_status.' - '.$st->nama_status.'</option>';
                                            } else {
                                                echo '<option class="text-uppercase" value="'.$st->id_status.'">'.$st->id_status.' - '.$st->nama_status.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_cluster_ed">Cluster Education</label>
                                <select class=" form-control" id="cluster_ed" name="id_cluster_ed" required="required">
                                    <option value="">Choose Cluster Education</option>
                                    <?php foreach($cluster_ed->result() as $clustered){ ?>
                                        <option <?php echo $member_dsc->id_cluster_ed == $clustered->id_cluster_ed ? 'selected="selected"' : '' ?> 
                                            class="text-uppercase" value="<?php echo $clustered->id_cluster_ed ?>"><?php echo $clustered->cluster_ed_desc ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_ed_bg">Educational Background</label>
                                <select class=" form-control" id="ed_bg" name="id_ed_bg" required="required">
                                    <option value="">Choose Educational Background</option>
                                    <?php foreach ($ed_bg->result() as $edbg) { ?>
                                        <option <?php echo $member_dsc->id_ed_bg == $edbg->id_ed_bg ? 'selected="selected"' : '' ?> 
                                            class="<?php echo "text-uppercase ".$edbg->id_cluster_ed ?>" value="<?php echo $edbg->id_ed_bg ?>"><?php echo $edbg->ed_bg_desc ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_posisi">Position</label>
                                <select class=" form-control" id="id_posisi" name="id_posisi" required="required">
                                    <option selected disabled>Choose Position</option>
                                    <?php
                                        foreach($posisi->result() as $ps){
                                            if($member_dsc->id_posisi == $ps->id_posisi){
                                                echo '<option class="text-uppercase" value="'.$ps->id_posisi.'" selected>'.$ps->id_posisi.' - '.$ps->nama_posisi.'</option>';
                                            } else {
                                                echo '<option class="text-uppercase" value="'.$ps->id_posisi.'">'.$ps->id_posisi.' - '.$ps->nama_posisi.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_band">Band</label>
                                <select class=" form-control" id="id_band" name="id_band" required="required">
                                    <option selected disabled>Choose Band</option>
                                    <?php
                                        foreach($band->result() as $bd){
                                            if($member_dsc->id_band == $bd->id_band){
                                                echo '<option class="text-uppercase" value="'.$bd->id_band.'" selected>'.$bd->id_band.' - '.$bd->nama_band.'</option>';
                                            } else {
                                                echo '<option class="text-uppercase" value="'.$bd->id_band.'">'.$bd->id_band.' - '.$bd->nama_band.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_posisi_type">Position Type</label>
                                <select class=" form-control" id="id_posisi_type" name="id_posisi_type" required="required">
                                    <option selected disabled>Choose Position</option>
                                    <?php
                                        foreach($posisi_type->result() as $pt){
                                            if($member_dsc->id_posisi_type == $pt->id_posisi_type){
                                                echo '<option class="text-uppercase" value="'.$pt->id_posisi_type.'" selected>'.$pt->id_posisi_type.' - '.$pt->nama_posisi_type.'</option>';
                                            } else {
                                                echo '<option class="text-uppercase" value="'.$pt->id_posisi_type.'">'.$pt->id_posisi_type.' - '.$pt->nama_posisi_type.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="id_posisi_level">Position Level</label>
                                <select class=" form-control" id="id_posisi_level" name="id_posisi_level" required="required">
                                    <option selected disabled>Choose Position</option>
                                    <?php
                                        foreach($posisi_level->result() as $pt){
                                            if($member_dsc->id_posisi_level == $pt->id_posisi_level){
                                                echo '<option class="text-uppercase" value="'.$pt->id_posisi_level.'" selected>'.$pt->id_posisi_level.' - '.$pt->nama_posisi_level.'</option>';
                                            } else {
                                                echo '<option class="text-uppercase" value="'.$pt->id_posisi_level.'">'.$pt->id_posisi_level.' - '.$pt->nama_posisi_level.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-outline-primary mb-3 mt-4">Verify Data</button>
                </form>
            </div>
        </div>
    </div>

  </body>
  <!-- End of Body Section -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
  <!-- Chained JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.js" integrity="sha512-JjkQxXsZ8GMTLe9DUkPrx7J2c+LHkgdiG5KnC8SAcH98s6whNCmf7WB8EbUI9GmkjIPdtGrXTFkuyidNAPfZeA==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous"></script>

  <script src="<?= base_url() ?>public/assets/js/chained_cluster_ed_bg.js"></script>
  <script src="<?= base_url() ?>public/assets/js/chained_assignments.js"></script>                                      

</html>