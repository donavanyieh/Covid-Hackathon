DROP DATABASE IF EXISTS chat;

CREATE DATABASE chat;
USE chat; 

CREATE TABLE chat (
        chatid INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    otherusername VARCHAR(50) NOT NULL,
    chatmessage VARCHAR(250) NOT NULL,
    PRIMARY KEY (chatid)
);


INSERT INTO chat (username, otherusername,chatmessage) VALUES ("Don","clement","Hey I'm interested");

