-- truncate para reiniciar indices (id)
-- eliminar constraints por su nombre, consultar nombre en query

-- no se puede ejecutar script en motor DB con comentarios

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

-- insertar categorias
insert into categorias (nombre)
values ("frutas");

insert into categorias (nombre)
values ("verduras");

-- insertar productos
insert into productos (idCategoria, nombre, precio, estado)
values (1, "naranja", 5000, 1), (1, "manzana", 2000, 1);

-- -- crear FK
-- alter table productos add constraint  name_constraint foreign key (idCategoria)references categorias(idCategoria);

-- -- eliminar FK
-- alter table productos drop constraint name_constraint;