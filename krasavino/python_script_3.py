#!C:/Python310/python
import sys, json, base64, time

# есть два файла e:\xampp\htdocs\script\test.php и e:\xampp\cgi-bin\test.py
# программа с питоном находися здесь c:\Python27\python.exe

print("Content-type: text/plain\n\n")
print()
print("Hello world")
print()
#/usr/bin/env python2
#encoding: UTF-8
 
#prm=json.loads(base64.b64decode(sys.argv[1]))
 
#print prm["id"]

hello = "hello1"
world = "world2"
print(hello + " " + world)

#n=int(input())
for i in range(5):
    print('*' * i)
    print()