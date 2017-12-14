<?php 
include 'header.php'; 
//Belirli veriyi seçme işlemi
$kullanicisor=$db->prepare("SELECT * FROM ruhsat");
$kullanicisor->execute();
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2> Ruhsat Listeleme <small>,
             <?php 
             if (isset($_GET['durum'])=="ok") {?>
             <b style="color:green;">İşlem Başarılı...</b>
             <?php } elseif (isset($_GET['durum'])=="no") {?>
             <b style="color:red;">İşlem Başarısız...</b>
             <?php }
             ?>
           </small></h2>
           <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a>
                </li>
                <li><a href="#">Settings 2</a>
                </li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
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
                
                <th></th>
                <th></th>
                
              </tr>
            </thead>

            <tbody>

              <?php 
              while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>
              <tr>
                <td><?php echo $kullanicicek['plaka'] ?></td>
                <td><?php echo $kullanicicek['şase_no'] ?></td>
                <td><?php echo $kullanicicek['motor_no'] ?></td>
                <td><?php echo $kullanicicek['marka'] ?></td>
                <td><?php echo $kullanicicek['model'] ?></td>
                <td><?php echo $kullanicicek['cinsi'] ?></td>
                <td><?php echo $kullanicicek['tipi'] ?></td>
                <td><?php echo $kullanicicek['rengi'] ?></td>
                <td><?php echo $kullanicicek['yakıt_türü'] ?></td>
                <td><?php echo $kullanicicek['vites_türü'] ?></td>
                <td><?php echo $kullanicicek['üretim_yılı'] ?></td>
                <td><?php echo $kullanicicek['tescil_tarihi'] ?></td>

                <td><center><a href="ruhsat-duzenle.php?ruhsat_id=<?php echo $kullanicicek['ruhsat_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                <td><center><a href="../netting/islem.php?ruhsat_id=<?php echo $kullanicicek['ruhsat_id']; ?>&ruhsatsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
              </tr>
              <?php  }
              ?>
            </tbody>
          </table>
          <!-- Div İçerik Bitişi -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->
<?php include 'footer.php';//Boostrap template dosyalarını ekliyoruz?>
