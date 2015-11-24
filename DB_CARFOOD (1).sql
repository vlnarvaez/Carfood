/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     18/11/2015 19:59:16                          */
/*==============================================================*/


drop table if exists CLIENTE;

drop table if exists DETALLE;

drop table if exists FACTURA;

drop table if exists MENU;

drop table if exists MESA;

drop table if exists PEDIDOS;

drop table if exists PLATOS;

drop table if exists RELATIONSHIP_4;

drop table if exists RELATIONSHIP_6;

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
   EMAIL                varchar(40),
   primary key (CEDULA)
);

/*==============================================================*/
/* Table: DETALLE                                               */
/*==============================================================*/
create table DETALLE
(
   ID_DETALLE           varchar(5) not null,
   ID_PEDIDO            varchar(5),
   ID_FACTURA           int,
   primary key (ID_DETALLE)
);

/*==============================================================*/
/* Table: FACTURA                                               */
/*==============================================================*/
create table FACTURA
(
   ID_FACTURA           int not null,
   FECHA                char(10),
   VALOR_TOTAL          char(10),
   primary key (ID_FACTURA)
);

/*==============================================================*/
/* Table: MENU                                                  */
/*==============================================================*/
create table MENU
(
   ID_MENU              varchar(5) not null,
   ID_PRIMERO           varchar(50),
   ID_SEGUNDO           varchar(50),
   ID_POSTRE            varchar(50),
   PRECIO               decimal,
   TIPO                 varchar(30),
   primary key (ID_MENU)
);

/*==============================================================*/
/* Table: MESA                                                  */
/*==============================================================*/
create table MESA
(
   ID_MESA              varchar(5) not null,
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
   ID_PEDIDO            varchar(5) not null,
   ID_MESA              varchar(5),
   ID_DETALLE           varchar(5),
   ID_COMPONENTE        varchar(25),
   OBSERVACION          varchar(50),
   primary key (ID_PEDIDO)
);

/*==============================================================*/
/* Table: PLATOS                                                */
/*==============================================================*/
create table PLATOS
(
   ID_PLATO             varchar(5) not null,
   CEDULA               int,
   NOMBRE               varchar(50),
   DETALLE              varchar(50),
   PRECIO               decimal,
   primary key (ID_PLATO)
);

/*==============================================================*/
/* Table: RELATIONSHIP_4                                        */
/*==============================================================*/
create table RELATIONSHIP_4
(
   ID_FACTURA           int not null,
   CEDULA               int not null,
   primary key (ID_FACTURA, CEDULA)
);

/*==============================================================*/
/* Table: RELATIONSHIP_6                                        */
/*==============================================================*/
create table RELATIONSHIP_6
(
   ID_MENU              varchar(5) not null,
   ID_PLATO             varchar(5) not null,
   primary key (ID_MENU, ID_PLATO)
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   ID_USUARIO           varchar(5) not null,
   USUARIO              varchar(30),
   CONTRASENIA          varchar(30),
   TIPO                 varchar(30),
   primary key (ID_USUARIO)
);

alter table DETALLE add constraint FK_RELATIONSHIP_3 foreign key (ID_FACTURA)
      references FACTURA (ID_FACTURA) on delete restrict on update restrict;

alter table DETALLE add constraint FK_RELATIONSHIP_7 foreign key (ID_PEDIDO)
      references PEDIDOS (ID_PEDIDO) on delete restrict on update restrict;

alter table PEDIDOS add constraint FK_RELATIONSHIP_1 foreign key (ID_MESA)
      references MESA (ID_MESA) on delete restrict on update restrict;

alter table PEDIDOS add constraint FK_RELATIONSHIP_2 foreign key (ID_DETALLE)
      references DETALLE (ID_DETALLE) on delete restrict on update restrict;

alter table PLATOS add constraint FK_RELATIONSHIP_5 foreign key (CEDULA)
      references CLIENTE (CEDULA) on delete restrict on update restrict;

alter table RELATIONSHIP_4 add constraint FK_RELATIONSHIP_4 foreign key (ID_FACTURA)
      references FACTURA (ID_FACTURA) on delete restrict on update restrict;

alter table RELATIONSHIP_4 add constraint FK_RELATIONSHIP_8 foreign key (CEDULA)
      references CLIENTE (CEDULA) on delete restrict on update restrict;

alter table RELATIONSHIP_6 add constraint FK_RELATIONSHIP_6 foreign key (ID_MENU)
      references MENU (ID_MENU) on delete restrict on update restrict;

alter table RELATIONSHIP_6 add constraint FK_RELATIONSHIP_9 foreign key (ID_PLATO)
      references PLATOS (ID_PLATO) on delete restrict on update restrict;

