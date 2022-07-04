<?php
	require_once "php/conexion.php";
	$conexion=conexion();
	$sql="SELECT fechaVenta,montoVenta 
			from ventas order by fechaVenta";
	$result=mysqli_query($conexion,$sql);
	$valoresY=array();//montos
	$valoresX=array();//fechas

	while ($ver=mysqli_fetch_row($result)) {
		$valoresY[]=$ver[1];
		$valoresX[]=$ver[0];
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
 ?>

<div id="graficaBarras"></div>

<script type="text/javascript">
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaBarras('<?php echo $datosX ?>');
	datosY=crearCadenaBarras('<?php echo $datosY ?>');

	

	var data = [
		{
			x: datosX,
			y: datosY,
			width: [ 4],
			
			type: 'bar'
			,
  marker: {
    color: 'rgb(255,140,52)'
  }
		}
	];




	var layout = {
		
  title: 'Grafica reporte',
  font:{
    family: 'Raleway, sans-serif'
  },
 
  xaxis: {
    tickangle: -45
  }, yaxis: {
    zeroline: false,
    gridwidth: 2
  },
  
  bargap :0.10
};

var config = {responsive: true}


	Plotly.newPlot('graficaBarras', data,layout,config);
</script>