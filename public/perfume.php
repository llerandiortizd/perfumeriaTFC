<?php require_once("../resources/config.php"); ?>
<?php require_once("../resources/auth_check.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

    <!-- Page Content -->
	
<div class="container">

       <!-- Side Navigation -->
			
			<?php 

				$query = query("SELECT * FROM Perfume WHERE ID = " . escape_string($_GET['id']) . "");
				confirm($query);
				
				while($row = fetch_array($query)):			

			?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
       <img class="img-responsive" src="<?php echo $row['enlaceImagen']; ?>" alt="">

    </div>

    <div class="col-md-5">

        <div class="thumbnail">
         

    <div class="caption-full">
        <h3><a href="#"><?php echo $row['Fragancia']; ?></a> </h3>
        <hr>
		<h4>Precio: <span><?php echo "&#8364; " . $row['Precio'];?></span></h4>
        <h5 class="">Mililitros: <span><?php echo $row['ML']; ?> ml</span></h5>

    <div class="caracteristicas">
		<p>Año de lanzamiento: <span><?php echo $row['anoLanzamiento']; ?></span></p>
        <p>Estación: <span><?php echo $row['estacion']; ?></span></p>
		<p>Ocasión: <span><?php echo $row['ocasion']; ?></span></p>
		<p>Familia Olfativa: <span><?php echo $row['familiaOlfativa']; ?></span></p>
    </div>

   
    <form method="post">
        <div class="form-group">
            <button class="btn btn-primary" name="agregar"><a style="color:white;" href="../resources/carrito.php?add=<?php echo $row['ID'];?>">Añadir al Carrito</a></button>
        </div>
    </form>

	<?php 
			
		if(isset($_POST['agregar'])){
					
			$query2 = query("INSERT INTO carrito(IDUsuario, IDFragancia, Cantidad, Precio, Fecha) VALUES((SELECT ID FROM usuarios WHERE nombreUsuario = '". $_SESSION['username'] ."'), 
			(SELECT ID From fragancias WHERE ID =" . escape_string($_SESSION['itemID']). ")," . escape_string($_SESSION['item_quantity']). ", 
			(SELECT Precio From fragancias WHERE ID =" . escape_string($_SESSION['itemID']). "), '" . date("Y/m/d h:i:s") . "')");
			confirm($query2);
					
		}
			
	?>

	<!--
	if isset($_POST['agregar'])
	-->

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->

        <hr>

</div><!-- col-md-9 ends here -->

<?php endwhile;?>

</div>
    <!-- /.container -->

    <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>

</body>

</html>