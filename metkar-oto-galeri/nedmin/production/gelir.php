<?php 
include 'header.php'; 
//Belirli veriyi seçme işlemi
$kullanicisor=$db->prepare("SELECT * FROM gelirler");
$kullanicisor->execute();
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2> Gelir Listeleme <small>,        
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
              <th>Peşin Satış</th>
              <th>Taksit Ödeme</th>
              <th>Çek</th>
              <th>Senet</th>
              <th>Komisyon</th>            
              
              <th></th>
              <th></th>
              
            </tr>
          </thead>

          <tbody>

            <?php 
            while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>
            <tr>
              <td><?php echo $kullanicicek['pesin_satis'] ?></td>
              <td><?php echo $kullanicicek['taksit_odeme'] ?></td>
              <td><?php echo $kullanicicek['cek'] ?></td>
              <td><?php echo $kullanicicek['senet'] ?></td>
              <td><?php echo $kullanicicek['komisyon'] ?></td>
              
              
              <td><center><a href="gelir-duzenle.php?gelir_id=<?php echo $kullanicicek['gelir_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
              <td><center><a href="../netting/islem.php?gelir_id=<?php echo $kullanicicek['gelir_id']; ?>&gelirsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
<!-- /page content -->
<?php include 'footer.php';//Boostrap template dosyalarını ekliyoruz ?>