    <!-- Body Section -->
    <body>
        <div class="container p-4" id="bg-template">
            <h1 class="mb-4">Benchmarks of Qualification</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <table id="no_export" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Use Case</th>
                        <th>Total Training</th>
                        <th>Total Certification</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($recruitment_qualification as $rq){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $rq->nama_member ?></td>
                        <td>
                        <?php
                            if (!$rq->jml_usecase) {
                                echo "-";
                            } else {
                                echo $rq->jml_usecase;
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            if (!$rq->jml_pelatihan) {
                                echo "-";
                            } else {
                                echo $rq->jml_pelatihan;
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            if (!$rq->jml_sertifikasi) {
                                echo "-";
                            } else {
                                echo $rq->jml_sertifikasi;
                            }
                        ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Use Case</th>
                        <th>Total Training</th>
                        <th>Total Certification</th> 
                    </tr>
                </tfoot>
            </table>
            <hr>
            <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Use Case</th>
                        <th>Training Name</th>
                        <th>Certification Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($recruitment_qualification_2 as $rq_2){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $rq_2->nama_member ?></td>
                        <td>
                        <?php
                            if (!$rq_2->jml_usecase) {
                                echo "-";
                            } else {
                                echo $rq_2->jml_usecase;
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            if (!$rq_2->nama_pelatihan) {
                                echo "-";
                            } else {
                                echo $rq_2->nama_pelatihan;
                            }
                        ?>
                        </td>
                        <td>
                        <?php
                            if (!$rq_2->nama_sertifikasi) {
                                echo "-";
                            } else {
                                echo $rq_2->nama_sertifikasi;
                            }
                        ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Use Case</th>
                        <th>Training Name</th>
                        <th>Certification Name</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
    <!-- End of Body Section -->