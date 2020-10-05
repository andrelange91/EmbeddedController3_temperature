#############################################
##
##  Temperature & Humidity sensor readings
##  Data posted to url for saving.
##
##	By Andre Lange 2020
##
#############################################

# dht(pin, module_type)
#	DHT11   = 0
#	DHT22   = 1
#	DHT21   = 2
#	DHT2301 = 3


import requests
from grovepi import *

dht_sensor_port = 4 # Connect to D4
module_type = 0 # 0 for DHT11 type sensor.
url = 'http://10.130.54.56/sensor/record'


while True:
	try:
		[ temp, hum ] = dht(dht_sensor_port,module_type) # sensor reading

		# print for reading in console.
		print ( "temp=", temp, "C")
		print ("Humidity =", hum, "%")

		# prepare and post data.
		data = {'Temperature' : temp, 'Location' : "Odense S"} # prepare data for post.
		requests.post(url, data)
		
		time.sleep(120) # sleep before taking another reading (2 minutes between readings)

	except	(IOError, TypeError) as e:
		print ("Error", e)

