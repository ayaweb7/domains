<?php
$graph = new Graph(400,300);    
$graph->SetScale("textlin");         
$graph->SetShadow();         
$graph->img->SetMargin(40,30,20,40);
$barplot = new BarPlot($data_amount);                                                      // Создайте BarPlot Объект
$barplot->SetFillColor('blue');                                                        // Установить цвет
$barplot->value->Show();                                                                           // Установить номер дисплея
$graph->Add($barplot);                                                          // Добавьте столбчатую диаграмму к изображению            
$graph->title->Set("CDN Запрос трафика ");                                     // Установить заголовок и X-Y Название оси
$graph->xaxis->title->Set(" месяц ");
$graph->xaxis->SetTickLabels($leg_amount);
$graph->yaxis->title->Set(" течь количество (Gbits)");
$graph->title->SetFont(FF_ARIAL,FS_BOLD);                                                 // Установить шрифт
$graph->yaxis->title->SetFont(FF_ARIAL,FS_BOLD);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_BOLD);
?>