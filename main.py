import json
import random
import urllib3
import threading

# domain = 'https://smart.devtech.my/public'
domain = 'http://smart_agriculture.test'
key = ''

def sendData():
    threading.Timer(300, sendData).start() #300 seconds
    humidity = random.randrange(12, 40)
    temperature = random.randrange(19, 36)
    ph = random.randrange(4, 8)
    url = domain+'/api/pi3-insert?key='+str(key)+'&humidity='+str(humidity)+'&temperature='+str(temperature)+'&ph='+str(ph)
    http = urllib3.PoolManager()
    r = http.request('GET', url)
    print(r.status)
sendData()

def checkValve():
    threading.Timer(2, checkValve).start() #300 seconds
    valve_url = domain+'/api/pi3-valve?key='+str(key)
    http = urllib3.PoolManager()
    r_valve = http.request('GET', valve_url)
    data = r_valve.data
    values = json.loads(data)
    print(values)
checkValve()
