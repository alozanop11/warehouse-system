-- obtener registro por correo y pass
DELIMITER //
CREATE PROCEDURE `sp_l_usuario_01`(  
IN i_usu_correo VARCHAR(150),
IN i_usu_pass VARCHAR(150))
BEGIN  
 SELECT * FROM tm_usuario    
 WHERE usu_correo = i_usu_correo   
 AND usu_pass = i_usu_pass    
 AND est = 1; 
END //
DELIMITER ;  

call sp_l_usuario_01("alozanop@itm.com", "12345");

--

--