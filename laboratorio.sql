/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     12/03/2013 03:40:47 p.m.                     */
/*==============================================================*/


drop table if exists analisis;

drop table if exists categoria_analisis;

drop table if exists detalle_cobro;

drop table if exists detalle_insumo;

drop table if exists entrega_resultados;

drop table if exists medico;

drop table if exists orden_analisis;

drop table if exists paciente;

drop table if exists proveedor;

drop table if exists rango;

drop table if exists reserva;

drop table if exists resultado;

drop table if exists seccion;

drop table if exists usuario;

/*==============================================================*/
/* Table: reserva                                               */
/*==============================================================*/
create table reserva
(
   idreserva            int(8) not null auto_increment,
   nombrereserva        varchar(50) not null,
   fechareserva         date,
   primary key (idreserva)
);

/*==============================================================*/
/* Table: paciente                                              */
/*==============================================================*/
create table paciente
(
   idpaciente           int(8) not null auto_increment,
   idreserva            int(8),
   nombrepaciente       varchar(100) not null,
   edadpaciente         int,
   sexopaciente         bool,
   telefonopaciente     int,
   descripcionpaciente  text,
   primary key (idpaciente),
   constraint fk_relationship_7 foreign key (idreserva)
      references reserva (idreserva) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: medico                                                */
/*==============================================================*/
create table medico
(
   idmedico             int(8) not null auto_increment,
   nombremedico         varchar(100) not null,
   emailmedico          varchar(50),
   descripcionmedico    text,
   primary key (idmedico)
);

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   idusuario            int(8) not null auto_increment,
   nombreusuario        varchar(50),
   ciusuario            int,
   telefonousuario      int,
   login                varchar(50) not null,
   password             varchar(50) not null,
   tipousuario          int not null,
   primary key (idusuario)
);

/*==============================================================*/
/* Table: orden_analisis                                        */
/*==============================================================*/
create table orden_analisis
(
   idorden              int(8) not null auto_increment,
   idpaciente           int(8),
   idusuario            int(8),
   idmedico             int(8),
   numeroorden          int not null,
   fechaorden           date not null,
   material             varchar(30),
   estadoorden          varchar(50),
   descripcionorden     text,
   primary key (idorden),
   constraint fk_relationship_1 foreign key (idpaciente)
      references paciente (idpaciente) on delete restrict on update restrict,
   constraint fk_relationship_9 foreign key (idmedico)
      references medico (idmedico) on delete restrict on update restrict,
   constraint fk_relationship_12 foreign key (idusuario)
      references usuario (idusuario) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: analisis                                              */
/*==============================================================*/
create table analisis
(
   idanalisis           int(8) not null auto_increment,
   idorden              int(8),
   nombreanalisis       varchar(50) not null,
   fechanalisis         date,
   primary key (idanalisis),
   constraint fk_relationship_2 foreign key (idorden)
      references orden_analisis (idorden) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: seccion                                               */
/*==============================================================*/
create table seccion
(
   idseccion            int(8) not null auto_increment,
   nombreseccion        varchar(50) not null,
   primary key (idseccion)
);

/*==============================================================*/
/* Table: categoria_analisis                                    */
/*==============================================================*/
create table categoria_analisis
(
   idcategoria          int(8) not null auto_increment,
   idseccion            int(8),
   nombrecategoria      varchar(50) not null,
   descripcioncategoria text,
   primary key (idcategoria),
   constraint fk_relationship_15 foreign key (idseccion)
      references seccion (idseccion) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: detalle_cobro                                         */
/*==============================================================*/
create table detalle_cobro
(
   idcobro              int(8) not null auto_increment,
   idorden              int(8),
   fechacobro           date not null,
   cantidadcobro        int,
   descripcioncobro     text,
   primary key (idcobro),
   constraint fk_relationship_8 foreign key (idorden)
      references orden_analisis (idorden) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: detalle_insumo                                        */
/*==============================================================*/
create table detalle_insumo
(
   iddetalle            int(8) not null auto_increment,
   idorden              int(8),
   nombredetalle        varchar(100) not null,
   fechadetalle         date,
   cantidaddetalle      int,
   descripciondetalle   text,
   costodetalle         int,
   primary key (iddetalle),
   constraint fk_relationship_11 foreign key (idorden)
      references orden_analisis (idorden) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: entrega_resultados                                    */
/*==============================================================*/
create table entrega_resultados
(
   identrega            int(8) not null auto_increment,
   idorden              int(8),
   estadoentrega        varchar(50),
   fechaentrega         date,
   descripcionentrega   text,
   primary key (identrega),
   constraint fk_relationship_5 foreign key (idorden)
      references orden_analisis (idorden) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: proveedor                                             */
/*==============================================================*/
create table proveedor
(
   idproveedor          int(8) not null auto_increment,
   iddetalle            int(8),
   nombreproveedor      varchar(100) not null,
   direccionproveedor   varchar(150),
   emailproveedor       varchar(50),
   telefonoproveedor    int,
   descripcionproveedor text,
   primary key (idproveedor),
   constraint fk_relationship_10 foreign key (iddetalle)
      references detalle_insumo (iddetalle) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: rango                                                 */
/*==============================================================*/
create table rango
(
   idsubcategoria       int(8) not null auto_increment,
   idcategoria          int(8) not null,
   nombrerango          varchar(50) not null,
   descripcionsubcategoria text,
   minimo               float(5),
   maximo               float(5),
   sexo                 varchar(1),
   unidad               varchar(5),
   primary key (idsubcategoria),
   constraint fk_relationship_4 foreign key (idcategoria)
      references categoria_analisis (idcategoria) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: resultado                                             */
/*==============================================================*/
create table resultado
(
   idresultado          int(8) not null auto_increment,
   idseccion            int(8),
   idanalisis           int(8),
   resultado            varchar(50) not null,
   primary key (idresultado),
   constraint fk_relationship_13 foreign key (idanalisis)
      references analisis (idanalisis) on delete restrict on update restrict,
   constraint fk_relationship_14 foreign key (idseccion)
      references seccion (idseccion) on delete restrict on update restrict
);

