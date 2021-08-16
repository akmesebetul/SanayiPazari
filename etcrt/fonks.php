<?php

function UrunListele($Urun){
	?>
<!--Ürün detay sayfasına gitmek için buton yerine ürünlere tıklamayı tercih ettim-->

				<div class="product-item">
					<a href="UrunDetay.php?id-<?php echo $Urun["id"] ?>">
					<div class="pi-pic">
						<img src="./img/product/1.jpg" alt="">
						<div class="pi-links">
							<a href="#" class="add-card"><i class="flaticon-bag"></i><span>Teklif Ver</span></a>
							<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
						</div>
					</div>
					<div class="pi-text">
						<h6>$35,00</h6>
						<p><?php echo $Urun["productName"] ?></p>
					</div>
					</a>
				</div>
			<?php
}

?>