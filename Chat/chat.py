import json
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS
from sqlalchemy import text

app = Flask(__name__)
CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://admin:esdproject@database-1.cxqk0bo2fppg.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/chat'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class Chat(db.Model):
    __tablename__ = 'chat'

    chatid = db.Column(db.Integer, primary_key=True)
    username = db.Column(db.String(50), nullable=False)
    otherusername = db.Column(db.String(50),nullable=False)
    chatmessage = db.Column(db.String(250), nullable=False)

    def __init__(self, chatid, username, otherusername, chatmessage):
        self.chatid = chatid
        self.username = username
        self.otherusername = otherusername 
        self.chatmessage = chatmessage

    def json(self):
        return {"chatid": self.chatid, "username": self.username, "otherusername":self.otherusername, "chatmessage":self.chatmessage}





#Gets all items by otherusername
@app.route("/getchat",methods=['POST'])
def get_chat():
    data=request.get_json()
    otherusername=data["otherusername"]
    chat_list = []
    for chatmessage in Chat.query.filter_by(otherusername=otherusername):
        chat_list.append(chatmessage)
    return jsonify({"chat":[chatmessage.json() for chatmessage in chat_list]})


#Add text
@app.route("/addchat/<string:item_details>", methods=['GET'])
def additem(item_details):
    lastChat = Chat.query.order_by(Chat.chatid.desc()).first()
    if (lastChat == None ) : 
        chatid = 1
    else: 
        chatid = lastChat.chatid + 1
    data = item_details
    data = json.loads(data)
    data["chatid"]=chatid
    chatmessage = itemdescription.replace("%20"," ")
    newchat = Item(data["chatid"], data["username"], data["otherusername"], data["chatmessage"])
    db.session.add(newchat)
    db.session.commit()
    return "Success"

if __name__ == '__main__':
    app.run(port=5005, debug=True)




