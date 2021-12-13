/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ foodwaste /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE foodwaste;

DROP TABLE IF EXISTS listedProducts;
CREATE TABLE `listedProducts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `partnerId` int DEFAULT NULL,
  `foodName` varchar(50) DEFAULT NULL,
  `foodGroup` varchar(50) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `expDate` date DEFAULT NULL,
  `oldPrice` float DEFAULT NULL,
  `newPrice` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
INSERT INTO listedProducts(id,partnerId,foodName,foodGroup,quantity,expDate,oldPrice,newPrice) VALUES(2,1,'Æble','Soft fruit',5,'2021-12-10',8,4),(3,1,'Castello Havarti Ost','Soft fruit',3,'2021-12-11',23,12),(4,1,'Letmælk Lactose fri','Unfermented milk products',11,'2021-12-14',12,5),(5,2,'Tomater 100g','Fruit',2,'2021-12-13',15,7),(9,2,'Letmælk Lactose fri','Unfermented milk products',12,'2021-12-15',12,5);