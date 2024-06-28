
create table societe(
	id int primary key auto_increment,
	nom VARCHAR(30) not null,
	nomDg VARCHAR(40) not null,
	email VARCHAR(30) not null,
	motdepasse VARCHAR(30)
);

create table services(
	id int primary key auto_increment,
	idsociete int,
	nom VARCHAR(30),
	nomresponsable VARCHAR(50),
	email varchar(30),
	motdepasse VARCHAR(30),
	foreign key (idsociete) references societe(id)
);

create or replace view detailservice AS 
select serv.id, serv.nom as services,serv.nomresponsable as responsable,soc.id as idsociete, soc.nom as societe, soc.nomdg,serv.email,serv.motdepasse     
from societe as soc 
inner join services as serv on soc.id=serv.idsociete; 


create table besoinservice(
	id int primary key auto_increment,
	idservice int,
	nom VARCHAR(40),
	nbrperson float,
	agemin float,
	agemax float,
	etat varchar(30),
	FOREIGN key (idservice) REFERENCES services(id)
);

create or replace view detailbesoinservice AS 
select bes.id, bes.nom as poste, dserv.id as idservice,dserv.idsociete, dserv.services, dserv.societe,dserv.nomdg,dserv.responsable,dserv.email, dserv.motdepasse,
bes.nbrperson as pers, bes.agemin, bes.agemax,bes.etat
from besoinservice as bes 
inner join detailservice as dserv on bes.idservice=dserv.id; 



create table provinces(
	id int primary key auto_increment,
	nom varchar(30)
);

create table provinceservice(
	id int primary key auto_increment,
	idprov int,
	idbesoinservice int,
	points float,
	foreign key(idbesoinservice) references besoinservice(id),
	foreign key(idprov) references provinces(id)
);



create or replace view detailprovince as 
select bes.id,bes.nom,prov.nom as prov,provserv.points as ptprovince
from provinces as prov 
inner join provinceservice as provserv on prov.id=provserv.idprov
inner join besoinservice as bes on bes.id=provserv.idbesoinservice; 


create table nation(
	id int primary key auto_increment,
	nom varchar(30)
);

create table nationbesoinservice(
	id int primary key auto_increment,
	idnation int,
	idbesoinservice int,
	points float,
	foreign key(idbesoinservice) references besoinservice(id),
	foreign key(idnation) references nation(id)
);


create or replace view detailnation as
select serv.id, serv.nom, nat.nom as nationalite, nats.points
from besoinservice as serv  
inner join nationbesoinservice as nats on serv.id=nats.idbesoinservice
inner join nation as nat on nats.idnation=nat.id; 

CREATE TABLE diplome(
	id int primary key auto_increment,
	nom VARCHAR(30),
	points float
);

create table diplomeservice(
	id int primary key auto_increment,
	idbesoinservice int,
	idiplom int,
	foreign key(idbesoinservice) references besoinservice(id),
	foreign key(idiplom) references diplome(id)
);

create or replace view diplomedetail AS 
select bes.id as idBesoin, bes.nom,dip.nom as diplome, dip.points
from besoinservice as bes 
inner join diplomeservice as dips on dips.idbesoinservice=bes.id
inner join diplome as dip on dip.id=dips.idiplom;

create table experience(
	id int primary key auto_increment,
	nom VARCHAR(30),
	anne float,
	points float
);

create table experienceservice(
	id int primary key auto_increment,
	idbesoinservice int,
	idexper int references experience(id),
	foreign key(idbesoinservice) references besoinservice(id)
);


create or replace view experienceDetail AS
select bes.id as idBesoin, bes.nom,expe.nom as experience,expe.points
from besoinservice as bes 
inner join experienceservice as exps on exps.idbesoinservice=bes.id
inner join experience as expe on expe.id=exps.idexper;


CREATE TABLE listesituation(
	id int PRIMARY key auto_increment,
	nom VARCHAR(30)
);

CREATE TABLE situation(
	id int PRIMARY key auto_increment,
	idbesoinservice int,
	situation varchar(30),
	points float,
	foreign key(idbesoinservice) references besoinservice(id)
);

CREATE TABLE genre( 
	id int PRIMARY key auto_increment,
	idbesoinservice int,
	sexe varchar(30),
	points float,
	foreign key(idbesoinservice) references besoinservice(id)
);


create table qcmService(
	id int primary key auto_increment,
	idbesoinservice int,
	question varchar(100),
	points float,
	reponse VARCHAR(100),
	typereponse int,
	foreign key(idbesoinservice) references besoinservice(id)
);


create table Cv(
    id int primary key auto_increment,  
	idbesoinservice int, 
    nom varchar(50) not null, 
    prenom varchar(50) not null, 
    naissance date not null, 
    province varchar(30) not null,
    sexe varchar(30), 
    situation varchar(30) not null, 
    nation varchar(30) not null,
	diplome varchar(30) not null,
    experience varchar(30) not null,
	motdepasse varchar(30),
	etat varchar(30),
    foreign key (idbesoinservice) references besoinservice(id)
);


create or replace view cvdetail as 
select cv.id,dbserv.poste,dbserv.id as idBesoin,dbserv.idservice as idservice, dbserv.services,dbserv.societe,dbserv.nomDg,dbserv.responsable, 
cv.nom, cv.prenom, cv.naissance,cv.province,cv.sexe,cv.situation,cv.nation,cv.diplome,cv.experience,cv.motdepasse,cv.etat
from detailbesoinservice as dbserv 
inner join cv as cv on cv.idbesoinservice=dbserv.id; 

CREATE TABLE cvPoint(
	id int primary key auto_increment,
	idcv int REFERENCES Cv(id),
	idBesoin int references besoinservice(id),
	pointBesoin float,
	pointCv float
);

create TABLE employer(
	id int primary key auto_increment,
	idcv int REFERENCES Cv(id),
	dateEmbouche DATE
);

create or replace view employerdetail as
select cv.id, cv.poste,cv.idBesoin,cv.idservice, cv.services, cv.nom, cv.prenom, cv.responsable,cv.naissance,
cv.province,cv.sexe,cv.situation,cv.nation,cv.diplome,cv.experience,emp.dateEmbouche
from employer as emp
inner join cvdetail as cv on cv.id=emp.idcv;


create TABLE conge(
	id int primary key auto_increment,
	idEmp int REFERENCES employer(id),
	dateDebut date,
	dateFin date,
	typeConge varchar(30),
	justification varchar(30),
	etat varchar(30)
);

create or replace view detailconger as 
select co.id, emp.id as idEmp, emp.nom, emp.prenom,emp.sexe,emp.dateEmbouche,emp.naissance,co.dateDebut,co.dateFin,co.typeConge,co.justification,co.etat
from conge as co 
inner join employerdetail as emp on emp.id=co.idEmp; 

create table heureSupplementaire(
	id int primary key auto_increment,
	idEmp int REFERENCES employer(id),
	dates date,
	heureDebut time,
	heure time
);

create table absence(
	id int primary key auto_increment,
	idEmp int REFERENCES employer(id),
	dateAbsence date,
	heurePointillage time
);

CREATE table reponseQcmCv(
	id int primary key auto_increment,
	idcv int references Cv(id),
	idbesoinservice int,
	question varchar(100),
	points float,
	reponse VARCHAR(100),
	typereponse int
);

create or replace view detailReponseCv as
select cv.id as idcv, cv.nom,cv.prenom,cv.poste,cv.idBesoin,cv.idservice,cv.services, sum(typereponse) as points 
from reponseQcmCv as rp
inner join cvdetail as cv on cv.id=rp.idcv; 

CREATE table pointQcmCv(
	id int primary key auto_increment,
	idcv int references Cv(id),
	idBesoin int references besoinservice(id),
	points float
);

create or replace view besoinservicecomplet as
select dbserv.id,dbserv.idsociete, dbserv.societe,dbserv.idservice, dbserv.services, dbserv.responsable,dbserv.email, dbserv.motdepasse as pwd, dbserv.poste, dbserv.pers, dprov.prov, dprov.ptprovince, dbserv.agemin,dbserv.agemax,
dip.diplome,dip.points as dippoints,expe.experience,expe.points as expepoints, sit.situation,sit.points as ptSit, g.sexe, g.points as ptSexe,dn.nationalite, dn.points as ptnation,dbserv.etat
from situation as sit  
inner join detailbesoinservice as dbserv on dbserv.id=sit.idbesoinservice
inner join genre as g on dbserv.id=g.idbesoinservice
inner join detailprovince as dprov on dprov.id=dbserv.id
inner join detailnation as dn on dn.id=dbserv.id
inner join diplomedetail as dip on dip.idBesoin=dbserv.id
inner join experienceDetail as expe on expe.idBesoin=dbserv.id;  

insert into societe(nom,nomDg,email,motdepasse)values('RM-Society','RANDRIANJANAHARY Mahenina','Mahenina@gmail.com','mahenina');

insert into services(idsociete,nom,nomresponsable,email,motdepasse) VALUES (1,'Informatique','Liana Rabenja','Liana@gmail.com','liana');
insert into services(idsociete,nom,nomresponsable,email,motdepasse) VALUES (1,'Medecine','Jean Michelle','Jean@gmail.com','jean');
insert into services(idsociete,nom,nomresponsable,email,motdepasse) VALUES (1,'RH','Toky Jordy','Toky@gmail.com','toky');


insert into nation(nom) VALUES ('Malagasy');
insert into nation(nom) VALUES ('Frantsay');
insert into nation(nom) VALUES ('Anglisy');

insert into listesituation(nom) VALUES ('Marié sans enfant');
insert into listesituation(nom) VALUES ('Marié avec enfant');
insert into listesituation(nom) VALUES ('Celibataire');

insert into experience(nom,anne,points) VALUES ('Pas experience',0,0);
insert into experience(nom,anne,points) VALUES ('un ans',1,1);
insert into experience(nom,anne,points) VALUES ('deux ans',2,2);
insert into experience(nom,anne,points) VALUES ('trois ans',3,3);
insert into experience(nom,anne,points) VALUES ('4ans ans',4,4);
insert into experience(nom,anne,points) VALUES ('5ans ans',5,5);

insert into diplome(nom,points) VALUES ('CEPE',1);
insert into diplome(nom,points) VALUES ('BEPEC',2);
insert into diplome(nom,points) VALUES ('BACC',3);
insert into diplome(nom,points) VALUES ('LICENCE',5);
insert into diplome(nom,points) VALUES ('MASTER',7);
insert into diplome(nom,points) VALUES ('DOCTORAT',9);

insert into provinces(nom) VALUES ('Antananarivo');
insert into provinces(nom) VALUES ('Mahajanga');
insert into provinces(nom) VALUES ('Antsiranana');
insert into provinces(nom) VALUES ('Toliara');
insert into provinces(nom) VALUES ('Fianaratsoa');
insert into provinces(nom) VALUES ('Tamatave');


insert into besoinservice(idservice,nom,nbrperson,agemin,agemax,etat) values
(1,'Base de donne',1,21,40,'non lue'),
(1,'Desing',3,18,30,'non lue'),
(2,'Service medecine',2,20,40,'non lue');
insert into provinceservice(idprov,idbesoinservice,points) values
(3,1,3),
(2,2,2),
(1,3,5);
insert into nationbesoinservice(idnation,idbesoinservice,points) VALUES
(1,1,3),
(1,2,3),
(1,3,3);
insert into diplomeservice(idbesoinservice,idiplom) VALUES 
(1,4),
(2,5),
(3,4);
insert into experienceservice(idbesoinservice,idexper) VALUES 
(1,2),
(2,4),
(3,1);
insert into situation(idbesoinservice,situation,points) VALUES 
(1,'Marié sans enfant',1),
(2,'Marié sans enfant',1),
(3,'Celibataire',1);
insert into genre(idbesoinservice,sexe,points) VALUES 
(1,'Homme',1),
(2,'Homme',1),
(3,'Femme',1);

insert into qcmService(idbesoinservice,question,points,reponse,typereponse) VALUES 
(1,'Quel base de donnée a exister le premier ? ',3,'mysql',0),
(1,'Quel base de donnée a exister le premier ? ',3,'postgresql',0),
(1,'Quel base de donnée a exister le premier ? ',3,'IDS',1),
(1,'Quel langage de programmation utiliser pour integrer une BDD ? ',1,'PHP',1),
(1,'Quel langage de programmation utiliser pour integrer une BDD ? ',1,'JSP',1),
(1,'Quel langage de programmation utiliser pour integrer une BDD ? ',1,'HTML',0),
(1,'Quel langage de programmation utiliser pour integrer une BDD ? ',1,'CSS',0),
(1,'Pourquoi est-il important indexer une colonne dans une table ? ',4,'Pour que les valeurs de cette colonne est unique',0),
(1,'Pourquoi est-il important indexer une colonne dans une table ? ',4,'Pour accelerer les recherches sur cette colonne',1),
(1,'Pourquoi est-il important indexer une colonne dans une table ? ',4,'Pour assurer que cette colonne est toujours incluse dans chaque requête',0),
(1,'Le quel de ces requetes est correct ? ',2,'select * from table where id=1 and nom="informatique"',1),
(1,'Le quel de ces requetes est correct ? ',2,'select * from table where id=1, nom="informatique"',0),

(2,'Quel logiciel est couramment utilisé pour la conception de maquettes interfaces ? ', 2,'Microsoft Word',0),
(2,'Quel logiciel est couramment utilisé pour la conception de maquettes interfaces ? ', 2,'Adobe Photoshop',1),
(2,'Quel logiciel est couramment utilisé pour la conception de maquettes interfaces ? ', 2,'Google chrome',0),
(2,'Quel logiciel est couramment utilisé pour la conception de maquettes interfaces ? ', 2,'AutoCAD',0),
(2,'Qu est ce une typographie sans ampattement ? ', 1,'Une police sans-serif ',1),
(2,'Qu est ce une typographie sans ampattement ? ', 1,'Une police avec serif ',0),
(2,'Le code couleur : #fffff est de quel couleur ? ', 2,'red',0),
(2,'Le code couleur : #fffff est de quel couleur ?', 2,'balck',0),
(2,'Le code couleur : #fffff est de quel couleur ?', 2,'white',1),
(2,'Le code couleur : #fffff est de quel couleur ?', 2,'green',0),
(2,'Comment on fait pour mettre un text gras en css ? ', 2,'font-size:bold',0),
(2,'Comment on fait pour mettre un text gras en css ? ', 2,'font-family:bold',0),
(2,'Comment on fait pour mettre un text gras en css ? ', 2,'font-weight:bold',1),
(2,'Comment on fait pour mettre un text gras en css ? ', 2,'font-style:bold',0),
(2,'Les quels de ces css sont faux ou existe pas ? ', 3,'background: fixed',0),
(2,'Les quels de ces css sont faux ou existe pas ? ', 3,'background-repeat: two-repeat',1),
(2,'Les quels de ces css sont faux ou existe pas ? ', 3,'background-image: none',0),
(2,'Les quels de ces css sont faux ou existe pas ? ', 3,'background-size: full',1);

INSERT into cv(idbesoinservice,nom,prenom,naissance,province,sexe,situation,nation,diplome,experience,motdepasse,etat) VALUES 
(1,'Rakotoson', 'Benja','1999-04-28','Antananarivo','Homme','Celibataire','Malagasy','LICENCE','deux ans','benja','postuler'),
(1,'Clement', 'Jordany','1987-02-14','Antsiranana','Homme','Celibataire','Frantsay','MASTER','un ans','jordany','postuler'),
(2,'Lopez', 'Michella','2001-01-30','Toliara','Femme','Marié avec enfant','Frantsay','LICENCE','Pas experience','michella','postuler'),
(1,'HERY', 'Luck','1982-03-19','Antananarivo','Homme','Celibataire','Malagasy','LICENCE','Pas experience','heryluck','entretien'),
(1,'RANDRIA', 'Michelle','1999-07-23','Antananarivo','Homme','Celibataire','Malagasy','LICENCE','Pas experience','michelle','contract'),
(2,'RAKOTOARISON', 'Therese','2002-02-12','Antsiranana','Femme','Celibataire','Malagasy','LICENCE','deux ans','therese','contract'),
(1,'DUPONT', 'jean','1897-12-03','Mahajanga','Homme','Celibataire','Frantsay','MASTER','trois ans','jeandupont','embouche'),
(1,'PIERRE', 'Laurent','1897-12-03','Toliara','Homme','Celibataire','Frantsay','DOCTORAT','deux ans','laurent','embouche'), 
(1,'RABEARISON', 'Safidy','1897-12-03','Antananarivo','Homme','Marié sans enfant','Malagasy','DOCTORAT','Pas experience','safidy','embouche'), 
(1,'RAHARIMANANA', 'Jakoba','1897-12-03','Antananarivo','Homme','Celibataire','Malagasy','MASTER','deux ans','jakoba','embouche'),
(1,'JOHNSON', 'Emily','1897-12-03','Mahajanga','Femme','Marie','Anglisy','MASTER','trois ans','jeandupont','embouche'),
(1,'ROUSSEAU', 'marie','2002-12-03','Fianaratsoa','Femme','Celibataire','Frantsay','LICENCE','trois ans','marie','embouche');


INSERT into cvPoint(idcv,idBesoin,pointBesoin,pointCv) values (1,1,14,11);
INSERT into cvPoint(idcv,idBesoin,pointBesoin,pointCv) values (2,1,14,12);
INSERT into cvPoint(idcv,idBesoin,pointBesoin,pointCv) values (2,2,17,5);
insert into employer(idcv,dateEmbouche) VALUES (7,'2023-10-10') ; 
insert into employer(idcv,dateEmbouche) VALUES (8,'2000-11-12') ; 
insert into employer(idcv,dateEmbouche) VALUES (9,'2023-10-22') ; 
insert into employer(idcv,dateEmbouche) VALUES (10,'2002-01-27') ; 
insert into employer(idcv,dateEmbouche) VALUES (11,'2022-07-12') ; 
insert into employer(idcv,dateEmbouche) VALUES (12,'1998-09-11') ; 








