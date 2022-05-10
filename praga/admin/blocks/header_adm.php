<!-- praga -->

<div id="header">
        
    		<ul id="nav">
                
                <li class="first"><a class="index_admLink" href="index_adm.php" title="На главную"><em>Главная</em></a></li>
                
                <!-- <li><a class="index_admLink" href="../index.php" title="На главную Праги">Главная<em> Прага</em></a></li>
                 -->
    			<li>
                    <a class="indexLink realtyLink rentingLink valuation1Link" href="#" title="Вся недвижимость">Вся <em>недвижимость</em></a>
                    <ul>
                        <li><a class="sectionLink" href="section.php" title="Секции"><em>Секции</em></a></li>
                        <li><a class="gostinkiLink" href="gostinki.php" title="Гостинки"><em>Гостинки</em></a></li>
                        <li><a class="flat1Link" href="flat_1.php" title="1-комнатные">1-<em>комнатные</em></a></li>
                        <li><a class="flat2Link" href="flat_2.php" title="2-х комнатные">2-х <em>комнатные</em></a></li>
                        <li><a class="flat3Link" href="flat_3.php" title="3-х комнатные">3-х <em>комнатные</em></a></li>
                        <li><a class="flat4Link" href="flat_4.php" title="4-х комнатные">4-х <em>комнатные</em></a></li>
                        <li><a class="housesdLink" href="houses.php" title="Дома, дачи, участки"><em>Загородная</em></a></li>
                        <li><a class="othersLink" href="others.php" title="Гаражи"><em>Гаражи</em></a></li>
                        <li><a class="commercialLink" href="commercial.php" title="Коммерческая"><em>Коммерческая</em></a></li>
                    </ul>
     <!--             
    			<li>
                    <a class="othersLink" href="#" title="База квартир">База <em>квартир</em></a>
                    <ul>
                        <li><a class="realty1Link" href="firm_insert.php" title="Добавление">Новое <em>поле</em></a></li>
                        <li><a class="realty1Link" href="firm_update.php" title="Редактирование">Редактирование <em>данных</em></a></li>
                        <li><a class="realty1Link" href="firm_drop.php" title="Удаление">Удаление <em>квартиры</em></a></li>
                    </ul>
                </li>
    			
                <li>
                    <a class="othersLink" href="#" title="Страницы">Страницы <em>сайта</em></a>
                    <ul>
                        <li><a class="realty1Link" href="settings_insert.php" title="Добавление">Новая <em>страница</em></a></li>
                        <li><a class="realty1Link" href="settings_update.php" title="Редактирование">Редактирование <em>записей</em></a></li>
                        <li><a class="realty1Link" href="#" title="Удаление">Удаление <em>данных</em></a></li>
                    </ul>
                </li>
                
                <li>
                    <a class="othersLink" href="#" title="База домов">База <em>домов</em></a>
                    <ul>
                        <li><a class="realty1Link" href="house_insert.php" title="Добавление">Новый <em>дом</em></a></li>
                        <li><a class="realty1Link" href="house_update.php" title="Редактирование">Редактирование <em>данных</em></a></li>
                        <li><a class="realty1Link" href="house_drop.php" title="Удаление">Удаление <em>дома</em></a></li>
                    </ul>
                </li>
                
                <li>
                    <a class="othersLink" href="#" title="Агентства недвижимости">Агентства <em>недвижимости</em></a>
                    <ul>
                        <li><a class="realty1Link" href="#" title="Добавление">Новое <em>агентство</em></a></li>
                        <li><a class="realty1Link" href="agency_update.php" title="Редактирование">Изменение <em>данных</em></a></li>
                        <li><a class="realty1Link" href="#" title="Удаление">Удаление <em>агентства</em></a></li>
                    </ul>
                </li>
                
                <li>
                    <a class="othersLink" href="#" title="Частные объявления">Частные <em>объявления</em></a>
                    <ul>
                        <li><a class="realty1Link" href="ads_insert.php" title="Добавление">Новое <em>объявление</em></a></li>
                        <li><a class="realty1Link" href="ads_update.php" title="Редактирование">Изменение <em>объявления</em></a></li>
                        <li><a class="realty1Link" href="ads_drop.php" title="Удаление">Удаление <em>объявления</em></a></li>
                        <li><a class="realty1Link" href="files_insert.php" title="Добавить файл">Добавить <em>файл</em></a></li>
                        <li><a class="realty1Link" href="files_update.php" title="Изменить документ">Редактировать <em>документ</em></a></li>
                        <li><a class="realty1Link" href="files_drop.php" title="Удалить документ">Удалить <em>документ</em></a></li>
                    </ul>
                </li>
 -->                
                <li><a class="othersLink" href="#" title="Объявления агентств">Недвижимость<em> Агентств</em></a>
                    <ul>
                        
<?php
include ("date_base.php"); /* Соединяемся с базой данных */
mysql_query('SET NAMES utf8');
$result = mysql_query("SELECT id,title FROM agency ORDER BY title", $db);
$myrow = mysql_fetch_array($result);
                    
do {
printf  ("<li><a href='realty_an.php?id=%s'><em>%s</em></a>
          </li>  ", $myrow['id'],$myrow['title']);

}
while ($myrow = mysql_fetch_array($result));
?>              
                    </ul>
                </li>
                <li><a href="short.php" class="menulink">Агентства недвижимости</a></li>
                
                </li>
            </ul> <!-- nav -->
               	 
    </div> <!-- header -->
