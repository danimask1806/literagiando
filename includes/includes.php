<?php
	// Indicamos conts(variables fijas) de la url principal(con www o sin www)
	const base_url = 'https://localhost/Literagiando/literagiando59/';
	const base_urls = 'https://localhost/Literagiando/literagiando59/';
	
	// Indicamos conts(variables fijas) de los metadatos a trabajar con el navegador
	const base_con_indexacion = '<meta name="robots" content="index,follow,noodp,noydir" />';
	const base_sin_indexacion = '<meta name="robots" content="noindex,nofollow,noodp,noydir,noarchive" />';
	const base_charset = 'charset=utf8mb4';
	const base_utf8_php = '<meta http-equiv="content-type" content="text/html; charset=UTF-8" />';
	const base_utf8_2_php = '<meta charset="UTF-8" />';
	
	// Usamos estas expresiones regulares como referencia para futuros "pattern"
	const base_input_texts = '[a-zA-ZñÑáéíóúÁÉÍÓÚ]+';
	const base_input_texts_spaces = '[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+';
	const base_input_texts_numbers = '[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]+';
	const base_input_texts_spaces_numbers = '[a-zA-ZñÑáéíóúÁÉÍÓÚ\d\s]+';
	const base_input_texts_spaces_numbers_caracteres = '.+';
	const base_input_number_spaces = '[\d\s]+';
	const base_input_numbers = '[\d]+';
	
	// Indicamos conts(variables fijas) de "return" especificados para asignar permisos a un teclado
	const base_validar_ = '';
	const base_input_letras = 'return letras(event);';
	const base_input_numeros = 'return numeros(event);';
	const base_input_letras_numeros = 'return letrasynumeros(event);';
	const base_input_letras_espacios = 'return letrasyespacios(event);';
	const base_input_numeros_espacios = 'return numerosyespacios(event);';
	const base_input_letras_espacios_caracteres = 'return letrasespaciosycaracteres(event);';
	const base_input_letras_numeros_espacios_caracteres = 'return letrasnumerosespaciosycaracteres(event);';
	
	// Indicamos conts(variables fijas) de expresiones regulares para "pattern" especificados en un formulario
	const base_input_identificacion = '^\d{8,11}$';
	const base_input_nombre_completo = '^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{4,50}$';
	const base_input_email = '.{5,65}$';
	const base_input_usuario = '^[a-zA-ZñÑáéíóúÁÉÍÓÚ\d]{4,50}$';
	const base_input_password = '.{4,100}$';
	const base_input_telefono = '^\d{7,14}$';
	const base_input_fecha = '^\d{2}/\d{2}/\d{2}$';
	
	const base_input_titulo = '.{10,100}$';
	const base_input_titulo_2 = '.{0,100}$';
	const base_input_autor = '.{6,50}$';
	const base_input_tema = '.{6,50}$';
	const base_input_condicion_libro = '.{6,50}$';
	const base_input_color = '^(#[0-9A-Fa-f]{8}|.{4,9})$';
	const base_input_url = '^(https:\/\/|http:\/\/)[\S]{11,270}$';
	const base_input_codigo = '^\d$';
	
	// Indicamos conts(variables fijas) de las edades que irán asignadas en el campo "Edades" de un formulario
	const base_input_edades = '["De 3 A 8 años", "De 9 A 13 años", "De 14 A 18 años", "De 19 A 23 años"]';
									const base_input_edades_2 = '<option value="De 3 A 8 años">De 3 A 8 años</option>
																	<option value="De 9 A 13 años">De 9 A 13 años</option>
																	<option value="De 14 A 18 años">De 14 A 18 años</option>
																	<option value="De 19 A 23 años">De 19 A 23 años</option>';
	
	// Indicamos conts(variables fijas) de imágenes predeterminadas asignadas a las diferentes áreas de la plataforma web
	const base_favicon_ico = 'recursos/img/logos/favicon.ico';
	const base_favicon_png = 'recursos/img/logos/favicon.png';
	const base_favicon_png_borde = 'recursos/img/logos/favicon_borde.png';
	const base_logotipo = 'recursos/img/logos/logotipo.png';
	const base_logotipo_2 = 'recursos/img/logos/logotipo_2.png';
	const base_cargando = 'recursos/img/logos/cargando.png';
	const base_san_logo = 'recursos/img/logos/san_logo.png';
	const base_san_logo_2 = 'recursos/img/logos/san_logo_2.png';
	
	// Indicamos conts(variables fijas) de los títulos relacionados y asignados a las diferentes áreas de la plataforma web
	const base_titulo = 'Literagiando';
	const base_titulo_0 = 'Literagiando | ';
	const base_titulo_1 = ' | Literagiando';
	const base_titulo_2 = 'Literagiando, Literagiando nuestros cuentos vamos contando.';
	const base_titulo_2_1 = '<center>Literagiando, Literagiando nuestros cuentos vamos contando.</center>';
	const base_titulo_2_2 = '<center>"Leer es como navegar en un océano de conocimiento... para no seguir navegando en el pantano de la ignorancia."</center>';
	const base_titulo_3 = 'Sistema de biblioteca | Literagiando.';
	const base_titulo_4 = 'Literagiando | Proyecto de desarrollo social.';
	const base_titulo_5 = 'Literagiando | ';
	const base_titulo_6 = 'Literagiando | Histórico de usuarios registrados.';
	const base_titulo_7 = 'Histórico de usuarios registrados.';
	const base_titulo_8 = 'Literagiando | ';
	const base_titulo_9 = 'Literagiando | ';
	const base_titulo_10 = 'Literagiando | ';
	const base_titulo_11 = 'Literagiando | Histórico de libros registrados.';
	const base_titulo_12 = 'Histórico de libros registrados.';
	const base_titulo_13 = 'Literagiando | ';
	const base_titulo_14 = 'Literagiando | ';
	const base_titulo_15 = 'Literagiando | ';
	const base_titulo_16 = 'Literagiando | Histórico de préstamos registrados.';
	const base_titulo_17 = 'Histórico de préstamos registrados.';
	const base_titulo_18 = 'Literagiando | ';
	const base_titulo_19 = 'Literagiando | ';
	const base_titulo_20 = 'Literagiando | ';
	const base_titulo_21 = 'Literagiando | Histórico de préstamos pendientes.';
	const base_titulo_22 = 'Histórico de préstamos pendientes.';
	const base_titulo_23 = 'Literagiando | ';
	const base_titulo_24 = 'Literagiando | ';
	const base_titulo_25 = 'Literagiando | ';
	
	// Indicamos conts(variables fijas) de los datos relacionados y asignados a las diferentes áreas de la plataforma web
	const base_description = 'Este proyecto nace de la importancia de potenciar y valorar el pensamiento creativo de los maestros en formación de la licenciatura en educación infantil en la universidad de San Buenaventura ubicada en Bogotá.';
	const base_description_2 = 'Este proyecto nace de la importancia de potenciar el pensamiento creativo de los maestros en formación para la educación infantil.';
	const base_keywords = 'Literagiando, Biblioteca';
	const base_author = 'Semillero TecnoSoft';
	const base_copyright = '&copy; 2023 | Desarrollado por semillero TecnoSoft.';
	const base_copyright_2 = '&copy; 2023 | Desarrollado por semillero TecnoSoft.';
	const base_correo = 'Bibliotecainfantilliteragiando';
	const base_correo_2 = 'Bibliotecainfantilliteragiando@gmail.com';
	const base_telefono = '3208288872';
	const base_direccion = 'Cra. 8h #172-20 Piso 4';
	const base_direccion_2 = 'Universidad De San Buenaventura, Sede Bogotá.';
	
	// Indicamos conts(variables fijas) de las redes sociales
	const base_url_facebook = '###';
	const base_url_youtube = '###';
	const base_url_instagram = '###';
	const base_url_twitter = '###';
	const base_url_whatsapp = '###';
	
	// Indicamos en un buffer un Include externo, que sostiene una cadena aleatoria y se desea imprimir en un echo
	ob_start();
	include('includes/codificacion.php');
	$codificacion_externa = ob_get_clean();
	
	// Indicamos en un buffer un Include interno, que sostiene una cadena aleatoria y se desea imprimir en un echo
	ob_start();
	include('../includes/codificacion.php');
	$codificacion = ob_get_clean();
															?>