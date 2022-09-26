<?php 

    session_start();
    
    require "function.php";

    if(!isset($_SESSION['login'])) {
        header("location: login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambiru Cafe</title>
	   <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <i class="navbar-brand" style="font-family: Georgia, 'Times New Roman', Times, serif; font-size: 30px; bottom: 50px; ">
                TAMBIRU CAFE
                </i>

            </div>

    <div style=" color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">Date : 
        <?php

        date_default_timezone_set("Asia/Jakarta");

        echo date("d M Y"); ?>
        <a href="logout.php" class="btn btn-danger square-btn-adjust ">Logout</a>
    </div>

        </nav>

                <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
                    <div class="sidebar-collapse">
                        <ul class="nav" id="main-menu">
        				    <li class="text-center">
                                <img src="assets/img/find_user.png" class="user-image img-responsive"/>
        					</li>
        					
                            <li>
                                <a  href="index.php"><i class="fa fa-home fa-2x"></i> Dashboard</a>
                            </li>

                            <li>
                                <a  href="?page=data_bahan"><i class="fa fa-calendar fa-2x"></i> Data Bahan</a>
                            </li>

                            <li>
                                <a  href="?page=data_supplier"><i class="fa fa-user fa-2x"></i> Data Supplier</a>
                            </li>

                            <li>
                                <a  href="?page=pemesanan_bahan"><i class="fa fa-edit fa-2x"></i> Pemesanan Bahan</a>
                            </li>

                            <li>
                                <a  href="?page=laporan_data_bahan"><i class="fa fa-book fa-2x"></i> Laporan Data Bahan</a>
                            </li>

                            <li>
                                <a  href="?page=waktu_pemesanan"><i class="fa fa-edit fa-2x"></i>Waktu Pemesanan</a>
                            </li>

                            <li>
                                <a  href="?page=pemakaian_bahan"><i class="fa fa-calendar fa-2x"></i>Pemakaian Bahan</a>
                            </li>

                            <li>
                                <a  href="?page=persediaan_gudang"><i class="fa fa-calendar fa-2x"></i>Persediaan Gudang</a>
                            </li>
                        </ul>
                    </div>
                </nav>


                <!-- NAV SIDE -->


                <div id="page-wrapper" >
                    <div id="page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <?php 

                                    @$page = $_GET['page'];
                                    @$aksi = $_GET['aksi'];

                                    if($page == "data_bahan") {
                                        if($aksi == "") {
                                            include "page/data bahan/data_bahan.php";
                                        }else if($aksi == "tambah") {
                                            include "page/data bahan/tambah.php";
                                        }else if($aksi == "edit") {
                                            include "page/data bahan/edit.php";
                                        }else if($aksi == "hapus") {
                                            include "page/data bahan/hapus.php";
                                        }
                                    }else if($page == "data_supplier") {
                                        if($aksi == "") {
                                            include "page/data supplier/data_supplier.php";
                                        }else if($aksi == "tambah") {
                                            include "page/data supplier/tambah.php";
                                        }else if($aksi == "edit") {
                                            include "page/data supplier/edit.php";
                                        }else if($aksi == "hapus") {
                                            include "page/data supplier/hapus.php";
                                        }
                                    }else if($page == "pemesanan_bahan") {
                                        if($aksi == "") {
                                            include "page/pemesanan bahan/pemesanan_bahan.php";
                                        }else if($aksi == "tambah") {
                                            include "page/pemesanan bahan/tambah.php";
                                        }else if($aksi == "edit") {
                                            include "page/pemesanan bahan/edit.php";
                                        }else if($aksi == "hapus") {
                                            include "page/pemesanan bahan/hapus.php";
                                        }
                                    }else if($page =="") {
                                        include "home.php";
                                    }else if($page =="laporan_data_bahan") {
                                        if($aksi == "") {
                                            include "page/laporan data bahan/laporan_data_bahan.php";
                                        }
                                    }else if($page == "waktu_pemesanan") {
                                        if($aksi == "") {
                                            include "page/waktu pemesanan/waktu_pemesanan.php";
                                        }
                                    }else if($page == "persediaan_gudang") {
                                        if($aksi == "") {
                                            include "page/persediaan gudang/persediaan_gudang.php";
                                        }
                                    }else if($page == "pemakaian_bahan") {
                                        if($aksi == "") {
                                            include "page/pemakaian bahan/pemakaian_bahan.php";
                                        }else if($aksi == "tambah") {
                                            include "page/pemakaian bahan/tambah.php";
                                        }else if($aksi == "edit") {
                                            include "page/pemakaian bahan/edit.php";
                                        }else if($aksi == "hapus") {
                                            include "page/pemakaian bahan/hapus.php";
                                        }
                                    }

                                ?>

                            </div>
                        </div>
                    <hr>
                </div>
            </div>
         </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>

    <!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
</body>
</html>