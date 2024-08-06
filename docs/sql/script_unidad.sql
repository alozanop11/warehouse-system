-- obtener categorias
DELIMITER //
CREATE PROCEDURE `sp_l_unidad_01`()
BEGIN  
SELECT 
	und_id, 
    und_nom, 
    DATE_FORMAT(fech_crea, "%d/%m/%y") AS fech_crea, 
    est
FROM tm_unidad
WHERE  
	 est = 1;  
END //
DELIMITER ;

-- obtener categorias por ID
DELIMITER //
CREATE PROCEDURE `sp_l_unidad_02`(
IN i_und_id INT)
BEGIN  
SELECT * FROM tm_unidad
WHERE  
	 und_id = i_und_id;  
END //
DELIMITER ;

-- eliminar categoria
DELIMITER //
CREATE PROCEDURE `sp_d_unidad_01`(
IN i_und_id INT)
BEGIN  
 UPDATE tm_unidad
 SET est = 0
 WHERE  
	 und_id = i_und_id;  
END //
DELIMITER ; 

-- insertar categoria
DELIMITER //
CREATE PROCEDURE `sp_i_unidad_01`(
IN i_und_nom VARCHAR(150))
BEGIN  
 INSERT INTO tm_unidad
	(und_nom,fech_crea,est)
	VALUES 
	(i_und_nom,NOW(),1);  
END //
DELIMITER ; 

-- actualizar categoria
DELIMITER //
CREATE PROCEDURE `sp_u_unidad_01`(
IN i_und_id INT,
IN i_und_nom VARCHAR(150))
BEGIN  
 UPDATE tm_unidad
	SET
    und_nom = i_und_nom
	WHERE
    und_id = i_und_id;  
END //
DELIMITER ;