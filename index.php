<?php
require_once 'baglan.php';?>


<!DOCTYPE html>
<html>
<head>
	<title>CRUD İŞLEMLERİ</title>
</head>
<body>
	<H1>Veritabani PDO Kayit İşlemleri</H1>
	<hr>

	<?php
	if ($_GET['durum']=="ok") {
		echo "İşlem Basarili";
	}else if ($_GET['durum']=="no") {
		echo "İşlem Basarisiz";
	}

	?>



	<form action="islem.php" method="POST">
		<input type="text" required="" name="bilgilerim_ad" placeholder="Adinizi Giriniz...">
		<input type="text" required="" name="bilgilerim_soyad" placeholder="Soyadinizi Giriniz...">
		<input type="email" required="" name="bilgilerim_mail" placeholder="Mail Giriniz...">
		<input type="text" required="" name="bilgilerim_yas" placeholder="Yaş Giriniz...">
		<button type="submit" name="insertislemi">Formu Gönder</button>
	 </form>

	 <br>

	 <h4>Kayitlarein Listelenmesi</h4>
	 <hr>

	 <?php

	 	//buraya değişik kodları gelecek




	 ?>


	 <table style="width: 60%" border="1">
	 	<tr>
	 		<th>S.NO</th>
	 		<th>ID</th>
	 		<th>AD</th>
	 		<th>SOYAD</th>
	 		<th>MAİL</th>
	 		<th>YAŞ</th>
	 		<th width="50">İşlemler</th>
	 		<th width="50">İşlemler</th>
	 	</tr>

	 	<?php

	 	$bilgilerimsor=$db->prepare ("SELECT * from bilgilerim");
	 	$bilgilerimsor->execute();

	 	$say=0;

	 	while ($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) { $say++?>

	 			<tr>
	 				<td><?php echo $say; ?></td>
	 				<td><?php echo $bilgilerimcek['bilgilerim_id']?></td>
	 				<td><?php echo $bilgilerimcek['bilgilerim_ad']?></td>
	 				<td><?php echo $bilgilerimcek['bilgilerim_soyad']?></td>
	 				<td><?php echo $bilgilerimcek['bilgilerim_mail']?></td>
	 				<td><?php echo $bilgilerimcek['bilgilerim_yas']?></td>
	 				<td align="center"><a href="duzenle.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>"><button>Düzenle</button></td></a>
	 				<td align="center"><a href="islem.php?bilgilerim_id=<?php echo $bilgilerimcek['bilgilerim_id'] ?>&bilgilerimsil=ok"><button>Sil</button></td></a>
	 				
	 			</tr>

	 	<?php } ?>	

	 </table>

</body>
</html>