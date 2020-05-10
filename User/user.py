import json
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from flask_cors import CORS

app = Flask(__name__)
CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'
# app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://admin:esdproject@database-1.cxqk0bo2fppg.ap-southeast-1.rds.amazonaws.com:3306/customer'
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql+mysqlconnector://root@localhost:3306/user'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)

class User(db.Model):
    __tablename__ = 'user'

    username = db.Column(db.String(50), primary_key=True)
    password = db.Column(db.String(50), nullable=False)
    postalcode = db.Column(db.String(50), nullable=False)
    unit = db.Column(db.String(50),nullable=False)

    def __init__(self, username, password, postalcode, unit):
        self.username = username
        self.password = password
        self.postalcode = postalcode
        self.unit = unit

    def json(self):
        return {"username": self.username, "password": self.password, "postalcode": self.postalcode, "unit":self.unit}


#Create account
@app.route("/User/<string:username>", methods=['POST'])
def addUser(username):
    if (User.query.filter_by(username=username).first()):
        return jsonify({"message": "A username with '{}' already exists.".format(username)}), 400

    data = request.get_json()
    user = User(**data)
    try:
        db.session.add(user)
        db.session.commit()
    except:
        return jsonify({"message": "An error occurred creating the account."}), 500

    return jsonify({"success": "Account successfully created"}), 201

#Get postal code
@app.route("/getpostal/<string:username>", methods=["GET"])
def getpostal(username):
    user_object = User.query.filter_by(username=username).first()
    new_dict = {}
    new_dict["postalcode"] = user_object.postalcode
    return jsonify(new_dict)

#Just dumps all accounts
@app.route("/User", methods=['GET'])
def get_all():
    return jsonify({"users": [user.json() for user in User.query.all()]})

@app.route("/getUser/<string:username>",methods=['GET'])
def getUser(username):
    user_object = User.query.filter_by(username=username).first()
    new_dict = {}
    new_dict["postalcode"]=user_object.postalcode
    new_dict["unit"]=user_object.unit
    print(new_dict)
    return jsonify(new_dict)

#Check when logging in
@app.route("/AUser/<string:username>", methods=["POST"])
def find_by_username(username):
#Getting the data
    data = request.get_json()
    #gets the password with key password in json data
    inputpassword = data["password"]
    #if user exist check pass otherwise return does not exist
    user = User.query.filter_by(username=username).first()
    if user:
        password = User.query.filter_by(username=username).first().password
        if password == inputpassword:
            return jsonify({"message": "True"}), 200
        else:
            return jsonify({"error": "Incorrect password"}), 404
    else:
        return jsonify({"error": "Username does not exist"}), 404

if __name__ == '__main__':
    app.run(port=5000, debug=True)
