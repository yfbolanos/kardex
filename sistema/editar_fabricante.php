<?php
include "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
  $alert = "";
  if (empty($_POST['descripcionFab']) ) {
    $alert = '<p class"msg_error">Todo los campos son requeridos</p>';
  } else {
    $codFabricante = $_GET['codFabricante'];
    $descripcionFab = $_POST['descripcionFab'];
    

    $sql_update = mysqli_query($conexion, "UPDATE fabricante SET descripcionFab = '$descripcionFab' where codFabricante= $codFabricante");

    if ($sql_update) {
      $alert = '<p class="alert alert-success" role="alert">fabricante Actualizada correctamente</p>';
    } else {
      $alert = '<p class="alert alert-danger" role="alert">Error al Actualizar el fabricantea</p>';
    }
  }
}
// Mostrar Datos

if (empty($_REQUEST['codFabricante'])) {
  header("Location: lista_fabricante.php");
  mysqli_close($conexion);
}
$codFabricante = $_REQUEST['codFabricante'];
$sql = mysqli_query($conexion, "SELECT * FROM fabricante WHERE codFabricante = $codFabricante");
mysqli_close($conexion);
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header("Location: lista_fabricante.php");
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $idproveedor = $data['codFabricante'];
    $descripcionFab = $data['descripcionFab'];
  
  }
}
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <?php echo isset($alert) ? $alert : ''; ?>
      <form class="" action="" method="post">
        <input type="hidden" name="codFabricante" value="<?php echo $codFabricante; ?>">
        <div class="form-group">
          <label for="descripcionFab">Descripciòn</label>
          <input type="text" placeholder="Ingrese descripciòn" name="descripcionFab" class="form-control" id="descripcionFab" value="<?php echo $descripcionFab; ?>">
        </div>
        

        <input type="submit" value="Editar fabricante" class="btn btn-primary">
        <a href="lista_fabricante.php" class="btn btn-danger">Regresar</a>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>