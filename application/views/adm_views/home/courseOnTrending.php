    <!-- Body Section -->
    <body>
        <div class="container-fluid p-4 text-center" id="bg-template-monitoring">
            <div class="row justify-content-center align-items-center text-center">
                <!-- <a class="monitoring-nav col-sm-2 col-md-2 target" href="< ?= base_url() ?>pages/Home/course_on_trending">Course on Trending</a> -->
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/member_dsc_summary">Member DSC Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/apprentice_summary">Apprenticeship Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/training_certification_summary">Training - Certification Summary</a>
                <a class="monitoring-nav col-sm-2 col-md-2" href="<?= base_url() ?>pages/Home/usecase_summary">Use Case Summary</a>
            </div>
        </div>

        <div class="container-fluid p-4" id="bg-template-graph">
            <h1 class="mb-4 text-center">Course on Trending</h1>
            <hr>

            <?php
                if($this->session->flashdata('msg')){
                    echo $this->session->flashdata('msg');
                }
            ?>

            <table id="five_row_order" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Course Tittle</th>
                        <th>Course Link</th>
                        <th>Course Subject</th>
                        <th>Course Type</th>  
                        <th>Course Source</th> 
                        <th>Year</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        foreach($courseTrend->result() as $ct){
                    ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $ct->course_title ?></td>
                        <td><?= $ct->course_link ?></td>
                        <td><?= $ct->course_subject ?></td>
                        <td><?= $ct->course_type ?></td>
                        <td><?= $ct->course_source ?></td>
                        <td><?= $ct->year ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Course Tittle</th>
                        <th>Course Link</th>
                        <th>Course Subject</th>
                        <th>Course Type</th>  
                        <th>Course Source</th> 
                        <th>Year</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </body>
    <!-- End of Body Section -->