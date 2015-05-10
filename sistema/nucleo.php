<?php
/**
*	The MIT License (MIT)
*
*	Copyright (c) 2015 Luis Cortés
*
*	Permission is hereby granted, free of charge, to any person obtaining a copy
*	of this software and associated documentation files (the "Software"), to deal
*	in the Software without restriction, including without limitation the rights
*	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
*	copies of the Software, and to permit persons to whom the Software is
*	furnished to do so, subject to the following conditions:
*
*	The above copyright notice and this permission notice shall be included in all
*	copies or substantial portions of the Software.
*
*	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
*	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
*	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
*	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
*	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
*	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
*	SOFTWARE.
**/
/**
 |-------------------------------------------------------------------------|
 | AppOOP Version
 |-------------------------------------------------------------------------|
 | @var string
 |-------------------------------------------------------------------------|
 */
	define('APPOOP_VERSION', '0.0.1');
/*
|--------------------------------------------------------------------------|
| Sistema multi lenguaje
|--------------------------------------------------------------------------|
*/
header('Cache-control: private'); // IE 6 FIX
if(isset($_GET['lang'])){
	$lang = $_GET['lang'];

	//register session
	$_SESSION['lang'] = $lang;
	
	//define cookie
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
	
//Searches cookie and session var
}else if(isSet($_SESSION['lang'])){
	$lang = $_SESSION['lang'];
}else if(isSet($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}else{
	$lang = LANGUAGE;
}

switch ($lang) {

	case 'en':
	$lang_file = 'lang.en.php';
	break;

	case 'es':
	$lang_file = 'lang.es.php';
	break;

	default:
	$lang_file = 'lang.en.php';

}
include_once (__ROOT__.DS."sistema".DS."idioma".DS.$lang_file);

/*
|--------------------------------------------------------------------------|
| Carga automática Clases
|--------------------------------------------------------------------------|
*/
function __autoload($className) {
	if (file_exists(__ROOT__ . DS . 'sistema' . DS . 'librerias' . DS . strtolower($className) . '.class.php')) {
		require_once(__ROOT__ . DS . 'sistema' . DS . 'librerias' . DS . strtolower($className) . '.class.php');
	}
}
$connect	= new Connection();
$mensaje	= new Mensajes();
$register	= new Users();
$account	= new Users();
$notas		= new Notas();
$noticias	= new Noticias();