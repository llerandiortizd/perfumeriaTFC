<?php require_once("../resources/config.php"); ?>
<?php require_once("../resources/auth_check.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header>
			<h1 class="text-center">Perfumes de Nicho</h1>
        </header>

        <hr>

        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center" id="marcasDeNicho">

           <?php getMarcasNicho(); ?>

        </div>
        <!-- /.row -->

        <hr>
		
    </div>
    <!-- /.container -->

	<?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>