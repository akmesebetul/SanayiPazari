<!DOCTYPE html>
<html lang="zxx">
<head>
	
	<meta charset="UTF-8">
	<meta name="description" content=" Divisima | eCommerce Template">
	<meta name="keywords" content="divisima, eCommerce, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">


	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<title>Ürün Filtreleme</title>
</head>
  <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div> 
            

            <!-- Brand List  -->
            <div class="col-md-3">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header">
                            <h5>Filtrele 
                                <button type="submit" class="btn btn-primary btn-sm float-end">Search</button>
                            </h5>
                        </div>
                        <div class="card-body">
                        	<h6>Kategoriler</h6>
                        	<hr>
                        	<?php 

                        		$con=mysqli_connect("localhost","root","","offers");
                        		$brand_query="SELECT * FROM productcategories";
                        		$brand_query_run= mysqli_query($con,$brand_query);

                        		if(mysqli_num_rows($brand_query_run)>0){
                        			foreach($brand_query_run as $brandList ){
                        				$checked=[];
                        				if(isset($_GET['brands'])){
                        					$checked=$_GET['brands'];

                        				}
                        				?>
                        				<div>
                        					<input type="checkbox" name="brands[]" value="<?= $brandList['id'];?>"
                        					 <?php if(in_array($brandList['id'], $checked)){
                                             	echo" checked";} ?>
                        					/>
                        				
                                            <?= $brandList['category']; ?>
                        				</div>
                        			<?php
                        			}
                        		}
                        		else
                                {
                                    echo "Kategori Bulunamadı";
                                }
?>
                   </div>
                      </div>
                         </form>
            </div>

<div class="col-md-9 mt-3">
                <div class="card ">
                    <div class="card-body row">
                    	<?php
                            if(isset($_GET['brands']))
                            {
                                $branchecked = [];
                                $branchecked = $_GET['brands'];
                                foreach($branchecked as $rowbrand)
                                {
                                    // echo $rowbrand;
                                    $products = "SELECT * FROM products WHERE categoryId IN ($rowbrand)";
                                    $products_run = mysqli_query($con, $products);
                                    if(mysqli_num_rows($products_run) > 0)
                                    {
                                        foreach($products_run as $proditems) :
                                            ?>
                    				<div class="col-md-4 mt-3">
                                        <div class="border p-2">
                                        	<h6><?=$proditems['productName'];?></h6>
                                        </div>
                                    </div>
                                    <?php
                                    endforeach;
                                    } 
                                }
                            }  
                                    else
                                {
                                    $products="SELECT * FROM products";
                                    $products_run= mysqli_query($con,$products);

                                    if(mysqli_num_rows($products_run)>0){
                    					foreach($products_run as $proditems ) :
                    				?>
                    				<div class="col-md-4 mt-3">
                                        <div class="border p-2">
                                        	<h6><?=$proditems['productName'];?></h6>
                                        </div>
                                    </div>
                                    <?php
                                    endforeach;
                                } 	
                            else
                                {
                                    echo "Ürünler Bulunamadı";
                                }
                            }
                        ?>
                         </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>