<?php 
ob_start();
session_start();
include '../netting/baglan.php';
$ayarsor=$db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute(array('id'=> 0));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$kullanicisor=$db->prepare("SELECT * FROM personel where p_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['p_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
if ($say==0) {
  Header("Location:login.php?durum=izinsiz");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> METKAR OTO GALERİ </title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="" class="site_title"><i class="fa fa-paw"></i> <span>METKAR</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img width="400" src="../../<?php echo $kullanicicek['personel_resimyol'] ?>" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>HOŞGELDİNİZ</span>
                            <h2><?php echo $kullanicicek['p_ad_soyad'] ?></h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="index.php"><i class="fa fa-home"></i> Anasayfa </a></li>
                                <li><a href="ara.php"><i class="fa fa-search"></i> Arama </a></li>
                                
                                <li><a><i class="fa fa-cogs"></i> Personel İşlemleri <span class="fa fa-cogs"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="kullanici.php"><i class="fa fa-user"></i> Personel Listeleme </a></li> 
                                        <li><a href="kullanici-ekle.php"><i class="fa fa-user"></i>Personel Ekleme</a></li>
                                        <li><a href="kullanici-odeme.php"><i class="fa fa-user"></i>Personel Ödeme</a></li>
                                        <li><a href="kullanici-odeme-ekle.php"><i class="fa fa-user"></i>Personel Ödeme Ekle</a></li>                                    
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-cogs"></i> Müşteri İşlemleri <span class="fa fa-cogs"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="musteri.php"><i class="fa fa-user"></i> Müşteri Listeleme </a></li> 
                                        <li><a href="musteri-ekle.php"><i class="fa fa-user"></i>Müşteri Ekleme</a></li>
                                        <li><a href="rezervasyon.php"><i class="fa fa-user"></i>Rezervasyon Listeleme</a></li>
                                        <li><a href="rezervasyon-ekle.php"><i class="fa fa-user"></i>Rezervasyon Ekleme</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-cogs"></i> Araç İşlemleri <span class="fa fa-cogs"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="ruhsat.php"><i class="fa fa-user"></i> Ruhsat Listeleme </a></li> 
                                        <li><a href="ruhsat-ekle.php"><i class="fa fa-user"></i>Ruhsat Ekleme</a></li>
                                        <li><a href="arac-liste.php"><i class="fa fa-user"></i> Araç Listeleme </a></li>
                                        <li><a href="arac-ekle.php"><i class="fa fa-user"></i> Araç Ekleme </a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-cogs"></i> Gelir-Gider İşlemleri <span class="fa fa-cogs"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="gelir.php"><i class="fa fa-user"></i> Gelir Listeleme </a></li> 
                                        <li><a href="gelir-ekle.php"><i class="fa fa-user"></i> Gelir  Ekleme</a></li> 
                                        <li><a href="gider.php"><i class="fa fa-user"></i> Gider Listeleme </a></li>
                                        <li><a href="gider-ekle.php"><i class="fa fa-user"></i> Gider Ekleme </a></li> 
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-cogs"></i> Site Ayarları <span class="fa fa-cogs"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                                        <li><a href="iletisim-ayarlar.php">İletişim Ayarları</a></li>
                                        <li><a href="api-ayarlar.php">API Ayarlar</a></li>
                                        <li><a href="sosyal-ayarlar.php">Sosyal Ayarlar</a></li>
                                        <li><a href="mail-ayarlar.php">Mail Ayarlar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img width="200" src="../../<?php echo $kullanicicek['personel_resimyol'] ?>"><?php echo $kullanicicek['p_ad_soyad'] ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">                                                
                                  <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Güvenli Çıkış</a></li>
                              </ul>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          <!-- /top navigation -->


          