drop table if exists COLLAB;
drop table if exists SYNONYME;
drop table if exists LANGUE;
drop table if exists MOT;
drop table if exists USR;


create table LANGUE (
    id integer not null primary key auto_increment,
    nom varchar(15) not null,
    date_crea datetime not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table USR (
    pseudo varchar(15) not null primary key,
    mdp varchar(88) not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table MOT (
    id integer not null primary key auto_increment,
    mot varchar(100) not null,
    definition_mot varchar(400),
    date_crea datetime not null
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table COLLAB (
    UserId VARCHAR(15) NOT NULL,
    LangueId INT NOT NULL,
    primary key ( UserId, LangueId),
    foreign key (UserId) References USR (pseudo),
    foreign key (LangueId) References LANGUE (id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table SYNONYME(
    Mot1Id INT NOT NULL,
    Mot2Id INT NOT NULL,
    primary key ( Mot1Id, Mot2Id),
    foreign key (Mot1Id) References MOT (id),
    foreign key (Mot2Id) References MOT (id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

ALTER TABLE langue ADD createur_l VARCHAR(15) NOT NULL;
ALTER TABLE langue ADD CONSTRAINT fk_createur_l FOREIGN KEY (createur_l) REFERENCES usr (pseudo);

ALTER TABLE langue ADD admin_l VARCHAR(15) NOT NULL;
ALTER TABLE langue ADD CONSTRAINT fk_admin_l FOREIGN KEY (admin_l) REFERENCES usr (pseudo);

ALTER TABLE mot ADD createur_m VARCHAR(15) NOT NULL;
ALTER TABLE mot ADD CONSTRAINT fk_createur_m FOREIGN KEY (createur_m) REFERENCES usr (pseudo);

ALTER TABLE mot ADD langue_m INT NOT NULL;
ALTER TABLE mot ADD CONSTRAINT fk_langue_m FOREIGN KEY (langue_m) REFERENCES langue (id);
