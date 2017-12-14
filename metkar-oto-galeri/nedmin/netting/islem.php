<?php
ob_start();
session_start();
// $_SESSION metodu çalışması için gerekli fonksiyonlar
include 'baglan.php';// Veritabanımızla bağlantımızın sağlandığı dosya

//Login ekranı kodları
if (isset($_POST['admingiris']))//admingiris isimli butonu Çekerek işlevlerini belirliyoruz.
{

  $p_mail=$_POST['p_mail'];
  $p_sifre=md5($_POST['p_sifre']);

  $kullanicisor=$db->prepare("SELECT * FROM personel where p_mail=:mail and p_sifre=:password and p_yetki=:yetki");//execute edilmek (çalıştırılmak) üzere bir sql deyimini hazırlar. 
  $kullanicisor->execute(array(
    'mail' => $p_mail,
    'password' => $p_sifre,
    'yetki' => 5
  ));//Hazır olan sql deyimini çalıştırır.

  echo $say=$kullanicisor->rowCount();

  if ($say==1) {

    $_SESSION['p_mail']=$p_mail;// Login olduğu süre içinde mail sistemde hazır tutulur.
    header("Location:../production/index.php");//Kullanıcıyı admin paneli ana sayfasına yönlendirir.
    exit;
  } 
  else {
    header("Location:../production/login.php?durum=no");//Yanlış giriş yapan kullanıcıyı login ekraına döndürür
    exit;
  }
}

//Site ayarları
// TABLO GÜNCELLEME KODLARI

if (isset($_POST['genelayarkaydet'])) {
//execute edilmek (çalıştırılmak) üzere update  sql deyimini hazırlar. 
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_title=:ayar_title,
    ayar_description=:ayar_description,
    ayar_keywords=:ayar_keywords,
    ayar_author=:ayar_author
    WHERE ayar_id=0");

  $update=$ayarkaydet->execute(array(
    'ayar_title'=> $_POST['ayar_title'],
    'ayar_description'=> $_POST['ayar_description'],
    'ayar_keywords'=> $_POST['ayar_keywords'],
    'ayar_author'=> $_POST['ayar_author']
  ));

  if ($update)//execute komutu çalışmış ise kullanıcı-ekle.php e durum=ok çalışmamışsa durum=no olarak sayfaya yönlendirir.
  {
    header("Location:../production/genel-ayar.php?durum=ok");
  }
  else
  {
   header("Location:../production/genel-ayar.php?durum=no");
 }
}

////////////////////////////

if (isset($_POST['iletisimayarkaydet'])) {
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_tel=:ayar_tel,
    ayar_gsm=:ayar_gsm,
    ayar_faks=:ayar_faks,
    ayar_mail=:ayar_mail,
    ayar_ilce=:ayar_ilce,
    ayar_il=:ayar_il,
    ayar_adres=:ayar_adres,
    ayar_mesai=:ayar_mesai
    WHERE ayar_id=0");
  $update=$ayarkaydet->execute(array(
    'ayar_tel'=> $_POST['ayar_tel'],
    'ayar_gsm'=> $_POST['ayar_gsm'],
    'ayar_faks'=> $_POST['ayar_faks'],
    'ayar_mail'=> $_POST['ayar_mail'],
    'ayar_ilce'=> $_POST['ayar_ilce'],
    'ayar_il'=> $_POST['ayar_il'],
    'ayar_adres'=> $_POST['ayar_adres'],
    'ayar_mesai'=> $_POST['ayar_mesai']
  ));
  if ($update) {
    header("Location:../production/iletisim-ayarlar.php?durum=ok");
  }
  else
  {
   header("Location:../production/iletisim-ayarlar.php?durum=no");
 }
}

////////////////////////////

if (isset($_POST['apiayarkaydet'])) {
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_analystic=:ayar_analystic,
    ayar_maps=:ayar_maps,
    ayar_zopim=:ayar_zopim
    WHERE ayar_id=0");
  $update=$ayarkaydet->execute(array(
    'ayar_analystic'=> $_POST['ayar_analystic'],
    'ayar_maps'=> $_POST['ayar_maps'],
    'ayar_zopim'=> $_POST['ayar_zopim']
  ));
  if ($update) {
    header("Location:../production/api-ayarlar.php?durum=ok");
  }
  else
  {
   header("Location:../production/api-ayarlar.php?durum=no");

 }

}

////////////////////////////

if (isset($_POST['sosyalayarkaydet'])) {

  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_google=:ayar_google,
    ayar_youtube=:ayar_youtube
    WHERE ayar_id=0");

  $update=$ayarkaydet->execute(array(
    'ayar_facebook'=> $_POST['ayar_facebook'],
    'ayar_twitter'=> $_POST['ayar_twitter'],
    'ayar_google'=> $_POST['ayar_google'],
    'ayar_youtube'=> $_POST['ayar_youtube']
  ));

  if ($update) {
    header("Location:../production/sosyal-ayarlar.php?durum=ok");
  }
  else
  {
   header("Location:../production/sosyal-ayarlar.php?durum=no");
 }

}
////////////////////////////

if (isset($_POST['mailayarkaydet'])) {
  $ayarkaydet=$db->prepare("UPDATE ayar SET
    ayar_smtphost=:ayar_smtphost,
    ayar_smtpuser=:ayar_smtpuser,
    ayar_smtppassword=:ayar_smtppassword,
    ayar_smtpport=:ayar_smtpport
    WHERE ayar_id=0");
  $update=$ayarkaydet->execute(array(
    'ayar_smtphost'=> $_POST['ayar_smtphost'],
    'ayar_smtpuser'=> $_POST['ayar_smtpuser'],
    'ayar_smtppassword'=> $_POST['ayar_smtppassword'],
    'ayar_smtpport'=> $_POST['ayar_smtpport']
  ));
  if ($update) {
    header("Location:../production/mail-ayarlar.php?durum=ok");
  }
  else
  {
   header("Location:../production/mail-ayarlar.php?durum=no");
 }
}

///////////////////////////////////////////////////////////////////////////////

//Kullanıcı Ekranı

if (isset($_POST['kullaniciduzenle'])) {
  $personel_id=$_POST['personel_id'];//personel_id post metodu ile çekip bir değişkene atıyoruz.
//execute edilmek (çalıştırılmak) üzere bir sql deyimini hazırlar. 
  $ayarkaydet=$db->prepare("UPDATE personel SET
    p_tc=:p_tc,
    p_ad_soyad=:p_ad_soyad,
    p_tel1=:p_tel1,
    p_tel2=:p_tel2,
    adres=:adres,
    gorevi=:gorevi,
    p_mail=:p_mail,
    p_sifre=:p_sifre,
    p_yetki=:p_yetki,
    personel_resimyol=:personel_resimyol
    WHERE personel_id={$_POST['personel_id']}");
  $update=$ayarkaydet->execute(array(
    'p_tc' => $_POST['p_tc'],
    'p_ad_soyad' => $_POST['p_ad_soyad'],
    'p_tel1' => $_POST['p_tel1'],
    'p_tel2' => $_POST['p_tel2'],
    'adres' => $_POST['adres'],
    'gorevi' => $_POST['gorevi'],
    'p_mail' => $_POST['p_mail'],
    'p_sifre' => $_POST['p_sifre'],
    'p_yetki' => $_POST['p_yetki'],
    'personel_resimyol' => $_POST['personel_resimyol']
  ));//Hazır olan sql deyimini çalıştırır ve $update değişkenine atar.

  if ($update)//execute komutu çalışmış ise kullanıcı-ekle.php e durum=ok çalışmamışsa durum=no olarak sayfaya yönlendirir.
  {
    Header("Location:../production/kullanici.php?personel_id=$personel_id&durum=ok");
  } else {
    Header("Location:../production/kullanici.php?personel_id=$personel_id&durum=no");
  }
}

////////////////////////////

if ($_GET['kullanicisil']=="ok") {
  $sil=$db->prepare("DELETE from personel where personel_id=:id");//execute edilmek (çalıştırılmak) üzere delete sql deyimini hazırlar. 
  $kontrol=$sil->execute(array(
    'id' => $_GET['personel_id']
  ));//Hazır olan sql deyimini çalıştırır.

  if ($kontrol) //execute komutu çalışmış ise kullanıcı-ekle.php e durum=ok çalışmamışsa durum=no olarak sayfaya yönlendirir.
  {
    header("location:../production/kullanici.php?sil=ok");
  } else {
    header("location:../production/kullanici.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['kullanicikaydet'])) {
//execute edilmek (çalıştırılmak) üzere ınsert into sql deyimini hazırlar. 
  $ayarkaydet=$db->prepare("INSERT INTO personel SET
    p_tc=:p_tc,
    p_ad_soyad=:p_ad_soyad,
    p_tel1=:p_tel1,
    p_tel2=:p_tel2,
    adres=:adres,
    gorevi=:gorevi,
    p_mail=:p_mail,
    p_sifre=:p_sifre,
    p_yetki=:p_yetki,
    personel_resimyol=:personel_resimyol,
    p_durum=:p_durum ");
  $kaydet=$ayarkaydet->execute(array(
    'p_tc' => $_POST['p_tc'],
    'p_ad_soyad' => $_POST['p_ad_soyad'],
    'p_tel1' => $_POST['p_tel1'],
    'p_tel2' => $_POST['p_tel2'],
    'adres' => $_POST['adres'],
    'gorevi' => $_POST['gorevi'],
    'p_mail' => $_POST['p_mail'],
    'p_sifre' => $_POST['p_sifre'],
    'p_yetki' => $_POST['p_yetki'],
    'personel_resimyol' => $_POST['personel_resimyol'],
    'p_durum' => $_POST['p_durum']
    
  ));//Hazır olan sql deyimini çalıştırır ve $update değişkenine atar.

  if ($kaydet) //execute komutu çalışmış ise kullanıcı-ekle.php e durum=ok çalışmamışsa durum=no olarak sayfaya yönlendirir.
  {
    Header("Location:../production/kullanici-ekle.php?personel_id=$personel_id&durum=ok");
  } else {
    Header("Location:../production/kullanici-ekle.php?personel_id=$personel_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Kullanıcı Ödeme Ekranı
if (isset($_POST['kullaniciodemeduzenle'])) {
  $personel_id=$_POST['personel_id'];
  $ayarkaydet=$db->prepare("UPDATE personel_odeme SET
    p_ad_soyad=:p_ad_soyad,
    gorevi=:gorevi,
    maas=:maas
    WHERE personel_id={$_POST['personel_id']}");
  $update=$ayarkaydet->execute(array(
    'p_ad_soyad' => $_POST['p_ad_soyad'],
    'gorevi' => $_POST['gorevi'],
    'maas' => $_POST['maas']

  ));

  if ($update) {
    Header("Location:../production/kullanici-odeme.php?personel_id=$personel_id&durum=ok");
  } else {
    Header("Location:../production/kullanici-odeme-duzenle.php?personel_id=$personel_id&durum=no");
  }
}
////////////////////////////

if ($_GET['personelsil']=="ok") {

  $sil=$db->prepare("DELETE from personel_odeme where personel_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['personel_id']
  ));
  if ($kontrol) {
    header("location:../production/kullanici-odeme.php?sil=ok");
  } else {
    header("location:../production/kullanici-odeme.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['kullaniciodemekaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO personel_odeme SET
    p_ad_soyad=:p_ad_soyad,
    gorevi=:gorevi,
    maas=:maas
    ");
  $kaydet=$ayarkaydet->execute(array(
    'p_ad_soyad' => $_POST['p_ad_soyad'],
    'gorevi' => $_POST['gorevi'],
    'maas' => $_POST['maas']
  ));

  if ($kaydet) {
    Header("Location:../production/kullanici-odeme.php?personel_id=$personel_id&durum=ok");
  } else {
    Header("Location:../production/kullanici-odeme.php?personel_id=$personel_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Müşteriler Ekranı
if (isset($_POST['musteriduzenle'])) {
  $musteri_id=$_POST['musteri_id'];
  $ayarkaydet=$db->prepare("UPDATE musteriler SET
    m_tc=:m_tc,
    m_ad_soyad=:m_ad_soyad,
    m_tel=:m_tel,
    m_bilgi=:m_bilgi
    WHERE musteri_id={$_POST['musteri_id']}");
  $update=$ayarkaydet->execute(array(
    'm_tc' => $_POST['m_tc'],
    'm_ad_soyad' => $_POST['m_ad_soyad'],
    'm_tel' => $_POST['m_tel'],
    'm_bilgi' => $_POST['m_bilgi']
  ));

  if ($update) {
    Header("Location:../production/musteri.php?musteri_id=$musteri_id&durum=ok");
  } else {
    Header("Location:../production/musteri.php?musteri_id=$musteri_id&durum=no");
  }
}
////////////////////////////

if ($_GET['musterisil']=="ok") {
  $sil=$db->prepare("DELETE from musteriler where musteri_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['musteri_id']
  ));

  if ($kontrol) {
   header("location:../production/musteri.php?sil=ok");
  } else {
    header("location:../production/musteri.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['musterikaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO musteriler SET
    m_tc=:m_tc,
    m_ad_soyad=:m_ad_soyad,
    m_tel=:m_tel,
    m_bilgi=:m_bilgi
    ");
  $kaydet=$ayarkaydet->execute(array(
    'm_tc' => $_POST['m_tc'],
    'm_ad_soyad' => $_POST['m_ad_soyad'],
    'm_tel' => $_POST['m_tel'],
    'm_bilgi' => $_POST['m_bilgi']
  ));

  if ($kaydet) {
    Header("Location:../production/musteri.php?musteri_id=$musteri_id&durum=ok");
  } else {
    Header("Location:../production/musteri.php?musteri_id=$musteri_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Rezervasyon Ekranı

if (isset($_POST['rezerveduzenle'])) {
  $rezervasyon_id=$_POST['rezervasyon_id'];
  $ayarkaydet=$db->prepare("UPDATE rezervasyon SET
    plaka=:plaka,
    rezerve_tarih=:rezerve_tarih,
    kapora=:kapora,
    durumu=:durumu
    WHERE rezervasyon_id={$_POST['rezervasyon_id']}");
  $update=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'rezerve_tarih' => $_POST['rezerve_tarih'],
    'kapora' => $_POST['kapora'],
    'durumu' => $_POST['durumu']
  
  ));

  if ($update) {
    Header("Location:../production/rezervasyon.php?rezervasyon_id=$rezervasyon_id&durum=ok");
  } else {
    Header("Location:../production/rezervasyon.php?rezervasyon_id=$rezervasyon_id&durum=no");
  }
}

////////////////////////////

if ($_GET['rezervesil']=="ok") {
  $sil=$db->prepare("DELETE from rezervasyon where rezervasyon_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['rezervasyon_id']
  ));

  if ($kontrol) {
    header("location:../production/rezervasyon.php?sil=ok");
  } else {
    header("location:../production/rezervasyon.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['rezervekaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO rezervasyon SET
    plaka=:plaka,
    rezerve_tarih=:rezerve_tarih,
    kapora=:kapora,
    durumu=:durumu
    ");
  $kaydet=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'rezerve_tarih' => $_POST['rezerve_tarih'],
    'kapora' => $_POST['kapora'],
    'durumu' => $_POST['durumu']
  ));

  if ($kaydet) {
    Header("Location:../production/rezervasyon.php?rezervasyon_id=$rezervasyon_id&durum=ok");
  } else {
    Header("Location:../production/rezervasyon.php?rezervasyon_id=$rezervasyon_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Ruhsat Ekranı

if (isset($_POST['ruhsatduzenle'])) {
  $ruhsat_id=$_POST['ruhsat_id'];
  $ayarkaydet=$db->prepare("UPDATE ruhsat SET
    plaka=:plaka,
    şase_no=:şase_no,
    motor_no=:motor_no,
    marka=:marka,
    model=:model,
    cinsi=:cinsi,
    tipi=:tipi,
    rengi=:rengi,
    yakıt_türü=:yakıt_türü,
    vites_türü=:vites_türü,
    üretim_yılı=:üretim_yılı,
    tescil_tarihi=:tescil_tarihi
    WHERE ruhsat_id={$_POST['ruhsat_id']}");
  $update=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'şase_no' => $_POST['şase_no'],
    'motor_no' => $_POST['motor_no'],
    'marka' => $_POST['marka'],
    'model' => $_POST['model'],
    'cinsi' => $_POST['cinsi'],
    'tipi' => $_POST['tipi'],
    'rengi' => $_POST['rengi'],
    'yakıt_türü' => $_POST['yakıt_türü'],
    'vites_türü' => $_POST['vites_türü'],
    'üretim_yılı' => $_POST['üretim_yılı'],
    'tescil_tarihi' => $_POST['tescil_tarihi']
    
  ));

  if ($update) {
    Header("Location:../production/ruhsat.php?ruhsat_id=$ruhsat_id&durum=ok");
  } else {

    Header("Location:../production/ruhsat.php?ruhsat_id=$&durum=no");
  }
}

////////////////////////////

if ($_GET['ruhsatsil']=="ok") {
  $sil=$db->prepare("DELETE from ruhsat where ruhsat_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['ruhsat_id']
  ));

  if ($kontrol) {
    header("location:../production/ruhsat.php?sil=ok");
  } else {
    header("location:../production/ruhsat.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['ruhsatkaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO ruhsat SET
    plaka=:plaka,
    şase_no=:şase_no,
    motor_no=:motor_no,
    marka=:marka,
    model=:model,
    cinsi=:cinsi,
    tipi=:tipi,
    rengi=:rengi,
    yakıt_türü=:yakıt_türü,
    vites_türü=:vites_türü,
    üretim_yılı=:üretim_yılı,
    tescil_tarihi=:tescil_tarihi

    ");

  $kaydet=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'şase_no' => $_POST['şase_no'],
    'motor_no' => $_POST['motor_no'],
    'marka' => $_POST['marka'],
    'model' => $_POST['model'],
    'cinsi' => $_POST['cinsi'],
    'tipi' => $_POST['tipi'],
    'rengi' => $_POST['rengi'],
    'yakıt_türü' => $_POST['yakıt_türü'],
    'vites_türü' => $_POST['vites_türü'],
    'üretim_yılı' => $_POST['üretim_yılı'],
    'tescil_tarihi' => $_POST['tescil_tarihi']

  ));

  if ($kaydet) {
    Header("Location:../production/ruhsat.php?ruhsat_id=$ruhsat_id&durum=ok");
  } else {
    Header("Location:../production/ruhsat.php?ruhsat_id=$ruhsat_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Araç Ekranı

if (isset($_POST['aracbilgiduzenle'])) {
  $arac_id=$_POST['arac_id'];
  $ayarkaydet=$db->prepare("UPDATE arac_bilgi SET
    plaka=:plaka,
    durumu=:durumu,
    fiyatı=:fiyatı,
    resim=:resim
    WHERE arac_id={$_POST['arac_id']}");
  $update=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'durumu' => $_POST['durumu'],
    'fiyatı' => $_POST['fiyatı'],
    'resim' => $_POST['resim']
  ));

  if ($update) {
    Header("Location:../production/arac-liste.php?arac_id=$arac_id&durum=ok");
  } else {
    Header("Location:../production/arac-liste.php?arac_id=$arac_id&durum=no");
  }
}

////////////////////////////

if ($_GET['aracsil']=="ok") {
  $sil=$db->prepare("DELETE from arac_bilgi where arac_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['arac_id']
  ));

  if ($kontrol) {
    header("location:../production/arac-liste.php?sil=ok");
  } else {
    header("location:../production/arac-liste.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['arackaydet'])) {

  $ayarkaydet=$db->prepare("INSERT INTO arac_bilgi SET
    plaka=:plaka,
    durumu=:durumu,
    fiyatı=:fiyatı,
    resim=:resim

    ");

  $kaydet=$ayarkaydet->execute(array(
    'plaka' => $_POST['plaka'],
    'durumu' => $_POST['durumu'],
    'fiyatı' => $_POST['fiyatı'],
    'resim' => $_POST['resim']

  ));


  if ($kaydet) {
    Header("Location:../production/arac-liste.php?arac_id=$arac_id&durum=ok");
  } else {
    Header("Location:../production/arac-liste.php?arac_id=$arac_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Gelir Ekranı

if (isset($_POST['gelirduzenle'])) {
  $gelir_id=$_POST['gelir_id'];
  $ayarkaydet=$db->prepare("UPDATE gelirler SET
    pesin_satis=:pesin_satis,
    taksit_odeme=:taksit_odeme,
    cek=:cek,
    senet=:senet,
    komisyon=:komisyon
    WHERE gelir_id={$_POST['gelir_id']}");
  $update=$ayarkaydet->execute(array(
    'pesin_satis' => $_POST['pesin_satis'],
    'taksit_odeme' => $_POST['taksit_odeme'],
    'cek' => $_POST['cek'],
    'senet' => $_POST['senet'],
    'komisyon' => $_POST['komisyon']
   
  ));

  if ($update) {
    Header("Location:../production/gelir.php?gelir_id=$gelir_id&durum=ok");
  } else {
    Header("Location:../production/gelir.php?gelir_id=$gelir_id&durum=no");
  }
}

////////////////////////////

if ($_GET['gelirsil']=="ok") {

  $sil=$db->prepare("DELETE from gelirler where gelir_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['gelir_id']
  ));

  if ($kontrol) {
    header("location:../production/gelir.php?sil=ok");
  } else {
    header("location:../production/gelir.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['gelirkaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO gelirler SET
    pesin_satis=:pesin_satis,
    taksit_odeme=:taksit_odeme,
    cek=:cek,
    senet=:senet,
    komisyon=:komisyon

    ");

  $kaydet=$ayarkaydet->execute(array(
    'pesin_satis' => $_POST['pesin_satis'],
    'taksit_odeme' => $_POST['taksit_odeme'],
    'cek' => $_POST['cek'],
    'senet' => $_POST['senet'],
    'komisyon' => $_POST['komisyon']

  ));

  if ($kaydet) {
    Header("Location:../production/gelir.php?gelir_id=$gelir_id&durum=ok");
  } else {
    Header("Location:../production/gelir.php?gelir_id=$gelir_id&durum=no");
  }
}

///////////////////////////////////////////////////////////////////////////////

//Gider Ekranı

if (isset($_POST['giderduzenle'])) {
  $gider_id=$_POST['gider_id'];
  $ayarkaydet=$db->prepare("UPDATE giderler SET
    genel_gider=:genel_gider,
    alıs_ödeme=:alıs_ödeme,
    kredi=:kredi,
    cek=:cek
    WHERE gider_id={$_POST['gider_id']}");
  $update=$ayarkaydet->execute(array(
    'genel_gider' => $_POST['genel_gider'],
    'alıs_ödeme' => $_POST['alıs_ödeme'],
    'kredi' => $_POST['kredi'],
    'cek' => $_POST['cek']
    
  ));

  if ($update) {
    Header("Location:../production/gider.php?gider_id=$gider_id&durum=ok");
  } else {
    Header("Location:../production/gider.php?gider_id=$gider_id&durum=no");
  }
}

////////////////////////////

if ($_GET['gidersil']=="ok") {
  $sil=$db->prepare("DELETE from giderler where gider_id=:id");
  $kontrol=$sil->execute(array(
    'id' => $_GET['gider_id']
  ));

  if ($kontrol) {
    header("location:../production/gider.php?sil=ok");
  } else {
    header("location:../production/gider.php?sil=no");
  }
}

////////////////////////////

if (isset($_POST['giderkaydet'])) {
  $ayarkaydet=$db->prepare("INSERT INTO giderler SET
    genel_gider=:genel_gider,
    alıs_ödeme=:alıs_ödeme,
    kredi=:kredi,
    cek=:cek
    ");
  $kaydet=$ayarkaydet->execute(array(
    'genel_gider' => $_POST['genel_gider'],
    'alıs_ödeme' => $_POST['alıs_ödeme'],
    'kredi' => $_POST['kredi'],
    'cek' => $_POST['cek']
  ));

  if ($kaydet) {
    Header("Location:../production/gider.php?gider_id=$gider_id&durum=ok");
  } else {
    Header("Location:../production/gider.php?gider_id=$gider_id&durum=no");
  }
}

?>