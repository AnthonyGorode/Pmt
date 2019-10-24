#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: centre
#------------------------------------------------------------

CREATE TABLE centre(
        id_centre    Int  Auto_increment  NOT NULL ,
        actif_centre Bool NOT NULL default 1,
        nom_centre   Varchar (50) NOT NULL
	,CONSTRAINT centre_PK PRIMARY KEY (id_centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formateur
#------------------------------------------------------------

CREATE TABLE formateur(
        id_formateur           Int  Auto_increment  NOT NULL ,
        actif_formateur        Bool NOT NULL default 1 ,
        nom_formateur          Varchar (100) NOT NULL ,
        prenom_formateur       Varchar (50) NOT NULL ,
        email_formateur        Varchar (100) NOT NULL ,
        mot_de_passe_formateur Varchar (255) NOT NULL ,
        statut_formateur       Bool NOT NULL
	,CONSTRAINT formateur_PK PRIMARY KEY (id_formateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formation
#------------------------------------------------------------

CREATE TABLE formation(
        id_formation    Int  Auto_increment  NOT NULL ,
        actif_formation Bool NOT NULL default 1 ,
        nom_formation   Varchar (100) NOT NULL ,
        duree_formation Int
	,CONSTRAINT formation_PK PRIMARY KEY (id_formation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sessions
#------------------------------------------------------------

CREATE TABLE sessions(
        id_sessions                    Int  Auto_increment  NOT NULL ,
        id_formation                  Int NOT NULL, 
        actif_sessions                 Bool NOT NULL default 1 ,
        num_bon_commande_sessions      Varchar (25) ,
        intitule_bon_commande_sessions Varchar (50) ,
        date_debut_sessions            Date  ,
        date_fin_sessions              Date 
	,CONSTRAINT sessions_PK PRIMARY KEY (id_sessions)

	,CONSTRAINT sessions_formation_FK FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: stagiaire
#------------------------------------------------------------

CREATE TABLE stagiaire(
        id_stagiaire     Int  Auto_increment  NOT NULL ,
        actif_stagiaire  Bool NOT NULL default 1 ,
        nom_stagiaire    Varchar (100)  ,
        prenom_stagiaire Varchar (100) 
	,CONSTRAINT stagiaire_PK PRIMARY KEY (id_stagiaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: acces
#------------------------------------------------------------

CREATE TABLE acces(
        id_acces      Int  Auto_increment  NOT NULL ,
        actif_acces   Bool NOT NULL default 1 ,
        libelle_acces Varchar (50) NOT NULL
	,CONSTRAINT acces_PK PRIMARY KEY (id_acces)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: livraison
#------------------------------------------------------------

CREATE TABLE livraison(
        id_livraison    Int  Auto_increment  NOT NULL ,
        actif_livraison Bool NOT NULL default 1 ,
        mode_livraison  Varchar (50)
	,CONSTRAINT livraison_PK PRIMARY KEY (id_livraison)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: correction
#------------------------------------------------------------

CREATE TABLE correction(
        id_correction    Int  Auto_increment  NOT NULL ,
        actif_correction Bool NOT NULL default 1 ,
        mode_correction  Varchar (50) 
	,CONSTRAINT correction_PK PRIMARY KEY (id_correction)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: accompagnement
#------------------------------------------------------------

CREATE TABLE accompagnement(
        id_accompagnement    Int  Auto_increment  NOT NULL ,
        actif_accompagnement Bool NOT NULL default 1 ,
        mode_accompagnement  Varchar (50) 
	,CONSTRAINT accompagnement_PK PRIMARY KEY (id_accompagnement)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modalite_apprentissage
#------------------------------------------------------------

CREATE TABLE modalite_apprentissage(
        id_modalite_apprentissage      Int  Auto_increment  NOT NULL ,
        actif_modalite_apprentissage   Bool NOT NULL default 1 ,
        libelle_modalite_apprentissage Varchar (50) 
	,CONSTRAINT modalite_apprentissage_PK PRIMARY KEY (id_modalite_apprentissage)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: realisation
#------------------------------------------------------------

CREATE TABLE realisation(
        id_realisation    Int  Auto_increment  NOT NULL ,
        actif_realisation Bool NOT NULL default 1 ,
        mode_realisation  Varchar (50) 
	,CONSTRAINT realisation_PK PRIMARY KEY (id_realisation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rythme_hebdomadaire
#------------------------------------------------------------

CREATE TABLE rythme_hebdomadaire(
        id_rythme_hebdomadaire       Int  Auto_increment  NOT NULL ,
        jour_rythme_hebdomadaire     Varchar (11)  ,
        presence_rythme_hebdomadaire Bool  ,
        duree_rythme_hebdomadaire    Time 
	,CONSTRAINT rythme_hebdomadaire_PK PRIMARY KEY (id_rythme_hebdomadaire)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fermeture
#------------------------------------------------------------

CREATE TABLE fermeture(
        id_fermeture          Int  Auto_increment  NOT NULL ,
        jour_depart_fermeture Datetime  ,
        jour_fin_fermeture    Datetime 
	,CONSTRAINT fermeture_PK PRIMARY KEY (id_fermeture)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: travail
#------------------------------------------------------------

CREATE TABLE travail(
        id_travail                Int  Auto_increment  NOT NULL ,
        id_acces                  Int  ,
        id_livraison              Int  ,
        id_correction             Int  ,
        id_accompagnement         Int ,
        id_modalite_apprentissage Int ,
        id_realisation            Int ,
        sequence_travail          Varchar (150)  ,
        theme_travail             Varchar (150)  ,
        production_travail        text  ,
        duree_estimee_travail     Int  ,
        date_echeance_travail     Date  ,
        nom_ressource_travail     Varchar (250) 
	,CONSTRAINT travail_PK PRIMARY KEY (id_travail)

	,CONSTRAINT travail_acces_FK FOREIGN KEY (id_acces) REFERENCES acces(id_acces)
	,CONSTRAINT travail_livraison0_FK FOREIGN KEY (id_livraison) REFERENCES livraison(id_livraison)
	,CONSTRAINT travail_correction1_FK FOREIGN KEY (id_correction) REFERENCES correction(id_correction)
	,CONSTRAINT travail_accompagnement2_FK FOREIGN KEY (id_accompagnement) REFERENCES accompagnement(id_accompagnement)
	,CONSTRAINT travail_modalite_apprentissage3_FK FOREIGN KEY (id_modalite_apprentissage) REFERENCES modalite_apprentissage(id_modalite_apprentissage)
	,CONSTRAINT travail_realisation4_FK FOREIGN KEY (id_realisation) REFERENCES realisation(id_realisation)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: centre__formation
#------------------------------------------------------------

CREATE TABLE centre__formation(
        id_formation Int NOT NULL ,
        id_centre    Int NOT NULL
	,CONSTRAINT centre__formation_PK PRIMARY KEY (id_formation,id_centre)

	,CONSTRAINT centre__formation_formation_FK FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
	,CONSTRAINT centre__formation_centre0_FK FOREIGN KEY (id_centre) REFERENCES centre(id_centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: centre__fermeture
#------------------------------------------------------------

CREATE TABLE centre__fermeture(
        id_fermeture Int NOT NULL ,
        id_centre    Int NOT NULL
	,CONSTRAINT centre__fermeture_PK PRIMARY KEY (id_fermeture,id_centre)

	,CONSTRAINT centre__fermeture_fermeture_FK FOREIGN KEY (id_fermeture) REFERENCES fermeture(id_fermeture)
	,CONSTRAINT centre__fermeture_centre0_FK FOREIGN KEY (id_centre) REFERENCES centre(id_centre)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: formateur__sessions
#------------------------------------------------------------

CREATE TABLE formateur__sessions(
        id_sessions   Int NOT NULL ,
        id_formateur Int NOT NULL
	,CONSTRAINT formateur__sessions_PK PRIMARY KEY (id_sessions,id_formateur)

	,CONSTRAINT formateur__sessions_sessions_FK FOREIGN KEY (id_sessions) REFERENCES sessions(id_sessions)
	,CONSTRAINT formateur__sessions_formateur0_FK FOREIGN KEY (id_formateur) REFERENCES formateur(id_formateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sessions__rythme_hebdomadaire
#------------------------------------------------------------

CREATE TABLE sessions__rythme_hebdomadaire(
        id_rythme_hebdomadaire Int NOT NULL ,
        id_sessions             Int NOT NULL
	,CONSTRAINT sessions__rythme_hebdomadaire_PK PRIMARY KEY (id_rythme_hebdomadaire,id_sessions)

	,CONSTRAINT sessions__rythme_hebdomadaire_rythme_hebdomadaire_FK FOREIGN KEY (id_rythme_hebdomadaire) REFERENCES rythme_hebdomadaire(id_rythme_hebdomadaire)
	,CONSTRAINT sessions__rythme_hebdomadaire_sessions0_FK FOREIGN KEY (id_sessions) REFERENCES sessions(id_sessions)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: sessions__stagiaire
#------------------------------------------------------------

CREATE TABLE sessions__stagiaire(
        id_stagiaire Int NOT NULL ,
        id_sessions   Int NOT NULL
	,CONSTRAINT sessions__stagiaire_PK PRIMARY KEY (id_stagiaire,id_sessions)

	,CONSTRAINT sessions__stagiaire_stagiaire_FK FOREIGN KEY (id_stagiaire) REFERENCES stagiaire(id_stagiaire)
	,CONSTRAINT sessions__stagiaire_sessions0_FK FOREIGN KEY (id_sessions) REFERENCES sessions(id_sessions)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: stagiaire__travail
#------------------------------------------------------------

CREATE TABLE stagiaire__travail(
        id_travail                  Int NOT NULL ,
        id_stagiaire                Int NOT NULL ,
        pourcentage_realise_travail Int 
	,CONSTRAINT stagiaire__travail_PK PRIMARY KEY (id_travail,id_stagiaire)

	,CONSTRAINT stagiaire__travail_travail_FK FOREIGN KEY (id_travail) REFERENCES travail(id_travail)
	,CONSTRAINT stagiaire__travail_stagiaire0_FK FOREIGN KEY (id_stagiaire) REFERENCES stagiaire(id_stagiaire)
)ENGINE=InnoDB;

