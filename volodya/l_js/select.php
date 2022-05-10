<html>
<head>
    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
	<title>SELECT</title>
</head>	
<H1>Метод click флажка</H1>
<FORM NAME="Test">
    Флажок <INPUT TYPE="checkbox" NAME="ch">
    <BR>Состояние флажка можно изменить и этой кнопкой
    <INPUT TYPE="button" VALUE="Смена состояния"
           onClick="document.Test.ch.click();">
</FORM>	

<script><!--
        function btnClick()
        {
            if(document.Test1.Sex[0].checked){
                document.Test1.Sex[1].click();
            }else{
                document.Test1.Sex[0].click();
            }
        }
        //-->
    </script>


<H1>Метод click группы переключателей</H1>
<FORM NAME="Test1">
    <INPUT TYPE="RADIO"  NAME="Sex" VALUE ="Man" CHECKED>Мужской
    <INPUT TYPE="RADIO"  NAME="Sex" VALUE ="Woman">Женский
    <BR>Состояние переключателей можно изменить и этой кнопкой
    <INPUT TYPE="button" VALUE="Смена состояния" onClick="btnClick();">
</FORM>



<H1>Работа с готовым списком</H1>	
    <script><!--
        function btnClick2()
        {
            var sI=document.Test2.Item.selectedIndex;
            var Txt="";
            Txt="Предложено "+document.Test2.Item.length+" напитков"+
                "\nВыбран "+document.Test2.Item.options[sI].text+
                " (value= "+document.Test2.Item.options[sI].value+
                ", index= "+document.Test2.Item.options[sI].index+")";
            if(document.Test2.Item.options[sI].defaultSelected)
                {Txt+="\nЭтот напиток выбирается по умолчанию";}
                alert(Txt);
            }
        //-->
    </script>


<FORM NAME="Test2">
    <SELECT NAME="Item" SIZE=5>
        <OPTION VALUE="tea" SELECTED>Чай
        <OPTION VALUE ="coffee">Кофе
        <OPTION VALUE ="milk">Молоко
        <OPTION VALUE ="cocoa">Какао
        <OPTION VALUE ="juice">Сок
    </SELECT>
    <INPUT TYPE="button" VALUE="Пусть кофе"
           onClick="Test2.Item.options[1].selected=true;">
    <INPUT TYPE="button" VALUE="Посмотрим"
           onClick="btnClick2();">
</FORM>


<H1>Динамическое заполнение списка</H1>
<FORM NAME="Sel">
    <!-- Пустой список ссылок-->
    <SELECT NAME="ListOfLinks">
    </SELECT>
    <!-- Кнопка активизации выбранной ссылки-->
    <INPUT TYPE="button" VALUE="Переход"
           onClick="window.location.href=document.links[Sel.ListOfLinks.selectedIndex];">
</FORM>
<A HREF="http://kdg.HtmlWeb.ru"></A>
<A HREF="http://www.dstu.edu.ru/"></A>
<A HREF="http://sp2all.ru/"></A>
<A HREF="http://www.VseTaksi.ru/"></A>
<script><!--
    // Цикл по всем ссылкам
    for(i=0; i<document.links.length; i++)
    {   // Создание i-элемента списка и запись в него ссылки
        document.Sel.ListOfLinks.options[i] = new Option(document.links[i], i, false, false);
    }
    // Выделение первого элемента в списке
    document.Sel.ListOfLinks.selectedIndex = 0;
    //-->
</script>


<script>
        <!--
        function Complete()
        {
            var Elem="Фамилия: " + document.Sel1.Family.value +
                "\nИмя: " + document.Sel1.Name.value +
                "\nВозраст: " + document.Sel1.Age.value +
                "\nТелефон: " + document.Sel1.Phone.value;
            alert(Elem);
        }
        function CheckAge(age)
        {
            if(age<18)
                return "18";
            else
                return  age;
        }
        //-->
    </script>

<H1>Заполните анкету</H1>
<FORM NAME="Sel1">
    <!-- Анкета -->
    <TABLE>
        <TR><TD><B>Фамилия:<B></TD>
            <TD><INPUT NAME="Family" SIZE=20
                  onBlur="this.value=this.value.toUpperCase()"></TD></TR>
        <TR><TD><B>Имя:<B></TD>
            <TD><INPUT NAME="Name" SIZE=20
                  onBlur="this.value=this.value.toUpperCase()"></TD></TR>
        <TR><TD><B>Возраст:<B></TD>
            <TD><INPUT NAME="Age" SIZE=3 VALUE="18"
                  onBlur="this.value=CheckAge(this.value)"
                  onFocus="this.select()"></TD></TR>
        <TR><TD><B>Телефон:<B></TD>
            <TD><INPUT NAME="Phone" SIZE=10></TD></TR>
    </TABLE>
    <!-- Кнопки готовности и сброса -->
    <INPUT TYPE="button" VALUE="Готово" onClick="Complete();">
    <INPUT TYPE="reset" VALUE="Сброс">
</FORM>



<script>
        <!--
        var OK="Тетя Эльза чувствует себя хорошо.\nЮстас.";
        var Problem="Тетя Эльза заболела.\nЮстас.";
        function getDate()
        {
            var today=new Date();
            return today.toLocaleString()+"\n";
        }
        function CheckRadio(form,value)
        {
            if(value=="Good")
                form.Letter.value=getDate()+OK;
            else
                form.Letter.value=getDate()+Problem;
        }
        //-->
    </script>

<H1>Отправьте телеграмму</H1>
<FORM NAME="Sel2">
    <label><INPUT TYPE="radio" NAME="Code" VALUE="Good"
                  onClick="if(this.checked) CheckRadio(this.form,this.value);"> Явка в норме
    </label>
    <BR>
    <label><INPUT TYPE="radio" NAME="Code" VALUE="Bad"
                  onClick="if(this.checked) CheckRadio(this.form,this.value);"> Явка провалена
    </label>

<p>Для установки курсора в определенное место textarea-области используйте следующую кросбраузерную функцию:</p>
    <TEXTAREA NAME="Letter" ROWS=3 COLS=35>
    </TEXTAREA>
    <INPUT TYPE="button" VALUE="Готово" onClick="alert(document.Sel2.Letter.value);">
    <INPUT TYPE="reset" VALUE="Сброс">
</FORM>


<form>
    <textarea id="textArea">Это тестовая область</textarea>
    <input type="button" onclick="setCaretPosition('textArea', 11);" value="Установить курсор">
</form>
<script>
    function setCaretPosition(o, pos) {
        o=document.getElementById(o);
        if(o.setSelectionRange) {
            o.focus();
            o.setSelectionRange(pos,pos);
        }else if (o.createTextRange) { // IE
            var range = o.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    }

</script>


<script><!--
        function Complete1()
        {
            if(document.Sel3.Pwd.value==document.Sel3.Pwd1.value)
                alert("Вас зарегистрировали\nID="+document.Sel3.Id.value+"\nPassword="+document.Sel3.Pwd.value);
            else
                alert("Ошибка при вводе пароля\nПопробуйте еще раз");
        }
        //-->
    </script>

<H1>Регистрация</H1>
<FORM NAME="Sel3">
    <TABLE>
        <TR><TD><B>Идентификатор:<B></TD>
            <TD><INPUT NAME="Id" SIZE=20
                       onBlur="this.value=this.value.toUpperCase()"></TD></TR>
        <TR><TD><B>Пароль:<B></TD>
            <TD><INPUT TYPE="password" NAME="Pwd" SIZE=20
                       onFocus="this.select();"></TD></TR>
        <TR><TD><B>Проверка пароля:<B></TD>
            <TD><INPUT TYPE="password" NAME="Pwd1" SIZE=20
                       onFocus="this.select();"></TD></TR>
    </TABLE>
    <INPUT TYPE="button" VALUE="Готово" onClick="Complete1();">
    <INPUT TYPE="reset" VALUE="Сброс">
</FORM>


<H1>Как я могу использовать select box как навигационное меню?</H1>
<FORM name="navForm">
<select name="menu"
onChange = "self.location =
  document.navForm.menu[document.navForm.menu.selectedIndex].value;">
<option value="home.html">Home</option>
<option value="links.html">Links</option>
<option value="contact.html">Contact Info</option>
</select>



<H1>Как я могу использовать картинку для кнопки submit?</H1>
<form>
<input type="image" name="cancel" src="cancel.gif" alt="Cancel!" border=0>
<input type="image" name="continue" src="continue.gif"
	alt="Click to Continue" border=0>
</form>



<H1>Передача данных между формами на различных страницах</H1>
<script language="JavaScript">
function nextPage() {
 self.location = "next.html?name=" +
 	escape(document.theForm.userName.value);
 // Use escape() any time there might be spaces or
} // non-alpa characters
</script>

<form onSubmit = "nextPage();return false;">
Enter your name: <input type=text name=userName>
<input type=submit>
</form>



<H1>Как мне получить значение выбранной в данный момент radio button в radio group или группе checkboxes?</H1>
<form name='theForm'>
<input type=radio name="gender" value="Male">Male
<input type=radio name="gender" value="Female">Female
<input type=radio name="gender" value="Evasive">Not Specified
</form>

<p>
приводит к созданию 3-х элементов массива, вызываемых с помощью document.theForm.gender.
Чтобы определить значение выбранной кнопки (или checkbox'а), вам нужно проверить свойство checked каждого из элементов.<br>
Например:
</p>

<script language="JavaScript">
function checkIt() {
 theGroup = document.theForm.gender;
 for (i=0; i< theGroup.length; i++) {
     if (theGroup[i].checked) {
	 alert("The value is " + theGroup[i].value);
	 break;
	 }
     }
}
</script>
<p>
Для получения и установки значения radio button value на javascript можно использовать следующие функции:
</p>

<script language="JavaScript">
function getCheckedValue(radioObj) {
    if(!radioObj)
        return "";
    var radioLength = radioObj.length;
    if(radioLength == undefined)
        if(radioObj.checked)
            return radioObj.value;
        else
            return "";
    for(var i = 0; i < radioLength; i++) {
        if(radioObj[i].checked) {
            return radioObj[i].value;
        }
    }
    return "";
}


function setCheckedValue(radioObj, newValue) {
    if(!radioObj)
        return;
    var radioLength = radioObj.length;
    if(radioLength == undefined) {
        radioObj.checked = (radioObj.value == newValue.toString());
        return;
    }
    for(var i = 0; i < radioLength; i++) {
        radioObj[i].checked = false;
        if(radioObj[i].value == newValue.toString()) {
            radioObj[i].checked = true;
        }
    }
}
</script>


<H1>Как сделать загрузку страницы при выборе флажка?</H1>
<form method=get OnChange='this.submit();'>
  <input type=checkbox name="fnew">Только новые
</form>



<H1>Сохранение данных в локальное хранилище браузера:</H1>
<p>
sessionStorage — запоминает результат пока открыт сайт во вкладке(окне), можно свободно перемещаться по сайту, обновлять страницы,
но не закрывать окно браузера(вкладку).
<br>
localStorage — запоминает результат на очень долгое время, пока пользователь не очистит локальное хранилище браузера.
Можно через несколько дней зайти на сайт и увидеть ранее заполненную форму.
</p>

<style>
#idVhod {
  display: none; /* изначально скрыт */
}
</style>

<button onclick="onclickVhod()">открыть</button> <span id="idVhod">скрытый текст</span>

<script>
var idVhod = document.getElementById('idVhod');

function onclickVhod() {
idVhod.style.display = (idVhod.style.display == 'inline') ? '' : 'inline'
localStorage.setItem('hide', idVhod.style.display); // сохраняем значение в объект hide
}

if(localStorage.getItem('hide') == 'inline') { // если значение объекта hide "inline"
    document.getElementById('idVhod').style.display = 'inline';
}
//localStorage.removeItem('hide') // удалить один элемент
//localStorage.clear() // удалить все элементы

</script>

<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
</body>
</html>