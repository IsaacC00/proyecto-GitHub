-- INSERT
INSERT INTO `tab_productos` VALUES(6,'chocolate Nestle',2.50,3.50,80.00,'2023-06-21','A',1,'En 1904, Nestlé empezó a vender chocolate. Pero incluso antes de este momento histórico, la compañía ejerció un papel importante en el desarrollo del chocolate','chocolate.jpg',1,4);
SELECT * FROM `tab_productos`;

-- UPDATE

UPDATE `tab_productos`
SET `prod_desc` = 'chocolate galak'
WHERE `id_prod`=6;

SELECT * FROM `tab_productos`;

-- DELETES

DELETE
FROM `tab_productos`
WHERE `id_prod` = '6';

SELECT * FROM `tab_productos`;

-- confirmacion