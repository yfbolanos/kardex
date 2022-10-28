 <?php include_once "includes/header.php";
  include "../conexion.php";
  if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['proveedor']) || empty($_POST['producto']) || empty($_POST['cantidad'] || $_POST['cantidad'] <  0)) {
      $alert = '<div class="alert alert-danger" role="alert">
                Todo los campos son obligatorios
              </div>';
    } else {
	  $fecha = $_POST['fecha'];
      $proveedor = $_POST['proveedor'];
	  $fabricante = $_POST['fabricante'];
      $producto = $_POST['producto'];
      $cantidad = $_POST['cantidad'];
      $fechaVencimiento = $_POST['fechaVencimiento'];
      $usuario_id = $_SESSION['idUser'];
	  $categoria = $_POST['categoria'];
	  $numSerie = $_POST['numSerie'];
	  $registroSanitario = $_POST['registroSanitario'];
	  $presentacionComercial = $_POST['presentacionComercial'];
	  $lote = $_POST['lote'];
	  
	  
	  
	  

      $query_insert = mysqli_query($conexion, "INSERT INTO producto(fecha,descripcion,fabricante,existencia,usuario_id,estado,fechaVencimiento,proveedor,categoria,numSerie,registroSanitario,presentacionComercial,lote) values ('$fecha','$producto','$fabricante','$cantidad','$usuario_id','1','$fechaVencimiento','$proveedor','$categoria','$numSerie','$registroSanitario','$presentacionComercial','$lote')");
      if ($query_insert) {
        $alert = '<div class="alert alert-primary" role="alert">
                Producto Registrado
              </div>';
      } else {
        $alert = '<div class="alert alert-danger" role="alert">
                Error al registrar el producto
              </div>';
      }
    }
  }
  ?>

 <!-- Begin Page Content -->
 <div class="container-fluid">
   

   <!-- Page Heading -->
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
     <h1 class="h3 mb-0 text-gray-800">Panel de Administración de Productos</h1>
  
     <a href="lista_productos.php" class="btn btn-danger">Regresar</a>
   </div>

   <!-- Content Row -->
   <div class="row">
     <div class="col-lg-6 m-auto">
       <form action="" method="post" autocomplete="off">
         <?php echo isset($alert) ? $alert : ''; ?>
         <div class="form-group">
           <label>Proveedor</label>
           <?php
            $query_proveedor = mysqli_query($conexion, "SELECT codproveedor, proveedor FROM proveedor ORDER BY proveedor ASC");
            $resultado_proveedor = mysqli_num_rows($query_proveedor);
            //mysqli_close($conexion);
            ?>
           <select id="proveedor" name="proveedor" class="form-control">
				
             <?php
              if ($resultado_proveedor > 0) {
                while ($proveedor = mysqli_fetch_array($query_proveedor)) {
                  // code...
              ?>
                 <option value="<?php echo $proveedor['codproveedor']; ?>"><?php echo $proveedor['proveedor']; ?></option>
             <?php
                }
              }
              ?>
           </select>
         </div>
		 <div class="form-group">
           <label>Fabricante</label>
           <?php
            $query_fabricante = mysqli_query($conexion, "SELECT codFabricante, descripcionFab FROM fabricante ORDER BY descripcionFab ASC");
            $resultado_fabricante = mysqli_num_rows($query_fabricante);
            //mysqli_close($conexion);
            ?>
           <select id="fabricante" name="fabricante" class="form-control">
				
             <?php
              if ($resultado_fabricante > 0) {
                while ($fabricante = mysqli_fetch_array($query_fabricante)) {
                  // code...
              ?>
                 <option value="<?php echo $fabricante['codFabricante']; ?>"><?php echo $fabricante['descripcionFab']; ?></option>
             <?php
                }
              }
              ?>
           </select>
         </div>
		 <div class="form-group">
			<label>Categoria</label>
			<?php
			 $query_categoria = mysqli_query($conexion, "SELECT id, descripcion FROM categoria ORDER BY descripcion ASC");
			 $resultado_categoria = mysqli_num_rows($query_categoria);
			 mysqli_close($conexion);
            ?>
           <select id="categoria" name="categoria" class="form-control">
			 <?php																																																																																																							
              if (mysqli_num_rows($query_categoria) > 0) {
                while ($categoria = mysqli_fetch_assoc($query_categoria)) {
                  // code...
              ?>
                 <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['descripcion']; ?></option>
             <?php
                }
              }
              ?>
           </select>
		 </div>
		 <div class="form-group">
           <label for="fecha">Fecha</label>
           <input type="date" placeholder="Ingrese fecha" class="form-control" name="fecha" id="fecha">
         </div>
		 <div class="form-group">
           <label for="producto">Producto</label>
           <input type="text" placeholder="Ingrese nombre del producto" name="producto" id="producto" class="form-control">
         </div>
         <div class="form-group">
           <label for="cantidad">Cantidad</label>
           <input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="cantidad">
         </div>
		 <div class="form-group">
           <label for="presentacionComercial">Presentacion Comercial</label>
           <input type="text" placeholder="Presentacion Comercial" name="presentacionComercial" id="presentacionComercial" class="form-control">
         </div>
		 <div class="form-group">
           <label for="lote">Lote</label>
           <input type="text" placeholder="Ingrese lote" name="lote" id="lote" class="form-control">
         </div>	
		 <div class="form-group">
           <label for="registroSanitario">Registro Sanitario</label>
           <input type="text" placeholder="Ingrese el registro sanitaio" name="registroSanitario" id="registroSanitario" class="form-control">
         </div>
		 <div class="form-group">
           <label for="numSerie">Numero de Serie</label>
           <input type="number" placeholder="Ingrese numero de serie" class="form-control" name="numSerie" id="numSerie">
         </div>
		 <div class="form-group">
           <label for="fechaVencimiento">Fecha vencimiento	</label>
           <input type="date" placeholder="Ingrese fecha" class="form-control" name="fechaVencimiento" id="fecha">
         </div>		  
         <input type="submit" value="Guardar Producto" class="btn btn-primary">
       </form>
     </div>
   </div>


 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <?php include_once "includes/footer.php"; ?>