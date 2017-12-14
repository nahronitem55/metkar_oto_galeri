<?php 
include 'header.php';//header sayfamızı ara-listele5 ile birleştiriyoruz.
// Bu sayfada ruhsat bilgilerini seçilen üretim yılına göre listeliyoruz.

if (isset($_POST['üretim_bul']))//üretim_bul adlı butonu çekip if içinde işlevini belirliyoruz. 
{
  $üretim_yılı=$_POST['üretim_yılı'];
  $ruhsatsor5=$db->prepare("SELECT * FROM ruhsat where üretim_yılı like '%$üretim_yılı%'");
  //Seçilem üretim yılına  göre ruhsat bilgilerini hazırla
  $ruhsatsor5->execute();//Hazırlanan komutu çalıştır
}
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Ruhsat Arama Listeleme </h2>

            <!-- Div İçerik Başlangıç -->
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Plaka</th>
                  <th>Şase No</th>
                  <th>Motor No</th>
                  <th>Marka</th>
                  <th>Model</th>
                  <th>Cinsi</th>
                  <th>Tipi</th>
                  <th>Rengi</th>
                  <th>Yakıt Türü</th>
                  <th>Vites Türü</th>
                  <th>Üretim Yılı</th>
                  <th>Tescil Tarihi</th>
                  
                </tr>
              </thead>

              <tbody>
                <?php 

                while($ruhsatcek5=$ruhsatsor5->fetch(PDO::FETCH_ASSOC)) {?>
                <tr>
                  <td><?php echo $ruhsatcek5['plaka'] ?></td>
                  <td><?php echo $ruhsatcek5['şase_no'] ?></td>
                  <td><?php echo $ruhsatcek5['motor_no'] ?></td>
                  <td><?php echo $ruhsatcek5['marka'] ?></td>
                  <td><?php echo $ruhsatcek5['model'] ?></td>
                  <td><?php echo $ruhsatcek5['cinsi'] ?></td>
                  <td><?php echo $ruhsatcek5['tipi'] ?></td>
                  <td><?php echo $ruhsatcek5['rengi'] ?></td>
                  <td><?php echo $ruhsatcek5['yakıt_türü'] ?></td>
                  <td><?php echo $ruhsatcek5['vites_türü'] ?></td>
                  <td><?php echo $ruhsatcek5['üretim_yılı'] ?></td>
                  <td><?php echo $ruhsatcek5['tescil_tarihi'] ?></td>
                  
                  <?php    }
                  ?>

                </tbody>
              </table>
              <!-- Div İçerik Bitişi -->         
            </div>
          </div>
        </div>
      </div>
      <td><center><a href="ara.php"><button class="btn btn-primary btn">Arama Ekranına Dön</button></a></center></td>
    </div>
  </div>
  <!-- /page content -->
  <?php include 'footer.php'; //Boostrap template dosyalarını ekliyoruz?>