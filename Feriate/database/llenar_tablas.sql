
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
