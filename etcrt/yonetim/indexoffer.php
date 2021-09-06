<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){

    require_once "config.php";
    

    $sql = "SELECT * FROM offers WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){

        $stmt->bindParam(":id", $param_id);
        

        $param_id = trim($_GET["id"]);
        

        if($stmt->execute()){
            if($stmt->rowCount() == 1){


                $row = $stmt->fetch(PDO::FETCH_ASSOC);
        

               $offvalue = $row["offerValue"];
                
            } else{

                header("location: error.php");
                exit();
            }
            
        } else{
            echo "ERROR";
        }
    }
     
    
    unset($stmt);
    
    
    unset($pdo);
} else{
    
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verilen Teklifler</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
    <link rel="stylesheet" href="css/flaticon.css"/>
    <link rel="stylesheet" href="css/slicknav.min.css"/>
    <link rel="stylesheet" href="css/jquery-ui.min.css"/>
    <link rel="stylesheet" href="css/owl.carousel.min.css"/>
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        #menu_acc{
width:200px;
list-style:none;
margin-bottom:2px;
}
#menu_acc li{
margin-bottom:2px;
}
.root_menu_acc ul li a{
color:#71caf9;
text-decoration:none;
}
.root_menu_acc{
border-radius:4px;
padding:3px 0px 3px 0px;
background:yellowgreen;
color:#fff;
cursor:pointer;
}
.root_menu_acc>ul{
list-style:none;
padding: 3px 0px 3px 0px;
background:#f5f5f5;
color:black;
}
.root_menu_acc>ul>li{
padding-left:30px;
}
.root_menu_acc>a{
color:white;
text-decoration:none;
padding:5px;
}

</style>
<script type="text/javascript">
$(document).ready(function(){   
  
  //Alt menüler gizleniyor
  $('#menu_acc ul').hide();
  
    //'ul' etiketine sahip 'li' etiketleri
    $('#menu_acc li').has('ul').on('click',function(e){
        
        //Tüm alt menüler kapatılıyor
        $('#menu_acc ul').stop().slideUp(300);
        
        //Basılan üst menünün alt menüleri açılıyor
        $(this).children('ul').stop().slideDown(300);
    });
});
</script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Teklifler</h1>
                    <div class="form-group">
                        <label>Offer Value</label>
                        <p><b><?php echo $row["offerValue"]; ?></b></p>
                    </div>

                </div>

                  
            </div>        
        </div>
//Teklif Detayının Bakıldığı Kısım
        <div>
            <ul id="menu_acc">
    <li class="root_menu_acc"><a href="#">Teklif Detay</a>
        <ul>
            <li>
                <div class="panel-body">
                    <?php echo $row["offerHead"] ?>
                    <?php echo $row["offerCreateTime"] ?>
                </div>
            </li>
            
        </ul>
    </li>
    </ul>
        </div>
         
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
