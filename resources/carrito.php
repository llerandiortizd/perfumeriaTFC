<?php require_once("config.php"); ?>

<?php 

  if(isset($_GET['add'])) {

    $query = query("SELECT * FROM fragancias WHERE ID=" . escape_string($_GET['add']). " ");
    confirm($query);

    while($row = fetch_array($query)) {

      if($row['stock'] != $_SESSION['product_' . $_GET['add']]) {

        $_SESSION['product_' . $_GET['add']]+=1;
		
		if($_SESSION['product_' . $_GET['add']] == 1) {
			$query2 = query("INSERT INTO carrito(IDUsuario, IDFragancia, Cantidad, Precio, Fecha) VALUES((SELECT ID FROM usuarios WHERE nombreUsuario = '". $_SESSION['username'] ."'), 
			(SELECT ID From fragancias WHERE ID =" . escape_string($_GET['add']). ")," . escape_string($_SESSION['product_' . $_GET['add']]) . ", (SELECT Precio From fragancias WHERE ID =" . escape_string($_GET['add']). "), '" . date("Y/m/d h:i:s") . "')");
			confirm($query2);
	    } else if($_SESSION['product_' . $_GET['add']] > 1) {
			$query3 = query("UPDATE carrito SET Cantidad = ". escape_string($_SESSION['product_' . $_GET['add']]) .", Precio = ". $_SESSION['product_' . $_GET['add']] ." * (SELECT Precio From fragancias WHERE ID =" . escape_string($_GET['add']). ") WHERE IDFragancia=" . escape_string($_GET['add']). " ");
			confirm($query3);
		}
        redirigir("../public/caja.php");

      } else {

        configurarMensaje("Solamente hay " . $row['stock'] . " " . "{$row['Fragancia']}" . " disponibles");
        redirigir("../public/caja.php");

      }

    }

  }

  if(isset($_GET['remove'])) {

    $_SESSION['product_' . $_GET['remove']]--;

    if($_SESSION['product_' . $_GET['remove']] < 1) {

      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
	  $query4 = query("DELETE FROM carrito WHERE IDFragancia =" . escape_string($_GET['remove']));
	  confirm($query4);
      redirigir("../public/caja.php");

    } else {
	  
	  $query5 = query("UPDATE carrito SET Cantidad = ". escape_string($_SESSION['product_' . $_GET['remove']]) .", Precio = ". $_SESSION['product_' . $_GET['remove']] ." * (SELECT Precio From fragancias WHERE ID =" . escape_string($_GET['remove']). ") WHERE IDFragancia=" . escape_string($_GET['remove']). " ");
	  confirm($query5);
      redirigir("../public/caja.php");

     }

  }

 if(isset($_GET['delete'])) { 

  $_SESSION['product_' . $_GET['delete']] = '0';
  unset($_SESSION['item_total']);
  unset($_SESSION['item_quantity']);
  $query6 = query("DELETE FROM carrito WHERE IDFragancia =" . escape_string($_GET['delete']));
  confirm($query6);
  redirigir("../public/caja.php");

 }

function carrito() {
	
	$total = 0;
	$item_quantity = 0;
	$item_name = 1;
	$item_number =1;
	$amount = 1;
	$quantity =1;
	
	$_SESSION['itemID'] = 0;
	
	foreach ($_SESSION as $name => $value) {

		if($value > 0 ) {

			if(substr($name, 0, 8 ) == "product_") {

				$length = strlen($name);

				$id = substr($name, 8 , $length);

				$query = query("SELECT * FROM fragancias WHERE ID = " . escape_string($id). " ");
				confirm($query);

				$sub = 0;

				while($row = fetch_array($query)) {

					$sub = $row['Precio']*$value;
					$item_quantity +=$value;

					$product_image = mostrarImagen($row['enlaceImagen']);

					$product = <<<DELIMETER

					<tr class="sb">
					  <td>{$row['Fragancia']}<br>

					  <img width='100' src='../resources/{$product_image}'>

					  </td>
					  <td>&#8364;{$row['Precio']}</td>
					  <td>{$value}</td>
					  <td>&#8364;{$sub}</td>
					  <td><a class='btn btn-warning' href="../resources/carrito.php?remove={$row['ID']}"><span class='glyphicon glyphicon-minus'></span></a>   <a class='btn btn-success' href="../resources/carrito.php?add={$row['ID']}"><span class='glyphicon glyphicon-plus'></span></a>
					<a class='btn btn-danger' href="../resources/carrito.php?delete={$row['ID']}"><span class='glyphicon glyphicon-remove'></span></a></td>         
					  </tr>

					<input type="hidden" name="item_name_{$item_name}" value="{$row['Fragancia']}">
					<input type="hidden" name="item_number_{$item_number}" value="{$row['Fragancia']}">
					<input type="hidden" name="amount_{$amount}" value="{$row['Fragancia']}">
					<input type="hidden" name="quantity_{$quantity}" value="{$value}">

DELIMETER;

					echo $product;

					$item_name++;
					$item_number++;
					$amount++;
					$quantity++;
					
					$_SESSION['itemID'] = $row['ID'];

				}

			$_SESSION['item_total'] = $total += $sub;
			$_SESSION['item_quantity'] = $item_quantity;

           }

		}
 
    }

}

?>