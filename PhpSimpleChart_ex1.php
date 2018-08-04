<?php
require("PhpSimpleChart2.php");

$data_array = array("12", "15", "18", "12", "11", "23","11", "24", "15", "18", "12", "11", "23","11", "24");
$date_array = array("12th 14h", "12th 15h", "12th 16h", "12th 17h", "12th 18h", "12th 19h", "12th 20h", "12th 21h", "12th 15h", "12th 16h", "12th 17h", "12th 18h", "12th 19h", "12th 20h", "12th 21h");

$chart_text="My test chart July 2018";
$y_title="Temp Deg C";
$x_scale=1000;
$y_scale=400;

draw_line_chart($data_array,$date_array,$chart_text,$x_scale,$y_scale,$y_title);
?>
