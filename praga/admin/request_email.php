<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Отправка заявки на e-mail</title>
</head>

<body>
<?php
include ("lock.php"); /* Пароль в админскую часть */
$result = mail("test@test","Отправлена заявка","Отправитель заявки $_POST[name] $_POST[lastname].\nКонтактные данные:\nТелефон: $_POST[phone].\nЭлектронная почта: $_POST[email].\nКроме того, возможно связаться по $_POST[mode].\n
Цель заявки: $_POST[aim]; Другая цель: $_POST[otherAim].\nВид недвижимости: $_POST[type]; Другая недвижимость: $_POST[otherType].\nГород, район: $_POST[region]; Другой район: $_POST[otherRegion].\nУлица г.Коряжмы: $_POST[street]; Другая улица: $_POST[otherStreet].\n№ дома в Коряжме: $_POST[house].\nДополнительные характеристики жилья:\nплощадь жилья: $_POST[square] кв.м., $_POST[balcony], материал стен: $_POST[wall], особенности: $_POST[improved], другие особенности: $_POST[otherImproved], этаж: $_POST[floor], ремонт: $_POST[repair].\nЦена: $_POST[price] руб.\nОплата: $_POST[payment]; Варианты оплаты: $_POST[otherPaiment].\nСрок аренды: $_POST[limitation]; Другой срок: $_POST[otherLimitation].\nЧто хотят снимать: $_POST[type1]; как вариант: $_POST[otherType1].\nДополнительные условия для обмена:\n$_POST[extra]");


if ($result == 'true')
{
echo "<p>Письмо успешно отправлено</p>";
}
else
{
echo "<p>Проблемы</p>";
}

?>
<p><a href="../request_block.php">Вернуться назад</a></p>
<p><a href="../index.php">Вернуться на главную страницу</a></p>

</body>
</html>