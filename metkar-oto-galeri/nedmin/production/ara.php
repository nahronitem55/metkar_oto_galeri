<?php 
include 'header.php';//header sayfamızı ara-listele1 ile birleştiriyoruz.
// Bu sayfada ruhsat bilgilerini seçilen özelliğe göre arama yapıyoruz.
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">   

       <form action="ara-listele1.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> 
        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">CİNSİ <span class="required">*</span>
          </label>
          <button type="submit" name="cins_bul" class="btn btn-success">ARA</button>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select id="heard" class="form-control" name="cinsi" required>

            <option value="---seç---" >---seç---</option>
            <option value="otomobil" >Otomobil</option>
            <option value="kamyonet" >Kamyonet</option>
            <option value="motorsiklet" >Motorsiklet</option>
            <option value="traktör" >traktör</option>
            <option value="minibüs" >Minibüs</option>
            
          </select>

        </div>
      </div>

    </form>

    <form action="ara-listele2.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">  

      <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">MODEL <span class="required">*</span>
        </label>
        <button type="submit" name="model_bul" class="btn btn-success">ARA</button>
        <div class="col-md-6 col-sm-6 col-xs-12">
         <select id="heard" class="form-control" name="model"  required>

          <option value="---seç---" >---seç---</option>
          <option value="wolkswagen" >Wolkswagen</option>
          <option value="opel" >Opel</option>
          <option value="tata" >Tata</option>
          <option value="renault" >Renault</option>
          <option value="honda" >Honda</option>
          <option value="ford" >Ford</option>
          <option value="yamaha" >Yamaha</option>
          <option value="new holland" >New holland</option>
          <option value="massey ferguson" >Massey ferguson</option>
          <option value="honda" >Honda</option>
          <option value="volvo" >Volvo</option>
          <option value="mercedes" >Mercedes</option>
          <option value="seat" >Seat</option>
          <option value="suziki" >Suziki</option>
          <option value="dacia" >Dacia</option>

        </select>
        
      </div>
    </div>
    
  </form>

  <form action="ara-listele3.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">  

    <div class="form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">RENK <span class="required">*</span>
      </label>
      <button type="submit" name="renk_bul" class="btn btn-success">ARA</button>
      <div class="col-md-6 col-sm-6 col-xs-12">
       <select id="heard" class="form-control" name="renk" required>

        <option value="---seç---" >---seç---</option>
        <option value="beyaz" >Beyaz</option>
        <option value="siyah" >Siyah</option>
        <option value="mavi" >Mavi</option>
        <option value="gri" >Gri</option>
        <option value="kırmızı" >Kırmızı</option>
        <option value="yeşil" >Yeşil</option>
        <option value="sarı" >Sarı</option>
        <option value="eflatun" >Eflatun</option>
        <option value="turuncu" >Turuncu</option>
        <option value="lacivert" >Lacivert</option>
        <option value="turkuaz" >Turkuaz</option>
        
      </select>
      
    </div>
  </div>
  
</form>

<form action="ara-listele4.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">  

  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">YAKIT TÜRÜ <span class="required">*</span>
    </label>
    <button type="submit" name="yakıt_bul" class="btn btn-success">ARA</button>
    <div class="col-md-6 col-sm-6 col-xs-12">
     <select id="heard" class="form-control" name="yakıt_türü" required>

      <option value="---seç---" >---seç---</option>
      <option value="dizel" >Dizel</option>
      <option value="benzin" >Benzin</option>
      <option value="benzin&lpg" >Benzin&Lpg</option>
      <option value="elektrik" >Elektrik</option>
      
    </select>
    
  </div>
</div>

</form>

<form action="ara-listele5.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">  

 <div class="form-group">
  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ÜRETİM YILI <span class="required">*</span>
  </label>
  <button type="submit" name="" class="btn btn-success">ARA</button>
  <div class="col-md-6 col-sm-6 colüretim_bul-xs-12">
   <select id="heard" class="form-control" name="üretim_yılı" required>

    <option value="---seç---" >---seç---</option>
    <option value="1990" >1990</option>
    <option value="1991" >1991</option>
    <option value="1992" >1992</option>
    <option value="1993" >1993</option>
    <option value="1994" >1994</option>
    <option value="1995" >1995</option>
    <option value="1996" >1996</option>
    <option value="1997" >1997</option>
    <option value="1998" >1998</option>
    <option value="1999" >1999</option>
    <option value="2000" >2000</option>
    <option value="2001" >2001</option>
    <option value="2002" >2002</option>
    <option value="2003" >2003</option>
    <option value="2004" >2004</option>
    <option value="2005" >2005</option>
    <option value="2006" >2006</option>
    <option value="2007" >2007</option>
    <option value="2008" >2008</option>
    <option value="2009" >2009</option>
    <option value="2010" >2010</option>
    <option value="2011" >2011</option>
    <option value="2012" >2012</option>
    <option value="2013" >2013</option>
    <option value="2014" >2014</option>
    <option value="2015" >2015</option>
    <option value="2016" >2016</option>
    <option value="2017" >2017</option>
    <option value="2018" >2018</option>
    <option value="2019" >2019</option>
    <option value="2020" >2020</option>
    <option value="2021" >2021</option>
    <option value="2022" >2022</option>
    <option value="2023" >2023</option>
    <option value="2024" >2024</option>
    <option value="2025" >2025</option>
    
  </select>
  
        </div>
      </div>

  </form>


      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php include 'footer.php';//Boostrap template dosyalarını ekliyoruz ?>
