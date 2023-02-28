<?php require_once("../resources/config.php"); ?>
<?php/*require_once("../resources/auth_check.php");*/ ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

		<?php 

				$query = query(" SELECT * FROM marcas WHERE ID = " . escape_string($_GET['id']) . "");
				confirm($query);
				
				while($row = fetch_array($query)):			

			?>

        <!-- Jumbotron Header -->
        <header>
			<h1 class="text-center"><?php echo $row['Marca'];?></h1>
        </header>

        <hr>

        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center" id="marca">

           <?php getPerfumes(); ?>

        </div>
        <!-- /.row -->

        <hr>
		
    </div>
	
	<?php endwhile;?>
    <!-- /.container -->

	<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>