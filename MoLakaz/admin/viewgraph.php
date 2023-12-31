<?php
require_once "../db/pdo.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> </title>
<?php include_once("../template/csslinksadmin.php"); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">


</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
<script type="text/javascript">
$(document).ready(function() {
$.ajax({
url : "jsondata.php",
dataType : "JSON",
success : function(result) {
google.charts.load('current', {

'packages' : [ 'corechart' ]
});
google.charts.setOnLoadCallback(function() {
drawChart(result);
});
}
});

function drawChart(result) {
var data = new google.visualization.DataTable();

data.addColumn('string', 'quotation');
data.addColumn('number', 'user_id');

var dataArray = [];
$.each(result, function(i, obj) {
dataArray.push([ obj.stand_type, parseInt(obj.proceed_id) ]);
});
data.addRows(dataArray);
var piechart_options = {
title : 'Pie Chart: Stands classified by number proceed',
width : 400,
height : 300
};
var piechart = new google.visualization.PieChart(document
.getElementById('piechart_div'));
piechart.draw(data, piechart_options);
var barchart_options = {
title : 'Barchart: Stands classified by number proceed',
width : 400,
height : 300,
legend : 'true'
};
var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));

barchart.draw(data, barchart_options);
var linechart_options = {
title : 'Linechart: Stands classified by number proceed',
width : 400,
height : 300,
legend : 'true'
};

var linechart = new google.visualization.LineChart(document.getElementById('linechart_div'));

linechart.draw(data, linechart_options);
}





});



</script>
</head>
<body>
<?php include_once("../template/adminheader.php"); ?>
<div class="container-fluid mt-5">
<div class="row">
<main class="col-md-7 offset-md-1 py-5">
<div class="row mt-3">

<table class="columns">
<tr>
<td>
<div id="piechart_div" style="border: 1px solid #ccc"></div>
</td>
<td>
<div id="barchart_div" style="border: 1px solid #ccc"></div>
</td>
</tr>
<td>
<div id="Linechart" style="border: 1px solid #ccc"></div>
</td>
</table>
</div>
</main>
</div>
</div>
<?php include_once("../template/footeradmin.php"); ?>
</body>
</html>
