<?php

	//helper functions

	function configurarMensaje($msg){
		
		if(!empty($msg)){
			
			$_SESSION['message'] = $msg;
			
		} else {
			
			$msg = "";
			
		}
		
	}
	
	function mostrarMensaje(){
		
		if(isset($_SESSION['message'])){
			
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			
		}
		
	}
	
	function redirigir($location){
		
		header("Location: $location ");
		
	}
	
	function query($sql){
		
		global $connection;
		
		return mysqli_query($connection, $sql);
		
	}

	function confirm($result){
		
		global $connection;
		
		if(!$result){
			
			die("QUERY FAILED " . mysqli_error($connection));
			
		}
		
	}
	
	function escape_string($string){
		
		global $connection;
		
		return mysqli_real_escape_string($connection, $string);
		
	}

	function fetch_array($result){
		
		return mysqli_fetch_array($result);
		
	}
	
	/************FRONT END FUNCTIONS************/
	
	// get products

function getMarcasDisenador(){
		
		$query = query("SELECT * FROM marcas WHERE Tipo = 'Disenador'");
		confirm($query);
		
		while($row = fetch_array($query)){
			
			$product = <<<DELIMETER

			<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['enlaceImagen']}" alt="" style="height:300px; width:300px">
                    <div class="caption">
                        <h3>{$row['Marca']}</h3>
                        <h5>Año de fundación: {$row['AnoFundacion']}</h5>
						<h5>País de origen: {$row['Pais']}</h5>
                        <p>
                            <a href="marca.php?id={$row['ID']}" class="btn btn-primary">Ver Fragancias</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

			echo $product;
			
		}
		
	}	
	
function getMarcasNicho(){
		
		$query = query("SELECT * FROM marcas WHERE Tipo = 'Nicho'");
		confirm($query);
		
		while($row = fetch_array($query)){
			
			$product = <<<DELIMETER

			<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['enlaceImagen']}" alt="" style="height:300px; width:300px">
                    <div class="caption">
                        <h3>{$row['Marca']}</h3>
						<h5>Año de fundación: {$row['AnoFundacion']}</h5>
						<h5>País de origen: {$row['Pais']}</h5>
                        <p>
                            <a href="marca.php?id={$row['ID']}" class="btn btn-primary">Ver Fragancias</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

			echo $product;
			
		}
		
	}	
	
	function getPerfumes(){
		
		$query = query("SELECT * FROM perfume WHERE IDMarca = " . escape_string($_GET['id']) . "");
		
		confirm($query);
		
		while($row = fetch_array($query)){
			
			$product = <<<DELIMETER

			<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['enlaceImagen']}" alt="" style="height:300px; width:300px">
                    <div class="caption" style="height:176px">
                        <h3>{$row['Fragancia']}</h3>
                        <p>
                            <a href="perfume.php?id={$row['ID']}" class="btn btn-primary">Ver Fragancia</a>
                        </p>
                    </div>
                </div>
            </div>

DELIMETER;

			echo $product;
			
		}
		
	}				  
	
	function login_user(){
		
		if(isset($_POST['submit'])){
			
			$username = escape_string($_POST['username']);
			$password = escape_string($_POST['password']);
			
			$query = query("SELECT * FROM usuarios WHERE nombreUsuario = '{$username}' AND clave = '{$password}'");
			confirm($query);
			
			if(mysqli_num_rows($query) == 0){
				
				configurarMensaje("Usuario o contraseña incorrectos");
				redirigir("index.php");
				
			} else {
				
				$_SESSION['username'] = $username;
				configurarMensaje("Bienvenido {$username} ");
				redirigir("inicio.php");
				
			}
			
		}
		
	}
	
	function register_user(){
		
		if(isset($_POST['register'])){
			
			$username = escape_string($_POST['username']);
			$password = escape_string($_POST['password']);
			
			$query = query("INSERT INTO usuarios(nombreUsuario, Clave) VALUES('{$username}', '{$password}')");
			confirm($query);
			
			$query2 = query("SELECT * FROM usuarios WHERE nombreUsuario = '{$username}' AND clave = '{$password}'");
			confirm($query2);
			
			if(mysqli_num_rows($query2) > 0){
				
				configurarMensaje("Nuevo usuario creado con éxito");
				redirigir("index.php");
				
			}
			
		}
		
	}

	function mostrarImagen($imagen) {

		return $imagen;

	}
	
	

?>