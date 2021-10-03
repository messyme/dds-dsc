  <!-- Footer Section -->
  <footer class="bg-light text-center text-lg-start mt-5">
    <!-- Grid container -->
    <div class="container p-5">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0 footer-text">
          <img src="<?= base_url() ?>public/assets/images/icon_footer/main-office-white.png" width="150" height="150" alt="" srcset="">
          <h6 class="text-uppercase font-weight-bold">Main Office</h6>
          <p>
            Telkom Kebayoran Baru <br>
            Jl. Sisingamangaraja No.4, RT.2/RW.1, Selong, Kec. Kebayoran Baru, <br>
            Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12110
          </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0 footer-text">
          <img src="<?= base_url() ?>public/assets/images/icon_footer/bandung-office-white2.png" width="150" height="150" alt="" srcset="">
          <h6 class="text-uppercase font-weight-bold">Bandung Office</h6>
          <p>
            Telkom Divisi Digital Service Bandung (Lantai 2) <br>
            Jl. Gegerkalong Hilir no. 47, Sukasari, <br>
            Kota Bandung, Jawa Barat, 40152 <br>
          </p>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="d-flex justify-content-center mt-2">
        <div class="display-4">
          <img src="<?= base_url() ?>public/assets/images/logo_telkom_white.png" alt="telkom-logo" srcset="" width="100px">
          <img src="<?= base_url() ?>public/assets/images/logo_insight/logo-white-2.png" alt="dxb-dsc-logo" srcset="" width="150px">
          <img src="<?= base_url() ?>public/assets/images/logo_db_white.png" alt="telkom-logo" srcset="" width="100px">
        </div>
      </div>
      <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); font-size: 12px; color: white;">
      © 2021 Data Scientist Chapter. All Rights Reserved
    </div>
    <!-- Copyright -->
  </footer>
  <!-- End of Footer Section -->

  <?php
  if ($this->session->userdata('role') != 'user_logged_in') {
    if (NULL !== $admModal) {
      foreach ($admModal as $value) {
        $this->load->view('adm_modal/' . $value);
      }
    }
  }
  ?>

  <script src="<?= base_url() ?>public/assets/js/custom_splash_screen.js"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>public/assets/bootstrap4/js/bootstrap.min.js"></script>

  <!-- DataTables JS -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.1/js/dataTables.rowGroup.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

  <!-- Multiple Select JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <!-- Datepicker -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

  <!-- AOS -->
  <script src="<?= base_url() ?>public/assets/aos/aos.js"></script>

  <!-- export datatables -->
  <?php
  if ($this->session->userdata('role') != 'user_logged_in') {
  ?>

    <script src="<?= base_url() ?>public/assets/js/export_datatables.js"></script>

  <?php
  } else {
  ?>

    <script src="<?= base_url() ?>public/assets/js/usr_export_datatables.js"></script>

  <?php
  }
  ?>

  <!-- Chained JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.js" integrity="sha512-JjkQxXsZ8GMTLe9DUkPrx7J2c+LHkgdiG5KnC8SAcH98s6whNCmf7WB8EbUI9GmkjIPdtGrXTFkuyidNAPfZeA==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous"></script>

  <script src="<?= base_url() ?>public/assets/js/chained_cluster_ed_bg.js"></script>
  <script src="<?= base_url() ?>public/assets/js/chained_assignments.js"></script>

  <!-- auto expand navbar -->
  <script src="<?= base_url() ?>public/assets/js/auto_expand_navbar.js"></script>

  <!-- custom select2 js -->
  <script src="<?= base_url() ?>public/assets/js/custom_select_two.js"></script>

  <!-- custom datepicker -->
  <script src="<?= base_url() ?>public/assets/js/custom_datepicker.js"></script>

  <!-- upload photo -->
  <script src="<?= base_url() ?>public/assets/js/custom_upload_photo.js"></script>

  <!-- upload photo 2 -->
  <script src="<?= base_url() ?>public/assets/js/custom_upload_photo_2.js"></script>
  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
  
  <!-- D3 -->
  <script src="<?= base_url() ?>public/assets/d3/d3.v4.min.js"></script>
  
  <script>
    AOS.init();
  </script>

  <script>

  </script>
  <?php
  if (NULL !== $footerGraph) {
    foreach ($footerGraph as $value) {
      $this->load->view('adm_graph/' . $value);
    }
  }
  ?>

  </html>