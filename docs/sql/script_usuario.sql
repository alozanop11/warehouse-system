-- login
DELIMITER //
CREATE PROCEDURE `sp_l_usuario_01`(  
IN i_usu_correo VARCHAR(150),
IN i_usu_pass VARCHAR(150))
BEGIN  
 SELECT
 tm_usuario.usu_id,
 tm_usuario.usu_correo,     
 tm_usuario.usu_pass     
 FROM      
 tm_usuario    
 WHERE    
 tm_usuario.usu_correo = i_usu_correo   
 AND tm_usuario.usu_pass = i_usu_pass    
 AND tm_usuario.est = 1; 
END //
DELIMITER ;

SELECT
 tm_usuario.usu_id,
 tm_usuario.usu_nom,
 tm_usuario.usu_ape,
 tm_usuario.usu_correo,     
 tm_usuario.usu_pass     
 FROM      
 tm_usuario    
 WHERE    
 tm_usuario.usu_correo = "alozanop@itm.com"   
 AND tm_usuario.usu_pass = "12345"    
 AND tm_usuario.est = 1; 

call sp_l_usuario_01("alozanop@itm.com", "12345");