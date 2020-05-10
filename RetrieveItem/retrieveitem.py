from flask import Flask, request, jsonify, redirect
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS, cross_origin
import requests
import urllib
import json

app = Flask(__name__)
CORS(app)

@app.route("/retrieveitem", methods=['POST'])
def GetAllProducts():
    username = request.get_json()
    #get postal code
    postalcode = getpostal(username["username"])
    #get all items by postalcode
    allitems = getitembypostal(str(postalcode))
    return allitems

def getpostal(username):
    postalcode = urllib.request.urlopen('http://localhost:5000/getpostal/'+username).read().decode('utf-8')
    postalcode = json.loads(postalcode)
    postalcode = postalcode["postalcode"]
    return postalcode

def getitembypostal(postalcode):
    allitems = urllib.request.urlopen('http://localhost:5001/getitembypostal/'+postalcode).read().decode('utf-8')
    #json string
    return allitems

if __name__ == '__main__':
    app.run(port=5011, debug=True)
