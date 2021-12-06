/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ foodwaste /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE foodwaste;

DROP TABLE IF EXISTS partnerlogin;
CREATE TABLE `partnerlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) DEFAULT NULL,
  `partnerPassword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS partners;
CREATE TABLE `partners` (
  `id` int NOT NULL AUTO_INCREMENT,
  `navn` varchar(100) DEFAULT NULL,
  `postnr` int DEFAULT NULL,
  `partnerLogin` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `navn` (`navn`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS postnrtable;
CREATE TABLE `postnrtable` (
  `id` int NOT NULL AUTO_INCREMENT,
  `postNr` int DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `postNr` (`postNr`),
  UNIQUE KEY `city` (`city`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO partnerlogin(id,mail,partnerPassword) VALUES(1,'føtex@storcenternord.dk','$2y$10$6/nkaFZQkCDj50HOz054BeV8/Zj96Xp5MJERp7GOICa4lW2sTl6GK');

INSERT INTO partners(id,navn,postnr,partnerLogin) VALUES(1,'Føtex Storcenter Nord',1,1);
INSERT INTO postnrtable(id,postNr,city) VALUES(1,8200,'Aarhus N');DROP PROCEDURE IF EXISTS createNewPartner;
CREATE PROCEDURE `createNewPartner`(
    IN partnerNameVar VARCHAR(100),
    IN postNrVar INT,
    IN cityVar VARCHAR(100),
    IN mailVar VARCHAR(100),
    IN partnerPasswordVar VARCHAR(100)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
    ROLLBACK;
    END;
    START TRANSACTION;
    IF 
    NOT EXISTS (SELECT id FROM postnrTable WHERE postNr = postNrVar)
    THEN
    INSERT INTO postNrTable (postnr, city) VALUES (postNrVar, cityVar);
    END IF;
    SET @postNrId := (SELECT id FROM postNrTable WHERE postNr = postNrVar);
    IF 
    NOT EXISTS (SELECT id FROM partnerLogin WHERE mail = mailVar)
    THEN
    INSERT INTO partnerLogin (mail, partnerPassword) VALUES (mailVar, partnerPasswordVar);
    END IF;
    SET @partnerLoginId := (SELECT id FROM partnerLogin WHERE mail = mailVar);
    INSERT INTO partners
    (navn, postnr, partnerLogin) VALUES (partnerNameVar, @postNrId, @partnerLoginId);
    COMMIT;
END;