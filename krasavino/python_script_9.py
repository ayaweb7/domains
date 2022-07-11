#!C:/Python310/python
# ----------------------------------------------------
# IMPORT LIBRARIES
# ----------------------------------------------------
#import sys, locale, os, codecs
#import subprocess
#import sys, json
#import mysql.connector
#from mysql.connector import Error

# Pandas
import pandas as pd
import numpy as np

# Vizualization
import seaborn as sns
import matplotlib.pyplot as plt


from datetime import datetime
import datetime

'''
print("<html><head><title>Python meets</title><body>")
print("<h1>Привет из Аш1, Nick в Питоне</h1>".encode('utf8').decode('cp1251'))

print("<p>Привет World из Пайтоновского Принта! - python_script_9.py</p>".encode('utf8').decode('cp1251'))
#print("<br><br>")

# -*- coding: utf8 -*- # cp1251 # cp866 # -*- coding: utf-8 -*-
'''

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
print(shops[3][4].encode('utf8').decode('cp1251')+' '+shops[3][5].encode('utf8').decode('cp1251'))
print('<br><br>')

print('ID:'+'<br>')
print('----------------'+'<br>')
for row in shops:
    print(row[0])

print('<br><br>')
print('Date:'+'<br>')
print('----------------'+'<br>')
for row in shops[:3]:
    print(row[1])

print('<br><br>')
print('Table:'+'<br>')
print('----------------'+'<br>')
for row in shops:
    print(row[:2])
'''

'''



print('<br><br>')
df = pd.read_csv('shops.csv')
print(df.head(5))

print('<br><br>')
print(df.columns)

print('<br><br>')


print('<br><br>')
print(df.name[3].encode('utf8').decode('cp1251')) #

print('<br><br>')
for i in range(3):
    print(df.name[i].encode('utf8').decode('cp1251'))
    print(df.characteristic[i].encode('utf8').decode('cp1251')+'<br>')

print('<br><br>')
print(f"Сегодня день: {datetime.date.today().day}".encode('utf8').decode('cp1251'))
'''


'''
for shop in shops:
#    print(shop[3].encode('utf8').decode('cp1251')+' '+shop[4].encode('utf8').decode('cp1251')+' '+shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print(shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print(shop[9].encode('utf8').decode('cp1251')+'<br>')
    
    print(shop[4].encode('utf8').decode('cp1251'))
    print(shop[5].encode('utf8').decode('cp1251')+'<br>')
#    print('васяR<br>'.encode('utf8').decode('cp1251')) #
#    print("<br>")
'''
#print(sys.argv[1].encode('utf8').decode('cp1251'))
#print(sys.argv[2].encode('utf8').decode('cp1251'))

#print(shops[0])

#Теперь дозапишем в этот файл еще одну строку:
'''
with open("hello.txt", "a") as file:
    file.write("\nгуд бай мир")
'''

'''
with open("hello.txt", "r") as file:
    for line in file:
        print(line.encode('utf8').decode('cp1251'), end="")
'''

'''
#Теперь явным образом вызовем метод readline() для чтения отдельных строк:
with open("hello.txt", "r") as file:
    str1 = file.readline()
    print(str1) #, end=""
    str2 = file.readline()
    print(str2.encode('utf8').decode('cp1251'))
'''

'''
#Метод readline можно использовать для построчного считывания файла в цикле while:
with open("shops.sql", "r") as file:
    line = file.readline()
    while line:
        print(line.encode('utf8').decode('cp1251'), end='') #
        line = file.readline()
'''

'''
#И также применим метод readlines() для считывания всего файла в список строк:
with open("hello.txt", "r") as file:
    contents = file.readlines()
#    str1 = contents[0]
    str2 = contents[1].encode('utf8').decode('cp1251')
#    print(str1, end="")
    print(str2)
'''

'''
#При чтении файла мы можем столкнуться с тем, что его кодировка не совпадает с ASCII. В этом случае мы явным образом можем указать кодировку с помощью параметра encoding:
filename = "hello.txt"
with open(filename, encoding="utf8") as file:
    text = file.read()
'''

'''
# Read the sql file
query = open('shops.sql', 'r')
# connection == the connection to your database, in your case prob_db
shops_sql = pd.read_sql_query(query.read(),connection)
query.close()
print("<p>Выполнение файла из query = open('shops.sql', 'r')! - python_script_9.py</p>".encode('utf8').decode('cp1251'))
shops_sql.head()
'''

'''
# Построчное чтение файла
with open("D:/father/Учебная/Python_files/students.py", "r") as inf:
    for line in inf:
        line=line.strip()
#        line=line
        print(line)
'''

'''
# Load the data that PHP sent us
try:
    data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

# Generate some data to send to PHP
result = {'status': 'Yes!'}

# Send it to stdout (to PHP)
print json.dumps(result)
'''

'''
try:
    data = json.loads(sys.argv[1])
    print json.dumps({'status': 'Yes!'})
except Exception as e:
    print str(e)
'''

''''''
# --------------------------------------------
# Plots For Shops & Store
# --------------------------------------------
# Downloads files
file_shops = 'shops.csv'
file_store = 'store.csv'

# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION SHOPS          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция считывает файл, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def shops_report(file_path):
    df = pd.read_csv(file_path)
    df = df \
    .iloc[:, [0, 1, 2, 3, 4, 6, 8, 9]]
    
    df['month'] = df['date'].apply(lambda x: x.split('-')[1])
    df['month_number'] = df['date'].apply(lambda x: x.split('-')[1]).astype(str).astype(int) 
    df['year'] = df['date'].apply(lambda x: x.split('-')[0]).astype(str).astype(int)    
    
    return df

# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION STORE          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция считывает файл, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def store_report(file_path):
    df = pd.read_csv(file_path)
    df = df \
    .iloc[:, [1, 5]]
    
    return df

# $$$$$$$$$$$$$$$$$$$$$$$$$$$$          FUNCTION MERGE          $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
# Функция объединяет таблицы, переименовывает колонки, считает суммы, сохраняет результат в новый файл.
def merge_report(tab1, tab2):
    df = pd.merge(tab1, tab2, left_on ='shop', right_on = 'shop', how='left')

    columns_titles = ['id', 'gruppa', 'name', 'quantity', 'price', 'amount', 'shop', 'town', 'date', 'month_number', 'month', 'year']
    df=df.reindex(columns=columns_titles)

    return df

shops = shops_report(file_shops)
store = store_report(file_store)
all_shops = merge_report(shops, store)

# Функция для преобразования месяцев из числа от 1 до 12 в название месяца на русском языке
look_up = {'01': 'Январь', '02': 'Февраль', '03': 'Март', '04': 'Апрель', '05': 'Май', '06': 'Июнь',
           '07': 'Июль', '08': 'Август', '09': 'Сентябрь', '10': 'Октябрь', '11': 'Ноябрь', '12': 'Декабрь'}

all_shops['month_name'] = all_shops['month'].apply(lambda x: look_up[x])

# TABLE_1: Количество покупок по группам
purchashes_count = all_shops.groupby(['gruppa'], as_index=False) \
    .agg({'amount': 'count'}) \
    .rename(columns={'amount': 'count_purchashes'}) \
    .sort_values('count_purchashes', ascending = False)

# TABLE_2: Денежные затраты по группам
purchashes_sum = all_shops.groupby(['gruppa'], as_index=False) \
    .agg({'amount': 'sum'}) \
    .rename(columns={'amount': 'sum_purchashes'}) \
    .sort_values('sum_purchashes', ascending = False)

# TABLE_3: Количество популярных покупок по месяцам
lovely_name = all_shops.groupby(['month','name'], as_index=False) \
    .agg({'amount': 'sum'}) \
    .rename(columns={'quantity': 'name_count'})

# TABLE_4: Количество показов рекламы ПО ПОПУЛЯРНЫМ ЗАПРОСАМ
lovely_name_count = all_shops.groupby(['month', 'name'], as_index=False) \
    .agg({'amount': 'count'}) \
    .sort_values('amount', ascending=False) \
    .groupby('month') \
    .head(1) \
    .rename(columns={'name': 'popular_name'})

# 
# --------------------------------------------
# Plot_1
# --------------------------------------------
# Графики распределения покупок по категориям товаров
fig, ax = plt.subplots(1, 2, figsize=(15, 10))


sns.barplot(x='gruppa', 
            y='count_purchashes', 
            data=purchashes_count,
            ax = ax[0])
sns.barplot(x='gruppa', 
            y='sum_purchashes', 
            data=purchashes_sum,
            ax = ax[1])
#  Заголовок области Figure:
fig.suptitle('Распределение покупок по категориям',
#             y = 1,
             fontsize = 20)

ax[0].set_xticklabels(purchashes_count.gruppa,
                  fontsize = 12, # horizontal
                   color = 'b',    #  Цвет текста
                   rotation = 50,    #  Поворот текста
                   ha='right')    #  Вертикальное выравнивание
ax[1].set_xticklabels(purchashes_sum.gruppa,
                  fontsize = 12, # horizontal
                   color = 'b',    #  Цвет текста
                   rotation = 50,    #  Поворот текста
                   ha='right')    #  Вертикальное выравнивание

#  Заголовки областей Axes:
ax[0].set_title('Количество покупок', fontsize=12)
ax[1].set_title('Денежные затраты', fontsize=12)

# Заголовки осей:
ax[0].set_xlabel('Категории товаров', fontsize=12)
ax[0].set_ylabel('Количество покупок, шт.', fontsize=12)
ax[1].set_xlabel('Категории товаров', fontsize=12)
ax[1].set_ylabel('Денежные затраты, руб.', fontsize=12)

fig.set_figheight(15)
fig.set_figwidth(30)

#plt.show()
fig.savefig('images/plots/hist.png')
# --------------------------------------------
# Plot_1 END
# --------------------------------------------



#print("</body></html>")
#connection.close()

