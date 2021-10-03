<?php
    // @codeCoverageIgnoreStart
    if($this->session->userdata('msg')){
        echo $this->session->userdata('msg');
    }

    // File upload path
    $path_parts = pathinfo($_FILES["user_photo"]["name"]);
    $targetDir = "public/assets/uploads/user_photo/";
    $fileName = $path_parts['filename'];
    // $fileName = basename($_FILES["user_photo"]["name"]);
    $targetFilePath = $targetDir . $_POST["nik"];
    $fileType = $path_parts['extension'];
    // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        //checking if file exsists
        if(file_exists($targetDir . $_POST[nik])) unlink($targetDir . $_POST[nik]);

            if(move_uploaded_file($_FILES["user_photo"]["tmp_name"], $targetDir . $_POST[nik] . "." . $fileType)){
            // Insert image file name into database
            $insert = $this->db->query("
                UPDATE member_dsc 
                SET user_photo = '".$_POST[nik] . "." . $fileType."'
                WHERE member_dsc.nik = '".$_POST["nik"]."'");
            var_dump($insert);
            if($insert){
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil edit data</div><br>');
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal edit data</div><br>');
            } 
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
        }
    }else{
        $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, & PNG are allowed to upload.</div><br>');
    }

    // Redirect to previous page
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // @codeCoverageIgnoreEnd
?>