<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>Внешние ключи</title>
</head>

	<body name="top">
<!-- !!!!!!!!!!!!!!!!!       шаблоны, заготовки для тэгов, комментарии !!!!!!!!!!!!!!! -->

<!-- Абзацы, заголовки, комментарии -->
<h4></h4>
<p>

</br>
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

<table>
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

<h4>Внешние ключи FOREIGN KEY</h4>
<p>
Внешние ключи позволяют установить связи между таблицами.
Внешний ключ устанавливается для столбцов из зависимой, подчиненной таблицы, и указывает на один из столбцов из главной таблицы.
Как правило, внешний ключ указывает на первичный ключ из связанной главной таблицы.
</br>
</p>
<p>Общий синтаксис установки внешнего ключа на уровне таблицы:</p>
<p id="italic">
	[CONSTRAINT имя_ограничения]</br>
	FOREIGN KEY (столбец1, столбец2, ... столбецN)</br>
	REFERENCES главная_таблица (столбец_главной_таблицы1, столбец_главной_таблицы2, ... столбец_главной_таблицыN)</br>
	[ON DELETE действие]</br>
	[ON UPDATE действие]</br>
</p>

<p>
Для создания ограничения внешнего ключа после FOREIGN KEY указывается столбец таблицы, который будет представляет внешний ключ.
А после ключевого слова REFERENCES указывается имя связанной таблицы, а затем в скобках имя связанного столбца, на который будет указывать внешний ключ.
После выражения REFERENCES идут выражения ON DELETE и ON UPDATE, которые задают действие при удалении и обновлении строки из главной таблицы соответственно.
</br>
</p>
<p>Например, определим две таблицы и свяжем их посредством внешнего ключа:</p>
<p id="italic">
	CREATE TABLE Customers</br>
(</br>
    Id INT PRIMARY KEY AUTO_INCREMENT,</br>
    Age INT,</br>
    FirstName VARCHAR(20) NOT NULL,</br>
    LastName VARCHAR(20) NOT NULL,</br>
    Phone VARCHAR(20) NOT NULL UNIQUE</br>
);</br>
</br>
CREATE TABLE Orders</br>
(</br>
    Id INT PRIMARY KEY AUTO_INCREMENT,</br>
    CustomerId INT,</br>
    CreatedAt Date,</br>
    FOREIGN KEY (CustomerId)  REFERENCES Customers (Id)</br>
);
</p>

<p>
В данном случае определены таблицы Customers и Orders.
Customers является главной и представляет клиента. Orders является зависимой и представляет заказ, сделанный клиентом.
Таблица Orders через столбец CustomerId связана с таблицей Customers и ее столбцом Id.
То есть столбец CustomerId является внешним ключом, который указывает на столбец Id из таблицы Customers.
</br>
</p>
<p>С помощью оператора CONSTRAINT можно задать имя для ограничения внешнего ключа:</p>
<p id="italic">
	CREATE TABLE Orders</br>
(</br>
    Id INT PRIMARY KEY AUTO_INCREMENT,</br>
    CustomerId INT,</br>
    CreatedAt Date,</br>
    CONSTRAINT orders_custonmers_fk</br>
    FOREIGN KEY (CustomerId)  REFERENCES Customers (Id)</br>
);
</p>

<h4>ON DELETE и ON UPDATE</h4>
<p>
С помощью выражений ON DELETE и ON UPDATE можно установить действия, которые выполняются соответственно
при удалении и изменении связанной строки из главной таблицы. В качестве действия могут использоваться следующие опции:
</br>
</p>
<ul>
	<li>
		CASCADE: автоматически удаляет или изменяет строки из зависимой таблицы при удалении или изменении связанных строк в главной таблице.
	</li>
	<li>
		SET NULL: при удалении или обновлении связанной строки из главной таблицы устанавливает для столбца внешнего ключа значение NULL.
		(В этом случае столбец внешнего ключа должен поддерживать установку NULL)
	</li>
	<li>
		RESTRICT: отклоняет удаление или изменение строк в главной таблице при наличии связанных строк в зависимой таблице.
	</li>
	<li>
		NO ACTION: то же самое, что и RESTRICT.
	</li>
	<li>
		SET DEFAULT: при удалении связанной строки из главной таблицы устанавливает для столбца внешнего ключа значение по умолчанию,
		которое задается с помощью атрибуты DEFAULT.
		Несмотря на то, что данная опция в принципе доступна, однако движок InnoDB не поддерживает данное выражение.
	</li>
</ul>

<h4>Каскадное удаление</h4>
<p>
Каскадное удаление позволяет при удалении строки из главной таблицы автоматически удалить все связанные строки из зависимой таблицы.
Для этого применяется опция CASCADE:
</br>
</p>
<p id="italic">
	CREATE TABLE Orders</br>
(</br>
    Id INT PRIMARY KEY AUTO_INCREMENT,</br>
    CustomerId INT,</br>
    CreatedAt Date,</br>
    FOREIGN KEY (CustomerId) REFERENCES Customers (Id) ON DELETE CASCADE</br>
);
</p>
<p>
Подобным образом работает и выражение ON UPDATE CASCADE.
При изменении значения первичного ключа автоматически изменится значение связанного с ним внешнего ключа.
Однако поскольку первичные ключи изменяются очень редко, да и с принципе не рекомендуется использовать
в качестве первичных ключей столбцы с изменяемыми значениями, то на практике выражение ON UPDATE используется редко.
</p>

<h4>Установка NULL</h4>
<p>
При установки для внешнего ключа опции SET NULL необходимо, чтобы столбец внешнего ключа допускал значение NULL:
</br>
</p>
<p id="italic">
	CREATE TABLE Orders</br>
(</br>
    Id INT PRIMARY KEY AUTO_INCREMENT,</br>
    CustomerId INT,</br>
    CreatedAt Date,</br>
    FOREIGN KEY (CustomerId) REFERENCES Customers (Id) ON DELETE SET NULL</br>
);
</p>

<h4>SQL внешний ключ при создании таблицы</h4>
<p>
Следующий SQL создает внешний ключ в столбце "PersonID" при создании таблицы "Orders":
</br>
</p>
<p id="italic">
	CREATE TABLE Orders (</br>
    OrderID int NOT NULL,</br>
    OrderNumber int NOT NULL,</br>
    PersonID int,</br>
    PRIMARY KEY (OrderID),</br>
    FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)</br>
);
</p>

<p>
Чтобы разрешить именование ограничения внешнего ключа и для определения ограничения внешнего ключа для нескольких столбцов,
используйте следующий синтаксис SQL:
</br>
</p>
<p id="italic">
	CREATE TABLE Orders (</br>
    OrderID int NOT NULL,</br>
    OrderNumber int NOT NULL,</br>
    PersonID int,</br>
    PRIMARY KEY (OrderID),</br>
    CONSTRAINT FK_PersonOrder FOREIGN KEY (PersonID)</br>
    REFERENCES Persons(PersonID)</br>
);
</p>

<h4>Внешний ключ SQL при изменении таблицы</h4>
<p>
Чтобы создать ограничение внешнего ключа в столбце "PersonID", когда таблица "Orders" уже создана, используйте следующий код SQL:
</br>
</p>
<p id="italic">
	ALTER TABLE Orders</br>
	ADD FOREIGN KEY (PersonID) REFERENCES Persons(PersonID);
</p>

<p>
Чтобы разрешить именование ограничения внешнего ключа и для определения ограничения внешнего ключа для нескольких столбцов,
используйте следующий синтаксис SQL:
</br>
</p>
<p id="italic">
	ALTER TABLE Orders</br>
	ADD CONSTRAINT FK_PersonOrder</br>
	FOREIGN KEY (PersonID) REFERENCES Persons(PersonID);
</p>

<h4>Удалить ограничение внешнего ключа</h4>
<p>
Чтобы удалить ограничение внешнего ключа, используйте следующий SQL:
</br>
</p>
<p id="italic">
	ALTER TABLE Orders</br>
	DROP FOREIGN KEY FK_PersonOrder;
</p>

</br>
</br>

<h4>Как правильно организовать внешние ключи в MySQL?</h4>
<p>
Есть две таблицы..первая таблица эта "Люди",где буду содержатся :
</br>
</p>
<p id="italic">
	CREATE TABLE peoples(</br>
	id_people INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,</br>
	name VARACHAR(15),</br>
	surname VARACHAR(15),</br>
	patronymic VARACHAR(15)</br>
);
</p>

<p>И вторая таблица собственно "Комментарии" этих самых пользователей:</p>
<p id="italic">
	CREATE TABLE comments(</br>
	id_comment INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,</br>
	comment TEXT(),</br>
	...(и как здесь связать?)</br>
);
</p>
<p>
Внешний ключ как предполагается будет id_people соответственно,и хотелось бы понять как лучше всего организовать эту связку.
</br>
Следующий вопрос,как организовать передачу этого самого id_people в таблицу комментарии?
Я так понимаю мы обращаемся к двум таблицам,причем id_people надо как то передать в таблицу с отзывами,и как это сделать?
функциями mysql(что-то типо LAST_INSERT_ID),либо хранимыми процедурами,или еще как.
</p>

<h4>Создание внешнего ключа:</h4>
<p id="italic">
	ALTER TABLE `comments` </br>
    ADD COLUMN `peoples_id` INT(255) NOT NULL AFTER `comment`,</br>
    ADD INDEX `peoples_id_idx` (`peoples_id` ASC);</br>
</br>
ALTER TABLE `comments` </br>
    ADD CONSTRAINT `comments_peoples`</br>
        FOREIGN KEY (`peoples_id_fk`)</br>
        REFERENCES `peoples` (`id_people`)</br>
        ON DELETE NO ACTION</br>
        ON UPDATE NO ACTION;</br>
</p>
<p>
В зависимости от того, что укажете в ON DELETE и ON UPDATE будет меняться поведение базы при попытке удалить запись в
`peoples` или изменить `peoples`.`id_people`.
</p>
<p></p>

<h4>При создании таблицы:</h4>
<p id="italic">
	CREATE TABLE comments(</br>
	id_comment INT(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,</br>
	comment TEXT not null,</br>
	id_people int(8) unsigned not null,</br>
	foreign key(id_people) references peoples(people_id) on update cascade on delete cascade);
</p>

<h4></h4>
<p>

</br>
</p>
<p></p>
<p id="italic">
	
</p>

<h4></h4>
<p>

</br>
</p>
<p></p>
<p id="italic">
	
</p>
<h4></h4>
<p>

</br>
</p>
<p></p>
<p id="italic">
	
</p>

<h4></h4>
<p>

</br>
</p>
<p></p>
<p id="italic">
	
</p>

<h4></h4>
<p>

</br>
</p>
<p></p>
<p id="italic">
	
</p>



		<p align="center">
		<a onclick="javascript: history.back(); return falshe;"><img src="../images/esc2.png" id="send"/></a>
		<a href="#top" title="Наверх"><img src="../images/buttonUpActive.png"/></a>
		</p>
	</body>
</html>