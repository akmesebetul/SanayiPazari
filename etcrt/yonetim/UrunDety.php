<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    
    require_once "config.php";
    
    
    $sql = "SELECT * FROM products WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
    
        $stmt->bindParam(":id", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                
                
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                
                $crtime = $row["offerCreateTime"];
                $fntime = $row["offerFinishedTime"];
                $desc = $row["productDescription"];
                $desc = $row["productSubDescription"];
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
    <title>Ürün Detayı</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Ürün Detayı</h1>
                    <div class="form-group">
                        <label>Create Time</label>
                        <p><b><?php echo $row["offerCreateTime"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Finished Time</label>
                        <p><b><?php echo $row["offerFinishedTime"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <p><b><?php echo $row["productDescription"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>SubDescription</label>
                        <p><b><?php echo $row["productSubDescription"]; ?></b></p>
                    </div>
                    <p><a href="UrunListesi.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
