/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     11/04/2013 04:53:33 p.m.                     */
/*==============================================================*/


drop table if exists CATEGORIA;

drop table if exists COSTO;

drop table if exists INSUMO;

drop table if exists MEDICO;

drop table if exists ORDEN;

drop table if exists PACIENTE;

drop table if exists PROVEEDOR;

drop table if exists RANGO;

drop table if exists RESULTADO;

drop table if exists SECCION;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: CATEGORIA                                             */
/*==============================================================*/
create table CATEGORIA
(
   IDCATEGORIA          int(8) not null auto_increment,
   IDSECCION            int not null,
   NOMBRECATEGORIA      varchar(50) not null,
   DESCRIPCIONCATEGORIA varchar(1024),
   primary key (IDCATEGORIA)
);

/*==============================================================*/
/* Table: COSTO                                                 */
/*==============================================================*/
create table COSTO
(
   IDCOBRO              int(8) not null auto_increment,
   IDORDEN              int,
   FECHA                datetime not null,
   CANTIDAD             float not null,
   DESCRIPCION          varchar(1024),
   primary key (IDCOBRO)
);

/*==============================================================*/
/* Table: INSUMO                                                */
/*==============================================================*/
create table INSUMO
(
   IDINSUMO             int(8) not null auto_increment,
   IDORDEN              int not null,
   IDPROVEEDOR          int not null,
   NOMBRE               varchar(50) not null,
   FECHA                datetime not null,
   DESCRIPCION          varchar(1024),
   primary key (IDINSUMO)
);

/*==============================================================*/
/* Table: MEDICO                                                */
/*==============================================================*/
create table MEDICO
(
   IDMEDICO             int(8) not null auto_increment,
   NOMBRE               varchar(50) not null,
   EMAIL                varchar(50),
   TELEFONO             varchar(1024) not null,
   primary key (IDMEDICO)
);

/*==============================================================*/
/* Table: ORDEN                                                 */
/*==============================================================*/
create table ORDEN
(
   IDORDEN              int(8) not null auto_increment,
   IDUSUARIO            int not null,
   IDMEDICO             int not null,
   FECHAPEDIDO          datetime not null,
   DESCRIPCIONORDEN     varchar(1024),
   MATERIAL             varchar(255),
   ESTADO               varchar(50),
   FECHAENTREGA         date,
   primary key (IDORDEN)
);

/*==============================================================*/
/* Table: PACIENTE                                              */
/*==============================================================*/
create table PACIENTE
(
   IDPACIENTE           int(8) not null auto_increment,
   IDORDEN              int,
   NOMBRE               varchar(50) not null,
   EDAD                 int not null,
   SEXO                 varchar(1) not null,
   TELEFONO             varchar(1024) not null,
   DESCRIPCION          varchar(1024) not null,
   primary key (IDPACIENTE)
);

/*==============================================================*/
/* Table: PROVEEDOR                                             */
/*==============================================================*/
create table PROVEEDOR
(
   IDPROVEEDOR          int(8) not null auto_increment,
   NOMBRE               varchar(50) not null,
   DIRECCION            varchar(150),
   EMAIL                varchar(50),
   TELEFONO             varchar(1024),
   DESCRIPCION          varchar(1024),
   primary key (IDPROVEEDOR)
);

/*==============================================================*/
/* Table: RANGO                                                 */
/*==============================================================*/
create table RANGO
(
   IDRANGO              int(8) not null auto_increment,
   IDCATEGORIA          int not null,
   NOMBRE               varchar(50) not null,
   DESCRIPCION          varchar(1024),
   MINIMO               float,
   MAXIMO               float,
   UNIDAD               varchar(5) not null,
   primary key (IDRANGO)
);

/*==============================================================*/
/* Table: RESULTADO                                             */
/*==============================================================*/
create table RESULTADO
(
   IDRESULTADO          int(8) not null auto_increment,
   IDRANGO              int not null,
   IDORDEN              int not null,
   IDCATEGORIA          int not null,
   RESULTADO            float not null,
   DESCRIPCION          varchar(1024) not null,
   primary key (IDRESULTADO)
);

/*==============================================================*/
/* Table: SECCION                                               */
/*==============================================================*/
create table SECCION
(
   IDSECCION            int(8) not null auto_increment,
   NOMBRESECCION        varchar(50) not null,
   primary key (IDSECCION)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   IDUSUARIO            int(8) not null auto_increment,
   NOMBRE               varchar(50) not null,
   APELLIDO             varchar(50) not null,
   CI                   int not null,
   TELEFONO             varchar(1024) not null,
   LOGIN                varchar(50) not null,
   PASSWORD             varchar(50) not null,
   TIPOUSUARIO          int not null,
   primary key (IDUSUARIO)
);

alter table CATEGORIA add constraint FK_SECCION_CATEGORIA foreign key (IDSECCION)
      references SECCION (IDSECCION) on delete restrict on update restrict;

alter table COSTO add constraint FK_RELATIONSHIP_10 foreign key (IDORDEN)
      references ORDEN (IDORDEN) on delete restrict on update restrict;

alter table INSUMO add constraint FK_INSUMO_PROVEEDOR foreign key (IDPROVEEDOR)
      references PROVEEDOR (IDPROVEEDOR) on delete restrict on update restrict;

alter table INSUMO add constraint FK_ORDEN_INSUMO foreign key (IDORDEN)
      references ORDEN (IDORDEN) on delete restrict on update restrict;

alter table ORDEN add constraint FK_MEDICO_ORDEN foreign key (IDMEDICO)
      references MEDICO (IDMEDICO) on delete restrict on update restrict;

alter table ORDEN add constraint FK_USUARIO_ORDEN foreign key (IDUSUARIO)
      references USUARIO (IDUSUARIO) on delete restrict on update restrict;

alter table PACIENTE add constraint FK_RELATIONSHIP_9 foreign key (IDORDEN)
      references ORDEN (IDORDEN) on delete restrict on update restrict;

alter table RANGO add constraint FK_RANGO_CATEGORIA foreign key (IDCATEGORIA)
      references CATEGORIA (IDCATEGORIA) on delete restrict on update restrict;

alter table RESULTADO add constraint FK_ORDEN_RESULTADO foreign key (IDORDEN)
      references ORDEN (IDORDEN) on delete restrict on update restrict;

alter table RESULTADO add constraint FK_RESULTADO_CATEGORIA foreign key (IDCATEGORIA)
      references CATEGORIA (IDCATEGORIA) on delete restrict on update restrict;

alter table RESULTADO add constraint FK_RESULTADO_RANGO foreign key (IDRANGO)
      references RANGO (IDRANGO) on delete restrict on update restrict;

