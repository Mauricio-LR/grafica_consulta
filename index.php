<!DOCTYPE html>
<html>
<head>
	<title>Grafica Reporte</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.3.1.min.js"></script>
	<script src="librerias/plotly-latest.min.js"></script>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="panel panel-primary">
					<div class="panel panel-heading">
						Graficas Reporte
					</div>
					<div class="panel panel-body">
						<div class="row">
							
							<div class="col-sm-6">
								<div id="cargaBarras"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		Graficas Reporte
		<main>
        <div class="container py-4 text-center">
            <h2> BUSCAR REPORTE </h2>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <form action="" method="post">
                        <label for="campo">Buscar: </label>
                        <input type="text" name="campo" id="campo">
                    </form>
                </div>
            </div>
            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered">
                        <thead>
                            <!---<th>Num. empleado</th> 
                            <th>Nombre</th>--->
                            <th>Fecha de Recepcion </th>
                            <th>Fecha Limite de Desahogo</th>
                            <th>Fecha del Documento</th>
                           
                            <!---   <th></th>
                            <th></th>-->
                        </thead>
                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <script>
        /* Llamando a la función getData() */
        getData()
        /* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData. */
        document.getElementById("campo").addEventListener("keyup", getData)
        /* Peticion AJAX */
        function getData() {
            let input = document.getElementById("campo").value
            let content = document.getElementById("content")
            let url = "load.php"
            let formaData = new FormData()
            formaData.append('campo', input)
            fetch(url, {
                    method: "POST",
                    body: formaData
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err))
        }
    </script>
    <!-- Bootstrap core JS -->

	</div>
	
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#cargaLineal').load('lineal.php');
		$('#cargaBarras').load('barras.php');
	});
</script>

