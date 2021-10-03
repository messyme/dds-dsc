<?php
    // @codeCoverageIgnoreStart
    if($this->session->userdata('msg')){
        echo $this->session->userdata('msg');
    }

    if (empty($_FILES["user_photo"]["name"])) {
        // Insert image file name into database
        $insert = $this->db->query("INSERT into member_dsc (nik, nama_member, id_status, kontrak_mulai, kontrak_selesai, id_posisi, id_band) VALUES ('".$_POST["nik"]."','".$_POST["nama_member"]."','".$_POST["id_status"]."','".$_POST["kontrak_mulai"]."','".$_POST["kontrak_selesai"]."','".$_POST["id_posisi"]."','".$_POST["id_band"]."')");
        var_dump($insert);
        if($insert){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal menambahkan data baru</div><br>');
        }
    } else {
        // File upload path
        $path_parts = pathinfo($_FILES["user_photo"]["name"]);
        $targetDir = "public/assets/uploads/user_photo/";
        $fileName = $path_parts['filename'];
        // $fileName = basename($_FILES["user_photo"]["name"]);
        $targetFilePath = $targetDir . $_POST["nik"];
        $fileType = $path_parts['extension'];
        // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if ($this->admin_model->check_nik_member($this->input->post('nik'))>0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Data sudah ada</div><br>');
            redirect('/');
        }else{
            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["user_photo"]["tmp_name"], $targetDir . $_POST[nik] . "." . $fileType)){
                    // Insert image file name into database
                    $insert = $this->db->query("INSERT into member_dsc (nik, nama_member, id_status, kontrak_mulai, kontrak_selesai, id_posisi, id_band, user_photo) VALUES ('".$_POST["nik"]."','".$_POST["nama_member"]."','".$_POST["id_status"]."','".$_POST["kontrak_mulai"]."','".$_POST["kontrak_selesai"]."','".$_POST["id_posisi"]."','".$_POST["id_band"]."','".$_POST[nik] . "." . $fileType."')");
                    var_dump($insert);
                    if($insert){
                        $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
                    }else{
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal menambahkan data baru</div><br>');
                    } 
                }else{
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
                }
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, & PNG are allowed to upload.</div><br>');
            }
        }
    }

    // // File upload path
    // $path_parts = pathinfo($_FILES["user_photo"]["name"]);
    // $targetDir = "public/assets/uploads/user_photo/";
    // $fileName = $path_parts['filename'];
    // // $fileName = basename($_FILES["user_photo"]["name"]);
    // $targetFilePath = $targetDir . $_POST["nik"];
    // $fileType = $path_parts['extension'];
    // // $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    // if ($this->admin_model->check_nik_member($this->input->post('nik'))>0) {
    //     $this->session->set_flashdata('msg', '<div class="alert alert-danger">Data sudah ada</div><br>');
    //     redirect('/');
    // }else{
    //     // Allow certain file formats
    //     $allowTypes = array('jpg','png','jpeg');
    //     if(in_array($fileType, $allowTypes)){
    //         // Upload file to server
    //         if(move_uploaded_file($_FILES["user_photo"]["tmp_name"], $targetDir . $_POST[nik] . "." . $fileType)){
    //             // Insert image file name into database
    //             $insert = $this->db->query("INSERT into member_dsc (nik, nama_member, id_status, kontrak_mulai, kontrak_selesai, id_posisi, id_band, user_photo) VALUES ('".$_POST["nik"]."','".$_POST["nama_member"]."','".$_POST["id_status"]."','".$_POST["kontrak_mulai"]."','".$_POST["kontrak_selesai"]."','".$_POST["id_posisi"]."','".$_POST["id_band"]."','".$_POST[nik] . "." . $fileType."')");
    //             var_dump($insert);
    //             if($insert){
    //                 $this->session->set_flashdata('msg', '<div class="alert alert-success">Berhasil menambahkan data baru</div><br>');
    //             }else{
    //                 $this->session->set_flashdata('msg', '<div class="alert alert-danger">Gagal menambahkan data baru</div><br>');
    //             } 
    //         }else{
    //             $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, there was an error uploading your file.</div><br>');
    //         }
    //     }else{
    //         $this->session->set_flashdata('msg', '<div class="alert alert-danger">Sorry, only JPG, JPEG, & PNG are allowed to upload.</div><br>');
    //     }
    // }

    // Redirect to previous page
    // header('Location: ' . $_SERVER['HTTP_REFERER']);
    // @codeCoverageIgnoreEnd
?>