  <!-- Body Section -->
  <body>
    <div class="container p-4" id="bg-template">
        <h1 class="mb-4">Assignments Mind Mapping</h1>
        <hr>

        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <?php 
            if (($this->session->userdata('role') != 'user_logged_in') && ($this->session->userdata('role') != 'member_logged_in')){
        ?>

        <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#uploadImage">Update</button>

        <?php
            } 
        ?>

        <?php foreach($content as $ctn) : ?>
            <?php $foto =  'data:image/'.$ctn->file_type.';base64,'.base64_encode($ctn->file).''?>
            <img src="<?= $foto; ?>" alt="Tentang Assignments" width="100%" srcset="">
        <?php endforeach; ?>
    </div>
  </body>
  <!-- End of Body Section -->