<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Введение в MySQL</title>
</head>

	<body name="top">
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<!-- Абзацы, заголовки, комментарии -->
<h4></h4>
<p></p>
<p>

</p>
<p></p>
<!-- Это комментарий HTML -->

<?php  ?>

<?php
/* 
Это область
многострочного комментария,
которая не будет
подвергаться интерпретации 
*/
?>

<!-- Шаблон для PHP кода с комментариями внутри кода -->
<h4></h4>
<p>

</br>
</p>
<p></p>
<?php
// 


// 

?>

<table id="inventory" class="realty">
	<tr><th></th><th></th><th></th></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
	<tr><td></td><td></td><td></td></tr>
</table>

<ul>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
	<li>
		
	</li>
</ul>

<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->
<h4>Команды MySQL</h4>
<p>Таблица 8.3. Подборка наиболее востребованных команд MySQL</p>
<table id="inventory" class="realty">
	<tr><th>Команда</th><th>Действие</th></tr>
	<tr><td>ALTER</td><td>Внесение изменений в базу данных или таблицу</td></tr>
	<tr><td>BACKUP</td><td>Создание резервной копии таблицы</td></tr>
	<tr><td>\c</td><td>Отмена ввода</td></tr>
	<tr><td>CREATE</td><td>Создание базы данных</td></tr>
	<tr><td>DELETE</td><td>Удаление строки из таблицы</td></tr>
	<tr><td>DESCRIBE</td><td>Описание столбцов таблиц</td></tr>
	<tr><td>DROP</td><td>Удаление базы данных или таблицы</td></tr>
	<tr><td>EXIT (Ctrl+C)</td><td>Выход</td></tr>
	<tr><td>GRANT</td><td>Изменение привилегий пользователя</td></tr>
	<tr><td>HELP (\h, \?)</td><td>Отображение подсказки</td></tr>
	<tr><td>INSERT</td><td>Вставка данных</td></tr>
	<tr><td>LOCK</td><td>Блокировка таблицы (таблиц)</td></tr>
	<tr><td>QUIT (\q)</td><td>То же самое, что и EXIT</td></tr>
	<tr><td>RENAME</td><td>Переименование таблицы</td></tr>
	<tr><td>SHOW</td><td>Список сведений об объектах</td></tr>
	<tr><td>SOURCE</td><td>Выполнение команд из файла</td></tr>
	<tr><td>STATUS (\s)</td><td>Отображение текущего состояния</td></tr>
	<tr><td>TRUNCATE</td><td>Опустошение таблицы</td></tr>
	<tr><td>UNLOCK</td><td>Снятие блокировки таблицы (таблиц)</td></tr>
	<tr><td>UPDATE</td><td>Обновление существующей записи</td></tr>
	<tr><td>USE</td><td>Использование базы данных</td></tr>
</table>	


<h4>Создание таблицы</h4>
<p>Пример 8.3. Создание таблицы с названием classics<br>
CREATE TABLE classics (<br>
author VARCHAR(128),<br>
title VARCHAR(128),<br>
type VARCHAR(16),<br>
year CHAR(4)) ENGINE MyISAM;</p>


<p id="bold">
Чтобы проверить факт создания новой таблицы, наберите команду:<br>
DESCRIBE classics;
</p>

<h4>Команда DESCRIBE является неоценимым средством отладки, когда нужно убедиться в успешном создании таблицы MySQL.</h4>
<p>
Этой командой можно воспользоваться также для того, чтобы просмотреть имена полей или столбцов таблицы и типы данных в каждом из них.<br>
Рассмотрим подробнее все заголовки:
</p>
<ul>
	<li>Field — имя каждого из полей или столбцов таблицы;</li>
	<li>Type — тип данных, сохраняемых в поле;</li>
	<li>Null — заголовок, который показывает, может ли поле содержать значение NULL;</li>
	<li>Key — MySQL поддерживает ключи, или индексы, позволяющие ускорить просмотр и поиск данных. Под заголовком Key показан тип применяемого ключа (если таковой имеется);</li>
	<li>Default — исходное значение, присваиваемое полю, если при создании новой строки не указано никакого значения;</li>
	<li>Extra — дополнительная информация, например, о настройке поля на автоматическое приращение его значения.</li>
</ul>
<p></p>


<h4>Типы данных DATE и TIME</h4>
<p>Таблица 8.11. Типы данных DATE и TIME, используемые в MySQL</p>
<table id="inventory" class="realty">
	<tr><th>Тип данных</th><th>Формат времени-даты</th></tr>
	<tr><td>DATETIME</td><td>'0000-00-00 00:00:00'</td></tr>
	<tr><td>DATE</td><td>'0000-00-00'</td></tr>
	<tr><td>TIMESTAMP</td><td>'0000-00-00 00:00:00'</td></tr>
	<tr><td>TIME</td><td>'00:00:00'</td></tr>
	<tr><td>YEAR</td><td>0000 (только годы 0000 и 1901–2155)</td></tr>
	</table>

<h4>Тип данных AUTO_INCREMENT</h4>
<p>Пример 8.5. Добавление столбца id с автоприращением</p>
<p>
ALTER TABLE classics ADD id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY;
</p>
<ul>
	<li>
		INT UNSIGNED — делает столбец способным принять целое число, достаточно большое для того, чтобы в таблице могло храниться более 4 млрд записей.
		Доступ к MySQL из командной строки
	</li>
	<li>
		NOT NULL — обеспечивает наличие значения в каждой записи столбца. 
		Многие программисты используют его в поле NULL, чтобы показать отсутствие в нем какого-либо значения.
		Но тогда могут появляться дубликаты, противоречащие самому смыслу существования этого столбца.
		Поэтому появление в нем значения NULL запрещено.
	</li>
	<li>
		AUTO_INCREMENT — заставляет MySQL установить для этого столбца уникальное значение в каждой строке, как было описано ранее.
		Фактически мы не управляем значением, которое будет появляться в каждой строке этого столбца, но это и не нужно:
		все, о чем мы беспокоимся, — гарантия уникальности этого значения.	
	</li>
	<li>
		KEY — столбец с автоприращением полезно использовать в качестве ключа, поскольку вы будете стремиться искать строки на основе значений этого столбца.
		Пояснения будут даны в разделе «Индексы» далее.	
	</li>
	
</ul>

<p>Пример 8.6. Добавление столбца id с автоприращением при создании таблицы</p>

<p>
CREATE TABLE classics (<br>
author VARCHAR(128),<br>
title VARCHAR(128),<br>
type VARCHAR(16),<br>
year CHAR(4),<br>
id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY) ENGINE MyISAM;
</p>

<p>Пример 8.7. Удаление столбца id</p>
<p>ALTER TABLE classics DROP id;</p>


<h4>Добавление данных к таблице</h4>
<p>Пример 8.8. Заполнение таблицы classics</p>
<p>
INSERT INTO classics(author, title, type, year)<br>
VALUES('Mark Twain','The Adventures of Tom Sawyer','Fiction','1876');<br>
INSERT INTO classics(author, title, type, year)<br>
VALUES('Jane Austen','Pride and Prejudice','Fiction','1811');<br>
INSERT INTO classics(author, title, type, year)<br>
VALUES('Charles Darwin','The Origin of Species','Non-Fiction','1856');<br>
INSERT INTO classics(author, title, type, year)<br>
VALUES('Charles Dickens','The Old Curiosity Shop','Fiction','1841');<br>
INSERT INTO classics(author, title, type, year)<br>
VALUES('William Shakespeare','Romeo and Juliet','Play','1594');
</p>
<p>SELECT * FROM classics;</p>


<h4>Переименование таблиц</h4>
<p>ALTER TABLE classics RENAME pre1900;</p>

<h4>Изменение типа данных столбца</h4>
<p>ALTER TABLE classics MODIFY year SMALLINT;</p>

<h4>Добавление нового столбца</h4>
<p>ALTER TABLE classics ADD pages SMALLINT UNSIGNED;</p>

<h4>Переименование столбца</h4>
<p>ALTER TABLE classics CHANGE type category VARCHAR(16);</p>

<h4>Удаление столбца</h4>
<p>ALTER TABLE classics DROP pages;</p>

<h4>Индексы</h4>
<h4>Создание индекса</h4>
<p>Пример 8.10. Добавление индексов к таблице classics</p>

<p>
ALTER TABLE classics ADD INDEX(author(20));<br>
ALTER TABLE classics ADD INDEX(title(20));<br>
ALTER TABLE classics ADD INDEX(category(4));<br>
ALTER TABLE classics ADD INDEX(year);<br>
DESCRIBE classics;
</p>

<p>Использование команды CREATE INDEX</p>
<p>Пример 8.11. Эти две команды эквивалентны</p>
<p>
ALTER TABLE classics ADD INDEX(author(20)); 
CREATE INDEX author ON classics (author(20)); <!-- CREATE INDEX не может использоваться для создания индекса типа первичного ключа — PRIMARY KEY -->
</p>
<p></p>

<h4>Добавление индексов при создании таблиц</h4>
<p>Пример 8.12. Создание таблицы classics с индексами</p>
<p>
CREATE TABLE classics (<br>
author VARCHAR(128),<br>
title VARCHAR(128),<br>
category VARCHAR(16),<br>
year SMALLINT,<br>
INDEX(author(20)),<br>
INDEX(title(20)),<br>
INDEX(category(4)),<br>
INDEX(year)) ENGINE MyISAM;
</p>

<h4>Первичные ключи</h4>
<p>ALTER TABLE classics ADD isbn CHAR(13) PRIMARY KEY;</p>
<p>Пример 8.13. Заполнение столбца isbn данными и использование первичного ключа</p>
<p>
ALTER TABLE classics ADD isbn CHAR(13);<br>
UPDATE classics SET isbn='9781598184891' WHERE year='1876';<br>
UPDATE classics SET isbn='9780582506206' WHERE year='1811';<br>
UPDATE classics SET isbn='9780517123201' WHERE year='1856';<br>
UPDATE classics SET isbn='9780099533474' WHERE year='1841';<br>
UPDATE classics SET isbn='9780192814968' WHERE year='1594';<br>
ALTER TABLE classics ADD PRIMARY KEY(isbn);<br>
DESCRIBE classics;
</p>

<p>Пример 8.14. Создание таблицы classics  C НУЛЯ с первичным ключом</p>
<p>
CREATE TABLE classics (<br>
author VARCHAR(128),<br>
title VARCHAR(128),<br>
category VARCHAR(16),<br>
year SMALLINT,<br>
isbn CHAR(13),<br>
INDEX(author(20)),<br>
INDEX(title(20)),<br>
INDEX(category(4)),<br>
INDEX(year),<br>
PRIMARY KEY (isbn)) ENGINE MyISAM;
</p>


<h4>Создание индекса FULLTEXT</h4>
<p>Рассмотрим некоторые особенности индексов FULLTEXT, о которых нужно знать.</p>
<ul>
	<li>
		Индексы FULLTEXT могут применяться только с таблицами типа MyISAM, использующими исходное ядро (механизм хранения)
		MySQL (MySQL поддерживает как минимум десять различных ядер). Если нужно привести таблицу к типу MyISAM, можно применить команду MySQL:
		ALTER TABLE tablename ENGINE = MyISAM;
	</li>
	<li>
		Индексы FULLTEXT могут создаваться только для столбцов с типами данных CHAR, VARCHAR и TEXT.
	</li>
	<li>
		Определение индекса FULLTEXT может быть дано в инструкции CREATE TABLE при создании таблицы или добавлено позже
		с использованием инструкции ALTER TABLE (или CREATE INDEX).
	</li>
	<li>
		Намного быстрее будет загрузить большие наборы данных в таблицу, не имеющую индекса FULLTEXT,
		а затем создать индекс, чем загружать их в таблицу, у которой уже имеется индекс FULLTEXT.
	</li>
</ul>

<p>Пример 8.15. Добавление индекса FULLTEXT к таблице classics</p>
<p>ALTER TABLE classics ADD FULLTEXT(author,title);</p>

<h4>Создание запросов к базе данных MySQL</h4>
<h4>SELECT</h4>
<p>Пример 8.16. Две разные инструкции SELECT</p>
<p>SELECT что-нибудь FROM имя_таблицы;</p>
<p>SELECT author,title FROM classics;<br>
SELECT title,isbn FROM classics;</p>


<h4>SELECT COUNT</h4>
<p>Пример 8.17. Подсчет количества строк</p><!-- отображает количество строк в таблице -->
<p>SELECT COUNT(*) FROM classics;</p> 
<p></p>

<h4>SELECT DISTINCT</h4>
<p>Пример 8.18. Дублирование данных</p>
<p>
INSERT INTO classics(author, title, category, year, isbn)
VALUES('Charles Dickens','Little Dorrit','Fiction','1857','9780141439969');
</p>

<p>Пример 8.19. Команда SELECT со спецификатором DISTINCT и без него</p>
<p>
SELECT author FROM classics;<br>
SELECT DISTINCT author FROM classics;<!-- позволяет исключать множество записей, имеющих одинаковые данные. -->
</p>

<h4>DELETE</h4>
<p>Пример 8.20. Удаление новой записи</p>
<p>DELETE FROM classics WHERE title='Little Dorrit';</p>
<p></p>

<h4>WHERE, LIKE</h4>
<p>Пример 8.21. Использование ключевого слова WHERE</p>
<p>
SELECT author,title FROM classics WHERE author="Mark Twain";<br>
SELECT author,title FROM classics WHERE isbn="9781598184891 ";
</p>

<p>
можно также осуществлять проверку на соответствие шаблону, для чего применяется спецификатор LIKE, позволяющий вести поиск в разных частях строк.<br>
Этот спецификатор должен использоваться с символом % до или после некоторого текста.<br>
Если его поместить до текста, это будет означать «что-нибудь до», а если после текста — «что-нибудь после».
</p>
<p>Пример 8.22. Использование спецификатора LIKE</p>
<p>
SELECT author,title FROM classics WHERE author LIKE "Charles%";<br>
SELECT author,title FROM classics WHERE title LIKE "%Species";<br>
SELECT author,title FROM classics WHERE title LIKE "%and%";
</p>

<h4>LIMIT</h4>
<p>Спецификатор LIMIT позволяет выбрать количество выводимых в запросе строк и место, с которого таблица начнет их возвращать.</p>
<p>
Первая возвращает первые три строки из таблицы.<br>
Вторая возвращает две строки, начиная с позиции 1 (пропуская первую строку).<br>
А последняя возвращает одну строку, начинающуюся с позиции 3 (пропуская первые три строки).
</p>
<p>Пример 8.23. Ограничение количества возвращаемых результатов</p>
<p>
SELECT author,title FROM classics LIMIT 3;<br><!-- возвращает первые три строки из таблицы -->
SELECT author,title FROM classics LIMIT 1,2;<br><!-- возвращает две строки, начиная с позиции 1 (пропуская первую строку) -->
SELECT author,title FROM classics LIMIT 3,1;<!-- возвращает одну строку, начинающуюся с позиции 3 (пропуская первые три строки) -->
</p>



<h4>MATCH...AGAINST</h4>
<p>
Конструкция MATCH...AGAINST может быть применена к столбцу, для которого был создан индекс FULLTEXT<br>
позволяет вводить в поисковый запрос несколько слов и проверять на их наличие все слова в столбцах, имеющих индекс FULLTEXT.
</p>
<p>Пример 8.24. Использование конструкции MATCH...AGAINST с индексами FULLTEXT</p>
<p>
SELECT author,title FROM classics<br>
WHERE MATCH(author,title) AGAINST('and');<br>
SELECT author,title FROM classics<br>
WHERE MATCH(author,title) AGAINST('old shop');<br>
SELECT author,title FROM classics<br>
WHERE MATCH(author,title) AGAINST('tom sawyer');
</p>
<p></p>


<h4>MATCH...AGAINST...IN BOOLEAN MODE</h4>
<p>
Первый запрос требует вернуть все строки, в которых содержится слово charles и нет слова species.<br>
Во втором запросе используются двойные кавычки, чтобы потребовать вернуть все строки, включающие в себя фразу origin of.
</p>
<p>Пример 8.25. Использование MATCH...AGAINST...IN BOOLEAN MODE</p>
<p>
SELECT author,title FROM classics<br>
WHERE MATCH(author,title)<br>
AGAINST('+charles -species' IN BOOLEAN MODE);<br><!-- требует вернуть все строки, в которых содержится слово charles и нет слова species. -->
SELECT author,title FROM classics<br>
WHERE MATCH(author,title)<br>
AGAINST('"origin of"' IN BOOLEAN MODE);<!-- двойные кавычки, чтобы потребовать вернуть все строки, включающие в себя фразу origin of -->
</p>


<h4>UPDATE...SET</h4>
<p>Пример 8.26. Использование UPDATE...SET</p>
<p>Эта конструкция позволяет обновлять содержимое поля.</p>
<p>
UPDATE classics SET author='Mark Twain (Samuel Langhorne Clemens)'<br>
WHERE author='Mark Twain';<br>
UPDATE classics SET category='Classic Fiction'<br>
WHERE category='Fiction';
</p>


<h4>ORDER BY</h4>
<p>позволяет отсортировать возвращаемые результаты по одному или нескольким столбцам в возрастающем или в убывающем порядке.</p>
<p>Использование ORDER BY</p>
SELECT author,title FROM classics ORDER BY author;<br>
SELECT author,title FROM classics ORDER BY title DESC;
<p>Если нужно отсортировать все столбцы по авторам, а затем в убывающем порядке по году издания (чтобы сначала стояли самые последние),
нужно ввести следующий запрос:</p>
<p>SELECT author,title,year FROM classics ORDER BY author,year DESC;</p>


<h4>GROUP BY</h4>
<p>SELECT category,COUNT(author) FROM classics GROUP BY category;</p>


<h4>Объединение таблиц</h4>
<p>Пример 8.28. Создание и заполнение таблицы customers</p>
CREATE TABLE customers (<br>
name VARCHAR(128),<br>
isbn VARCHAR(13),<br>
PRIMARY KEY (isbn)) ENGINE MyISAM;<br>
INSERT INTO customers(name,isbn)<br>
VALUES('Joe Bloggs','9780099533474');<br>
INSERT INTO customers(name,isbn)<br>
VALUES('Mary Smith','9780582506206');<br>
INSERT INTO customers(name,isbn)<br>
VALUES('Jack Wilson','9780517123201');<br>
SELECT * FROM customers;

<p>Пример 8.29. Объединение двух таблиц в одном запросе SELECT</p>
<p>
SELECT name,author,title FROM customers,classics WHERE customers.isbn=classics.isbn;
</p>


<h4>NATURAL JOIN</h4>
<p>Для получения тех же результатов, что и в примере 8.29, можно ввести следующий запрос:</p>
<p>SELECT name,author,title FROM customers NATURAL JOIN classics;</p>


<h4>JOIN...ON</h4>
<p>
Если нужно указать столбец, по которому следует объединить две таблицы, используется конструкция JOIN...ON,
благодаря которой можно получить те же результаты, что и в примере 8.29:
</p>
<p>
SELECT name,author,title FROM customers JOIN classics ON customers.isbn=classics.isbn;
</p>

<h4>Использование ключевого слова AS</h4>
<p>Следующий код идентичен по своей работе коду, приведенному в примере 8.29:</p>
<p>SELECT name,author,title FROM customers AS cust, classics AS class WHERE cust.isbn=class.isbn;</p>
<p></p>

<h4>Использование логических операторов</h4>
<p>Пример 8.30. Использование логических операторов</p>
<p>
SELECT author,title FROM classics WHERE<br>
author LIKE "Charles%" AND author LIKE "%Darwin";<br>
SELECT author,title FROM classics WHERE<br>
author LIKE "%Mark Twain%" OR author LIKE "%Samuel Langhorne Clemens%";<br>
SELECT author,title FROM classics WHERE<br>
author LIKE "Charles%" AND author NOT LIKE "%Darwin";
</p>
<p></p>


<h4>Из ответов</h4>
<p>Для просмотра доступных баз данных следует набрать команду</p>
<p id="bold">SHOW databases.</p>
<p>Для просмотра таблиц, использующихся в базе данных, нужно набрать команду</p>
<p id="bold">SHOW tables.</p>
<p>(Команды нечувствительны к регистру букв.)</p>

<p>Для создания нового пользователя используется команда GRANT:</p>
<p id="bold">GRANT PRIVILEGES ON newdatabase.* TO 'newuser'@'localhost' IDENTIFIED BY 'newpassword';</p>

<h4>Индексы</h4>
<h4>Создание индекса для таблицы shops</h4>
<p>Добавление индексов к таблице shops</p>
<p>
ALTER TABLE shops ADD INDEX(date, gruppa);<br>
DESCRIBE shops;
</p>



<p>CREATE INDEX index_name ON table(column1, column2, ...)</p>
<p>

</p>
<p></p>


<h4>Добавление индексов</h4>
<p>Существует четыре типа предложений, добавляющих индексы в таблицу:</p>
<p id='italic'>
ALTER TABLE shops ADD PRIMARY KEY (список_столбцов);<br>
ALTER TABLE shops ADD UNIQUE имя_индекса (список_столбцов);<br>
ALTER TABLE shops ADD INDEX имя_индекса (список_столбцов);<br>
ALTER TABLE shops ADD FULLTEXT имя_индекса (список_столбцов);
</p>
<p>
Первое предложение добавляет первичный ключ (PRIMARY KEY), то есть индексированные значения должны быть уникальными и не содержать NULL.<br>
Второе предложение создает индекс, для которого значения должны быть уникальными (за исключением значений NULL, которые могут встречаться многократно).<br>
Третье предложение добавляет обычный индекс, в котором любое значение может появляться несколько раз.
Последнее же создает специальный индекс FULLTEXT, который используется для просмотра текста.<br>
<br>
Если в конструкциях предложений есть имя_индекса, то оно не является обязательным.
</p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>


<h4></h4>
<p></p>
<p>

</p>
<p></p>





		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>