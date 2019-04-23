<?php require_once 'baglan.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD İşlemleri</title>
</head>
<body>

	<h1>Veritabani PDO Düzenle İşlemleri</h1>
	<hr>

	<?php

	if ($_GET['durum']=="ok") {
		echo "islem basarili";
	}else  if ($_GET['durum']=="no") {
		echo "islem basarisiz";
	}
	?>

	<?php

	//HATA BURDA KAYNAKLANIYOR

	$bilgilerimsor=$db->prepare("SELECT * from bilgilerim where bilgilerim_id=:id");
	$bilgilerimsor->execute(array(
		'id'=> $_GET['bilgilerim_id']
	));

	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);
	?>

	<form action="islem.php" method="POST">
		<input type="text" required="" name="bilgilerim_ad" value="<?php echo $bilgilerimcek['bilgilerim_ad'] ?>"> 
		<input type="text" required="" name="bilgilerim_soyad" value="<?php echo $bilgilerimcek['bilgilerim_soyad'] ?>"> 
		<input type="email" required="" name="bilgilerim_mail" value="<?php echo $bilgilerimcek['bilgilerim_mail'] ?>"> 
		<input type="text" required="" name="bilgilerim_yas" value="<?php echo $bilgilerimcek['bilgilerim_yas'] ?>"> 
		<input type="hidden	" value="<?php echo $bilgilerimcek['bilgilerim_id'] ?>" name="bilgilerim_id">
		<button type="submit" name="updateislemi">Formu Düzenle</button>
	</form>
	<br>

<hr>	
</table>
</body>
</html>