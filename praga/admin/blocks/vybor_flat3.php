<div id="vybor">
<?php

if (isset($_POST['street_one'])) {$street_one = $_POST['street_one'];}
if (isset($_POST['street_two'])) {$street_two = $_POST['street_two'];}
if (isset($_POST['street_free'])) {$street_free = $_POST['street_free'];}
if (isset($_POST['floor_dop'])) {$floor_dop = $_POST['floor_dop'];}
if (isset($_POST['price_dop'])) {$price_dop = $_POST['price_dop'];}
if (isset($_POST['firm_dop'])) {$firm_dop = $_POST['firm_dop'];}



// Выбор улицы
if ($street_one !== "" && $street_two == "" && $street_free == "") {
    $and = "type='квартира' AND rooms='3' AND street='" . $street_one . "'";
    $and1 = "<br />Выбрана улица <span>" . $street_one . "</span>.";    
}
else if ($street_one !== "" && $street_two !== "" && $street_free == "") {
    $and = "type='квартира' AND rooms='3' AND street='" . $street_one . "' OR type='квартира' AND rooms='3' AND street='" . $street_two . "'";
	$and1 = "<br />Выбрано две улицы: <span>" . $street_one . "</span> и <span>". $street_two . "</span>.";    
}
else if ($street_one !== "" && $street_two !== "" && $street_free !== "") {
    $and = "type='квартира' AND rooms='3' AND street='" . $street_one . "' OR type='квартира' AND rooms='3' AND street='" . $street_two . "' OR type='квартира' AND rooms='3' AND street='" . $street_free . "'";
	$and1 = "<br />Выбрано три улицы: <span>" . $street_one . "</span>, <span>". $street_two . "</span> и <span>". $street_free . "</span>.";
}
else {
   $and = $street_one;
   $and1 = ""; 
}

// Выбор этажа
if ($floor_dop == '1' || $floor_dop == '2' || $floor_dop == '3' || $floor_dop == '4' || $floor_dop == '5') {
    $flo = "type='квартира' AND rooms='3' AND floor='" . $floor_dop . "'";
    $flo1 = "<br />Выбран <span>" . $floor_dop . "-й</span> этаж.";    
}
else if ($floor_dop == "Кроме 1 и 5") {
    $flo = "type='квартира' AND rooms='3' AND floor!='1' AND floor!='5'";
	$flo1 = "<br />Выбраны все этажи <span>кроме 1 и 5</span>.";
}
else if ($floor_dop == "Кроме 1") {
    $flo = "type='квартира' AND rooms='3' AND floor!='1'";
	$flo1 = "<br />Выбраны все этажи <span>кроме 1</span>.";
}
else if ($floor_dop == "Кроме 5") {
    $flo = "type='квартира' AND rooms='3' AND floor!='5'";
	$flo1 = "<br />Выбраны все этажи <span>кроме 5</span>.";
}
else {
   $flo = $floor_dop;
   $flo1 = "";
}


// Выбор агентства
if ($firm_dop !== "") {
    $fir = "type='квартира' AND rooms='3' AND firm='" . $firm_dop . "'";
    $fir1 = "<br />Выбрано Агентство Недвижимости <span>'" . $firm_dop . "'</span>.";    
}
else {
   $fir = $firm_dop;
   $fir1 = ""; 
}

// Выбор цены
if ($price_dop !== "") {
    $pri = "type='квартира' AND rooms='3' AND price<='" . $price_dop . "'";
    $pri1 = "<br />Установлена цена <span>не более " . $price_dop . " 000</span> рублей.";    
}
else {
   $pri = $price_dop;
   $pri1 = ""; 
}



// Выборка каждого параметра по отдельности
if      ($and !=="" && $flo =="" && $fir =="" && $pri =="") {$param = $and;} // Улица
else if ($and =="" && $flo !=="" && $fir =="" && $pri =="") {$param = $flo;} // Этаж
else if ($and =="" && $flo =="" && $fir !=="" && $pri =="") {$param = $fir;} // Агентство
else if ($and =="" && $flo =="" && $fir =="" && $pri !=="") {$param = $pri;} // Цена

// Этаж, агентство, цена
else if ($and =="" && $flo !=="" && $fir !=="" && $pri =="") {$param = $flo . " AND " . $fir;} // Этаж + Агентство
else if ($and =="" && $flo !=="" && $fir =="" && $pri !=="") {$param = $flo . " AND " . $pri;} // Этаж + Цена
else if ($and =="" && $flo =="" && $fir !=="" && $pri !=="") {$param = $fir . " AND " . $pri;} // Агентство + Цена
else if ($and =="" && $flo !=="" && $fir !=="" && $pri !=="") {$param = $flo . " AND " . $fir . " AND " . $pri;} // Этаж + Агентство + Цена

// Улица, этаж, цена
else if ($and !=="" && $flo !=="" && $fir =="" && $pri =="") {$param = "(" . $and . ") AND " . $flo;} // Улица + Этаж
else if ($and !=="" && $flo =="" && $fir =="" && $pri !=="") {$param = "(" . $and . ") AND " . $pri;} // Улица + Цена
// else if ($and =="" && $flo !=="" && $fir =="" && $pri !=="") {$param = $flo . " AND " . $pri;} // Этаж + Цена
else if ($and !=="" && $flo !=="" && $fir =="" && $pri !=="") {$param = "(" . $and . ") AND " . $flo . " AND " . $pri;} // Улица + Этаж + Цена

// Улица, этаж, агентство
// else if ($and !=="" && $flo !=="" && $fir =="" && $pri =="") {$param = "(" . $and . ") AND " . $flo;} // Улица + Этаж
else if ($and !=="" && $flo =="" && $fir !=="" && $pri =="") {$param = "(" . $and . ") AND " . $fir;} // Улица + Агентство
// else if ($and =="" && $flo !=="" && $fir !=="" && $pri =="") {$param = $flo . " AND " . $fir;} // Этаж + Агентство
else if ($and !=="" && $flo !=="" && $fir !=="" && $pri =="") {$param = "(" . $and . ") AND " . $flo . " AND " . $fir;} // Улица + Этаж + Агентство

// Улица, агентство, цена
// else if ($and !=="" && $flo =="" && $fir !=="" && $pri =="") {$param = "(" . $and . ") AND " . $fir;} // Улица + Агентство
// else if ($and !=="" && $flo =="" && $fir =="" && $pri !=="") {$param = "(" . $and . ") AND " . $pri;} // Улица + Цена
// else if ($and =="" && $flo =="" && $fir !=="" && $pri !=="") {$param = $fir . " AND " . $pri;} // Агентство + Цена
else if ($and !=="" && $flo =="" && $fir !=="" && $pri !=="") {$param = "(" . $and . ") AND " . $fir . " AND " . $pri;} // Улица + Агентство + Цена

// Улица, этаж, агентство, цена
else if ($and !=="" && $flo !=="" && $fir !=="" && $pri !=="") {$param = "(" . $and . ") AND " . $flo . " AND " . $fir . " AND " . $pri;}

// Параметров не задано - выводится всё  
else {$param = "type='квартира' AND rooms='3'";}


// || (isset($and1))  || (isset($flo1)) || (isset($fir1)) || (isset($pri1))
if ($and1 =="" && $flo1 =="" && $fir1 =="" && $pri1 =="") {
$text = "<p>Выборка не производилась</p>";
$param = "type='квартира' AND rooms='3'";
}
else  {
$text = "<p>Произведена выборка по следующим параметрам: " . $and1 . " " . $flo1 . " " . $fir1 ." " . $pri1 . "</p>";
}
echo $text;
?>
</div> <!-- vybor -->