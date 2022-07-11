# -*- coding: utf8 -*-
#!C:/Python310/python
''''''
import sys, locale, os, codecs
import subprocess
import mysql.connector
from mysql.connector import Error

# Pandas
import pandas as pd
import numpy as np
# Vizualization
import seaborn as sns
import matplotlib.pyplot as plt
#%matplotlib inline

from datetime import datetime


print(sys.stdout.encoding)
print(sys.stdout.isatty())
print(locale.getpreferredencoding())
print(sys.getfilesystemencoding())

print("<html><head><title>Python meets</title><body>")
print("<h1>Привет из Аш1, Nick в Питоне</h1>".encode('utf8').decode('cp1251'))
#print("<h1>Hello on H1, Nick in Python</h1>")
print("</body></html>")

print("Hello")
print("Привет World из Пайтоновского Принта! - python_script_8.py".encode('utf8').decode('cp1251'))

'''
# Downloads files
file_shops = 'shops.csv'
# file_store = 'C:/Users/Андрей/Downloads/store.csv'
shops = pd.read_csv(file_shops, sep=';')
# store = pd.read_csv(file_store, sep=';')
shops.head()
'''
'''
data = None
with open('C:/Users/Андрей/Downloads/shops.csv', encoding='utf-8') as fh:
    data = fh.read()
with open('C:/Users/Андрей/Downloads/shops.csv', 'wb') as fh:
    fh.write(data.encode('cp1251'))
'''
'''
# Data to plot
languages ='Java', 'Python', 'PHP', 'Это был ДжаваСкрипт', 'C#', 'C++'
popuratity = [22.2, 17.6, 8.8, 8, 7.7, 6.7]
colors = ["#1f77b4", "#ff7f0e", "#2ca02c", "#d62728", "#9467bd", "#8c564b"]
# explode 1st slice
explode = (0.1, 0, 0, 0,0,0)  
# Plot
plt.pie(popuratity, explode=explode, labels=languages, colors=colors,
autopct='%1.1f%%', shadow=True, startangle=140)
plt.axis('equal')
plt.show()
'''