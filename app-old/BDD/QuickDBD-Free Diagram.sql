
-- ------CREATE DATABASE-------
create database leshautify;


-- ----- ID bdd leshautify --------
create user 'admin'@'localhost' identified by 'password';
grant all privileges on leshautify . * to 'admin'@'localhost';
FLUSH PRIVILEGES;


-- --- tables -----
create table user  (
    id int PRIMARY KEY auto_increment not null,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    pseudo varchar(50) null unique,
    email varchar(255) not null unique,
    password varchar(255) not null
);

create table playlist (
    id_playlist int PRIMARY KEY auto_increment not null,
    list_name varchar(255) not null,
    user_id int NOT NULL,
    CONSTRAINT `fk_playlist_user` 
    FOREIGN KEY (user_id) 
    REFERENCES user (id)
);


create table album (
    id_album int not null auto_increment,
    album_title varchar(255) not null,
    album_year int null,
    PRIMARY KEY (id_album)
);

create table artist (
    id_artist int not null auto_increment,
    artist_name varchar(255) not null,
    PRIMARY KEY (id_artist)
);



create table track (
    id_track int not null auto_increment,
    album_id int not null,
    track_title varchar(255) not null,
    -- track number peut etre null --> un track peut ne pas avoir d'album
    track_number int null,
    track_length int not null,
    -- un truc peut ne pas avoir de playlist
    playlist_id int null,
    PRIMARY KEY(id_track),

    CONSTRAINT `fk_associate_track_album`
    FOREIGN KEY (album_id)
    REFERENCES album(id_album)
    on update cascade on delete cascade
);

-- TABLE D'ASSOCIATION
-- pour les tables d'associations on met table_id au lieu de id_table pour les tables mère

create table playlist_track (
    -- on ne fait pas de clef composite car on veut pouvoir utiliser plusieures fois le meme track dans une playlist 
    -- on le met donc en auto increment 
    track_playlist_id int auto_increment not null ,
    playlist_id int not null,
    track_id int not null,
    PRIMARY KEY (track_playlist_id),

    CONSTRAINT `fk_associate_playlist_track`
    FOREIGN KEY (track_playlist_id)
    REFERENCES playlist (id_playlist),

    CONSTRAINT `fk_associate_track_playlist`
    FOREIGN KEY (track_id)
    REFERENCES track (id_track)

);

-- pas beosin de user_track pour l'instant à mettre si on veut faire une fonction d'achat
-- create table user_track (
--     user_id int not null,
--     track_id int not null,
--     PRIMARY KEY (user_id, track_id),

--     CONSTRAINT `fk_associate_user_track`
--     FOREIGN KEY (user_id)
--     REFERENCES user (id),

--     CONSTRAINT `fk_associate_track_user`
--     FOREIGN KEY (track_id)
--     REFERENCES track (id_track)
-- );

create table artist_track (
    track_id int not null,
    artist_id int not null,
    PRIMARY KEY (track_id, artist_id),

    CONSTRAINT `fk_associate_track_artist`
    FOREIGN KEY (track_id)
    REFERENCES track (id_track),

    CONSTRAINT `fk_associate_artist_track`
    FOREIGN KEY (artist_id)
    REFERENCES artist (id_artist)

);

create table album_artist(
    artist_id int not null,
    album_id int not null,
    PRIMARY KEY (artist_id, album_id),

    CONSTRAINT `fk_associate_artist_album`
    FOREIGN KEY (artist_id)
    REFERENCES artist (id_artist)
    on update cascade on delete cascade,

    CONSTRAINT `fk_associate_album_artist`
    FOREIGN KEY (album_id)
    REFERENCES album (id_album)
    on update cascade on delete cascade
    
);




-- facultatif mettre un role dans la table artisttrack pour les artistes
-- l'artiste participe à la track, la track appartient ou pas à un album
-- l'album appartient à un "groupe" 
-- les tables a créer : user, album, artistes, artiste
