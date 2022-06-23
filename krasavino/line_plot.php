<?php
$graph = new Graph(400,300);							// Создать новый Graph Объект
$graph->SetScale("textlin");							// Установить стиль масштаба
$graph->img->SetMargin(30,30,80,30);					// Установить границы диаграммы
$graph->title->SetFont(FF_ARIAL,FS_BOLD);				// Установить шрифт
$graph->title->Set("CDN Запрос трафика ");				// Установить заголовок диаграммы
$lineplot=new LinePlot($data_amount);
$lineplot->SetLegend("Line");
$lineplot->SetColor("red");
$graph->Add($lineplot);
?>