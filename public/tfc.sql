CREATE DATABASE TFC2;

USE TFC2;

CREATE TABLE marcas(ID INT NOT NULL AUTO_INCREMENT, Marca VARCHAR(255), Tipo VARCHAR(255), Pais VARCHAR(255), AnoFundacion INT NOT NULL, enlaceImagen VARCHAR(255), PRIMARY KEY(ID));

CREATE TABLE familiasOlfativas(ID INT NOT NULL AUTO_INCREMENT, familiaOlfativa VARCHAR(255), PRIMARY KEY(ID));

INSERT INTO familiasOlfativas(familiaOlfativa) VALUES('Acuática'), ('Amaderada'), ('Ambarada'), ('Aromática'), ('Chipre'), ('Cítrica'), ('Cuero'), ('Floral'), ('Fougère'), ('Frutal'), ('Gourmand');

CREATE TABLE estaciones(ID INT NOT NULL AUTO_INCREMENT, estacion VARCHAR(255), PRIMARY KEY(ID));

INSERT INTO estaciones(estacion) VALUES('Primavera'), ('Verano'), ('Otoño'), ('Invierno');

CREATE TABLE ocasiones(ID INT NOT NULL AUTO_INCREMENT, ocasion VARCHAR(255), PRIMARY KEY(ID));

INSERT INTO ocasiones(ocasion) VALUES('Casual'), ('Deportiva'), ('Formal');

CREATE TABLE fragancias (ID INT NOT NULL AUTO_INCREMENT, Fragancia VARCHAR(255), IDMarca INT, Precio FLOAT,  
ML INT NOT NULL, anoLanzamiento INT NOT NULL, IDestacion INT, IDocasion INT, IDfamiliaOlfativa INT, enlaceImagen VARCHAR(255), stock INT DEFAULT 10, 
PRIMARY KEY (ID), 
CONSTRAINT FKMarca FOREIGN KEY(IDMarca) REFERENCES TFC.marcas(ID),
CONSTRAINT FKEstacion FOREIGN KEY(IDestacion) REFERENCES TFC.estaciones(ID),
CONSTRAINT FKOcasion FOREIGN KEY(IDocasion) REFERENCES TFC.ocasiones(ID),
CONSTRAINT FKFamiliaOlfativa FOREIGN KEY(IDfamiliaOlfativa) REFERENCES TFC.familiasOlfativas(ID));

CREATE TABLE usuarios(ID INT NOT NULL AUTO_INCREMENT, nombreUsuario VARCHAR(255), clave VARCHAR(255), PRIMARY KEY(ID));

INSERT INTO usuarios(nombreUsuario, clave) VALUES("Diego", 123456);

CREATE TABLE carrito(ID INT NOT NULL AUTO_INCREMENT, IDusuario INT, IDFragancia INT, Cantidad INT, Precio FLOAT, Fecha DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(ID),
CONSTRAINT FKIDUsuario5 FOREIGN KEY(IDUsuario) REFERENCES TFC.usuarios(ID), 
CONSTRAINT FKIDFragancia5 FOREIGN KEY(IDFragancia) REFERENCES TFC.fragancias(ID));

CREATE TABLE compras(ID INT NOT NULL AUTO_INCREMENT, IDUsuario INT, IDFragancia INT, Cantidad INT, Precio FLOAT, Fecha DATETIME DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY(ID), 
CONSTRAINT FKIDUsuario6 FOREIGN KEY(IDUsuario) REFERENCES TFC.usuarios(ID),
CONSTRAINT FKIDFragancia6 FOREIGN KEY(IDFragancia) REFERENCES TFC.fragancias(ID));

INSERT INTO marcas(marca, tipo, pais, anoFundacion, enlaceImagen) VALUES
("Acqua di Parma", "Nicho", "Italia", 1916, "../resources/imgs/nicho/AcquaDiParma.jpg"),
("Amouage", "Nicho", "Omán", 1983, "../resources/imgs/nicho/Amouage.jpg"), 
("Andy Tauer", "Nicho", "Suiza", 2005, "../resources/imgs/nicho/AndyTauer.jpg"),
("Armani", "Diseñador", "Italia", 1975, "../resources/imgs/disenador/Armani.jpg"), 
("Azzaro", "Diseñador", "Francia", 1967, "../resources/imgs/disenador/Azzaro.jpg"), 
("Burberry", "Diseñador", "Reino Unido", 1856, "../resources/imgs/disenador/Burberry.jpg"),
("By Kilian", "Nicho", "Francia", 2007, "../resources/imgs/nicho/ByKilian.jpg"), 
("Bvlgari", "Diseñador", "Italia", 1884, "../resources/imgs/disenador/Bvlgari.jpg"), 
("Calvin Klein", "Diseñador", "Estados Unidos", 1968, "../resources/imgs/disenador/CalvinKlein.jpg"), 
("Carolina Herrera", "Diseñador", "Estados Unidos", 1980, "../resources/imgs/disenador/CarolinaHerrera.jpg"), 
("Cartier", "Diseñador", "Francia", 1847, "../resources/imgs/disenador/Cartier.jpg"), 
("Chanel", "Diseñador", "Francia", 1910, "../resources/imgs/disenador/Chanel.jpg"), 
("Creed", "Nicho", "Reino Unido", 1760, "../resources/imgs/nicho/Creed.jpg"),  
("Davidoff", "Diseñador", "Suiza", 1968, "../resources/imgs/disenador/Davidoff.jpg"), 
("Dior", "Diseñador", "Francia", 1946, "../resources/imgs/disenador/Dior.jpg"),
("Dolce & Gabbana", "Diseñador", "Italia", 1985, "../resources/imgs/disenador/DolceGabbana.jpg"), 
("Dunhill", "Diseñador", "Reino Unido", 1893, "../resources/imgs/disenador/Dunhill.jpg"), 
("Givenchy", "Diseñador", "Francia", 1952, "../resources/imgs/disenador/Givenchy.jpg"), 
("Guerlain", "Nicho", "Francia", 1828, "../resources/imgs/nicho/Guerlain.jpg"), 
("Hugo Boss", "Diseñador", "Alemania", 1924, "../resources/imgs/disenador/HugoBoss.jpg");

INSERT INTO fragancias(Fragancia, IDMarca, Precio, ML, anoLanzamiento, IDestacion, IDocasion, IDfamiliaOlfativa, enlaceImagen) VALUES
("Blu Mediterraneo - Bergamotto di Calabria", 1, 48.75, 30, 2010, 2, 3, 4, "../resources/imgs/nicho/AcquaDiParma/BergamottoDiCalabria.jpg"),
("Colonia", 1, 57.00, 30, 1916, 2, 3, 6, "../resources/imgs/nicho/AcquaDiParma/Colonia.jpg"), 
("Colonia Leather", 1, 49.75, 30, 2014, 4, 3, 6, "../resources/imgs/nicho/AcquaDiParma/Leather.jpg"),
("Oud Eau de Parfum", 1, 77.95, 20, 2019, 4, 3, 3, "../resources/imgs/nicho/AcquaDiParma/Oud.jpg"),
("Interlude Man", 2, 240.00, 100, 2012, 4, 3, 3, "../resources/imgs/nicho/Amouage/InterludeMan.jpg"),
("Lyric For Men", 2, 228.05, 100, 2008, 1, 3, 3, "../resources/imgs/nicho/Amouage/LyricForMen.jpg"),
("Memoir Man", 2, 171.46, 100, 2010, 3, 3, 7, "../resources/imgs/nicho/Amouage/MemoirMan.jpg"), 
("Reflection Man", 2, 229.95, 100, 2007, 1, 1, 3, "../resources/imgs/nicho/Amouage/ReflectionMan.jpg"),
("Au Coeur Du Désert", 3, 149.5, 50, 2016, 4, 3, 3, "../resources/imgs/nicho/AndyTauer/AuCoeurDuDesert.jpg"),
("L'Air Du Désert Marocain", 3, 109.00, 50, 2005, 4, 3, 3, "../resources/imgs/nicho/AndyTauer/LAirDuDesertMarocain.jpg"),
("Phtaloblue", 3, 125.00, 50, 2020, 2, 1, 8, "../resources/imgs/nicho/AndyTauer/Phtaloblue.jpg"),
("Tauer Attar", 3, 79.00, 5, 2017, 4, 3, 3, "../resources/imgs/nicho/AndyTauer/TauerAttar.jpg"),
("Acqua di Giò", 4, 37.95, 50, 1995, 2, 1, 4, "../resources/imgs/disenador/Armani/AcquaDiGio.jpg"),
("Armani Code", 4, 67.95, 75, 2004, 4, 1, 3, "../resources/imgs/disenador/Armani/ArmaniCode.jpg"),
("Eau Pour Homme", 4, 40.40, 100, 1984, 2, 1, 6, "../resources/imgs/disenador/Armani/EauPourHomme.jpg"),
("Stronger With You", 4, 37.95, 50, 2017, 4, 1, 4, "../resources/imgs/disenador/Armani/StrongerWithYou.jpg"),
("Chrome", 5, 32.50, 100, 1995, 2, 2, 6, "../resources/imgs/disenador/Azzaro/Chrome.jpg"),
("Pour Homme", 5, 58.90, 100, 1978, 3, 1, 4, "../resources/imgs/disenador/Azzaro/PourHomme.jpg"),
("Wanted", 5, 30.94, 100, 2016, 3, 1, 2, "../resources/imgs/disenador/Azzaro/Wanted.jpg"),
("Wanted By Night", 5, 35.96, 100, 2018, 4, 1, 2, "../resources/imgs/disenador/Azzaro/WantedByNight.jpg"),
("Brit for Men", 6, 29.90, 50, 2004, 3, 1, 3, "../resources/imgs/disenador/Burberry/BritForMen.jpg"),
("London for Men", 6, 19.86, 50, 2006, 3, 1, 3, "../resources/imgs/disenador/Burberry/LondonForMen.jpg"),
("Mr. Burberry", 6, 20.90, 50, 2016, 1, 2, 4, "../resources/imgs/disenador/Burberry/MrBurberry.jpg"),
("Touch for Men", 6, 24.90, 50, 2000, 1, 1, 3, "../resources/imgs/disenador/Burberry/TouchForMen.jpg"),
("Amber Oud", 7, 125.00, 100, 2011, 4, 3, 3, "../resources/imgs/nicho/ByKilian/AmberOud.jpg"),
("Back To Black", 7, 199.99, 100, 2009, 4, 3, 3, "../resources/imgs/nicho/ByKilian/BackToBlack.jpg"),
("Black Phantom", 7, 187.09, 100, 2017, 4, 1, 3, "../resources/imgs/nicho/ByKilian/BlackPhantom.jpg"),
("Vodka On The Rocks", 7, 171.29, 100, 2014, 1, 1, 4, "../resources/imgs/nicho/ByKilian/VodkaOnTheRocks.jpg"),
("Blv", 8, 45.00, 50, 2001, 1, 3, 2, "../resources/imgs/disenador/Bvlgari/Blv.jpg"),
("Aqva Amara", 8, 49.95, 50, 2014, 2, 2, 2, "../resources/imgs/disenador/Bvlgari/AqvaAmara.jpg"),
("Man in Black", 8, 55.00, 50, 2014, 4, 3, 3, "../resources/imgs/disenador/Bvlgari/ManInBlack.jpg"),
("Glacial Essence", 8, 42.49, 50, 2020, 2, 1, 4, "../resources/imgs/disenador/Bvlgari/GlacialEssence.jpg"),
("CK One", 9, 22.73, 100, 1994, 2, 2, 6, "../resources/imgs/disenador/CalvinKlein/CKOne.jpg"),
("CK One Shock For Him", 9, 28.90, 200, 2011, 3, 1, 3, "../resources/imgs/disenador/CalvinKlein/CKOneShockForHim.jpg"),
("Eternity for Men", 9, 30.00, 100, 1990, 1, 1, 4, "../resources/imgs/disenador/CalvinKlein/EternityForMen.jpg"),
("Truth For Men", 9, 29.60, 100, 2002, 2, 2, 4, "../resources/imgs/disenador/CalvinKlein/TruthForMen.jpg"),
("212 VIP Men", 10, 53.99, 100, 2011, 4, 1, 3, "../resources/imgs/disenador/CarolinaHerrera/212VIPMen.jpg"),
("Bad Boy", 10, 42.95, 50, 2019, 3, 1, 3, "../resources/imgs/disenador/CarolinaHerrera/BadBoy.jpg"),
("CH Men", 10, 48.05, 100, 2009, 3, 1, 3, "../resources/imgs/disenador/CarolinaHerrera/CHMen.jpg"),
("CH Men Privé", 10, 58.95, 100, 2015, 3, 1, 7, "../resources/imgs/disenador/CarolinaHerrera/CHMenPrive.jpg"),
("Déclaration D'Un Soir", 11, 52.90, 100, 2012, 3, 3, 3, "../resources/imgs/disenador/Cartier/DeclarationDUnSoir.jpg"),
("L'Envol", 11, 46.50, 80, 2017, 1, 3, 3, "../resources/imgs/disenador/Cartier/LEnvol.jpg"),
("Pasha", 11, 39.60, 50, 1992, 1, 1, 3, "../resources/imgs/disenador/Cartier/Pasha.jpg"),
("Roadster", 11, 47.00, 100, 2008, 1, 3, 4, "../resources/imgs/disenador/Cartier/Roadster.jpg"),
("Allure Homme Sport Eau Extrême", 12, 129.20, 100, 2012, 1, 1, 2, "../resources/imgs/disenador/Chanel/AllureHommeSportEauExtreme.jpg"),
("Bleu", 12, 96.50, 100, 2010, 1, 1, 2, "../resources/imgs/disenador/Chanel/Bleu.jpg"),
("Égoïste", 12, 96.20, 100, 1990, 4, 3, 3, "../resources/imgs/disenador/Chanel/Egoiste.jpg"),
("Pour Monsieur", 12, 99.99, 100, 1955, 1, 3, 5, "../resources/imgs/disenador/Chanel/PourMonsieur.jpg"),
("Aventus", 13, 210.00, 100, 2010, 1, 3, 5, "../resources/imgs/nicho/Creed/Aventus.jpg"),
("Green Irish Tweed", 13, 185.00, 100, 1985, 1, 1, 3, "../resources/imgs/nicho/Creed/GreenIrishTweed.jpg"),
("Silver Mountain Water", 13, 219.00, 100, 1995, 1, 1, 4, "../resources/imgs/nicho/Creed/SilverMountainWater.jpg"),
("Viking", 13, 214.00, 50, 2017, 3, 1, 3, "../resources/imgs/nicho/Creed/Viking.jpg"),
("Champion", 14, 23.90, 90, 2010, 1, 2, 2, "../resources/imgs/disenador/Davidoff/Champion.jpg"),
("Cool Water", 14, 20.00, 75, 1988, 2, 2, 1, "../resources/imgs/disenador/Davidoff/CoolWater.jpg"),
("Hot Water", 14, 15.90, 75, 2009, 3, 1, 2, "../resources/imgs/disenador/Davidoff/HotWater.jpg"),
("Zino", 14, 24.90, 125, 1986, 4, 3, 3, "../resources/imgs/disenador/Davidoff/Zino.jpg"),
("Dune Pour Homme", 15, 74.90, 100, 1997, 1, 3, 3, "../resources/imgs/disenador/Dior/DunePourHomme.jpg"),
("Higher Energy", 15, 78.10, 100, 2003, 2, 2, 2, "../resources/imgs/disenador/Dior/HigherEnergy.jpg"),
("Homme", 15, 51.99, 50, 2005, 4, 3, 3, "../resources/imgs/disenador/Dior/Homme.jpg"),
("Sauvage", 15, 49.95, 60, 2015, 1, 1, 4, "../resources/imgs/disenador/Dior/Sauvage.jpg"),
("Light Blue", 16, 39.52, 100, 2007, 2, 1, 6, "../resources/imgs/disenador/DolceGabbana/LightBlue.jpg"),
("Light Blue Intense", 16, 44.59, 100, 2017, 2, 1, 6, "../resources/imgs/disenador/DolceGabbana/LightBlueIntense.jpg"),
("The One For Men", 16, 40.01, 50, 2008, 3, 1, 2, "../resources/imgs/disenador/DolceGabbana/TheOneForMen.jpg"),
("The One For Men Eau De Parfum", 16, 45.20, 50, 2015, 3, 1, 2, "../resources/imgs/disenador/DolceGabbana/TheOneForMenEauDeParfum.jpg"),
("Century Blue", 17, 41.40, 75, 2019, 2, 2, 2, "../resources/imgs/disenador/Dunhill/CenturyBlue.jpg"),
("Dunhill For Men", 17, 19.80, 100, 1934, 3, 3, 2, "../resources/imgs/disenador/Dunhill/DunhillForMen.jpg"),
("Icon", 17, 42.90, 50, 2015, 1, 3, 2, "../resources/imgs/disenador/Dunhill/Icon.jpg"),
("London", 17, 19.20, 100, 2008, 1, 1, 3, "../resources/imgs/disenador/Dunhill/London.jpg"),
("Gentleman Eau De Parfum", 18, 51.99, 50, 2018, 4, 3, 2, "../resources/imgs/disenador/Givenchy/GentlemanEauDeParfum.jpg"),
("Pi", 18, 36.90, 50, 1998, 4, 1, 3, "../resources/imgs/disenador/Givenchy/Pi.jpg"),
("Play Eau de Toilette", 18, 50.19, 100, 2008, 1, 1, 6, "../resources/imgs/disenador/Givenchy/PlayEauDeToilette.jpg"),
("Xeryus Rouge", 18, 39.95, 100, 1995, 4, 1, 3, "../resources/imgs/disenador/Givenchy/XeryusRouge.jpg"),
("Guerlain Homme", 19, 49.95, 100, 2008, 2, 1, 3, "../resources/imgs/nicho/Guerlain/GuerlainHomme.jpg"),
("L'Homme Idéal Eau de Parfum", 19, 57.95, 100, 2016, 4, 1, 3, "../resources/imgs/nicho/Guerlain/LHommeIdealEDP.jpg"),
("L'Instant de Guerlain Pour Homme", 19, 55.95, 100, 2008, 3, 3, 2, "../resources/imgs/nicho/Guerlain/LInstantDeGuerlainPourHomme.jpg"),
("Vetiver", 19, 59.95, 100, 2000, 1, 1, 3, "../resources/imgs/nicho/Guerlain/Vetiver.jpg"),
("Boss Bottled", 20, 55.99, 200, 1998, 1, 3, 2, "../resources/imgs/disenador/HugoBoss/BossBottled.jpg"),
("Boss In Motion", 20, 29.95, 90, 2002, 1, 2, 3, "../resources/imgs/disenador/HugoBoss/BossInMotion.jpg"),
("Hugo", 20, 33.60, 100, 1995, 1, 2, 4, "../resources/imgs/disenador/HugoBoss/Hugo.jpg"),
("The Scent Private Accord For Him", 20, 48.99, 100, 2018, 4, 1, 3, "../resources/imgs/disenador/HugoBoss/TheScentPrivateAccordForHim.jpg");

CREATE VIEW Perfume AS
SELECT fragancias.*, estaciones.estacion, ocasiones.ocasion, familiasOlfativas.familiaOlfativa FROM fragancias 
LEFT OUTER JOIN estaciones ON fragancias.IDestacion = estaciones.ID 
LEFT OUTER JOIN ocasiones ON fragancias.IDocasion = ocasiones.ID 
LEFT OUTER JOIN familiasOlfativas ON fragancias.IDfamiliaOlfativa = familiasOlfativas.ID;

DELIMITER //

CREATE PROCEDURE insertarEnCompras()
BEGIN
    DECLARE j INT;
	DECLARE k INT;
    SET j = (SELECT COUNT(*) FROM carrito);
	SET k = 0;
	WHILE k < j DO
		UPDATE fragancias, carrito 
		SET fragancias.stock = fragancias.stock - (SELECT Cantidad FROM carrito LIMIT k, 1) 
		WHERE fragancias.ID = (SELECT IDFragancia FROM carrito LIMIT k, 1);
		SET k = k + 1;
	END WHILE;	
	INSERT INTO compras SELECT * FROM carrito;
	TRUNCATE TABLE carrito;
END

DELIMITER //
CREATE TRIGGER incrementIDEnCompras BEFORE INSERT ON compras 
FOR EACH ROW 
    BEGIN
        DECLARE newNum INT DEFAULT 0;
           SET newNum = (SELECT max(ID) FROM compras) + 1;
           IF newNum IS NULL THEN
            SET newNum = 1;
           END IF;
        SET NEW.ID = newNum;
    END;