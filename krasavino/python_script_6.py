#/usr/bin/python3
# -*- coding: utf-8 -*-
#!C:/Python310/python

import mysql.connector
from getpass import getpass
from mysql.connector import connect, Error

# Чтобы установить соединение, используем connect() из модуля mysql.connector.
# Эта функция принимает параметры host, user и password, а возвращает объект MySQLConnection.
'''
try:
    with connect(
        host="localhost",
        user="nikart",
        password="arteeva12",
    ) as connection:
        show_db_query = "SHOW DATABASES"
        with connection.cursor() as cursor:
            cursor.execute(show_db_query)
            for db in cursor:
                print(db)
except Error as e:
    print(e)
'''

try:
    with connect(
        host="localhost",
        user="nikart",
        password="arteeva12",
        database="agency",
    ) as connection:
        show_db_query = "SHOW DATABASES"
        with connection.cursor() as cursor:
            cursor.execute(show_db_query)
            for db in cursor:
                print(db)
except Error as e:
    print(e)

# Приведенный код выведет имена всех баз данных, находящихся на нашем сервере MySQL.
# Команда SHOW DATABASES в нашем примере также вывела базы данных, которые автоматически создаются сервером MySQL
# и предоставляют доступ к метаданным баз данных и настройкам сервера.
'''
try:
    with connect(
        host="localhost",
        user="nikart",
        password="arteeva12",
        database="agency",
    ) as connection:
        print(connection)
except Error as e:
    print(e)
'''
# Предполагая, что у вас уже есть объект MySQLConnection в переменной connection, мы можем распечатать результаты,
# полученные с помощью cursor.fetchall(). Этот метод извлекает все строки из последнего выполненного оператора:
'''
show_table_query = "DESCRIBE shops"
with connection.cursor() as cursor:
    cursor.execute(show_table_query)
    # Fetch rows from last executed query
    result = cursor.fetchall()
    for row in result:
        print(row)
'''        
# После выполнения приведенного кода мы должны получить таблицу, содержащую информацию о столбцах в таблице movies.
# Для каждого столбца выводится информация, о типе данных, является ли столбец первичным ключом и т. д.        


# Чтение записей с помощью оператора SELECT
# Чтобы получить записи, необходимо отправить в cursor.execute() запрос SELECT и вернуть результат с помощью cursor.fetchall():
select_movies_query = "SELECT * FROM shops LIMIT 5"
with connection.cursor() as cursor:
    cursor.execute(select_movies_query)
    result = cursor.fetchall()
    for row in result:
        print(row)

'''
db = pymysql.connect('localhost', 'nikart', 'arteeva12', 'agency')
    cursor = db.cursor()
#    query = "SELECT username, message FROM messages WHERE anon = 1 ORDER BY id DESC LIMIT " + count
    query = "SELECT * from shops LIMIT 5"
    cursor.execute(query)
    result = cursor.fetchall()
    print(result)
    messages = []
    for item in result:
        messages.append(item[0] + ": " + item[1])

    messages = " | ".join(messages).replace("\r\n", "")
    print(messages)
    utils.mess(s, "/w " + name + " " + messages)
    
'''