
create database buscaverde;

use buscaverde;

CREATE TABLE usuarios(
id          int(11) auto_increment not null,
nombre      varchar(100) not null,
apellido    varchar(255) not null,
email       varchar(100) not null,
password    varchar(255) not null,
fecha		date not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=innoDB;

CREATE TABLE tipo(
id          int(255) auto_increment not null,
tipo      	varchar(255) not null,
CONSTRAINT pk_tipo PRIMARY KEY(id),
CONSTRAINT uq_tipo UNIQUE(tipo)
)ENGINE=innoDB;

CREATE TABLE codigopostal(
id          	  int(255) auto_increment not null,
codigopostal      int(255) not null,
CONSTRAINT pk_codigopostal PRIMARY KEY(id),
CONSTRAINT uq_codigopostal UNIQUE(codigopostal)
)ENGINE=innoDB;

CREATE TABLE direccion(
id          int(255) auto_increment not null,
colonia     varchar(255) not null,
CONSTRAINT pk_direccion PRIMARY KEY(id),
CONSTRAINT uq_colonia UNIQUE(colonia)
)ENGINE=innoDB;

CREATE TABLE mensajes(
id          int(255) auto_increment not null,
titulo    	varchar(255) not null,
mensaje    	MEDIUMTEXT not null,
de    		int(11) not null,
para    	 int(11) not null,
fecha  	    datetime not null,
leido    int(11) not null,
CONSTRAINT pk_direccion PRIMARY KEY(id),
CONSTRAINT fk_de_id FOREIGN KEY(de) REFERENCES usuarios(id),
CONSTRAINT fk_para_id FOREIGN KEY(para) REFERENCES usuarios(id)
)ENGINE=innoDB;

CREATE TABLE areasverdes(
id         		    int(11) auto_increment not null,
usuarios_id         int(11) not null,
tipo_id         	int(11) not null,
direccion_id        int(11) not null,
codigopostal_id     int(11) not null,
nombre              varchar(255) not null,
descripcion         MEDIUMTEXT not null,
calle				varchar(255) not null,
arboles             varchar(255) not null,
contacto            varchar(255) not null,
fecha				date not null,
CONSTRAINT pk_areasverdes PRIMARY KEY(id),
CONSTRAINT fk_usuarios_id FOREIGN KEY(usuarios_id) REFERENCES usuarios(id),
CONSTRAINT fk_tipo_id FOREIGN KEY(tipo_id) REFERENCES tipo(id),
CONSTRAINT fk_direccion_id FOREIGN KEY(direccion_id) REFERENCES direccion(id),
CONSTRAINT fk_codigopostal_id FOREIGN KEY(codigopostal_id) REFERENCES codigopostal(id)
)ENGINE=innoDB;

CREATE TABLE comentario(
id         		    int(11) auto_increment not null,
usuarios_id         int(11) not null,
comentario          varchar(255) not null,
responder         	int(11) not null,
fecha				datetime not null,
CONSTRAINT pk_comentarios PRIMARY KEY(id),
CONSTRAINT fk_usuarioscomentario_id FOREIGN KEY(usuarios_id) REFERENCES usuarios(id)
)ENGINE=innoDB;


INSERT INTO usuarios VALUES(null, 'juan', 'perez', 'juan@perez.com', '$2y$04$ATOZz2neWvoB0MFA/lOZjeRnxDkMZIdJt0xthqsdaapvYwFLr8lO.', CURDATE());
INSERT INTO usuarios VALUES(null, 'luis', 'sanchez', 'luis@sanchez.com', '$2y$04$ATOZz2neWvoB0MFA/lOZjeRnxDkMZIdJt0xthqsdaapvYwFLr8lO.', CURDATE());
INSERT INTO usuarios VALUES(null, 'antonio', 'lujan', 'antonio@lujan.com', '$2y$04$ATOZz2neWvoB0MFA/lOZjeRnxDkMZIdJt0xthqsdaapvYwFLr8lO.', CURDATE());
INSERT INTO usuarios VALUES(null, 'jose', 'lozano', 'jose@lozano.com', '$2y$04$ATOZz2neWvoB0MFA/lOZjeRnxDkMZIdJt0xthqsdaapvYwFLr8lO.', CURDATE());

INSERT INTO tipo VALUES(null, 'terreno');
INSERT INTO tipo VALUES(null, 'parque');
INSERT INTO tipo VALUES(null, 'llanura');
INSERT INTO tipo VALUES(null, 'arboleda');

INSERT INTO codigopostal VALUES(null, 87350);
INSERT INTO codigopostal VALUES(null, 87345);
INSERT INTO codigopostal VALUES(null, 87340);
INSERT INTO codigopostal VALUES(null, 87355);

INSERT INTO direccion VALUES(null, 'modelo');
INSERT INTO direccion VALUES(null, 'satelite');
INSERT INTO direccion VALUES(null, 'brisas');
INSERT INTO direccion VALUES(null, 'palmares');

INSERT INTO mensajes VALUES(null, 'hola que tal', 'te he hechado de menos', 1, 2, NOW(), 1);
INSERT INTO mensajes VALUES(null, 'que haces', 'tengo varios pendientes por hacer', 2, 3, NOW(), 1);
INSERT INTO mensajes VALUES(null, 'tan feliz', 'ya hice la tarea', 3, 4, NOW(), 1);
INSERT INTO mensajes VALUES(null, 'hola', 'tengo algo que preguntarte', 4, 1, NOW(), 1);

INSERT INTO comentario VALUES(null, 1, 'bienvenidos a la pagina', 0, NOW());
INSERT INTO comentario VALUES(null, 2, 'que estan haciendo?', 0, NOW());
INSERT INTO comentario VALUES(null, 3, 'he borrado una colonia por error', 0, NOW());
INSERT INTO comentario VALUES(null, 4, 'hay que agregar mas areas verdes', 0, NOW());

INSERT INTO areasverdes VALUES(null, 1, 1, 1, 1, 'parque satelite', 'es un parque con urgencia de mantenimiento', 'lazaro cardenas 432 entre 2 y 3', 'doce', 'contacto@contacto.com', CURDATE());

INSERT INTO areasverdes VALUES(null, 2, 3, 2, 2, 'la rotonda', 'parque de ejemplo', 'lazaro cardenas 432 entre 2 y 3', 'cuarenta', 'contactocuatro@contacto.com', CURDATE());

INSERT INTO areasverdes VALUES(null, 3, 4, 4, 3, 'el laguito', 'zona de juegos para grandes y chicos', 'lazaro cardenas 432 entre 2 y 3', 'veinte', 'contactotres@contacto.com', CURDATE());

INSERT INTO areasverdes VALUES(null, 4, 2, 3, 4, 'nueva creacion', 'zona para caminar con amigos', 'lazaro cardenas 432 entre 2 y 3', 'dieciocho', 'contactodos@contacto.com', CURDATE());
