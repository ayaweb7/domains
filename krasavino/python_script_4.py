import sys
import os
from json import JSONDecoder
import subprocess

#result = subprocess.run(['php', 'python_code'], stdout=subprocess.PIPE, check=True)
#res = (result.stdout)
#res = str(res)
#warn = res

hash = 'g8sfgnvsf0g8'
file_hash = open("hash.txt", "w")
file_hash.write(hash)
file_hash.close()

print()
print()
print(warn)

print()
print()
 
json = os.getenv('JSON')
value = JSONDecoder().decode(json)
#print(value)

os.system("/usr/bin/php python_code.php whatastorymark")
#print(sys.argv[1])


who = sys.argv[1]
#print("Hello %s" % who)