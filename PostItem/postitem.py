from flask import Flask, request, jsonify, redirect
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS, cross_origin
import requests
import urllib

import json

app = Flask(__name__)
CORS(app)

@app.route("/postitem", methods=['POST'])
def postitem():
    iteminfo = request.get_json()
    print ("HERE IS YOUR ITEM INFO")
    print (iteminfo)
    userinfo = getuserinfo(iteminfo["username"])
    print("HERE IS YOUR USER INFO")
    print (userinfo)
    print ("COMBINE")
    new_item_dict = {}
    new_item_dict["postalcode"]=userinfo["postalcode"]
    new_item_dict["unit"]=userinfo["unit"]
    new_item_dict["username"]=iteminfo["username"]
    new_item_dict["itemname"]=iteminfo["itemname"]
    new_item_dict["itemdescription"]=iteminfo["itemdescription"]
    print(new_item_dict)
    createstatus = createitem(new_item_dict)
    if createstatus=="Success":
        return jsonify(True)
    elif createstatus=="Failed":
        return jsonify(False)

    #userinfo returns type dict with postalcode and unit as key
def getuserinfo(username):
    userinfo = urllib.request.urlopen('http://localhost:5000/getUser/'+username).read().decode('utf-8')
    userinfo = json.loads(userinfo)
    postalcode = userinfo["postalcode"]
    unit = userinfo["unit"]
    return userinfo

def createitem(new_item_dict):
    new_item_json = json.dumps(new_item_dict)
    #create item
    new_item_json = new_item_json.replace(" ","%20")
    createstatus = urllib.request.urlopen('http://localhost:5001/additem/'+new_item_json).read().decode('utf-8')
    return createstatus






if __name__ == '__main__':
    app.run(port=5010, debug=True)
