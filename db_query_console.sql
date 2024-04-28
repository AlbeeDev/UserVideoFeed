create database videofeed;
use videofeed;

create table User(
    id int primary key auto_increment,
    username varchar(255),
    email varchar(255),
    password varchar(255),
    is_admin boolean
);

create table Category(
    id int primary key auto_increment,
    name varchar(255),
    description text
);

create table Video(
    id int primary key auto_increment,
    title varchar(255),
    length int,
    link varchar(255),
    id_category int,
    id_user int,
    foreign key (id_category) references category(id),
    foreign key (id_user) references user(id)
);

create table Rating(
    id int primary key auto_increment,
    rating int,
    check(rating between 0 and 5),
    id_utente int,
    id_video int,
    foreign key (id_utente) references user(id),
    foreign key (id_video) references Video(id)
);