CREATE DATABASE `feriate_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE feriate_db;

/* Por convencion los nombres de las columbas llevan la abreviacion del nombre de la tabla
guion bajo (_) y el nombre de la columna, para identificarlos con mayor facilidad. Por ejemplo :
  `comp_pr_id` : significa tabla compras - producto_id*/


  CREATE TABLE `usuarios` (
    `us_id` int(11) NOT NULL AUTO_INCREMENT,
    `us_nombre` varchar(45) NOT NULL,
    `us_apellido` varchar(45) NOT NULL,
    `us_email` varchar(45) NOT NULL,
    `us_pass` varchar(100) NOT NULL,
    `us_tel` int(11) DEFAULT NULL,
    `us_direccion` varchar(100) DEFAULT NULL,
    `us_localidad` varchar(45) DEFAULT NULL,
    `us_pais` int(11) DEFAULT NULL,
    `us_fecha_reg` datetime DEFAULT NULL,
    `us_intentos_log` int(11) DEFAULT NULL,
    `us_activo` tinyint(4) DEFAULT NULL,
    `us_notificaciones` tinyint(4) DEFAULT NULL,
    PRIMARY KEY (`us_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

    CREATE TABLE `ferias` (
    `fe_id` int(11) NOT NULL AUTO_INCREMENT,
    `fe_us_id` int(11) NOT NULL,
    `fe_nombre` varchar(100) NOT NULL,
    `fe_desde` varchar(45) NOT NULL,
    `fe_hasta` varchar(45) NOT NULL,
    `fe_ubicacion` varchar(45) NOT NULL,
    `fe_descripcion` longtext NOT NULL,
    `fe_fecha_creacion` datetime NOT NULL,
    `fe_activa` tinyint(4) DEFAULT NULL,
    `fe_baneado` tinyint(4) DEFAULT NULL,
    PRIMARY KEY (`fe_id`),
    KEY `fe_us_id` (`fe_us_id`),
    CONSTRAINT `fe_us_id` FOREIGN KEY (`fe_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

  CREATE TABLE `categorias` (
    `cat_id` int(11) NOT NULL AUTO_INCREMENT,
    `cat_nombre` varchar(45) NOT NULL,
    `cat_img` longtext,
    `cat_descripcion` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`cat_id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


   CREATE TABLE `productos` (
    `pr_id` int(11) NOT NULL AUTO_INCREMENT,
    `pr_nombre` varchar(45) NOT NULL,
    `pr_precio` decimal(10,0) DEFAULT NULL,
    `pr_cantidad` int(11) DEFAULT NULL,
    `pr_descripcion` varchar(45) DEFAULT NULL,
    `pr_baneado` tinyint(4) DEFAULT NULL,
    `pr_destino` tinyint(4) NOT NULL,
    `pr_talle` varchar(45) DEFAULT NULL,
    `pr_marca` varchar(45) DEFAULT NULL,
    `pr_estado` varchar(45) DEFAULT NULL,
    `pr_fe_id` int(11) NOT NULL,
    `pr_cat_id` int(11) NOT NULL,
    `pr_us_id` int(11) NOT NULL,
    PRIMARY KEY (`pr_id`),
    KEY `fkey_us_id` (`pr_us_id`),
    KEY `fkey_cat_id` (`pr_cat_id`),
    KEY `fkey_fe_id` (`pr_fe_id`),
    CONSTRAINT `fkey_cat_id` FOREIGN KEY (`pr_cat_id`) REFERENCES `categorias` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fkey_fe_id` FOREIGN KEY (`pr_fe_id`) REFERENCES `ferias` (`fe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fkey_us_id` FOREIGN KEY (`pr_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 COMMENT='\n';


  CREATE TABLE `carrito` (
    `carr_id` int(11) NOT NULL AUTO_INCREMENT,
    `carr_pr_id` int(11) NOT NULL,
    `carr_us_id` int(11) NOT NULL,
    PRIMARY KEY (`carr_id`),
    KEY `carr_us_id` (`carr_us_id`),
    KEY `carr_pr_id` (`carr_pr_id`),
    CONSTRAINT `carr_pr_id` FOREIGN KEY (`carr_pr_id`) REFERENCES `productos` (`pr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `carr_us_id` FOREIGN KEY (`carr_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


  CREATE TABLE `comentarios` (
    `com_id` int(11) NOT NULL AUTO_INCREMENT,
    `com_us_id` int(11) NOT NULL,
    `com_fe_id` int(11) NOT NULL,
    `com_texto` varchar(200) NOT NULL,
    `com_date` datetime NOT NULL,
    `com_baneado` tinyint(4) DEFAULT NULL,
    PRIMARY KEY (`com_id`),
    KEY `com_us_id` (`com_us_id`),
    KEY `com_fe_id` (`com_fe_id`),
    CONSTRAINT `com_fe_id` FOREIGN KEY (`com_fe_id`) REFERENCES `ferias` (`fe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `com_us_id` FOREIGN KEY (`com_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  CREATE TABLE `compras` (
    `comp_id` int(11) NOT NULL AUTO_INCREMENT,
    `comp_pr_id` int(11) NOT NULL,
    `comp_us_id` int(11) NOT NULL,
    PRIMARY KEY (`comp_id`),
    KEY `comp_us_id` (`comp_us_id`),
    KEY `comp_pr_id` (`comp_pr_id`),
    CONSTRAINT `comp_pr_id` FOREIGN KEY (`comp_pr_id`) REFERENCES `productos` (`pr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `comp_us_id` FOREIGN KEY (`comp_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;



  CREATE TABLE `imagenes` (
    `img_id` int(11) NOT NULL AUTO_INCREMENT,
    `img_pr_id` int(11) DEFAULT NULL,
    `img_fe_id` int(11) DEFAULT NULL,
    `img_nombre` varchar(100) NOT NULL,
    `img_us_id` int(11) DEFAULT NULL,
    PRIMARY KEY (`img_id`),
    KEY `pr_id` (`img_pr_id`),
    KEY `fe_id` (`img_fe_id`),
    KEY `us_id` (`img_us_id`),
    CONSTRAINT `fe_id` FOREIGN KEY (`img_fe_id`) REFERENCES `ferias` (`fe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `pr_id` FOREIGN KEY (`img_pr_id`) REFERENCES `productos` (`pr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `us_id` FOREIGN KEY (`img_us_id`) REFERENCES `usuarios` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


  /*TABLA CATEGORIAS*/
  INSERT INTO feriate_db.categorias VALUES (default, 'Ropa ', 'inicio.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Accesorios', '14.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Electro', 'electro.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Muebles', 'muebles.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Calzado', 'shoes.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Juguetes', 'juguetes.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Bazar', 'vajilla.jpg', NULL);
  INSERT INTO feriate_db.categorias VALUES (default, 'Varios', 'logo_feriate_deffault_ii.PNG', NULL);


  /*TABLA USUARIOS*/

  INSERT INTO feriate_db.usuarios VALUES (default, 'Carolina', 'C. Cia ', 'caro@feriate.com', '$2y$10$SJuDwaULodg3RBmxGbNoc.nncAY94U3oFB2X3/vQxe9ZMLiYczLqW', NULL, NULL, NULL, NULL, '2019-07-26 00:00:00', NULL, '1', '1');
  INSERT INTO feriate_db.usuarios VALUES (default, 'Maria ', 'Antonieta', 'mantonieta@hotmail.com', '$2y$10$6xmpILCNqE2jg65/im1VgeM/AArSa8lJ936OGNRHqzZBuAcaA1M0i', NULL, NULL, NULL, NULL, '2019-07-26 00:00:00', NULL, '1', '1');
  INSERT INTO feriate_db.usuarios VALUES (default, 'Pilar', 'Sanchez', 'sanchezmendozapilar@gmail.com', '$2y$10$JF5uJYtbdQQ1g0a3XVokKuKcy7ASYJbQGOqnRicngz9GXdMODSTnm', NULL, NULL, NULL, NULL, '2019-07-27 00:00:00', NULL, '1', '1');

  /*TABLA FERIAS*/
  INSERT INTO feriate_db.ferias VALUES (default, '1', 'CARO ESTA DE REMATE', 'liquidaciÃ³n de ropa y accesorios de invierno', '07/26/2019', 'Perito Moreno 30 Godoy Cruz, Mendoza', '07/21/2019', '2019-07-26 00:00:00', NULL, NULL);
  INSERT INTO feriate_db.ferias VALUES(default, '3', 'Plan B', 'de todo para tu casa!!', '08/01/2019', 'Modesto Lima 248, Lujan de Cuyo, Mendoza', '08/10/2019', '2019-07-27 00:00:00', NULL, NULL);
  INSERT INTO feriate_db.ferias VALUES(default, '3', 'Electra Fest', 'lamparas de diseÃ±o', '07/31/2019', 'Plaza Independencia', '08/03/2019', '2019-07-27 00:00:00', NULL, NULL);
  INSERT INTO feriate_db.ferias VALUES(default, '3', 'Muebles Vintage', 'Beltran 50 Godoy Cruz Mendoza', 'muebles de estilo ', '08/14/2019', '08/18/2019', '2019-07-27 00:00:00', NULL, NULL);
  INSERT INTO feriate_db.ferias VALUES(default, '1', 'FERIA DEL JUGUETE', 'Polideportivo de Lujan', 'edicion especial dia del Ã±ino!!!!!', '08/01/2019', '08/15/2019', '2019-07-27 00:00:00', NULL, NULL);


  /*TABLA PRODUCTOS*/
  INSERT INTO feriate_db.productos VALUES (default, 'Camisa Hombre', '350', '3', 'Camisa Hombre manga corta', NULL, '0', 'xs', NULL, 'nuevo', '1', '1', '1');
  INSERT INTO feriate_db.productos VALUES (default, 'Zapatos Mujer', '700', '1', 'Zapatos de fiesta taco alto', NULL, '0', 'xs', NULL, 'bueno', '1', '5', '1');
  INSERT INTO feriate_db.productos VALUES (default, 'Pantalones Hombre', '100', '30', 'gran variedad', NULL, '0', '2', NULL, 'bueno', '2', '1', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'Varios Hombre', '50', '100', 'indumentaria en general para hombres', NULL, '0', 'xs', NULL, 'bueno', '2', '1', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'Tazas', '10', '50', 'tazas para desayuno', NULL, '0', 'xs', NULL, 'elige', '2', '7', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'lamparas', '300', '50', 'variadas y originales', NULL, '0', 'xs', NULL, 'elige', '3', '3', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'lamparas orientales', '600', '15', 'originales diseÃ±os ', NULL, '0', 'xs', NULL, 'elige', '3', '3', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'juguetes ', '1', '1000', 'encontrÃ¡ el juguete perfecto!! ', NULL, '0', 'xs', NULL, 'elige', '5', '6', '1');
  INSERT INTO feriate_db.productos VALUES (default, 'juguetes ', '1', '1000', 'gran variedad para todas las edades', NULL, '0', 'xs', NULL, 'elige', '5', '6', '1');
  INSERT INTO feriate_db.productos VALUES (default, 'stand de juguetes originales', '1', '1900', 'juguetes para toda la vida', NULL, '0', 'xs', NULL, 'elige', '5', '6', '1');
  INSERT INTO feriate_db.productos VALUES (default, 'muebles ', '50', '1', 'zapatero', NULL, '0', 'xs', NULL, 'elige', '4', '4', '3');
  INSERT INTO feriate_db.productos VALUES (default, 'muebles living', '1', '50', 'living de estilo', NULL, '0', 'xs', NULL, 'elige', '4', '4', '3');

  /*TABLA IMAGENES*/
  INSERT INTO feriate_db.imagenes VALUES (default, NULL, '1', 'camisas.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '1', NULL, '', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '2', NULL, '', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, NULL, '2', 'feria-americana-en-manos-abiertas.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '3', NULL, 'pantalon hombre.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '4', NULL, 'varios hombre.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '5', NULL, 'vajilla.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, NULL, '3', 'lamparas.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, NULL, '4', 'sillon.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '6', NULL, 'lamparas.jpg', NULL);
  INSERT  INTO feriate_db.imagenes VALUES (default, '7', NULL, 'lamparas 2.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, NULL, '5', 'juguetes feria.jpg', NULL);
  INSERT INTO feriate_db.imagenes  VALUES (default, '8', NULL, 'juguetes 1.jpg', NULL);
  INSERT INTO feriate_db.imagenes VALUES (default, '9', NULL, 'juguetes 2.jpg', NULL);
  INSERT INTO feriate_db.imagenes  VALUES (default, '10', NULL, 'juguetes 5.png', NULL);
  INSERT INTO feriate_db.imagenes  VALUES(default, '11', NULL, 'muebles 1.jpg', NULL);
  INSERT INTO feriate_db.imagenes  VALUES (default, '12', NULL, 'muebles 3.jpg', NULL);
