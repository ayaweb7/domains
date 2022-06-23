<html>
<head>
<title>CDN Статистика системы запросов трафика </title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<mce:style type="text/css"><!--
.style1 {
       font-size: 16px;
       font-weight: bold;
}
--></mce:style><style type="text/css" mce_bogus="1">.style1 {
       font-size: 16px;
       font-weight: bold;
}</style>
</head>
 
<body>
<form name="form1" method="post" action="result.php"> <!--Типы разных графиков -    jpgrath_code_shops1.php-->
  <p align="center" class="style1"> CDN Статистика системы запросов трафика </p>
  <table width="300" border="1" align="center" cellpadding="3" cellspacing="3">
    <tr>
      <td width="85"><strong> Год запроса </strong></td>
<td width="188"><select name="acct_yr" id="acct_yr">
  <option value="2020" selected>2020</option>
        <option value="2021">2021</option>
      </select></td>
    </tr>
    <tr>
      <td><strong> Начальный месяц </strong></td>
      <td><select name="start_mth" id="start_mth">
        <option selected>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
<option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
 
      </select></td>
    </tr>
    <tr>
      <td><strong> Конец месяца </strong></td>
      <td><select name="end_mth" id="end_mth">
        <option >01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
<option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option selected >12</option>
        </select></td>
    </tr>
    <tr>
      <td><strong> Категория диаграммы </strong></td>
      <td><select name="graph" id="graph">
        <option value="1" selected> Линейный график </option>
        <option value="2"> Гистограмма </option>
        <option value="3"> Круговая диаграмма </option>
        <option value="4">3D Круговая диаграмма </option>
      </select></td>
    </tr>
  </table>
  <p align="center">
    <input type="submit" value="Submit">
    <input type="reset" name="Submit2" value="Reset">
  </p>
</form>
</body>
</html>