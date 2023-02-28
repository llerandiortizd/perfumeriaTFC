<div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="inicio.php">Perfumería L'Essenza</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="perfumesdedisenador.php">Perfumes de Diseñador</a>
                    </li>
                    <li>
                        <a href="perfumesdenicho.php">Perfumes de Nicho</a>
                    </li>
					<li>
                        <a href="caja.php">Caja</a>
                    </li>
                </ul>
				<form method="post" class="form-inline my-2 my-lg-0" style="margin-top: 8px" action="resultados.php">
					<input name="busqueda" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="buscar" id="buscar">Buscar</button>
				</form>
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->