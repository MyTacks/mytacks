/*
*	WeBDB database is backend data for
* 	the WeBasket pplication
*   Date: 02/26/2013
* 	Created by: Vinh Nguyen
*/
DROP DATABASE IF EXISTS webdb;
CREATE DATABASE webdb;
USE webdb;

DROP TABLE IF EXISTS tbl_group;
CREATE TABLE tbl_group (
    groupID SMALLINT NOT NULL AUTO_INCREMENT,
    groupName VARCHAR(255) NOT NULL,
    description TEXT,
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	createDate TIMESTAMP,
	PRIMARY KEY(groupID)
);
/*
* Update imageURL and set userName UNIQUE by Vinh Nguyen
* Nov 14
*/
DROP TABLE IF EXISTS tbl_user;
CREATE TABLE tbl_user (
    userID BIGINT NOT NULL AUTO_INCREMENT,
    groupID SMALLINT,
	username VARCHAR(125) UNIQUE NOT NULL,
	password VARCHAR(125) NOT NULL,
	firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
	imageURL VARCHAR(255),
    gender CHAR(10),
    DOB DATE,
    email VARCHAR(50) NOT NULL,
    telephone VARCHAR(50),
    active BOOLEAN DEFAULT FALSE,
	activeKey VARCHAR(125),
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	joinDate TIMESTAMP,
	PRIMARY KEY(userID),
    FOREIGN KEY (groupID)
        REFERENCES tbl_group (groupID)
        ON DELETE SET NULL ON UPDATE CASCADE
);

/*
* Create category table
*/

DROP TABLE IF EXISTS tbl_category;
CREATE TABLE tbl_category (
    categoryID SMALLINT NOT NULL AUTO_INCREMENT,
    categoryName VARCHAR(255) NOT NULL,
    description TEXT,
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	createDate TIMESTAMP,
	PRIMARY KEY(categoryID)
);

/*
* Create board
*/
DROP TABLE IF EXISTS tbl_board;
CREATE TABLE tbl_board (
    boardID SMALLINT NOT NULL AUTO_INCREMENT,
    boardTitle VARCHAR(255) NOT NULL,
	userID BIGINT,
	categoryID SMALLINT,
    description TEXT,
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	createDate TIMESTAMP,
	PRIMARY KEY(boardID),
	FOREIGN KEY (categoryID)
        REFERENCES tbl_category (categoryID)
        ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (userID)
        REFERENCES tbl_user (userID)
        ON DELETE SET NULL ON UPDATE CASCADE
);
/*
* follow table
* eachboard will be assigned a followID, each followID includes many users????
*/
DROP TABLE IF EXISTS tbl_follow;
CREATE TABLE tbl_follow (
    followID SMALLINT NOT NULL AUTO_INCREMENT,
    boardID SMALLINT,
	userID BIGINT,
    description TEXT,
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	createDate TIMESTAMP,
	PRIMARY KEY(followID),
	FOREIGN KEY (boardID)
        REFERENCES tbl_board (boardID)
        ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (userID)
        REFERENCES tbl_user (userID)
        ON DELETE SET NULL ON UPDATE CASCADE
	
);

/*
* Message Table
*/
DROP TABLE IF EXISTS tbl_message;

/*
* Link table
*/
DROP TABLE IF EXISTS tbl_tack;
CREATE TABLE tbl_tack (
    tackID BIGINT NOT NULL AUTO_INCREMENT,
	userID BIGINT,
	boardID SMALLINT,
	isPrivate BOOLEAN DEFAULT 1,
    tackName TEXT NOT NULL,
	tackURL VARCHAR(255) NOT NULL,
	imageURL VARCHAR (255),
    tackDescription LONGTEXT NOT NULL,
	updateDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	createDate TIMESTAMP,	PRIMARY KEY(tackID),
    FOREIGN KEY (userID)
        REFERENCES tbl_user (userID)
        ON DELETE SET NULL ON UPDATE CASCADE,
	FOREIGN KEY (boardID)
        REFERENCES tbl_board (boardID)
        ON DELETE SET NULL ON UPDATE CASCADE
);


INSERT INTO `tbl_group` VALUES (1,'Administrator','Monitor all activities',NOW(),NOW()),
							(2,'User','All users',NOW(),NOW());
INSERT INTO `tbl_user` VALUES (1,1,'admin','admin','Vinh','Nguyen','user/vinh.jpg','M',NOW(),'nelsonnguyent@gmail.com','(408)930-7362',1,'admin',NOW(),NOW()),
						   (2,2,'demo','demo','Demo','User','user/demo.jpg','M',NOW(),'demo@gmail.com','(408)660-7862',0, 'demo',NOW(),NOW()),
							(3,2,'test','test','Test','User','user/test.jpg','M',NOW(),'test@gmail.com','(408)660-7862',1,'test',NOW(),NOW());

INSERT INTO `tbl_category` VALUES (1, 'Food & Drink', 'Your favorite tacks.', NOW(), NOW()),
                                  (2, 'Holidays & Events', 'Your favorite tacks.', NOW(), NOW()),
				  (3, 'Health & Fitness', 'Your favorite tacks.', NOW(), NOW()),
				  (4, 'Travel', 'Your favorite tacks.', NOW(), NOW()),
                                  (5, 'Home Decor', 'Your favorite tacks.', NOW(), NOW()),
				  (6, 'Sports', 'Your favorite tacks.', NOW(), NOW()),
				  (7, 'Other', 'Your favorite tacks.', NOW(), NOW());