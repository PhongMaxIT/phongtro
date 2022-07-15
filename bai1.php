<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    display: flex;
    justify-content: center;
}
h3{
    color: red;
}
form{
    display: block;
    margin: 20px;
    text-align: center;
    border: 1px solid #ccc;
    padding: 5px;   
}
</style>
<body>
    <form method="post" action="demo2.php">
        <h3>Giai phuong trinh bac nhat ax+b</h3>
        <label for="">
            nhap so a: <input type="number" name="a" value="<?php if(isset($_POST["a"])) echo $_POST["a"]?>" placeholder="nhap so a"/> <br>
        </label>   
        <label for="">
            nhap so b: <input type="number" name="b" value="<?php if(isset($_POST["b"])) echo $_POST["b"]?>" placeholder="nhap so b"/><br>
        </label>
        <input type="submit" name="btn" value="Giai"> <br>
        <?php
        if(isset($_POST["btn"])){
            $a = $_POST["a"];
            $b = $_POST["b"];

            if($a == 0){
                if($b == 0){
                    echo "Phuong trinh co vo so nghiem";
                }else if($b != 0){
                    echo"Phuong trinh vo nghiem";
                }
            }else{
                $x = -($b/$a);
                echo "Phuong trinh co mot nghiem x = $x";
            }
        }
    ?>  
    </form>
</body>
</html>
