<?php

require_once "baglanti.php";
 

 $productId=$offerHead = $offerValue =$offerCreateTime="";
 $productId_err=$offerHead_err = $offerValue_err =$offerCreateTime_err= "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $input_productId = trim($_POST["productId"]);
    if(empty($input_productId)){
        $name_productId = "Lütfen ürün id girin";
    } elseif(!filter_var($input_productId, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^\s*[+-]?(\d+|\.\d+|\d+\.\d+|\d+\.)(e[+-]?\d+)?\s*$/")))){
        $productId_err = "Lütfen ürün id giriniz";
    } else{
        $productId = $input_productId;
    }
    
    
    $input_offerHead = trim($_POST["offerHead"]);
    if(empty($input_offerHead)){
        $offerHead_err = "Bu alan boş bırakılamaz";     
    } else{
        $offerHead = $input_offerHead;
    }
    
    
    $input_offerValue = trim($_POST["offerValue"]);
    if(empty($input_offerValue)){
        $offerValue_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_offerValue)){
        $offerValue_err = "Teklif değerini giriniz";
    } else{
        $offerValue = $input_offerValue;
    }
    $input_offerCreateTime = trim($_POST["offerCreateTime"]);
    if(empty($input_offerCreateTime)){
        $offerCreateTime_err = "Tarih alanı boş bırakılamaz";     
  }
     else{
        $offerCreateTime = $input_offerCreateTime;
    }
    
    
    if(empty($productId_err) &&empty($offerHead_err) &&empty($offerValue_err) && empty($offerCreateTime_err)){
       
        $sql = "INSERT INTO offers (productId, offerHead, offerValue,offerCreateTime) VALUES (:productId, :offerHead, :offerValue, :offerCreateTime)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":productId", $param_productId);
            $stmt->bindParam(":offerHead", $param_offerHead);
            $stmt->bindParam(":offerValue", $param_offerValue);
            $stmt->bindParam(":offerCreateTime", $param_offerCreateTime);
            
           
            $param_productId = $productId;
            $param_offerHead = $offerHead;
            $param_offerValue = $offerValue;
            $param_offerCreateTime = $offerCreateTime;
            
            
            if($stmt->execute()){
               
                header("location: index.php");
                exit();
            } else{
                echo "ERROR";
            }
        }
         
        
        unset($stmt);
    }
    
    
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                          <div class="form-group">
                            <label>Ürün ID</label>
                            <textarea name="productId" class="form-control <?php echo (!empty($productId_err)) ? 'is-invalid' : ''; ?>"><?php echo $productId; ?></textarea>
                            <span class="invalid-feedback"><?php echo $productId_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Teklif Açıklaması</label>
                            <textarea name="offerHead" class="form-control <?php echo (!empty($offerHead_err)) ? 'is-invalid' : ''; ?>"><?php echo $offerHead; ?></textarea>
                            <span class="invalid-feedback"><?php echo $offerHead_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Teklif Değeri</label>
                            <input type="text" name="offerValue" class="form-control <?php echo (!empty($offerValue_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $offerValue; ?>">
                            <span class="invalid-feedback"><?php echo $offerValue_err;?></span>
                        </div>
                         <div class="form-group">
                            <label>Teklif Verilen Tarih</label>
                            <input type="text" name="offerCreateTime" class="form-control <?php echo (!empty($offerCreateTime_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $offerCreateTime; ?>">
                            <span class="invalid-feedback"><?php echo $offerCreateTime_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>