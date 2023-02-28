<?php require_once("../resources/config.php"); ?>
<?php require_once("../resources/auth_check.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>

<div class="container">

<div class="row text-center" id="marca">

	<?php
				if(isset($_POST['buscar'])){
						
						$busqueda = $_POST['busqueda']; 
						
						if($_POST['busqueda'] == "formal" || $_POST['busqueda'] == "deportiva" || $_POST['busqueda'] == "casual"){
								
							$consulta = $connection->query("SELECT fragancias.*, ocasiones.ocasion FROM fragancias LEFT OUTER JOIN ocasiones ON fragancias.IDocasion = ocasiones.ID WHERE ocasion LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
						
						} else if($_POST['busqueda'] == "primavera" || $_POST['busqueda'] == "verano" || $_POST['busqueda'] == "otoño" || $_POST['busqueda'] == "invierno") {
							
							$consulta = $connection->query("SELECT fragancias.*, estaciones.estacion FROM fragancias LEFT OUTER JOIN estaciones ON fragancias.IDestacion = estaciones.ID WHERE estacion LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
						
				} else if($_POST['busqueda'] == "acuática" || $_POST['busqueda'] == "amaderada" || $_POST['busqueda'] == "ambarada" || $_POST['busqueda'] == "aromática" || $_POST['busqueda'] == "chipre" || $_POST['busqueda'] == "cítrica" || $_POST['busqueda'] == "cuero" || $_POST['busqueda'] == "floral" || $_POST['busqueda'] == "fougère" || $_POST['busqueda'] == "frutal" || $_POST['busqueda'] == "gourmand"){
					
					$consulta = $connection->query("SELECT fragancias.*, familiasOlfativas.familiaOlfativa FROM fragancias LEFT OUTER JOIN familiasOlfativas ON fragancias.IDfamiliaOlfativa = familiasOlfativas.ID WHERE familiaOlfativa LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
					
				} else if($_POST['busqueda'] == "acqua di parma" || $_POST['busqueda'] == "amouage" || $_POST['busqueda'] == "andy tauer" || $_POST['busqueda'] == "armani" || $_POST['busqueda'] == "azzaro" || $_POST['busqueda'] == "burberry" || $_POST['busqueda'] == "by kilian" || $_POST['busqueda'] == "bvlgari" || $_POST['busqueda'] == "calvin klein" || $_POST['busqueda'] == "carolina herrera" || $_POST['busqueda'] == "cartier" || $_POST['busqueda'] == "chanel" || $_POST['busqueda'] == "creed" || $_POST['busqueda'] == "dolce & gabbana" || $_POST['busqueda'] == "dunhill" || $_POST['busqueda'] == "givenchy" || $_POST['busqueda'] == "guerlain" || $_POST['busqueda'] == "hugo boss"){
					
					$consulta = $connection->query("SELECT fragancias.*, marcas.marca FROM fragancias LEFT OUTER JOIN marcas ON fragancias.IDmarca = marcas.ID WHERE marca LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
					
				} else if($_POST['busqueda'] == "italia" || $_POST['busqueda'] == "omán" || $_POST['busqueda'] == "suiza" || $_POST['busqueda'] == "francia" || $_POST['busqueda'] == "reino unido" || $_POST['busqueda'] == "estados unidos" || $_POST['busqueda'] == "alemania"){
					
					$consulta = $connection->query("SELECT fragancias.*, marcas.pais FROM fragancias LEFT OUTER JOIN marcas ON fragancias.IDmarca = marcas.ID WHERE pais LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
					
				} else if($_POST['busqueda'] == "1916" || $_POST['busqueda'] == "1983" || $_POST['busqueda'] == "2005" || $_POST['busqueda'] == "1975" || $_POST['busqueda'] == "1967" || $_POST['busqueda'] == "1856" || $_POST['busqueda'] == "2007"
				|| $_POST['busqueda'] == "1884" || $_POST['busqueda'] == "1968" || $_POST['busqueda'] == "1980" || $_POST['busqueda'] == "1847" || $_POST['busqueda'] == "1910" || $_POST['busqueda'] == "1760" || $_POST['busqueda'] == "1968" 
				|| $_POST['busqueda'] == "1946" || $_POST['busqueda'] == "1985" || $_POST['busqueda'] == "1893" || $_POST['busqueda'] == "1952" || $_POST['busqueda'] == "1828" || $_POST['busqueda'] == "1924" || $_POST['busqueda'] == "1982" 
				|| $_POST['busqueda'] == "1970" || $_POST['busqueda'] == "1933" || $_POST['busqueda'] == "1846" || $_POST['busqueda'] == "2008"){
					
					$consulta = $connection->query("SELECT fragancias.*, marcas.anoFundacion FROM fragancias LEFT OUTER JOIN marcas ON fragancias.IDmarca = marcas.ID WHERE anoFundacion LIKE '%$busqueda%'");
							
							while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
					
				} else {
						
						$consulta = $connection->query("SELECT * FROM fragancias WHERE Fragancia LIKE '%$busqueda%'");
						
						while($row = $consulta->fetch_array()){
							
							$fragancia =  <<<DELIMETER

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
							
							echo $fragancia.'<br>';
						}
					
					}
					
				}
					  
	?>

</div>

</div>

	<h1 align="center" class="bg-success"></h1>

 <?php include(TEMPLATE_FRONT . DS . "footer.php"); ?>
