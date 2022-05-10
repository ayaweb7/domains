<?php
// Пароль в админскую часть
include ("lock.php");
// Соединяемся с базой данных
require_once 'blocks/date_base.php';
// Подключаем HEADER
include ("blocks/header_adm.php");
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Обработка</title>
	<link rel="stylesheet" href="css/admin.css">
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico" />
</head>

<body>
<?php
if (isset($_GET['id'])) {$id=$_GET['id'];}

if (isset($_POST['name'])) {$name = $_POST['name'];}
if (isset($_POST['tel'])) {$tel = $_POST['tel'];}
if (isset($_POST['email'])) {$email = $_POST['email'];}
if (isset($_POST['mess'])) {$mess = $_POST['mess'];}
if (isset($_POST['start_time'])) {$start_time = $_POST['start_time'];}
if (isset($_POST['send_time'])) {$send_time = $_POST['send_time'];}
if (isset($_POST['unix_time'])) {$unix_time = $_POST['unix_time'];}
if (isset($_POST['id_client'])) {$id_client = $_POST['id_client'];}
if (isset($_POST['ip'])) {$ip = $_POST['ip'];}
if (isset($_POST['hostname'])) {$hostname = $_POST['hostname'];}
if (isset($_POST['city'])) {$city = $_POST['city'];}
if (isset($_POST['region'])) {$region = $_POST['region'];}
if (isset($_POST['location'])) {$location = $_POST['location'];}
if (isset($_POST['brauser'])) {$brauser = $_POST['brauser'];}
if (isset($_POST['version'])) {$version = $_POST['version'];}
if (isset($_POST['os'])) {$os = $_POST['os'];}
if (isset($_POST['work_time'])) {$work_time = $_POST['work_time'];}
if (isset($_POST['working'])) {$working = $_POST['working'];}
if (isset($_POST['effect'])) {$effect = $_POST['effect'];}
if (isset($_POST['amount'])) {$amount = $_POST['amount'];}

$result = mysqli_query($db, "SELECT * FROM application WHERE id='$id'");
$myrow = mysqli_fetch_array($result);
?>

<form action="mysql_bid_update.php" method="post">
	<table cellspacing="0" cellpadding="1" width="50%" class="tableborder">
	<caption>
		<h1 style="text-align: center; font-size: 2em; color: #00843e; font-weight: bold; padding-bottom: 2%;">FORMS</h1>
		<p><em><?php echo $myrow['id'] ?></em> Имя: <em><?php echo $myrow['name'] ?></em> Телефон: <em><?php echo $myrow['tel'] ?></em> E-mail: <em><?php echo $myrow['email'] ?></em></p>
	</caption>
        <tr>
			<td valign="top" width="100%">
				<table width="100%" cellpadding="3">
<!-- WORK_TIME -->
					<tr>
						<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Дата: </span><br>
							<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
							<input type="text" id="work_time" name="work_time" size="15" action="javascript:date_time()"/>
						</td>
<!-- WORKING -->                                
						<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Наши действия: </span><br>
							<span style="font-size: 1em; font-style: italic;">изменить на</span><br>
							<textarea name="working" rows="5" cols="50"><?php echo $myrow['working'] ?></textarea>
						</td>
<!-- EFFECT -->                              
						<td colspan="2" valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Эффект: </span><br>
							<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
							<textarea name="effect" rows="5" cols="50"><?php echo $myrow['effect'] ?></textarea>
						</td>
<!-- AMOUNT -->
						<td valign="top"><span style="font-size: 1.2em; font-style: italic; color: #D01E1E;">Стоимость: </span><br>
							<span style="font-size: 1em; font-style: italic;">изменить на</span><br>									
							<input type="text" name="amount" size="10" value="<?php echo $myrow['amount'] ?>" style="text-align: center;"/>
						</td>
					</tr>
					<tr><td><input name="id" type="hidden" value="<?php echo $myrow['id'] ?>"/></td></tr>
				</table>

<input class="inputbuttonflat" type="submit" name="set_filter" value="Отправить данные" style="margin-left:20px;"/>
<input type="reset" name="set_filter" value="Сбросить"/>

			</td>
		</tr>
	</table>

</form>

<script>
// ЭТО ФУНКЦИИ ВВОДА ДАТЫ    
    /* функция добавления ведущих нулей */
    /* (если число меньше десяти, перед числом добавляем ноль) */
    function zero_first_format(value)
    {
        if (value < 10)
        {
            value='0'+value;
        }
        return value;
    }

    /* функция получения текущей даты и времени */
    function date_time()
    {
        var current_datetime = new Date();
        var day = zero_first_format(current_datetime.getDate());
        var month = zero_first_format(current_datetime.getMonth()+1);
        var year = current_datetime.getFullYear();
        var hours = zero_first_format(current_datetime.getHours());
        var minutes = zero_first_format(current_datetime.getMinutes());
        var seconds = zero_first_format(current_datetime.getSeconds());

        return year+"-"+month+"-"+day+" "+hours+":"+minutes+":"+seconds;
    }

	setInterval(function () {
        document.getElementById('work_time').value = date_time();
    }, 1000);

</script>

<a class="thank-you-page__button" href="/">Вернуться на главную</a>

</body>

</html>