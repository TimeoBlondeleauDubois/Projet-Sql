/*------------------------------------------------------------
*        Script SQLSERVER 
------------------------------------------------------------*/


/*------------------------------------------------------------
-- Table: serveurs
------------------------------------------------------------*/
CREATE TABLE serveurs(
	ID_serveurs                 INT IDENTITY (1,1) NOT NULL ,
	Ser_Nom_Du_Serveur          VARCHAR (50) NOT NULL ,
	Ser_Adresse_Ip_Du_Serveur   VARCHAR (50) NOT NULL ,
	Ser_Image_Du_Serveur        NUMERIC (-1,-1)  NOT NULL  ,
	CONSTRAINT serveurs_PK PRIMARY KEY (ID_serveurs)
);


/*------------------------------------------------------------
-- Table: tag
------------------------------------------------------------*/
CREATE TABLE tag(
	ID_Tag           INT IDENTITY (1,1) NOT NULL ,
	Tag_Nom_du_tag   VARCHAR (50) NOT NULL  ,
	CONSTRAINT tag_PK PRIMARY KEY (ID_Tag)
);


/*------------------------------------------------------------
-- Table: version
------------------------------------------------------------*/
CREATE TABLE version(
	ID_Version              INT IDENTITY (1,1) NOT NULL ,
	Ver_Nom_De_La_Version   VARCHAR (50) NOT NULL  ,
	CONSTRAINT version_PK PRIMARY KEY (ID_Version)
);


/*------------------------------------------------------------
-- Table: recherche
------------------------------------------------------------*/
CREATE TABLE recherche(
	ID_serveurs   INT  NOT NULL ,
	ID_Tag        INT  NOT NULL  ,
	CONSTRAINT recherche_PK PRIMARY KEY (ID_serveurs,ID_Tag)

	,CONSTRAINT recherche_serveurs_FK FOREIGN KEY (ID_serveurs) REFERENCES serveurs(ID_serveurs)
	,CONSTRAINT recherche_tag0_FK FOREIGN KEY (ID_Tag) REFERENCES tag(ID_Tag)
);


/*------------------------------------------------------------
-- Table: Appartient
------------------------------------------------------------*/
CREATE TABLE Appartient(
	ID_Version    INT  NOT NULL ,
	ID_serveurs   INT  NOT NULL  ,
	CONSTRAINT Appartient_PK PRIMARY KEY (ID_Version,ID_serveurs)

	,CONSTRAINT Appartient_version_FK FOREIGN KEY (ID_Version) REFERENCES version(ID_Version)
	,CONSTRAINT Appartient_serveurs0_FK FOREIGN KEY (ID_serveurs) REFERENCES serveurs(ID_serveurs)
);



