<style>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    #notfound {
        position: relative;
        height: 90vh;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound {
        max-width: 920px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
        padding-left: 15px;
        padding-right: 15px;
    }


    .notfound h2 {
        font-family: 'Maven Pro', sans-serif;
        font-size: 35px;
        color: #000;
        font-weight: 900;
        text-transform: uppercase;
        margin: 0px;
    }

    .notfound p {
        font-family: 'Maven Pro', sans-serif;
        font-size: 16px;
        color: #000;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 15px;
    }

    /* .notfound a {
        font-family: 'Maven Pro', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
        background: #189cf0;
    display: inline-block;
    padding: 16px 38px;
        border: 2px solid transparent;
        border-radius: 40px;
        color: #fff;
    font-weight: 400;
    -webkit-transition: 0.2s all;
    transition: 0.2s all;
    }

    */
    /* .notfound a:hover {
        background-color: #fff;
        border-color: #189cf0;
        color: #189cf0;
    } */

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 h1 {
            font-size: 162px;
        }

        .notfound h2 {
            font-size: 26px;
        }
    }
</style>

<body>
    <!-- if leader kosong/belum isi assigned role leader -->
    <div id="notfound" class="container-fluid p-4">
        <div class="notfound">
            <br>
            <br><br><br>
            <br><br>
            <h2>We are sorry, You are not Leader</h2>
            <img src="<?= base_url() ?>public/assets/images/empty-data.png" srcset="" width="40%">
            <p>If you are a Leader,</b> please fill your Assigned Use Case as a Leader Role in <a href="<?= base_url() ?>pages/AssignedUsecase">Assigned Usecase</a> page.</p>
            <a class="btn btn-primary" href="<?= base_url() ?>pages/Home">Back To Homepage</a>
        </div>
    </div>

    <div class="container p-4" id="bg-template">


        <h3 class="mb-4 mt-4" id="training">Dashboard Analytic CORPU (Autogenerate use case name)</h3>
        <button type="button" class="mb-4 btn btn-primary" data-toggle="modal" data-target="#addMember"><em class="fas fa-plus"></em> Add Member</button>

        <?php
        if ($this->session->flashdata('msg')) {
            echo $this->session->flashdata('msg');
        }
        ?>

        <table id="no_export_2" class="display table table-striped table-bordered dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Number of Submissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase"></td>
                    <td class="text-uppercase">approved/waiting for aprroval/rejected</td>
                    <td class="text-uppercase"></td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= base_url() ?>pages/DailyTimesheet/detail_member" type="button" class="btn btn-sm btn-primary"><em class="fas fa-info"></em> Detail</a>
                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target=""><em class="fas fa-trash"></em> Delete</button>
                        </div>
                    </td>
                </tr>


            </tbody>
            <tfoot>
                <tr>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Number of Submissions</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>