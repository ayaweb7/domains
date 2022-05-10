<html>
	<body>
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<p></p>
<!--  -->
	
<!-- TODAY -->
<p>все, что находится внутри тегов script, в качестве кода JavaScript, что затем браузер и сделает,
записав в текущий документ текст «Today is », а также дату, полученную за счет использования принадлежащей JavaScript функции Date.
</br> В результате получится нечто подобное следующему:</p>
<p>Today is Sun Jan 01 2017 01:23:45</p>

<script type="text/javascript">
document.write("Today is " + Date() );
</script>

<!-- Событие onchange -->
<title>Событие onchange</title>
 </head> 
 <body>
  <form action="">
   <fieldset>
    <legend>Быстрый переход по сайту</legend>
    <select onchange="document.location=this.options[this.selectedIndex].value">
      <option value="#">Выберите раздел сайта</option>
      <option value="depart.html">Отделения</option>
      <option value="techinfo.html">Техническая информация</option>
      <option value="study.html">Обучение</option>
    </select>
   </fieldset>
  </form>
 
 
 <!-- Можно и прощe этот код сделать: -->
 <select onchange="location=value">
	<option value="" selected="selected">Выбрать из списка</option>
	<option value="index.php?id=g_history2">Сталинградская битва</option>
	<option value="index.php?id=default">Суровикино во время войны</option>
	<option value="index.php?id=g_history3">Штурм Берлина</option>
</select>
 
 
 <!-- Select a new car from the list. -->
 <p>Select a new car from the list.</p>

<select id="mySelect" onchange="myFunction()">
  <option value="Audi">Audi
  <option value="BMW">BMW
  <option value="Mercedes">Mercedes
  <option value="Volvo">Volvo
</select>

<p>When you select a new car, a function is triggered which outputs the value of the selected car.</p>

<p id="demo"></p>

<script>
function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("demo").innerHTML = "You selected: " + x;
}
</script>
 <!--  -->
 
 <!--  -->
		
		<p align="center"><a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a></p>
	</body>
</html>