<?php
/** @noinspection ForgottenDebugOutputInspection */
use Shuchkin\SimpleXLSX;
error_reporting(1);
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="export.txt"');
$file 			= fopen('php://output', 'wb');
require_once __DIR__.'/simplexlsx/src/SimpleXLSX.php';
$files =  glob( __DIR__."/sheet/*.xlsx");
if ($xlsx = SimpleXLSX::parse($files[0])) {
    $rows = $xlsx->rows();
    foreach ($rows as $row ) {
    	$data = $row[0].',';
    	fwrite($file , $data);
    }
} else {
    echo SimpleXLSX::parseError();
}
