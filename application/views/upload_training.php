<?php
    // @codeCoverageIgnoreStart
    if($this->session->userdata('msg')){
        echo $this->session->userdata('msg');
    }

    // File upload path
    $targetDir = "public/assets/uploads/training/";
    $fileName = $_POST['nik'].'_'.basename($_FILES["bukti_pelatihan"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(isset($_POST["submit"]) && !empty($_FILES["bukti_pelatihan"]["name"])){
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','pdf');
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["bukti_pelatihan"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $this->db->query("INSERT into trained_member (nik, nama_pelatihan, id_pathway, tahun_pelatihan, bukti_pelatihan) VALUES ('".$_POST["nik"]."','".$_POST["nama_pelatihan"]."','".$_POST["id_pathway"]."','".$_POST["tahun_pelatihan"]."','".$fileName."')");
                if($insert){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
                }else{
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal menambahkan data baru</div><br>');
                } 
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
            }
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG, & PDF files are allowed to upload.</div><br>');
        }
    }else{
        $this->db->query("INSERT into trained_member (nik, nama_pelatihan, id_pathway, tahun_pelatihan, bukti_pelatihan) VALUES ('".$_POST["nik"]."','".$_POST["nama_pelatihan"]."','".$_POST["id_pathway"]."','".$_POST["tahun_pelatihan"]."','-')");
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
    }

    // Redirect to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // @codeCoverageIgnoreEnd
?>