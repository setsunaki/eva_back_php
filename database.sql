--Creacion de las tablas y schema
CREATE DATABASE IF NOT EXISTS api_eva;
USE api_eva;
USE api_eva;

CREATE TABLE marca(
id              int (255) auto_increment not null,
nombre          varchar(255) not null,
CONSTRAINT pk_marca PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE bodega(
id              int (255) auto_increment not null,
nombre          varchar(255) not null,
CONSTRAINT pk_bodega PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE modelo(
id              int (255) auto_increment not null,
nombre          varchar(255) not null,
id_marca        int (255) not null,
CONSTRAINT pk_marca PRIMARY KEY(id),
CONSTRAINT fk_modelo_marca FOREIGN KEY (id_marca) REFERENCES marca(id)
)ENGINE=InnoDb;

CREATE TABLE dispositivo(
id              int (255) auto_increment not null,
nombre          varchar(255) not null,
id_modelo       int (255) not null,
id_bodega		int(255) not null,
CONSTRAINT pk_dispositivo PRIMARY KEY(id),
CONSTRAINT fk_dispositivo_modelo FOREIGN KEY (id_modelo) REFERENCES modelo(id),
CONSTRAINT fk_dispositivo_bodega FOREIGN KEY (id_bodega) REFERENCES bodega(id)
)ENGINE=InnoDb;

--Poblar las tablas
INSERT INTO bodega VALUES(1,"Bodega pequeña");
INSERT INTO bodega VALUES(2,"Bodega mediana");
INSERT INTO bodega VALUES(3,"Bodega grande");

INSERT INTO marca VALUES(1,"Samsung");
INSERT INTO marca VALUES(2,"Xiaomi");
INSERT INTO marca VALUES(3,"Asus");
INSERT INTO marca VALUES(4,"Acer");
INSERT INTO marca VALUES(5,"Apple");
INSERT INTO marca VALUES(6,"hyperx");

INSERT INTO modelo VALUES(1,"Odyssey",1);
INSERT INTO modelo VALUES(2,"12T pro",2);
INSERT INTO modelo VALUES(3,"Tuf gaming",3);
INSERT INTO modelo VALUES(4,"Rog strix",3);
INSERT INTO modelo VALUES(5,"Nitro 5",4);
INSERT INTO modelo VALUES(6,"Iphone 11",5);
INSERT INTO modelo VALUES(7,"Alloy fps",6);

INSERT INTO dispositivo VALUES(1,"Monitor",1,2);
INSERT INTO dispositivo VALUES(2,"Celular",2,1);
INSERT INTO dispositivo VALUES(3,"Notebook",3,3);
INSERT INTO dispositivo VALUES(4,"Notebook",4,3);
INSERT INTO dispositivo VALUES(5,"Notebook",5,2);
INSERT INTO dispositivo VALUES(6,"Celular",6,1);
INSERT INTO dispositivo VALUES(7,"Teclado mecanico",7,1);