<html>
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<title>AJAX</title>
</head>	

<h1>Использование технологии AJAX</h1>
<h3>XMLHttpRequest</h3>
<p>Пример 18.1. Кросс-браузерная AJAX-функция</p>

<script>
	function ajaxRequest()
	{
		try // Браузер не относится к семейству IE?
		{ // Да
			var request = new XMLHttpRequest()
		}
			catch(e1)
			{
				try // Это IE 6+?
			{ // Да
				request = new ActiveXObject("Msxml2.XMLHTTP")
			}
				catch(e2)
				{
					try // Это IE 5?
				{ // Да
					request = new ActiveXObject("Microsoft.XMLHTTP")
				}
					catch(e3) // Данный браузер не поддерживает AJAX
					{
						request = false
					}
			}
		}
		return request
	}
</script>

<h3>Ваша первая программа, использующая AJAX</h3>
<p>Пример 18.2. urlpost.html</p>
<h4>Загрузка веб-страницы в контейнер DIV</h4>
<div id='info'>Это предложение будет заменено</div>
<script>
params = "url=amazon.com/gp/aw "
request = new ajaxRequest()
request.open("POST", "urlpost.php", true)
request.setRequestHeader("Content-type",
	"application/x-www-form-urlencoded")
request.setRequestHeader("Content-length", params.length)
request.setRequestHeader("Connection", "close")
request.onreadystatechange = function()
{
	if (this.readyState == 4)
	{
		if (this.status == 200)
		{
			if (this.responseText != null)
			{
			document.getElementById('info').innerHTML =
			this.responseText
			}
		else alert("Ошибка AJAX: Данные не получены")
		}
	else alert( "Ошибка AJAX: " + this.statusText)
	}
}
request.send(params)
function ajaxRequest()
{
try
{
var request = new XMLHttpRequest()
}
catch(e1)
{
try
{
request = new ActiveXObject("Msxml2.XMLHTTP")
}
catch(e2)
{
try
{
request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch(e3)
{
request = false
}
}
}
return request
}
</script>

<p></p>


<script>
	
</script>
<script>
	
</script>
<h1></h1>
<h3></h3>
<p></p>
<p>
<h1></h1>
<h3></h3>
<p></p>
</p>
<script>
	
</script>
<script>
	
</script>
<script>
	
</script>
<h1></h1>
<h3></h3>
<p></p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>
<p>

</p>







<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>


<h3></h3>
<p></p>
<p>

</p>
<p></p>
<?php
	
?>







<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
</body>
</html>