<?php

include("db.php");

if (isset($_POST['save_task'])){
    //$title=$_POST['title'];
    $description=$_POST['NOMBRE_MOVIMIENTO'];
    $query="INSERT INTO tipo_movimientos(NOMBRE_MOVIMIENTO) VALUES ('$description')";
    $result=mysqli_query($conn,$query);
    if(!$result){
        die("Query Failed");
    }

    $_SESSION['message']='Guardado exitoso';
    $_SESSION['message_type']='success';


    header("Location: index.php");
}
?> 