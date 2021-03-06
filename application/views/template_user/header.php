<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="author" content="Nuzul Ramadhan" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <title>MyHouse - Property Group</title>
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>">

    <!-- Custom CSS -->
    <link href="<?= base_url() ?>global/css/styles.css" rel="stylesheet">
    <link href="<?= base_url() ?>global/css/colors.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url() ?>global/css/custom.css">
    <link rel="stylesheet" href="https://swiperjs.com/package/swiper-bundle.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.1/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" />
    <style>
        [data-letters]:before {
            content: attr(data-letters);
            display: inline-block;
            font-size: 1.4em;
            width: 5em;
            height: 5em;
            line-height: 5em;
            text-align: center;
            border-radius: 50%;
            background: #ff9b20;
            font-weight: bold;
            vertical-align: middle;
            /* margin-right: 0.7em; */
            color: white;
        }

        a.btn.btn-success.btn-block:hover {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
        }

        ul.like_share_list {
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            width: 41rem;
        }

        .resize {
            margin-right: 1.2rem !important;
        }

        .footlogo img {
            max-width: 220px;
        }

        .footlogo {
            margin-left: -25px;
        }

        .table tr th,
        .table tr td {
            /* border-color: #eaeff5; */
            padding: 7px 7px;
            vertical-align: middle;
        }

        .cari span {
            display: block;
        }

        .text1 {
            width: 75%;
            margin: auto;
            margin-bottom: 20px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
            font-size: 50px;
            color: white;
            animation: text 3s 1;
            position: relative;
        }

        .text2 {

            color: white;
        }

        @keyframes text {
            0% {
                margin-bottom: -20px;
            }

            30% {
                letter-spacing: 10px;
                margin-bottom: -20px;
            }

            85% {
                letter-spacing: 8px;
                margin-bottom: -20px;
            }
        }



        @media only screen and (max-width: 768px) {
            .img-fluid {
                max-width: 130%;
                height: auto;
            }

            .cari span {
                display: block;
            }

            .text1 {
                width: 75%;
                margin: auto;
                margin-bottom: 20px;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
                font-size: 17px;
                color: white;
                animation: text 3s 1;
                position: relative;
            }

            .text2 {
                font-size: 10px;
                color: white;
            }

            @keyframes text {
                0% {
                    margin-bottom: -20px;
                }

                30% {
                    letter-spacing: 10px;
                    margin-bottom: -20px;
                }

                85% {
                    letter-spacing: 8px;
                    margin-bottom: -20px;
                }
            }
        }

        .owl-prev {
            left: -30px;
        }

        .owl-next {
            right: -30px;
        }

        .owl-prev,
        .owl-next {
            position: absolute;
            top: 30%;
        }

        .owl-prev span,
        .owl-next span {
            font-size: 60px;
            color: #787878;
        }

        .owl-theme .owl-nav [class*="owl-"]:hover {
            background-color: transparent;
        }
    </style>
</head>

<body class="yellow-skin">
    <div class="preloader"> <img class="loader_animation" style="width: 60%;" height="100%;" src="<?= base_url() ?>assets/img/loader.png" alt="#" /> </div>
    <!-- <div style="background-color: #28a745;z-index:11;">
        <div class="preloader">
            <img class="loader_animation" src="<?= base_url() ?>assets/img/loader.png" alt="#" />
        </div>
    </div> -->
    <div id="main-wrapper">

        <div class="header header-transparent light-text">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="<?php echo base_url("home") ?>">
                            <img src="<?= base_url() ?>global/img/logo-brand1.png" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">
                            <li><a class="hyperlink" href="<?php echo base_url("home") ?>">Beranda</a></li>
                            <li><a class="hyperlink" href="<?php echo base_url("product") ?>">Produk</a></li>
                            <li><a class="hyperlink" href="<?php echo base_url("product/terjual") ?>">Terjual</a></li>
                            <li><a class="hyperlink" href="<?php echo base_url("agent") ?>">Agent</a></li>
                            <li><a class="hyperlink" href="<?php echo base_url("about") ?>">Tentang Kami</a></li>
                            <li><a class="hyperlink" href="<?php echo base_url("kontak") ?>">Kontak Kami</a></li>
                        </ul>

                        <script>
                            $(document).ready(function() {
                                $('.hyperlink').click(function() { // Bind a click event to my <a> tag
                                    var linkValue = $(this).attr('data-link'); // Retreive the value of data-link aka where we want to go
                                    // Do something, your logic
                                    localStorage.removeItem("keyword");
                                    localStorage.removeItem("option");
                                    localStorage.removeItem("kategori");
                                    localStorage.removeItem("tipe_properti");
                                    window.location.href = linkValue; // Load the new page
                                });
                            });
                        </script>
                    </div>
                </nav>
            </div>
        </div>