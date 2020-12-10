<?php

require "../../config/koneksi.php";

require_once ('../assets/jpgraph/src/jpgraph.php');
require_once ('../assets/jpgraph/src/jpgraph_line.php');
require_once ('../assets/jpgraph/src/jpgraph_bar.php');
 
$str = "select count(id_pembelian) as jml,tanggal_pembelian from pembelian group by tanggal_pembelian";
$result2 = mysqli_query($koneksi, $str);
$data= array();
while($stat= mysqli_fetch_array($result2)){
    $data['ket'][] = $stat['tanggal_pembelian'];
    $data['jml'][] = $stat['jml'];
}
$graph = new Graph(350,550);
$graph->SetScale('textlin');
 
// Create the linear plot
$lineplot=new LinePlot($data['jml']);
$lineplot->SetColor('blue');
$bplot = new BarPlot($data['jml']);
$graph->xaxis->SetTickLabels($data['ket']);
$graph->xaxis->SetLabelAngle(30);
// Adjust fill color
$bplot->SetFillColor('orange');
$graph->Add($bplot);
 
// Add the plot to the graph
$graph->Add($lineplot);
// Display the graph
$graph->Stroke();
?>