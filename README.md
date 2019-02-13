# Chat Booté

#Environnement

Architecture MVC / PHP 5 / MySQL / HTML 5 / Router fait maison / Apache / Composer


#DataBase

###Create Database

CREATE DATABASE chat;

###Database tables

CREATE TABLE chat.user ( id INT NOT NULL AUTO_INCREMENT , name VARCHAR(150) NOT NULL , login VARCHAR(150) NOT NULL , password VARCHAR(255) NOT NULL , PRIMARY KEY (id), UNIQUE LOGIN_UNIQUE (login)) ENGINE = InnoDB;

INSERT INTO user (id, name, login, password) VALUES (NULL, 'test', 'test', 'test'), (NULL, 'user', 'user', 'mauxDePasse');

CREATE TABLE chat.message ( id INT NOT NULL AUTO_INCREMENT , content TEXT NOT NULL , file VARCHAR(255) NULL , sender INT NOT NULL , receiver INT NOT NULL , PRIMARY KEY (id), FOREIGN KEY (sender) REFERENCES user(id), FOREIGN KEY (receiver) REFERENCES user(id), UNIQUE FILE_UNIQUE (file)) ENGINE = InnoDB ;

INSERT INTO message (id, content, file, sender, receiver) VALUES (NULL, 'Hello ', NULL, '1', '1'), (NULL, 'How are you ', NULL, '1', '2');

#Connexion
login: test
mdp: test
