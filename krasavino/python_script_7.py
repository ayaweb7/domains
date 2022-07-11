#!C:/Python310/python

# ----------------------------------------------------
# IMPORT LIBRARIES
# ----------------------------------------------------
#import sys, locale, os, codecs
#import subprocess
import mysql.connector
from mysql.connector import Error

# Pandas
import pandas as pd
import numpy as np

# Vizualization
import seaborn as sns
import matplotlib.pyplot as plt

from datetime import datetime
'''
file_shops = 'shops.csv'
shops = pd.read_csv(file_shops)
shops.tail()
shops.query("shop == 'WildBerries'")
'''

'''
data = None
with open('python_script_7.py', encoding='utf-8') as fh:
    data = fh.read()
with open('python_script_7.py', 'wb') as fh:
    fh.write(data.encode('cp1251'))
'''

'''
print(sys.argv)

import os
from json import JSONDecoder
 
json = os.getenv('JSON')
value = JSONDecoder().decode(json)
print(value)
'''

'''
print(sys.stdout.encoding)
print(sys.stdout.isatty())
print(locale.getpreferredencoding())
print(sys.getfilesystemencoding())
'''

print("<html><head><title>Python meets</title><body>")
print("<h1>Привет из Аш1, Nick в Питоне</h1>".encode('utf8').decode('cp1251'))
#print("<h1>Привет из Аш1, Nick в Питоне</h1>")
#print("<h1>Привет из Аш1, Nick в Питоне</h1>")
#print("<h1>Hello on H1, Nick in Python</h1>")
#print("</body></html>")
# .encode('utf8').decode('cp1251') - GOOD

print("<p>Привет World из Пайтоновского Принта! - python_script_7.py</p>".encode('utf8').decode('cp1251'))
#print("Привет World из Пайтоновского Принта! - python_script_7.py"
#print("Hello World from Python Print!")
#print("<br><br>")

# -*- coding: utf8 -*- # cp1251 # cp866 # -*- coding: utf-8 -*-
'''
print()
print(3+6)
'''


#1. Определим функцию, которая будет подключаться к серверу MySQL и возвращать объект подключения:
def create_connection(host_name, user_name, user_password, db_name):
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password,
            database=db_name
        )
        
        print("Connection to MySQL DB successful:<br>")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection

#2. Чтобы выбрать записи в SQLite, можно снова использовать cursor.execute().
# Однако после этого потребуется вызвать метод курсора fetchall().
# Этот метод возвращает список кортежей, где каждый кортеж сопоставлен с соответствующей строкой в ​​извлеченных записях.

def execute_read_query(connection, query):
    cursor = connection.cursor()
    result = None
    try:
        cursor.execute(query)
#        $pdo->query('SET NAMES cp1251');
#        $rs = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        result = cursor.fetchall()
#        print(str(result))
        return result
    except Error as e:
        print(f"The error '{e}' occurred")
    
connection = create_connection("localhost", "nikart", "arteeva12", "agency")

# [(datetime.date(2021, 6, 18), 'WildBerries', '�������', '�����������, FISKARS'), ...]

#select_shops = "SELECT date, name, shop from shops WHERE shop='WildBerries' LIMIT 5".encode('utf8').decode('cp1251')
#select_shops = "SELECT date, shop, name, characteristic from shops WHERE shop='WildBerries' LIMIT 5"
select_shops = "SELECT * from shops WHERE shop='WildBerries' LIMIT 5"
#SET NAMES cp1251
shops = execute_read_query(connection, select_shops)

''''''
for shop in shops:
#    print(shop[3].encode('utf8').decode('cp1251')+' '+shop[4].encode('utf8').decode('cp1251')+' '+shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print(shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print(shop[9].encode('utf8').decode('cp1251')+'<br>')
    
    print(shop[4].encode('utf8').decode('cp1251'))
    print(shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print('васяR<br>'.encode('utf8').decode('cp1251')) #
#    print("<br>")

#print(shops[0])

'''
for shop in shops:
    for i in range(3):
        print(shop[0].encode('utf8').decode('cp1251'), end=', ')
        print("<br>")
'''

'''
res = cursor.fetchall()
print(str(res))
 
for f in res:
    print(f.decode('utf-8'))
 
db.close()
'''

'''
print(users)
'''



print("</body></html>")
connection.close()

