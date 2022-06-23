import sys, json, base64, time

# / Usr / bin / python
#/Python27/python
#!C:/Program Files/python
#print "Content-type: text/plain\n\n"
print "Hello world"

# 
try:
    data = json.loads(sys.argv[1])
    print json.dumps({'status': 'Yes!'})
except Exception as e:
    print("result - " .  str(e))
 
# Load the data that PHP sent us
try:
    data = json.loads(sys.argv[1])
except:
    print "ERROR"
    sys.exit(1)

# Generate some data to send to PHP
result = {'status': 'Yes!'}

# Send it to stdout (to PHP)
print("result - " . json.dumps(result))