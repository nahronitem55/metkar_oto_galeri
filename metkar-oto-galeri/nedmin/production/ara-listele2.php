<?php 
include 'header.php';//header sayfamızı ara-listele2 ile birleştiriyoruz.
// Bu sayfada ruhsat bilgilerini seçilen modele göre listeliyoruz.


if (isset($_POST['model_bul']))//model_bul adlı butonu çekip if içinde işlevini belirliyoruz.
 {
  $model=$_POST['model'];
  $ruhsatsor2=$db->prepare("SELECT * FROM ruhsat where model like '%$model%'");
  //Seçilem modele göre ruhsat bilgilerini hazırla
  $ruhsatsor2->execute();//Hazırlanan komutu çalıştır
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

                while($ruhsatcek2=$ruhsatsor2->fetch(PDO::FETCH_ASSOC)) {?>
                
                <tr>
                  <td><?php echo $ruhsatcek2['plaka'] ?></td>
                  <td><?php echo $ruhsatcek2['şase_no'] ?></td>
                  <td><?php echo $ruhsatcek2['motor_no'] ?></td>
                  <td><?php echo $ruhsatcek2['marka'] ?></td>
                  <td><?php echo $ruhsatcek2['model'] ?></td>
                  <td><?php echo $ruhsatcek2['cinsi'] ?></td>
                  <td><?php echo $ruhsatcek2['tipi'] ?></td>
                  <td><?php echo $ruhsatcek2['rengi'] ?></td>
                  <td><?php echo $ruhsatcek2['yakıt_türü'] ?></td>
                  <td><?php echo $ruhsatcek2['vites_türü'] ?></td>
                  <td><?php echo $ruhsatcek2['üretim_yılı'] ?></td>
                  <td><?php echo $ruhsatcek2['tescil_tarihi'] ?></td>

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

  <?php include 'footer.php';//Boostrap template dosyalarını ekliyoruz ?>