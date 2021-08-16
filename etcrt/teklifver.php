<?php
include "baglanti.php";

if(isset($_POST["button"])){
	if($_POST["offTime"]<"2020-05-08"){
		$sql="INSERT INTO offers(offerHead,offerValue,offerCreatTime) values('".$offhead."','".$offvalue."','".$offTime."')";
		$sonuc=mysqli_query($sql);
		if($sonuc){
			echo "Kayıt Başarılı";


		}

	}
	
}
?>
<form method="POST">
	<input type="text" name="offhead">
	<input type="text" name="offvalue">
	<input type="text" name="offTime">
	<input type="submit" name="button">
</form>