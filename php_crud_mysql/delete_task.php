<?php
    include("db.php");
    if(isset($_GET['CODIGO_MOVIMIENTO'])){
        $id = $_GET['CODIGO_MOVIMIENTO'];
        $query="DELETE FROM tipo_movimientos WHERE CODIGO_MOVIMIENTO = $id";
        $result = mysqli_query($conn, $query);
        if (!$result){
            die("Query Failed");
        }
        $_SESSION['message']='Dato Eliminado';
        $_SESSION['message_type'] = 'danger';
        header("Location: index.php");
    }
?>