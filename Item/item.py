import json
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from sqlalchemy import text

app = Flask(__name__)
CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://admin:esdproject@database-1.cxqk0bo2fppg.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/item'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class Item(db.Model):
    __tablename__ = 'item'

    itemid = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(50), nullable=False)
    unit = db.Column(db.String(50),nullable=False)
    postalcode = db.Column(db.Integer, nullable=False)
    itemname = db.Column(db.String(50), nullable=False)
    itemdescription = db.Column(db.String(250), nullable=False)

    def __init__(self, itemid, username, unit, postalcode, itemname, itemdescription):
        self.itemid = itemid
        self.username = username
        self.unit = unit 
        self.postalcode = postalcode
        self.itemname = itemname
        self.itemdescription = itemdescription

    def json(self):
        return {"itemid": self.itemid, "username": self.username, "unit":self.unit, "postalcode":self.postalcode, "itemname": self.itemname, "itemdescription":self.itemdescription}




#Just dumps all items
@app.route("/items", methods=['GET'])
def get_all():
    return jsonify({"items": [item.json() for item in Item.query.all()]})

#delete item using itemid
@app.route("/deleteitem",methods=['POST'])
def delete_item():
    data=request.get_json()
    itemid=data["itemid"]
    result = delete(itemid)
    if result=="Success":
        return jsonify(True)
    else:
        return jsonify(False)

def delete(itemid):
    # item_to_delete = Item.query.filtery(itemid=itemid).first()
    # print("1")
    # # db.session.delete(item_to_delete)
    # Item.query.filter(Item.itemid == itemid).delete()
    # print("2")
    # db.session.commit
    # print("3")
    sql = text("DELETE FROM Item WHERE itemid="+itemid)
    result = db.engine.execute(sql)
    return "Success"


#Gets all items by username
@app.route("/getitems",methods=['POST'])
def get_items():
    data=request.get_json()
    username=data["username"]
    item_list = []
    for item in Item.query.filter_by(username=username):
        item_list.append(item)
    return jsonify({"items":[item.json() for item in item_list]})

#Get all items by postalcode
@app.route("/getitembypostal/<int:postalcode>",methods=["GET"])
def get_postal_items(postalcode):
    item_list = []
    for item in Item.query.filter_by(postalcode=postalcode):
        item_list.append(item)
    return jsonify({"items":[item.json() for item in item_list]})


#Create item
@app.route("/additem/<string:item_details>", methods=['GET'])
def additem(item_details):
    lastItem = Item.query.order_by(Item.itemid.desc()).first()
    if (lastItem == None ) : 
        itemid = 1
    else: 
        itemid = lastItem.itemid + 1
    data = item_details
    data = json.loads(data)
    data["itemid"]=itemid
    unit = data["unit"]
    itemdescription = data["itemdescription"]
    print(itemdescription)
    itemdescription = itemdescription.replace("%20"," ")
    newitem = Item(data["itemid"], data["username"], data["unit"], data["postalcode"], data["itemname"], itemdescription)
    db.session.add(newitem)
    db.session.commit()
    return "Success"

if __name__ == '__main__':
    app.run(port=5001, debug=True)




