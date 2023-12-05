/*------------------------------------------------------------
*        Script SQLSERVER 
------------------------------------------------------------*/


/*------------------------------------------------------------
-- Table: Détail
------------------------------------------------------------*/
CREATE TABLE Detail(
	ID_Detail                   INT IDENTITY (1,1) NOT NULL ,
	det_Nom_Du_Serveur          VARCHAR (50) NOT NULL ,
	det_Adresse_Ip_Du_Serveur   VARCHAR (50) NOT NULL ,
	det_Image_Du_Serveur        NUMERIC (-1,-1)  NOT NULL  ,
	CONSTRAINT Detail_PK PRIMARY KEY (ID_Detail)
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
-- Table: serveur
------------------------------------------------------------*/
CREATE TABLE serveur(
	ID_Tag       INT  NOT NULL ,
	ID_Version   INT  NOT NULL ,
	ID_Detail    INT  NOT NULL  ,
	CONSTRAINT serveur_PK PRIMARY KEY (ID_Tag,ID_Version,ID_Detail)

	,CONSTRAINT serveur_tag_FK FOREIGN KEY (ID_Tag) REFERENCES tag(ID_Tag)
	,CONSTRAINT serveur_version0_FK FOREIGN KEY (ID_Version) REFERENCES version(ID_Version)
	,CONSTRAINT serveur_Detail1_FK FOREIGN KEY (ID_Detail) REFERENCES Detail(ID_Detail)
);



