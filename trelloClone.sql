CREATE DATABASE IF NOT EXISTS appliWeb;

USE appliWeb;

CREATE TABLE utilisateur (
  id int NOT NULL AUTO_INCREMENT,
  identifiant varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE tache (
  id int NOT NULL AUTO_INCREMENT,
  titre varchar(255) NOT NULL,
  statut varchar(255) DEFAULT 'A faire',
  responsable varchar(255),
  PRIMARY KEY (id)
);
