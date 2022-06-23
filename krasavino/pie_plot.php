<?php
$graph = new PieGraph(400,300);
$graph->SetShadow();
$graph->title->Set("CDN Запрос трафика ");
$graph->title->SetFont(FF_ARIAL,FS_BOLD);
$pieplot = new PiePlot($data_amount);
$pieplot->SetLegends($gDateLocale->GetShortMonth());          // Установить легенду
$graph->Add($pieplot);
?>