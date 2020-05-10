DROP DATABASE IF EXISTS item;

CREATE DATABASE item;
USE item; 

CREATE TABLE item (
    itemid INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    postalcode INT NOT NULL,
    unit VARCHAR(50) NOT NULL,
    itemname VARCHAR(50) NOT NULL,
    itemdescription VARCHAR(250) NOT NULL,
    PRIMARY KEY (itemid)
);


INSERT INTO item (username, postalcode, unit, itemname, itemdescription) VALUES ("Don",510717,"14-05","fried rice", "halal");
INSERT INTO item (username, postalcode, unit, itemname, itemdescription) VALUES ("Clement",510717, "13-05","chicken wing", "non-halal");

