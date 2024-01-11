-- Table pour les utilisateurs
CREATE TABLE Users (
  id_user VARCHAR(255) PRIMARY KEY,
  password_hash VARCHAR(255) NOT NULL -- Stocke le hachage du mot de passe
);

CREATE TABLE Materiel (
  id_materiel INT PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  service VARCHAR(255) NOT NULL,
  type_select VARCHAR(20),
  _description VARCHAR(255) NOT NULL,
  emplacement VARCHAR(255) NOT NULL,
  annee_uc INT
);

-- Table pour les attestations de mise à disposition de matériel nomade
CREATE TABLE AttestationsMateriel (
  id_attestation INT PRIMARY KEY AUTO_INCREMENT,
  ecran1_isiac VARCHAR(255),
  ecran2_isiac VARCHAR(255),
  uc_isiac VARCHAR(255),
  enregistre_dans_GACI BOOLEAN,
  remis_par VARCHAR(255),
  emprunte_par VARCHAR(255),
  fonction VARCHAR(255),
  date_emprunt DATE,
  signataire_emprunteur VARCHAR(255),
  signataire_defi VARCHAR(255),
  date_restitution DATE,
  recepteur VARCHAR(255),
  signataire_restitution VARCHAR(255),
  observations VARCHAR(255)
);
