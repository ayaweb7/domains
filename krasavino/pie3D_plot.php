<?php
$graph = new PieGraph(400,300);
$graph->SetShadow();
$graph->title->Set("CDN Запрос трафика ");
$graph->title->SetFont(FF_ARIAL,FS_BOLD);
$pieplot = new PiePlot3D($data_amount);                                                          // Создайте PiePlot3D Объект
$pieplot->SetCenter(0.4);                                                               // Установите положение центра круговой диаграммы
$pieplot->SetLegends($gDateLocale->GetShortMonth());          // Установить легенду
$graph->Add($pieplot);
?>