# -*- coding: utf-8 -*-
#!C:/Python310/python

import sys, json, base64, time
import os
#from json import JSONDecoder
#import MySQLdb as db
#import subprocess


#import locale
#print(locale.getpreferredencoding())

print("<html><head><title>Python meets</title><body>")
print("<h1>Hello, Nick</h1>")
print("</body></html>")


#print("Hello World!")
#print()

# 1. D N?D N?DAD?D AlD N?D AlD AtD N?D N DAa??DAN?D D?D N?DAa? D N?DAD?, D N?D N?DAa??D N?DAD?D A°DAD? D AaDAN?D N?D AlDAa?? D N?D N?D N?D N?D AtDAD?DAa?AD A°DAa??DAD?DAD?DAD? D N? DAD?D AlDAD?D D?D AlDAD?DAN? MySQL D N? D D?D N?D A?D D?DAD?D A°DAa?°D A°DAa??DAD? D N?D AaDAD?D AlD N?DAa?? D N?D N?D N?D N?D AtDAD?DAa?AD AlD D?D N?DAD?: !!!!! -*- coding: utf-8 -*-
import mysql.connector
from mysql.connector import Error


# D N? D D?D A°D N D D?D AlD N?D AaDAa?SD N?D N?D N?D ND N? D N?D N?D N?D N?D AtDAD?DAa?AD N?DAa??DAD?DAD?DAD? D N? D AaD A°D A?D Al D N?D A°D D?D D?DAa?sDAa?S sm_app.
# D a??D AtDAD? DAD?DAa??D N?D N?D N? D D?DAN?D AsD D?D N? D N?D A?D ND AlD D?D N?DAa??DAD? create_connection() DAD?D AtD AlD N?DAN?DAD?DAa?°D N?D N D N?D AaDAD?D A°D A?D N?D N:
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



# D A¤DAN?D D?D N?DAa? D N?DAD? create_connection() DAa??D AlD N?D AlDAD?DAD? D N?DAD?D N?D D?D N?D ND A°D AlDAa?? D N?D N?D N?D N?D AtD D?D N?DAa??D AlD AtDAD?D D?DAa?sD a?? D N?D A°DAD?D A°D ND AlDAa??DAD? DAD? D N?D ND AlD D?D AlD N db_name.
# D A­DAa??D N?DAa?? D N?D A°DAD?D A°D ND AlDAa??DAD? DAN?D N?D A°D A?DAa?sD D?D A°D AlDAa?? D N?D NDAD? D a?D a??, D N? D N?D N?DAa??D N?DAD?D N?D a?? D NDAa?s DAa?SD N?DAa??D N?D N D N?D N?D N?D N?D AtDAD?DAa?AD N?DAa??DAD?DAD?DAD?. D AD NDAD? DAa??D AlD N?D AlDAD?DAD? D ND N?D AsD D?D N? D N?D AlDAD?D AlD N?D A°DAa??DAD? D N?DAD?D N? D D?DAa?sD A?D N?D D?D Al DAa??DAN?D D?D N?DAa? D N?D N?:
        
connection = create_connection("localhost", "nikart", "arteeva12", "agency") #.connect(charset='utf8', init_command='SET NAMES UTF8')

#connection = db.connect(host='localhost', user='nikart', passwd='arteeva12', db='agency', use_unicode=True, charset='utf8')
#conn = MySQLdb.connect(charset='utf8', init_command='SET NAMES UTF8')
#connection.set_character_set('cp866')
#connection.set_character_set('utf8')
#connection.set_character_set('utf8')
# D D?D N?DAD?D N?D N?DAa?? DAN?DAD?D N?D AlDAa?ZD D?D N? D D?DAa?sD A?DAa?sD D?D A°D AlDAa?? create_connection() D N? D N?D N?D N?D N?D AtDAD?DAa?AD A°D AlDAa??DAD?DAD? D N? D AaD A°D A?D Al D N?D A°D D?D D?DAa?sDAa?S sm_app.

# 5. D AD A?D D?D AtD AlDAa?AD AlD D?D N?D Al D N?D A°D D?D D?DAa?sDAa?S D N?D A? D A?D A°D N?D N?DAD?D AlD a??
# D A§DAa??D N?D AaDAa?s D D?DAa?sD AaDAD?D A°DAa??DAD? D A?D A°D N?D N?DAD?D N? D D? SQLite, D ND N?D AsD D?D N? DAD?D D?D N?D D?D A° D N?DAD?D N?D N?D AtDAD?D A?D N?D D?D A°DAa??DAD? cursor.execute().
# D N?D N?D D?D A°D N?D N? D N?D N?DAD?D AtD Al DAD?DAa??D N?D N?D N? D N?D N?DAa??DAD?D AlD AaDAN?D AlDAa??DAD?DAD? D D?DAa?sD A?D D?D A°DAa??DAD? D ND AlDAa??D N?D N? D N?DAN?DAD?DAD?D N?DAD?D A° fetchall().
# D A­DAa??D N?DAa?? D ND AlDAa??D N?D N? D D?D N?D A?D D?DAD?D A°DAa?°D A°D AlDAa?? DAD?D N?D N?DAD?D N?D N? D N?D N?DAD?DAa??D AlD AsD AlD a??, D N?D N?D Al D N?D A°D AsD N?DAa?sD a?? D N?D N?DAD?DAa??D AlD As DAD?D N?D N?D N?DAD?DAa??D A°D D?D AtD AlD D? DAD? DAD?D N?D N?DAa??D D?D AlDAa??DAD?DAa??D D?DAN?DAD?DAa?°D AlD a?? DAD?DAa??DAD?D N?D N?D N?D a?? D D? ??D N?D A?D D?D AtD AlDAa?AD AlD D?D D?DAa?sDAa?S D A?D A°D N?D N?DAD?DAD?DAa?S.
# D A§DAa??D N?D AaDAa?s DAN?D N?DAD?D N?DAD?DAa??D N?DAa??DAD? D N?DAD?D N?DAa? D AlDAD?DAD?, D D?D A°D N?D N?DAa?ZD AlD N DAa??DAN?D D?D N?DAa? D N?DAD? execute_read_query():

def execute_read_query(connection, query):
    cursor = connection.cursor()
    result = None
    try:
        cursor.execute(query)
        
        result = cursor.fetchall()
        return result
    except Error as e:
        print(f"The error '{e}' occurred")
        
# D A­DAa??D A° DAa??DAN?D D?D N?DAa? D N?DAD? D N?DAD?D N?D D?D N?D ND A°D AlDAa?? D N?D AaDAD?D AlD N?DAa?? connection D N? SELECT-D A?D A°D N?DAD?D N?DAD?, D A° D D?D N?D A?D D?DAD?D A°DAa?°D A°D AlDAa?? D D?DAa?sD AaDAD?D A°D D?D D?DAN?DAD? D A?D A°D N?D N?DAD?DAD?.


# SELECT
# D a??D A°D D?D A°D a??DAa??D Al D D?DAa?sD AaD AlDAD?D AlD N D D?DAD?D Al D A?D A°D N?D N?DAD?D N? D N?D A? DAa??D A°D AaD AtD N?DAa? DAa?s users:
#.decode('utf-8') , encoding='utf-8'
        
select_users = "SELECT * from shops WHERE shop='WildBerries' LIMIT 5;"
users = execute_read_query(connection, select_users)

for user in users:
    print(user)

connection.close()
