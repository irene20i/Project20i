import json
import time
import requests
import mysql.connector
import serial.tools.list_ports

ports = serial.tools.list_ports.comports()
serialInst = serial.Serial()

portList =[]

for onePort in ports:
    portList.append(str(onePort))
    print(str(onePort))

val = input("select Port: COM")

for x in range(0,len(portList)):
    if portList[x].startswith("COM" + str(val)):
        portVar = "COM" + str(val)
        print(portList[x])

serialInst.baudrate = 115200
serialInst.port = portVar
serialInst.open()

mydb = mysql.connector.connect(
host="localhost",
user="root",
password="",
database="maktaba"
)
while True:
    if serialInst.in_waiting:
        packet = serialInst.readline()
        data = packet.decode('utf').rstrip('\n')
        data = data.rstrip('\r')
        data1 = data.split(':')
        if data1[0] == "Reader0":
            data = data.lstrip('Reader0:')
            print(data)
            mycursor = mydb.cursor()
            mycursor.execute("""
                UPDATE updater
                SET id = %s
            """,(data,))
            mydb.commit()

        elif data1[0] == "Reader1":
            data = data.lstrip('Reader1:')
            response = requests.get(
                'http://localhost/maktaba/api/read.php')

            datab = response.json()
            lst = []
            pip = data
            for check in datab:
                lst.append(check)
            
            response = requests.get(
                'http://localhost/maktaba/api/readuser.php')

            datac = response.json()
            for check in datac:
                lst.append(check)

            if pip in lst:
                print("kipo")
            else:
                print('Hakipo')
                num = 5
                def write_read(x):
                    serialInst.write(1)
                    time.sleep(0.05)
                    data = serialInst.readline()
                    return data
                while True:
                    value = write_read(num)
                    print(value)
                    num = num - 1
                    if num < 1:
                        break

        # print(data)

        
