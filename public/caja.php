<?php require_once("../resources/config.php"); ?>
<?php require_once("../resources/auth_check.php");?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<div class="container">

	<div class="row">
		
		<h4 class="text-center bg-danger"><?php mostrarMensaje(); ?></h4>
		
		<h1 id="caja">Caja</h1>

		<form method="post">
			
			<input type="hidden" name="cmd" value="_carrito">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="upload" value="1">

			<table class="table table-striped">
				<thead>
				  <tr>
				   <th>Producto</th>
				   <th>Precio</th>
				   <th>Cantidad</th>
				   <th>Subtotal</th>

				  </tr>
				</thead>
				<tbody>
				  <?php carrito(); ?>
				</tbody>
			</table>
			
			<p align="right"><button id="comprar" name="comprar" class="btn btn-primary" value="Comprar">Comprar</button></p>
		</form>
				
		<div class="col-xs-4 pull-right ">
			
			<h2>Total</h2>

			<table class="table table-bordered" cellspacing="0">

				<tr class="cart-subtotal sb">
					<th>Artículos:</th>
					<td><span class="amount"><?php 
					echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";?></span></td>
				</tr>
				<tr class="shipping sb">
					<th>Envío</th>
					<td>Envío gratuito</td>
				</tr>

				<tr class="order-total sb">
					<th>Total</th>
					<td><strong><span class="amount">&#8364;<?php 
					echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";?>
					</span></strong> 
					</td>
				</tr>

				</tbody>

			</table>
			
			<?php 
			
				if(isset($_POST['comprar'])){
					
					$query2 = query("CALL insertarEnCompras();");
					confirm($query2);
					session_destroy();
					
				}
			
			?>

		</div>

	</div>

</div>

<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>

