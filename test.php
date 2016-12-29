<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('max_execution_time', 0);

include 'simplexlsx.class.php';

$excel = new SimpleXLSX('26novgall.xlsx');

$sheetsCount = $excel->sheetsCount();
$excel_data = '';             
for ($k=1; $k <= $sheetsCount; $k++) { 
	$excel_data.= '<h4>'.$excel->sheetName($k).'</h4>';
	$excel_data.= '<table>';

	foreach ($excel->rows($k) as $row) {
		$excel_data.= '<tr>';
		foreach ($row as $cell) {
			$excel_data.= '<td>'.$cell.'</td>';
		}
		$excel_data.= '</tr>';
	}
	$excel_data.= '</table>';
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PHP Excel Reader</title>
<style type="text/css">
table {
 border-collapse: collapse;
}        
td {
 border: 1px solid black;
 padding: 0 0.5em;
}        
</style>
</head>
<body>

<?php
// displays tables with excel file data
echo $excel_data;
?>    

</body>
</html>
