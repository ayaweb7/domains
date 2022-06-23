# -*- coding: utf-8 -*-
#!C:/Python310/python

import sys, locale, os, codecs
import subprocess
import mysql.connector
from mysql.connector import Error

'''
data = None
with open('python_script_7.py', encoding='utf-8') as fh:
    data = fh.read()
with open('python_script_7.py', 'wb') as fh:
    fh.write(data.encode('cp1251'))
'''

print(sys.argv)
'''
import os
from json import JSONDecoder
 
json = os.getenv('JSON')
value = JSONDecoder().decode(json)
print(value)
'''
''' '''
print(sys.stdout.encoding)
print(sys.stdout.isatty())
print(locale.getpreferredencoding())
print(sys.getfilesystemencoding())


print("<html><head><title>Python meets</title><body>")
print("<h1>Привет из Аш1, Nick в Питоне</h1>".encode('utf8').decode('cp1251'))
#print("<h1>Hello on H1, Nick in Python</h1>")
print("</body></html>")
# .encode('utf8').decode('cp1251') - GOOD

print("Привет World из Пайтоновского Принта !".encode('utf8').decode('cp1251'))
#print("Hello World from Python Print!")
print()

# -*- coding: utf8 -*- # cp1251 # cp866

print()
print(3+6)

def create_connection(host_name, user_name, user_password, db_name):
    connection = None
    try:
        connection = mysql.connector.connect(
            host=host_name,
            user=user_name,
            passwd=user_password,
            database=db_name
        )
        
        print("Connection to MySQL DB successful")
    except Error as e:
        print(f"The error '{e}' occurred")

    return connection

def execute_read_query(connection, query):
    cursor = connection.cursor()
    result = None
    try:
        cursor.execute(query)
        
        result = cursor.fetchall()
        return result
    except Error as e:
        print(f"The error '{e}' occurred")
    
connection = create_connection("localhost", "nikart", "arteeva12", "agency")

select_users = "SELECT name from shops WHERE shop='WildBerries' LIMIT 5".encode('utf8').decode('cp1251')
users = execute_read_query(connection, select_users)

'''
for user in users:
    print(user)
'''
print(users)

connection.close()

