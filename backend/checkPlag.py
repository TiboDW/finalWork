import requests
import json
import mysql.connector


def plagcheck(text, filename):
    data =  {
    'key': '62b7838429dc6ad92a1fd2abca57e0f4',
    'data': text,
    }
    r = requests.post('https://www.prepostseo.com/apis/checkPlag', data=data)
    print(r.json())
    path =  "/Users/tibodewinter/Documents/finalwork/backend/json/" + filename + ".json"
    with open(path, 'w', encoding='utf-8') as f:
        json.dump(r.json(), f, ensure_ascii=False, indent=4)
    
    print("json file has been created")


def sendDetailToDB(filename):
    path = "/Users/tibodewinter/Documents/finalwork/backend/json/" + filename + ".json"
    with open(path) as file:
        data = json.load(file)

    jsonstring = json.dumps(data, indent=4)
    jsonstring = jsonstring
    #print(jsonstring)
    mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password="",
    database="finalwork"
    )
    mycursor = mydb.cursor()
    sql = "UPDATE documents SET details = %s WHERE id = %s" 
    val = (jsonstring, filename)
    mycursor.execute(sql, val)
    mydb.commit()
    print(mycursor.rowcount, "record(s) affected")

   
def sendToBlockchain(path, name, description, filename):
    data = {
    "path": path,
    "name": name,
    "description": description,
    "filename": filename,
    }    
    
    requests.post('http://localhost:3000/blockchain', data=data)
   

