<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['descripcionFab']))  {
        $alert = '<div class="alert alert-danger" role="alert">
                        Todo los campos son obligatorios
                    </div>';
    } else {
        $descripcionFab = $_POST['descripcionFab'];
        $query_insert = mysqli_query($conexion, "INSERT INTO fabricante(descripcionFab) values ('$descripcionFab')");
        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                        fabricante Registrada
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                       Error al registrar fabricante
                    </div>';
        }
        }
    }

mysqli_close($conexion);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card-header bg-primary text-white">
                Registro de Fabricante
            </div>
            <div class="card">
                <form action="" autocomplete="off" method="post" class="card-body p-2">
                    <?php echo isset($alert) ? $alert : ''; ?>
                    <div class="form-group">
                        <label for="descripcionFab">DESCRIPCIÒN</label>
                        <input type="text" placeholder="Ingrese Descripciòn" name="descripcionFab" id="descripcionFab" class="form-control">
                    </div>
                 
                    <input type="submit" value="Guardar Categoria" class="btn btn-primary">
                    <a href="lista_fabricante.php" class="btn btn-danger">Regresar</a>
                </form>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>