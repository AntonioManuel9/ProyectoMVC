drop database if exists dbrally2;
create database if not exists dbrally2;

use dbrally2;

drop table if exists Equipo;
create table if not exists Equipo (

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    nombreE VARCHAR (50) NOT NULL,
    numMecanicos INT
    
);

insert into Equipo values 
(null, 'ESC. SUR', 4),
(null, 'ESC. SLICK', 2),
(null, 'LOCALSPORT', 6);

drop table if exists Pilotos;
create table if not exists Pilotos (

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    equipo_id int unsigned,
	nombreP VARCHAR (30) NOT NULL,
    apellidos VARCHAR (60),
    poblacion varchar (30),
    dni CHAR (9) NOT NULL,
    fechaNac DATE,
    FOREIGN KEY (equipo_id) REFERENCES Equipo(id) ON DELETE CASCADE ON UPDATE CASCADE
    
);

insert into Pilotos values 
(null, 2, 'Francisco', 'Lahera Prieto', 'Prado del Rey', '25634875R', '1991-03-21'),
(null, 1, 'Jose Luis', 'Prado Helten', 'San Fernando', '25756975W', '1985-06-12'),
(null, 3, 'Jesus', 'Navarro Diaz', 'Arcos de la Frontera', '75633998T', '1979-08-28');

drop table if exists Coches;
create table if not exists Coches (

	id int unsigned primary key auto_increment,
    equipo_id int unsigned,
    marca varchar (40) not null,
    modelo varchar (90) not null,
    cilindrada varchar (20) not null,
    FOREIGN KEY (equipo_id) REFERENCES Equipo(id) ON DELETE CASCADE ON UPDATE CASCADE
    
);

insert into Coches values 
(null, 1, 'Opel', 'Astra gsi 16v', '2000cc'),
(null, 2, 'Peugeot', '106 gti', '1600cc'),
(null, 3, 'Citroën', 'zx', '2000cc');

drop table if exists Carrera;
create table if not exists Carrera (

	id int unsigned primary key auto_increment,
    piloto_id int unsigned,
    localizacion varchar (50) not null,
    numParticipantes int,
    fecha date,
    FOREIGN KEY (piloto_id) REFERENCES Pilotos(id) ON DELETE CASCADE ON UPDATE CASCADE
    
);

insert into Carrera values 
(null, 1, 'Subida Algar', 65, '2019-03-08'),
(null, 3, 'Subida Estepona', 70, '2020-03-21');

drop table if exists Etapas;
create table if not exists Etapas (

	id int unsigned primary key auto_increment,
    carrera_id int unsigned,
    FOREIGN KEY (carrera_id) REFERENCES Carrera(id) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into Etapas values
(null, 2),
(null, 1);

drop table if exists Registro;
create table if not exists Registro (

	id int unsigned primary key auto_increment,
    etapa_id int unsigned,
    piloto_id int unsigned,
    coche_id int unsigned,
    salida time,
    llegada time,
    tiempo time,
    
    FOREIGN KEY (etapa_id) REFERENCES etapas(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (piloto_id) REFERENCES pilotos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (coche_id) REFERENCES coches(id) ON DELETE CASCADE ON UPDATE CASCADE
    
);

insert into Registro values 
(null, 1, 2, 1, '00:00:00.0000000', '12:05:06.0000000', '12:05:06.0000000'),
(null, 1, 3, 3, '00:00:00.0000000', '09:25:18.0000000', '09:25:18.0000000');