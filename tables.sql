
-- Création de tableaux

--table user_admin

CREATE TABLE User (
   id int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
   email : varchar(60),
   password : varchar(60),
   nom : varchar(60) NOT NULL,
   prenom : varchar(60) NOT NULL,
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
--table restaurant

CREATE TABLE Restaurant (
  id : int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  nom : varchar(60),
  adresse : varchar(250) NOT NULL,
  telephone : int(10),
  email : varchar(60),
  logo : varchar(60), 
  FOREIGN KEY(id-clients) REFERENCES clients(id),
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
--table horaires
--

CREATE TABLE Horaires (
  id : int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  nom_jour : varchar(60) NOT NULL,
  etat : varchar(60) NOT NULL,
  heure_ouverture-am : time NOT NULL,
  heure_fermeture_am : time NOT NULL,
  heure_ouverture-pm : time NOT NULL,
  heure_fermeture_pm : time NOT NULL,
  FOREIGN KEY(id_reservtions) REFERENCES reservations(id),
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
-- table reservation
--

CREATE TABLE Reservation (
  id : int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  couverts : varchar(60) NOT NULL,
  date : datetime(10) NOT NULL,
  heure : time(10) NOT NULL,
  FOREIGN KEY(id_clinets) REFERENCES Clinets(id),
  FOREIGN KEY(id_plats) REFERENCES Plats(id),
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
--table clients
--

CREATE TABLE Clients (
  id : int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  nom : varchar(60),
  prenom : varchar(60),
  email : varchar(60),
  password : varchar(60),
  nbr_couverts_par_defaut : varchar(60), 
  mention_allergies : varchar(60),
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
--table galerie_images
--

CREATE TABLE Galerie-images (
  id int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  titre : varchar(60) NOT NULL,
  image : varchar(60)
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
-- table menus
--

CREATE TABLE Menus (
  id : int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  titre : varchar(60) NOT NULL,
  description : varchar(60) NOT NULL,
  prix : decimal(10.2) NOT NULL,
  image : varchar(60) NOT NULL DEFAULT,
  FOREIGN KEY(id_menus_cetagories) REFERENCES menus_categories(id),
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
-- table plats
--

CREATE TABLE plats (
  id int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  nom : varchar(60) NOT NULL,
  description : varchar(60) NOT NULL,
  prix : decimal(10.2) NOT NULL,
  FOREIGN KEY(id_formule) REFERENCES formule(id),
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
-- table menus_categories
--

CREATE TABLE menus_categories (
  id int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  titre : varchar(60) NOT NULL,
  
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------

--
--  table formule
--

CREATE TABLE formule (
  id int(10) CLE PRIMARY NOT NULL AUTO_INCREMENT,
  titre : varchar(60) NOT NULL,
  
  
)
  
  DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;

-- --------------------------------------------------------





  
