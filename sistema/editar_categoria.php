<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['descripcion']) ) {
    $alert = '<p class"msg_error">Todo los campos son requeridos</p>';
  } else {
    $id = $_GET['id'];
    $descripcion = $_POST['descripcion'];
    

    $sql_update = mysqli_query($conexion, "UPDATE categoria SET descripcion = '$descripcion' where id= '$id'");

    if ($sql_update) {
      $alert = '<p class="alert alert-success" role="alert">Categoria Actualizada correctamente</p>';
    } else {
      $alert = '<p class="alert alert-danger" role="alert">Error al Actualizar la Categoria</p>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_categoria.php");
  mysqli_close($conexion);
}
$id = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM categoria WHERE id = $id");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_categoria.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idcategoria = $data['id'];
    $descripcion = $data['descripcion'];
 
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $idcategoria; ?>">
        <div class="form-group">
          <label for="descripcion">Descripciòn</label>
          <input type="text" placeholder="Ingrese descripciòn" name="descripcion" class="form-control" id="descripcion" value="<?php echo $descripcion; ?>">
        </div>
        

        <input type="submit" value="Editar Categoria" class="btn btn-primary">
        <a href="lista_categoria.php" class="btn btn-danger">Regresar</a>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>