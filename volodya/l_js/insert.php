<html>
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<title>INSERT</title>
</head>	


<h1>Передача значений переменных из JavaScript в PHP и наоборот</h1>
<h3>2. Передача значения переменных из PHP в JavaScript</h3>
<p>$button = "Button";</p>
<p>
Затем, в файле index.php передадим ее значение в JavaScript (перед подключением файла js/script.js):<br>
var button = "<?php echo $button; ?>";
</p>
<p></p>
<p>$(".content").prepend("<p class='for_button'>" + button + "/</p>");</p>
<p>

</p>
<p></p>
<?php
$button = "Button";

?>
<script>
var button = "<?php echo $button; ?>";
$(".content")+ button;
</script>

<h3>4. Передача значений переменных из JavaScript в PHP методом POST</h3>
<p>создадим простую форму ( в блоке с классом content):</p>
<!---->
<form action="insert.php" method="POST">
 <input type="text" name="search" value="">
 <input type="submit" value="OK">
 </form>

<script>
	var search = "search";
//	$("input[type=text]").val(search);
</script>
<p>

</p>
<p></p>
<?php
if($_POST['search']) {
 $str = $_POST['search'];
}	
?>
<h2 style='color: red;'><?php echo $str;?></h2>


<h2>Передача значений переменных из JavaScript в PHP и обратно</h2>
<h3>1. Передача значения PHP-переменной в JavaScript</h3>
<p><strong>1. Из PHP в JavaScript:</strong></p>

<?php
$name = 'Юрий';
?>

<script type="text/javascript">

var userName = '<?php echo $name;?>';
document.write('Значение PHP-переменной: ' + userName);

</script>

<p>
Итак, у нас есть PHP-переменная с именем name и значением Юрий, и наша задача состоит в том, чтобы это значение вывести на экран,
но не средствами PHP, а с помощью JavaScript.
</p>
<p>
Для этого мы открываем как обычно блок JavaScript-кода и внутри него объявляем переменную с произвольным именем (в нашем случае - userName).
Теперь мы этой переменной присваиваем в качестве значения результат работы оператора echo применительно к переменной name.
</p>
<p>
Как вы видите, мы делаем это в блоке PHP-кода, который открываем и закрываем в пределах одинарных кавычек,
обрамляющих строковое значение переменной userName в JavaScript-сценарии.
</p>
<p>
Таким образом, мы с помощью языка PHP формируем синтаксически верный код JavaScript, который будет корректно выполнен.
</p>
<p>
В результате выполнения этой строки в переменную userName попадет значение Юрий.
</p>
<p>
Вот и все. Значение PHP-переменной name было передано в JavaScript-переменную userName.
</p>
<p>
Теперь нам нужно только убедиться, что в нашей JavaScript-переменной userName хранится ожидаемое значение.
Для этого мы выводим значение данной переменной на экран с помощью document.write.</p>
</p>


<h3>2. Передача значения JavaScript-переменной в PHP (метод GET)</h3>
<p>
Здесь, как вы понимаете, ситуация у нас обратная. В наличии есть JavaScript-переменная, и ее значение нужно каким-то образом передать в PHP-сценарий.
</p>
<p>
Понятно, что эта задача несколько сложнее, ведь если в первом случае (передача значения PHP-переменной в JavaScript)
у нас уже была PHP-переменная, значение которой мы просто вывели внутри JavaScript-кода, то здесь такой вариант не пройдет.
</p>
<p>
Ведь PHP-скрипт ничего не знает о том, что у нас создана некая JavaScript-переменная. И не узнает он об этом до тех пор,
пока мы не отправим серверу GET или POST-запрос, в котором будет фигурировать значение JavaScript-переменной.
</p>
<p>
Вот тогда, уже на следующем запросе, мы сможем получить доступ к значению этой JavaScript-переменной из PHP-сценария.
</p>
<p>
Под уже существующим кодом допишем следующее:
</p>

<br /><br /><br />
<p><strong>2. Из JavaScript в PHP (метод GET):</strong></p>

<script type="text/javascript">
var userName2 = 'Дмитрий';
</script>

<p>
Внутри блока JavaScript-кода мы создаем переменную userName2 со значением Дмитрий.
</p>
<p>
Далее работа идет внутри блока PHP-кода.
</p>
<p>
Здесь наша задача состоит в том, чтобы средствами PHP создать корректный JavaScript-сценарий,
который перезагрузит текущую страницу и одновременно с этим передаст файлу index.php через адресную строку (т.е. методом GET) значение,
содержащееся в JavaScript-переменной userName2.
</p>
<p>
Для этого мы выводим на страницу открывающий блок JavaScript-кода с помощью опрератора echo, внутри которого задаем средствами
JavaScript перезагрузку текущей страницы (document.location.href).
</p>
<p>
В качестве адреса страницы мы используем значение элемента REQUEST_URI из глобального массива $_SERVER
и добавляем к нему параметр с именем u_name и значением, равным значению переменной userName2.
</p>
<p>
В итоге наша условная конструкция if-else работает следующим образом:
</p>
<p>
1. Если при обращении к странице index.php в глобальном массиве $_GET есть элемент с индексом u_name
(т.е. успешно сработала переадресация средствами JavaScript), то мы выводим на экран значение переданной JavaScript-переменной.
</p>
<p>
2. Если же при обращении к странице index.php в глобальном массиве $_GET нет элемента с индексом u_name,
то запускается JavaScript-сценарий, выведенный средствами PHP и производит переадресацию на эту же страницу,
но уже с параметром u_name, имеющим значение переменной userName2 (об этом мы говорили чуть выше).
</p>
<p>
Теперь, при обращении к index.php мы получим вот такой результат:
</p>
<?php
if (isset($_GET['u_name']))
{
    echo "Значение JavaScript-переменной: ". $_GET['u_name'];
}

else
{
    echo '<script type="text/javascript">';
    echo 'document.location.href="' . $_SERVER['REQUEST_URI'] . '?u_name=" + userName2';
    echo '</script>';
    exit();
}
?>
<h3>3. Передача значения JavaScript-переменной в PHP (метод POST)</h3>
<p>
В предыдущем примере мы рассмотрели способ передачи значения с использованием адресной строки браузера (методом GET).
</p>
<p>
Сейчас же мы рассмотрим вариант с передачей значения без использования адресной строки, т.е. методом POST.
</p>
<p>
В этом примере мы будем использовать форму для того, чтобы отправить данные на сервер методом POST.
</p>
<p>
Под уже существующим кодом напишем:
</p>

<br /><br /><br />
<p><strong>3. Из JavaScript в PHP (метод POST):</strong></p>

<script type="text/javascript">

var userName3 = 'Александр';

</script>

<p>
Начало у нас похожее: в блоке JavaScript-кода мы объявляем переменную с именем userName3 и значением Александр.
</p>
<p>
Далее мы открываем тэг параграфа для того, чтобы внутри него вывелось значение JavaScript-переменной.
</p>
<p>
После этого переходим к PHP-коду. Мы видим, что в ветке if проверяется существование в глобальном массиве $_POST элемента с индексом u_name.
</p>
<p>
Если данный элемент будет найден, то он будет выведен на экран и будет закрыт тэг параграфа для всего предложения.
</p>
<p>
В случае отстутствия данного элемента в массиве $_POST управление передается ветке else.
</p>
<p>
Для этого мы выводим на страницу открывающий и закрывающий блоки JavaScript-кода с помощью опрератора echo,
и внутри них формируем синтаксически верный JavaScript-код.
</p>
<p>
Наша задача сводится к тому, чтобы, используя команду вывода document.write в JavaScript,
вывести на страницу обычную HTML-форму и подставить в единственное ее текстовое поле с именем u_name значение,
которое хранится в переменной userName3 (Александр).
</p>
<p>
Самое сложное здесь - не запутаться в кавычках и их экранировании.
</p>
<p>
Именно поэтому перед написанием подобных скриптов я рекомендую вам сперва создать отдельный файл и написать в нем чистый JavaScript-код,
который бы выводил форму и подставлял в поле значение переменной userName3.
</p>
<p>
Когда вы с этим справитесь, то можете возвращаться к исходному файлу и задача ваша будет заключаться в том,
чтобы в точности вывести тот код, который вы написали чуть раньше. На этот раз - уже средствами PHP.
</p>
<p>
Именно это мы и делаем в ветке else. Обратите внимание, что текст для вывода (предназначенный для оператора echo) заключен в двойные кавычки. 
Соответственно, для конструкции document.write мы используем одинарные кавычки.
</p>
<p>
Это обстоятельство приводит к тому, что нам нужно проэкранировать все символы одинарных кавычек, которые находятся между открывающими
и закрывающими одинарными кавычками, ограничивающими вывод строки для конструкции document.write.
</p>
<p>
Если сейчас обратиться к странице index.php, то результат будет следующий:
</p>

<p style='color: red;'>Значение JavaScript-переменной:

<?php
if (isset($_POST['u_name']))
{
    echo $_POST['u_name'] . '</p>';
}

else
{
    echo "<script type='text/javascript'>";
    echo "document.write('<form method=\'post\'>');";
    echo "document.write('<p>Ваше имя:<br />');";
    echo "document.write('<input type=\'text\' name=\'u_name\' value = \'' + userName3 + '\'</p>');";
    echo "document.write('<input type=\'submit\' />');";
    echo "document.write('</form>');";
    echo "</script>";

    exit();
}
?>

<p>
Как вы видите, после фразы "Значение JavaScript-переменной:" идет пустота, т.е. пока еще PHP-сценарий не получил значение JavaScript-переменной userName3.
И это понятно - ведь еще не было запроса к серверу, в котором могла быть передана эта информация.
</p>
<p>
При этом ниже в форме у нас находится слово Александр - как раз значение JavaScript-переменной userName3.
</p>
<p>
Мы вставили его сюда как раз для того, чтобы отправлить форму и передать значение этой переменной методом POST нашему текущему скрипту index.php
(если атрибут action отсутствует, то данные будут переданы текущему скрипту).
</p>
<p>
Теперь форма у нас исчезла, т.к. уже отрабатывает ветка if, и вместо нее выводится значение переменной.
</p>
<p>
Ну что ж, с этой задачей мы тоже справились - значение JavaScript-переменной userName3 мы передали в PHP-скрипт и вывели его на экран из массива $_POST.
</p>

<?php
$a = 'text for js_variable';
?>
<!DOCTYPE html>
<html>
  <head>
    <script>
      //Определяется переменная, которая будет доступна для 
      // всех JavaScript, подключаемых на данной странице
      var js_variable = '<?php echo $a; ?>';
    </script>
    <!-- 
      В файле /scripts/myscript.js происходит обращение 
      к переменной js_variable 
    -->
    <script src="/scripts/myscript.js"></script>
  </head>
  <body>blah-blah-blah</body>
</html>





<p>
Чтобы получить результат, я изменил свой код JavaScript следующим образом:

<script>
var demo=10;
var urll='to_fake_page.php?demostore='+demo;
</script>
и изменил линию

'<a href="to_fake_page.php" id="myLink">On click pass demo</a>' + 
в функции AJAX для

'<a href="'+url+'"' +
'id="myLink">On click pass demo</a>' +
</p>




<p>
Всем привет, я нуб в js. Прошу помощи с onclick, суть заключается в том что нужно по онклику передать значение в переменную, а потом подставить в ссылку.

<input class="radio" type="radio" onclick="var sex = 'значение sex';" name="radio-test">
<input class="radio" type="radio" onclick="var age = 'значение age';" name="radio-test">
<input class="radio" type="radio" onclick="var answer = 'значение answer';" name="radio-test">

<span id="param_utm1">
<a href ="http://домен.com/click.php?key=сюда подставить значение" class="btn agree">Continue »</a>
</span>
<script>
var utm_sex, utm_age, utm_answer;
utm_sex=sex;
utm_age=age;
utm_answer=answer;
<script>
</p>

<p><input class="radio" type="radio" value="sexValue" name="radio-test">sex</p>
<p><input class="radio" type="radio" value="ageValue" name="radio-test">age</p>
<p><input class="radio" type="radio" value="answerValue" name="radio-test">answer</p>
<a class="target" href="#">Continue</a>

<script>
var a = document.querySelector(".target");
var radio = document.querySelectorAll(".radio");
for (var i=0; i<radio.length; i++){ 
  radio[i].onclick = function(){
        a.href = "http://домен.com/click.php?key="+this.value;
  }
}
</script>


<form id='key-form'>
  <div>
    <label>
      <input class="radio" type="radio" name="radio-test" value="sex" checked> Пол
    </label>
  </div>
  <div>
    <label>
      <input class="radio" type="radio" name="radio-test" value="age"> Возраст
    </label>
  </div>
  <div>
    <label>
      <input class="radio" type="radio" name="radio-test" value="answer"> Ответ
    </label>
  </div>
</form>
<span id="param_utm1">
  <a href ="http://домен.com/click.php?key=сюда подставить значение" class="btn agree">Continue »</a>
</span>
<script type="text/javascript">
;(function(d) {
  var form = d.querySelector('form#key-form');
  var link = d.querySelector('#param_utm1 a');
 
  function setHref (key) {
    return "http://домен.com/click.php?key=" + key;
  }
 
  function keyChanged (e) {
    link.href = setHref(this['radio-test'].value);
  }
 
  form.addEventListener('change', keyChanged);
  keyChanged.call(form);
})(document);
</script>

<script>$(document).ready(function() {


            $(".clickable").click(function() {
                var userID = $(this).attr('id');
                //alert($(this).attr('id'));
                $.ajax({
                    type: "POST",
                    url: 'logtime.php',
                    data: "userID=" + userID,
                    success: function(data)
                    {
                        alert("success!");
                    }
                });
            });
        });



</script>
<?php //logtime.php
$uid = isset($_POST['userID']);
//rest of code that uses $uid
?>

<p>
Передайте данные, подобные этому, в вызов ajax (http://api.jquery.com/jQuery.ajax/):
data: { userID : userID }
</p>
<p>
И в вашем PHP сделайте следующее:

if(isset($_POST['userID']))
{
    $uid = $_POST['userID'];


    // Do whatever you want with the $uid
}

isset() Цель функции - проверить, существует ли данная переменная, а не получать ее значение.
</p>

<p>
Измените свой PHP следующим образом:
$uid = (isset($_POST['userID'])) ? $_POST['userID'] : 0;

Позже в вашем коде вы можете проверить значение $uid и соответственно отреагировать
if($uid==0) {
    echo 'User ID not found';
}
</p>
<p style='color: red;'>
Начало функции с AJAX:
</p>

<script>
$(document).ready(function() {
            $(".clickable").click(function() {
				var userID = 123;
                var userID = $(this).attr('id'); // you can add here your personal ID
                //alert($(this).attr('id'));
                $.ajax({
                    type: "POST",
                    url: 'logtime.php',
                    data : {
                        action : 'my_action',
                        userID : userID 
                    },
                    success: function(data)
                    {
                        alert("success!");
                        console.log(data);
                    }
                });
            });
        });
 </script>
<?php 
$uid = (isset($_POST['userID'])) ? $_POST['userID'] : 'ID not found';
 echo $uid;
?>

<script>
	
</script>
<script>
	
</script>

<p style='color: red;'>
AJAX запрос:
<script>
	$.ajax({
    url: "insert.php",
    type : "POST",
    data : {'distance':'distance'},
    success: function (responseText) {
    alert(responseText);
}});
</script>

<p>
PHP файл:<br>
echo $_POST['distance'];
</p>
<?php echo $_POST['distance']; ?>

<p>
для примера: создаете файл с php кодом, в js коде делаете ajax запрос к этому файлу, который будет ждать ответа от php файла.<br>
С ajax передаете переменные через data а в php получаете их через get или post
</p>
<p>
В data название переменной в ковычках надо (не знаю как у вас, но у меня так не работает) ну и значение, если это текст, типо так: data: {'data':'data'},
</p>
<script>
	
</script>
<script>
	
</script>

<p>

</p>
<script>
	
</script>
<script>
	
</script>
<script>
	
</script>

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