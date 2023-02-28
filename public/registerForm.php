<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	
	<link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Page Content -->
    <div class="container">

      <header>
            <h1 class="text-center">Registrarse como nuevo usuario</h1>
			<h2 class="text-center bg-warning"><?php mostrarMensaje(); ?></h2>
        <div class="col-sm-4 col-sm-offset-5">         
            <form class="" action="" method="post" enctype="multipart/form-data">
			
				<?php register_user(); ?>
			
                <div class="form-group"><label for="">
                    Usuario: <input type="text" name="username" class="form-control" required></label>
                </div>
                 <div class="form-group"><label for="password">
                    Contraseña: <input type="text" name="password" class="form-control" required></label>
                </div>

                <div class="form-group">
				  <input type="submit" name="register" class="btn btn-success" value="Registrarse">
                </div>
            </form>
        </div>  

      </header>

    </div>

 <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
