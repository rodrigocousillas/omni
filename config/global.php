<?php 
define('BASE_URL', 'localhost');
if (!empty($_SERVER['HTTPS'])) {
  define('PROTOCOLO', 'https://');
} else {
  define('PROTOCOLO', 'http://');
}
define('URL', PROTOCOLO . BASE_URL);
define('VERSION', '1.0');

/*define("DB_HOST","192.168.0.63");
define("DB_NAME", "omni_website_2021");
define("DB_USERNAME", "violeta");
define("DB_PASSWORD", "1960Bono++");
define("DB_ENCODE","utf8");*/

define("DB_HOST","localhost");
define("DB_NAME", "omni_website_2021");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_ENCODE","utf8");

define('TABLA_USUARIOS', 'usuarios');
define('TABLA_USUARIOS_TIPO', 'usuarios_tipo');
define('TABLA_CAPACITACIONES', 'capacitaciones');
define('TABLA_CAPACITACIONESMARCA', 'capacitaciones_marca');
define('TABLA_CAPACITACIONESMODELOS', 'capacitaciones_modelo');
define('TABLA_CAPACITACIONESRELACIONADOS', 'capacitaciones_relacionadas');
define('TABLA_MARCAS', 'marcas');
define('TABLA_MODELOS', 'modelos');
define('TABLA_MODELOS_GRANDES', 'modelos_grandes');
define('TABLA_MODELOS_MEDIANOS', 'modelos_medianos');
define('TABLA_MODELOS_HOME', 'modelos_home');
define('TABLA_NOVEDADES', 'novedades');
define('TABLA_CARUSELHOME', 'carusel_home');
define('TABLA_TESTIMONIOS', 'testimonios');
define('TABLA_TESTIMONIOS_MODELO', 'testimonios_modelo');

define('TABLA_MODELOS_SLIDERS', 'modelos_sliders');
define('TABLA_MODELOS_SLIDERS_ITEMS', 'modelos_sliders_items');



/*if (function_exists('session_cache_expire')) {
    session_cache_expire(180);
}
ini_set('session.gc_maxlifetime', 1800);*/
@session_start();

?>

