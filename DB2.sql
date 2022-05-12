create DATABASE tienda;

use tienda;

CREATE TABLE categorias (
	idCategoria int PRIMARY KEY AUTO_INCREMENT,
    nombre varchar (40) unique not null
);

CREATE TABLE productos(
	idProducto int PRIMARY KEY,
    idCategoria int not null,
    FOREIGN KEY (idCategoria) REFERENCES categorias(idCategoria),
  	nombre varchar (30) unique not null,
    precio double (8,2) NOT null,
    estado int(1) NOT null
);

insert into categorias (nombre)
values ("frutas");

insert into categorias (nombre)
values ("verduras");

insert into productos (idProducto,idCategoria, nombre, precio, estado)
values (1, 1, "naranja", 5000, 1), (2, 1, "manzana", 2000, 1);