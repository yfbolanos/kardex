<?php
if (!empty($_GET['codFabricante '])) {
    require("../conexion.php");
    $codFabricante = $_GET['codFabricante '];
    $query_delete = mysqli_query($conexion, "DELETE FROM fabricante WHERE codFabricante  = $codFabricante ");
    mysqli_close($conexion);
    header("location: lista_fabricante.php");
}
?>