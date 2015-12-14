/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     14/12/2015 12:19:05                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists DETALLE;

drop table if exists MESA;

drop table if exists PEDIDOS;

drop table if exists PLATOS;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: CLIENTE                                               */
/*==============================================================*/
create table CLIENTE
(
   CEDULA               int not null,
   NOMBRES              varchar(40),
   APELLIDOS            varchar(40),
   TELEFONO             int,
   EMAIL                varchar(60),
   primary key (CEDULA)
);

/*==============================================================*/
/* Table: DETALLE                                               */
/*==============================================================*/
create table DETALLE
(
   ID_PLATO             varchar(5) not null,
   ID_PEDIDO            int not null,
   primary key (ID_PLATO, ID_PEDIDO)
);

/*==============================================================*/
/* Table: MESA                                                  */
/*==============================================================*/
create table MESA
(
   ID_MESA              longtext not null,
   CEDULA               int,
   ID_PEDIDO            int,
   ESTADO               varchar(25),
   CAPACIDAD            int,
   DETALLE              varchar(50),
   primary key (ID_MESA)
);

/*==============================================================*/
/* Table: PEDIDOS                                               */
/*==============================================================*/
create table PEDIDOS
(
   ID_PEDIDO            int not null,
   CEDULA               int,
   TOTAL                decimal,
   primary key (ID_PEDIDO)
);

/*==============================================================*/
/* Table: PLATOS                                                */
/*==============================================================*/
create table PLATOS
(
   ID_PLATO             varchar(5) not null,
   NOMBRE               varchar(40),
   DETALLE              varchar(50),
   PRECIO               decimal,
   TIPO_PLATO           varchar(40),
   IMAGEN               varchar(250),
   primary key (ID_PLATO)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   ID_USUARIO           int not null,
   USUARIO              varchar(20),
   CONTRASENIA          varchar(40),
   TIPO_USUARIO         varchar(25),
   primary key (ID_USUARIO)
);

alter table DETALLE add constraint FK_DETALLE foreign key (ID_PLATO)
      references PLATOS (ID_PLATO) on delete restrict on update restrict;

alter table DETALLE add constraint FK_DETALLE2 foreign key (ID_PEDIDO)
      references PEDIDOS (ID_PEDIDO) on delete restrict on update restrict;

alter table MESA add constraint FK_PIDEN foreign key (ID_PEDIDO)
      references PEDIDOS (ID_PEDIDO) on delete restrict on update restrict;

alter table MESA add constraint FK_RESERVA foreign key (CEDULA)
      references CLIENTE (CEDULA) on delete restrict on update restrict;

alter table PEDIDOS add constraint FK_REALIZA foreign key (CEDULA)
      references CLIENTE (CEDULA) on delete restrict on update restrict;

