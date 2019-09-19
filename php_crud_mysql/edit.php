<?php
include("db.php");


if  (isset($_GET['CODIGO_MOVIMIENTO'])) 
{
  $id = $_GET['CODIGO_MOVIMIENTO'];
  $query = "SELECT * FROM tipo_movimientos WHERE CODIGO_MOVIMIENTO = $id";
  $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $codigo = $row['CODIGO_MOVIMIENTO'];
        $nombre = $row['NOMBRE_MOVIMIENTO'];
    }
}
if (isset($_POST['update'])) {
  $id = $_GET['CODIGO_MOVIMIENTO'];
  $codigo= $_POST['CODIGO_MOVIMIENTO'];
  $nombre = $_POST['NOMBRE_MOVIMIENTO'];
  $query = "UPDATE tipo_movimientos set  NOMBRE_MOVIMIENTO = '$nombre' WHERE CODIGO_MOVIMIENTO=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'info';
  header('Location: index.php');
}
?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?COIGO_MOVIMIENTO=<?php echo $_GET['CODIGO_MOVIMIENTO']; ?>" method="POST">
        <div class="form-group">
          <input name="CODIGO_MOVIMIENTO" type="text" class="form-control" value="<?php echo $codigo; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        <textarea name="NOMBRE_MOVIMIENTO" class="form-control" cols="30" rows="10"><?php echo $nombre;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>