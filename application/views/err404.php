<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:500|Roboto|Mukta" rel="stylesheet">

    <!-- Web Icon -->
    <link rel="shortcut icon" href="<?= base_url() ?>public/assets/images/logo_dxb.png" />

    <title>Error 404 - INSIGHT</title>
  </head>

  <style type="text/css">

    body {
        background-image: linear-gradient(to left, #6495ed, #9f36c5);
        overflow: hidden;
    }

    #text-section {
        position: relative;
        top: 62px;
        left: 42px;
    }

    #logo-wrap {
        position: absolute;
        bottom: -80px;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
    }

    #logo{
        font-family: "Quicksand";
        font-weight: bold;
        font-size: 30px;
        color: white;
        opacity: 1%;
        text-align: center;
    }

    #info {
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        font-style: italic;
        font-size: 28px;
        color: #fff;
        width: 600px;
        height: 60px;
        line-height: 60px;
        position: relative;
        top: 96px;
        animation: noise-3 1s linear infinite;
        background: -webkit-linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.8));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    #error {
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        font-size: 190px;
        font-style: italic;
        width: 500px;
        height: 200px;
        margin: auto;
        position: absolute;
        top: -50px;
        bottom: 0;
        color: white;
        opacity: 0.7;
        animation: noise 2s linear infinite;
        overflow: default;
        letter-spacing: -12px;
        background: white;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    #error:after {
        content: '404';
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        font-style: italic;
        font-size: 190px;
        width: 150px;
        height: 60px;
        position: absolute;
        color: white;
        animation: noise-1 .2s linear infinite;
        letter-spacing: -12px;
    }

    #error:before {
        content: '404';
        font-family: 'Quicksand', sans-serif;
        font-weight: bold;
        font-style: italic;
        font-size: 190px;
        width: 100px;
        height: 60px;
        margin: auto;
        position: absolute;
        color: white;
        animation: noise-2 .2s linear infinite;
        letter-spacing: -12px;
    }

    #home-ico {
        position: relative;
        top: 3px;
        left: -3px;
        height: 16px;
    }

    #back-to-home {
        font-family: 'Quicksand', sans-serif;
        font-size: 13px;
        font-weight: bold;
        text-decoration: none;
        color: white;
        background: #9f36c5;
        padding: 8px 16px;
        border-radius: 3px;
        position: relative;
        top: 160px;
        left: 150px;
    }

    #back-to-home:hover {
        text-decoration: none;
        box-shadow: 0 5px 15px #9f36c5;
    }

    @keyframes noise-1 {
        0%, 20%, 40%, 60%, 70%, 90% {opacity: 0;}
        10% {opacity: .1;}
        50% {opacity: .5; left: -6px;}
        80% {opacity: .3;}
        100% {opacity: .6; left: 2px;}
    }

    @keyframes noise-2 {
        0%, 20%, 40%, 60%, 70%, 90% {opacity: 0;}
        10% {opacity: .1;}
        50% {opacity: .5; left: 6px;}
        80% {opacity: .3;}
        100% {opacity: .6; left: -2px;}
    }

    @keyframes noise {
        0%, 3%, 5%, 42%, 44%, 100% {opacity: 1; transform: scaleY(1);}  
        4.3% {opacity: 1; transform: scaleY(1.7);}
        43% {opacity: 1; transform: scaleX(1.5);}
    }

    @keyframes noise-3 {
        0%,3%,5%,42%,44%,100% {opacity: 1; transform: scaleY(1);}
        4.3% {opacity: 1; transform: scaleY(4);}
        43% {opacity: .3; transform: scaleX(1.03);}
    }

    .logos {
        position: absolute;
        width: 400px;
        height: 420px;
        top: 25%;
        left: 20%;
    }

    .content {
        position: absolute;
        top:40%;
        left: 70%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
    }

    @media only screen and (max-width: 600px) {
        .logos {
            display: none;
        }
    }
    </style>

    <!-- Body Section -->
    <body>
        <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
        ?>

        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12">
            <img class="logos" src="<?= base_url() ?>public/assets/images/page-not-found.png" alt="error404-logo">
        </div>
            <div class="col col-lg-6 col-md-6 col-sm-12">
                <div class="content">
                    <div id="text-section">
                        <p id="error">404</p>
                        <p id="info">Sorry, the page not found.</p>
                    </div>
                    <a id="back-to-home" href="<?= base_url() ?>pages/Home" draggable="false">Back To Home</a>
                </div>
            </div>
        </div>

        <div id="logo-wrap">
            <img src="<?= base_url() ?>public/assets/images/logo_telkom_white.png" alt="telkom-logo" srcset="" width="100px">
            <img src="<?= base_url() ?>public/assets/images/logo_db_white.png" alt="telkom-logo" srcset="" width="100px">
            <img src="<?= base_url() ?>public/assets/images/new_logo_dsc_white.png" alt="dxb-dsc-logo" srcset="" width="250px">
            <p id="logo">Data Scientist - DDB Telkom</p>
        </div>
    </body>
    <!-- End of Body Section -->
</html>