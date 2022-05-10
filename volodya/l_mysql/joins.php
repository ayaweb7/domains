<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/screen.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />

<title>JOIN-ы</title>
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


<h4>INNER JOIN (CROSS JOIN) - внутреннее (перекрёстное) объединение</h4>
<p>
Этот тип объединения позволяет извлекать строки, которые обязательно присутствуют во всех объединяемых таблицах.
В простейшем случае (без указания условий отбора), выборка вернёт т.н. декартово произведение,
в котором каждая строка одной таблицы будет сопоставлена с каждой строкой другой таблицы:
</p>
<p id="italic">
	SELECT * FROM nomenclature INNER JOIN description;
</p>

<p>
Как правило, декартово произведение таблиц требуется нечасто, чаще требуется выбрать только те записи, которые сопоставлены друг другу.
Сделать это можно, если задать условие отбора, используя ON или USING.
</p>
<p id="italic">
	SELECT * FROM nomenclature INNER JOIN description using(id);
</p>

<p>
Если объединять таблицы через запятую, то нельзя использовать конструкции ON и USING, поэтому условие может быть задано только в конструкции WHERE.
</p>
<p>Например, это может выглядеть так:</p>
<p id="italic">
	SELECT * FROM nomenclature, description WHERE nomenclature.id = description.id;
</p>

<p>
Поскольку поле id не является однозначным, приходится доуточнять в каком контексте оно используется через указание имени таблицы.
</p>
<p>И так, внутреннее объединение можно задать следующими способами:</p>
<p id="italic">
	SELECT * FROM Таблица1, Таблица2[, Таблица3, ...] [WHERE Условие1 [Условие2 ...]</br>
	SELECT * FROM Таблица1 [INNER | CROSS] JOIN Таблица2 [(ON Условие1 [Условие2 ...]) | (USING(Поле))]
</p>

<h4>LEFT JOIN - Левостороннее внешнее объединение</h4>
<p>
Левосторонние объединения позволяют извлекать данные из таблицы, дополняя их по возможности данными из другой таблицы.
</p>
<p>К примеру, чтобы получить полный список наименований товаров вместе с их описанием, нужно выполнить следующий запрос:</p>
<p id="italic">
	SELECT * FROM nomenclature LEFT JOIN description USING(id);
</p>

<p>
Если дополнить предыдущий запрос условием на проверку несуществования описания, то можно получить список записей, которые не имеют пары в таблице описаний:
</p>
<p id="italic">
	SELECT id, name FROM nomenclature LEFT JOIN description USING(id) WHERE description IS NULL;
</p>

<h4>RIGHT JOIN - Правостороннее внешнее объединение</h4>
<p>
во всех случаях использования правосторонних объединений, запрос можно переписать, используя левостороннее объединение,
просто поменяв таблицы местами, и наоборот.
</br>
Следующие два запроса равнозначны:
</p>
<p id="italic">
	SELECT * FROM nomenclature LEFT JOIN description USING(id);</br>
	SELECT * FROM description RIGHT JOIN nomenclature USING(id);
</p>

<h4>Многотабличные запросы</h4>
<p>
MySQL не накладывает ограничений на использование разных типов объединений в одном запросе, поэтому можно формировать довольно сложные конструкции:
</br>
</p>
<p id="italic">
	SELECT * FROM nomenclature AS t1 JOIN nomenclature AS t2 LEFT JOIN nomenclature AS t3 ON t1.id = t3.id AND t2.id = t1.id;
</p>

<h4>Примеры использования многотабличных запросов</h4>
<p id="italic">
	SELECT SQL_CALC_FOUND_ROWS</br>
    dgs.dogovor_id,</br>
    dgs.dogovor_name,</br>
    dgs.abonent_name,</br>
    dgs.abonent_type,</br>
    dgs.address_fiz,</br>
    dgs.date_conclusion,</br>
    dgs.date_annulment,</br>
    dgs.threshold,</br>
    ubc.usum</br>
</br>
FROM</br>
    billing_dogovors dgs</br>
        LEFT JOIN</br>
            billing_users_balance ubc</br>
        ON</br>
            ubc.udate = CURDATE()</br>
                AND</br>
            dgs.dogovor_id = ubc.dogovor_id</br>
    </br>
WHERE</br>
    dgs.dogovor_name LIKE "%123%"</br>
    </br>
ORDER BY</br>
    dgs.dogovor_name ASC</br>
</br>
LIMIT</br>
    0, 58
</p>
<p>
В данном случае идёт выборка первых 58 клиентов из таблицы договоров с привязкой баланса на текущий день,</br>
у которых в имени договора содержится "123" и сортировкой по имени (номеру) договора.</br>
Поскольку список договоров может не совпадать со списком балансов, то используется левостороннее объединение.</br>
Помимо этого используется SQL_CALC_FOUND_ROWS для подсчёта общего количества найденных строк, чтобы организовать страничную навигацию.
</p>

<p id="italic">
SELECT SQL_CALC_FOUND_ROWS</br>
    pft.udate,</br>
    dgs.dogovor_name,</br>
    pft.usum,</br>
    ptt.type_name</br>
    </br>
FROM</br>
    billing_profit pft</br>
        LEFT JOIN</br>
            billing_dogovors dgs</br>
        USING( dogovor_id ) </br>
    </br>
        LEFT JOIN</br>
            billing_profit_types ptt</br>
        ON</br>
            pft.profit_type = ptt.type_id</br>
            </br>
WHERE</br>
    pft.udate > CURDATE() - INTERVAL 7 DAY</br>
</br>
ORDER BY</br>
    pft.udate DESC,</br>
    dgs.dogovor_name ASC</br>
    </br>
LIMIT </br>
    0, 30;	
</p>
<p>
Данный запрос выводит список платежей с указанием типа платежа и номера договора с сортировкой по дате и номеру договора.</br>
Также предусмотрен постраничный вывод списка.
</p>

<p id="italic">
	SELECT SQL_CALC_FOUND_ROWS</br>
    ips.ip,</br>
    ips.segment_id,</br>
    ips.gray_ip,</br>
    ips.ip_mac,</br>
    ips.ip_status,</br>
    ips.ip_type,</br>
    ips.blocked_reason,</br>
    ips.blocked_time,</br>
    ips.comment,</br>
    rts.router_name,</br>
    dgs.dogovor_name,</br>
    ipt.type_name,</br>
    ubc.usum</br>
</br>
FROM</br>
    billing_ips ips</br>
        LEFT JOIN</br>
            billing_routers rts</br>
        ON</br>
            ips.segment_id = rts.router_id</br>
        </br>
        LEFT JOIN</br>
            t</br>
        ON</br>
            ips.ip = t.ip</br>
            </br>
        LEFT JOIN</br>
            billing_ip_types ipt</br>
        ON</br>
            ips.ip_type = ipt.type_id,</br>
        </br>
    billing_dogovors dgs</br>
        LEFT JOIN</br>
            billing_users_balance ubc</br>
        ON</br>
            ubc.udate = CURDATE()</br>
                AND</br>
            dgs.dogovor_id = ubc.dogovor_id</br>
    </br>
WHERE</br>
    INET_NTOA(ips.ip) LIKE "%123%"</br>
        AND</br>
    dgs.dogovor_name LIKE "%123%"</br>
        AND</br>
    dgs.dogovor_id = t.dogovor_id</br>
    </br>
ORDER BY ips.ip ASC</br>
</br>
LIMIT</br>
    0, 80
</p>
<p>
В этом примере используется одно внутреннее объединение для привязки ip-адресов к договорам,
и три внешних левосторонних для получения дополнительной информации.</br>
Несмотря на внушительный размер, запрос выполняется достаточно быстро, поскольку объединения идут по первичным ключам.</br>
Так, как результатом должен быть список из договоров и привязанных к ним ip-адресов, то используется внутреннее объединение.
</p>


<h4>Self Join</h4>
<p>Есть таблица товаров.</p>
<p id="italic">
	CREATE TABLE `ya_goods` (</br>
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,</br>
  `name` varchar(64) NOT NULL,</br>
  PRIMARY KEY (`id`)</br>
) ENGINE=InnoDB DEFAULT CHARSET=utf8;</br>
insert into ya_goods values (1, 'яблоки'), (2, 'яблоки') ,(3, 'груши'), (4,'яблоки'), (5, 'апельсины'), (6, 'груши');
</p>

<p>
Напишите запрос, выбирающий уникальные пары `id` товаров с одинаковыми `name`, например:</br>
(1,2), (4,1), (2,4), (6,3)...</br>
При решении задачи необходимо учесть, что пары (x,y) и (y,x) — одинаковы.
</p>
<p>Решение:</p>
<p id="italic">
	SELECT g1.id id1, g2.id id2</br>
-- CONCAT('(', LEAST(g1.id, g2.id), ',', GREATEST(g1.id, g2.id), ')') row</br>
FROM ya_goods g1</br>
INNER JOIN ya_goods g2 ON g1.name = g2.name</br>
WHERE g1.id <> g2.id</br>
GROUP BY LEAST(g1.id, g2.id), GREATEST(g1.id, g2.id)</br>
ORDER BY g1.id;</br>
 </br>
-- или без группировки (быстрее)</br>
 </br>
SELECT DISTINCT CONCAT('(', LEAST(g1.id, g2.id), ',', GREATEST(g1.id, g2.id), ')') row</br>
FROM ya_goods g1</br>
INNER JOIN ya_goods g2 ON g1.name = g2.name</br>
WHERE g1.id <> g2.id
</p>

<h4>Множественное объединение multi join</h4>
<p>
Пригодится нам, если необходимо выбрать более одного значения из таблиц для нескольких условий.</br>
Пример: набор вариантов (вес, объем) товаров.</br>
Продукты в таблице products,</br>
Варианты - таблица product_options,</br>
Значения вариантов - таблица product2options</br>
Необходимо: фильтровать продукты по дате, и имеющимся вариантам
</p>
<p id="italic">
	CREATE TABLE  `products` (</br>
  `id` int(11),</br>
  `title` varchar(255),</br>
  `created_at` datetime</br>
)</br>
 </br>
CREATE TABLE `product_options` (</br>
  `id` int(11),</br>
  `name` varchar(255)</br>
)</br>
 </br>
CREATE TABLE `product2options` (</br>
  `product_id` int(11),</br>
  `option_id` int(11),</br>
  `value` int(11)</br>
)
</p>
<p>Тестовые данные</p>
<p id="italic">
	INSERT INTO `products` (`id`, `title`, `created_at`) VALUES</br>
        (1, 'Кружка', '2009-01-17 20:00:00'),</br>
        (2, 'Ложка', '2009-01-18 20:00:00'),</br>
        (3, 'Тарелка', '2009-01-19 20:00:00');</br>
 </br>
INSERT INTO `product_options` (`id`, `name`) VALUES</br>
        (11, 'Вес'),</br>
        (12, 'Объем');</br>
 </br>
INSERT INTO `product2options` (`product_id`, `option_id`, `value`) VALUES</br>
        (1, 11, 200),</br>
        (1, 12, 250),</br>
        (2, 11, 35),</br>
        (2, 12, 15),</br>
        (3, 11, 310),</br>
        (3, 12, 300),</br>
        (2, 11, 45),</br>
        (2, 12, 25);
</p>
<p>
	Пример: выбрать товары,</br>
добавленные после 17/01/2009 в следующих вариантах:</br>
- вес=310, объем=300</br>
- вес=35, объем=15</br>
- вес=45, объем=25</br>
- вес=200, объем=250</br>
</br>
Просто перечислить условия вариантов в подзапросе/джоине через OR/AND не сработает,</br>
необходимо осуществить объединение таблиц вариантов равное количеству этих самых вариантов (у нас - 2: объем и вес)
</p>
<p id="italic">
	SELECT p.*, po1.name 'P1', p2o1.value, po2.name 'P2', p2o2.value</br>
 </br>
FROM products p</br>      
 </br>
INNER JOIN product2options p2o1 ON p.id = p2o1.product_id</br>
INNER JOIN product_options po1  ON po1.id = p2o1.option_id</br>
 </br>
INNER JOIN product2options p2o2 ON p.id = p2o2.product_id</br>
INNER JOIN product_options po2  ON po2.id = p2o2.option_id</br>
 </br>
WHERE p.created_at > '2009-01-17 21:00'</br>
  AND ( -- тарелка#3</br>
  p2o1.option_id = 11 AND p2o1.value = 310</br>
  AND p2o2.option_id = 12 AND p2o2.value = 300</br>
  OR  -- ложка#2</br>
  p2o1.option_id = 11 AND p2o1.value = 35</br>
  AND p2o2.option_id = 12 AND p2o2.value = 15</br>         
  OR  -- ложка#2</br>
  p2o1.option_id = 11 AND p2o1.value = 45</br>
  AND p2o2.option_id = 12 AND p2o2.value = 25</br> 
  OR  -- кружка#1 не попадает по дате</br>
  p2o1.option_id = 12 AND p2o1.value = 250</br>
  AND p2o2.option_id = 11 AND p2o2.value = 200</br>
  )</br>
;
</p>
<p></p>
<p id="italic">
	
</p>

<h4>Сложная выборка с помощью JOIN-ов из 3-х таблиц базф данных AGENCY</h4>
<p id="italic">
	SELECT</br>
    shops.id,</br>
    shops.date,</br>
    shops.gruppa,</br>
    shops.name,</br>
    shops.characteristic,</br>
    shops.quantity,</br>
    shops.item,</br>
    shops.price,</br>
    shops.amount,</br>
    store.shop,</br>
    store.street,</br>
    store.house,</br>
    locality.town</br>
</br>
FROM</br>
    shops</br>
        LEFT JOIN</br>
            store</br>
        ON</br>
            shops.id_store = store.id_store</br>
        </br>
        LEFT JOIN</br>
            locality</br>
        ON</br>
            store.id_locality = locality.loc_id</br>
            </br>
	WHERE</br>
    shops.characteristic LIKE "%3%"</br>
        AND</br>
    store.street LIKE "%н%"</br>
    ORDER BY name ASC</br>
</br>
LIMIT</br>
    0, 20
</p>
<p>
Сложная выборка из трех таблиц с внутренним
и двумя внешними левосторонними соединениями для получения дополнительной информации.</br>
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