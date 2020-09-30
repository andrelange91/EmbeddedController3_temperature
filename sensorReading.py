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


from requests import *
from grovepi import *

dht_sensor_port = 4 # Connect to D4
module_type = 0 # 0 for DHT11 type sensor.
url = 'http://172.20.10.6/sensor/record'


while True:
	try:
		time.sleep(6) # sleep before taking another reading (60 seconds between readings)
		[ temp, hum ] = dht(dht_sensor_port,module_type) # sensor reading

		# print for reading in console.
		print ( "temp=", temp, "C")
		print ("Humidity =", hum, "%")

		# prepare and post data.
		data = {hum, temp} # prepare data for post.
		requests.requests.post(url, data = data)

	except	(IOError, TypeError) as e:
		print ("Error", e)

