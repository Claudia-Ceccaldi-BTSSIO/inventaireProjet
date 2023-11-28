CREATE TABLE Emprunt (
  id_emprunt INT PRIMARY KEY AUTO_INCREMENT,
  id_materiel VARCHAR(50),
  isiac VARCHAR(255) ,
  saisie_select VARCHAR(3),
  remis VARCHAR(50),
  receptionne VARCHAR(50),
  type_select VARCHAR(3),
  date_creation DATE,
  observation VARCHAR(255)
);

CREATE TABLE Restitution (
  id_restitution INT PRIMARY KEY AUTO_INCREMENT,
  id_materiel VARCHAR(50),
  isiac VARCHAR(255),
  saisie_select VARCHAR(3),
  remis VARCHAR(50),
  receptionne VARCHAR(50),
  type_select VARCHAR(3),
  date_creation DATE,
  observation VARCHAR(255)
 );
