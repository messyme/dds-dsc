  <!-- Body Section -->
  <body>
    <?php
        if($this->session->flashdata('msg')){
            echo $this->session->flashdata('msg');
        }
    ?>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid bg-jumbo">
      <div class="container display-4 dsc-profile">
        <img src="<?= base_url() ?>public/assets/images/logo_telkom_white.png" alt="telkom-logo" srcset="" width="100px">
        <img src="<?= base_url() ?>public/assets/images/logo_insight/logo-white-2.png" alt="dxb-dsc-logo" srcset="" width="150px">
        <img src="<?= base_url() ?>public/assets/images/logo_db_white.png" alt="telkom-logo" srcset="" width="100px">
        <h1 class="display-4"><span>Data Scientist</span><br> Chapter</h1>
        <?php foreach($contetDscProfile as $dsc) : ?>
          <?php $deskripsi = $dsc->deskripsi; ?>
          <p class="lead">
            <?php if( $deskripsi == "") : ?>
              "no description"
            <?php else :  ?>
              <?= $deskripsi; ?> 
            <?php endif ?>
          </p>
        <?php endforeach ?>
        
        <?php 
            if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
        ?>
        <form class="form-inline my-2 my-lg-0" action="<?php echo base_url()?>pages/SearchResult">
          <input class="form-control mr-sm-2" id="keyword" name="keyword" type="search" placeholder="Search something..." aria-label="Search" required>
          <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <button class="btn btn-primary">
          <a href="<?= base_url() ?>pages/Home/edit_homepage" id="btn-edit-page">Edit this Page</a>
        </button>
        <?php
            } 
        ?>
      </div>
    </div>
    <!-- End of Jumbotron -->

    <!-- Quotes Section -->
    <section class="container-fluid py-5" id="quotes">
      <div class="mx-auto justify-content-center align-items-center text-center">
        <?php foreach($contentGroupHead as $gh) : ?>
          <?php $foto = 'data:image/'.$gh->file_type.';base64,'.base64_encode($gh->foto).''?>
          <img id="imgTarget" class="rounded-circle"  src="<?= $foto; ?>" width="260px" alt="" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
          <blockquote class="blockquote" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
            <p class="blockquote__text">
              <?php $sambutan = $gh->sambutan;  ?>
              <?php if( $sambutan == "") : ?>
                "no description"
              <?php else :  ?>
                "<?= $sambutan; ?>"
              <?php endif ?> 
            </p>
            <p class="blockquote__text blockquote__text--credit">
                <?php $nameGroup = $gh->name_group;  ?>
                <?php if( $nameGroup == "") : ?>
                  "no description"
                <?php else :  ?>
                  — <?= $nameGroup; ?> —
                <?php endif ?> 
            </p>
          </blockquote>
        <?php endforeach ?>
      </div>
    </section>
    <!-- End of Quotes -->

    <!-- Vision Description Section -->
    <section class="container-fluid vision-desc py-5 text-dark">
        <div class="container mx-auto">
            <div class="row align-item-center">
                <div class="col-lg-6 col-md-6 col-sm-6 text" data-aos="zoom-in-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                  <div class="heading"><h2 class="display-6 font-weight-bold pb-3">Vision</h2></div>
                  <?php foreach($contentVisiMisi as $vis): ?>
                    <p class="text-justify">
                      <?php $visi = $vis->visi;  ?>
                      <?php if( $visi == "") : ?>
                        " no description ""
                      <?php else :  ?>
                        <?= $vis->visi; ?>
                      <?php endif ?>  
                    </p>
                  <?php endforeach ?>
                </div>
                <div class="col-lg-6 col-md-6 col-ms-6 img" data-aos="zoom-in-down" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
                    <img class="img-fluid" src="<?= base_url() ?>public/assets/images/vision-min.png">
                </div>
            </div>
        </div>
    </section>
    <!-- End of Vision Description Section -->

    <!-- Mission Desc Section -->
    <section class="mission pt-5">
      <div class="heading text-center" data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
        <h2 class="display-6 font-weight-bold pt-4 pb-5">Mission</h2>
      </div>
      <div class="row mx-auto justify-content-center align-items-center text-center container">
        <div class="col-lg-3 col-md-3 col-12 w-25 pb-3 m-3 one" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="500">
          <img class="img-fluid" src="<?= base_url() ?>public/assets/images/facilitateAsset.png">
          <h5 class="font-weight-bold pt-3">Education</h5>
          <p>Facilitating the highest quality data science education.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-12 w-25 pb-3 m-3 one" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
          <img class="img-fluid" src="<?= base_url() ?>public/assets/images/researchAsset.png">
          <h5 class="font-weight-bold pt-3">Research</h5>
          <p>Researching and developing new innovations in the digital ecosystem.</p>
        </div>
        <div class="col-lg-3 col-md-3 col-12 w-25 pb-3 m-3 one" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
          <img class="img-fluid" src="<?= base_url() ?>public/assets/images/collabAsset.png">
          <h5 class="font-weight-bold pt-3">Collaboration</h5>
          <p>Industrial collaboration in orchestrating Telkom's digital ecosystem.</p>
        </div>
      </div>
    </section>
    <!-- End of Mission Desc Section -->

    <!-- Logo Desc Section -->
    <section class="logo pt-5">
      <div class="heading text-center" data-aos="zoom-in" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
        <h2 class="display-6 font-weight-bold pt-4 pb-5">About Our Logo</h2>
      </div>
      <div class="row mx-auto justify-content-center align-items-center text-center container" data-aos="fade-down" data-aos-anchor-placement="center-bottom" data-aos-duration="500">
          <img class="img-fluid" src="<?= base_url() ?>public/assets/images/logo_insight/interpretasi_logo-min.png">
      </div>
    </section>
    <!-- End of Logo Desc Section -->
  </body>
  <!-- End of Body Section -->