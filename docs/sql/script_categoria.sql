-- obtener categorias
DELIMITER //
CREATE PROCEDURE `sp_l_categoria_01`()
BEGIN  
SELECT 
	cat_id, 
    cat_nom, 
    DATE_FORMAT(fech_crea, "%d/%m/%y") AS fech_crea, 
    est
FROM tm_categoria
WHERE  
	 est = 1;  
END //
DELIMITER ;

-- obtener categorias por ID
DELIMITER //
CREATE PROCEDURE `sp_l_categoria_02`(
IN i_cat_id INT)
BEGIN  
SELECT * FROM tm_categoria
WHERE  
	 cat_id = i_cat_id;  
END //
DELIMITER ;

-- eliminar categoria
DELIMITER //
CREATE PROCEDURE `sp_d_categoria_01`(
IN i_cat_id INT)
BEGIN  
 UPDATE tm_categoria
 SET est = 0
 WHERE  
	 cat_id = i_cat_id;  
END //
DELIMITER ; 

-- insertar categoria
DELIMITER //
CREATE PROCEDURE `sp_i_categoria_01`(
IN i_cat_nom VARCHAR(150))
BEGIN  
 INSERT INTO tm_categoria
	(cat_nom,fech_crea,est)
	VALUES 
	(i_cat_nom,NOW(),1);  
END //
DELIMITER ; 

-- actualizar categoria
DELIMITER //
CREATE PROCEDURE `sp_u_categoria_01`(
IN i_cat_id INT,
IN i_cat_nom VARCHAR(150))
BEGIN  
 UPDATE tm_categoria
	SET
    cat_nom = i_cat_nom
	WHERE
    cat_id = i_cat_id;  
END //
DELIMITER ; 