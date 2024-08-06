USE sistema_bodega;

SELECT * FROM tm_categoria;

UPDATE tm_unidad
SET
fech_crea = NOW();

SELECT * FROM tm_unidad;
