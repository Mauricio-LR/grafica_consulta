
<?php
/*
* Script: Cargar datos de lado del servidor con PHP y MySQL

*/


require 'config.php';

/* Un arreglo de las columnas a mostrar en la tabla */
$columns = ['fechaVenta','montoVenta'];
$columnsWhere = ['fechaVenta', 'montoVenta'];

/* Nombre de la tabla */
$table = "ventas";

$campo = isset($_POST['campo']) ? $conn->real_escape_string($_POST['campo']) : null;


/* Filtrado */
$where = '';

if ($campo != null) {
    $where = "WHERE (";

    $cont = count($columnsWhere);
    for ($i = 0; $i < $cont; $i++) {
        $where .= $columnsWhere[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}


/* Consulta */
$sql = "SELECT " . implode(", ", $columns) . "
FROM $table
$where ";
$resultado = $conn->query($sql);
$num_rows = $resultado->num_rows;


/* Mostrado resultados */
$html = '';

if ($num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $html .= '<tr>';
      /*  $html .= '<td>' . $row['no_emp'] . '</td>';
        $html .= '<td>' . $row['nombre'] . '</td>';
        $html .= '<td>' . $row['apellido'] . '</td>';*/
        $html .= '<td>' . $row['fechaVenta'] . '</td>';
        $html .= '<td>' . $row['montoVenta'] . '</td>';
      /*  $html .= '<td><a href="">Editar</a></td>';*/
     /*   $html .= '<td><a href="">Eliminar</a></td>';*/
        $html .= '</tr>';
    }
} else {
    $html .= '<tr>';
    $html .= '<td colspan="7">Sin resultados</td>';
    $html .= '</tr>';
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);