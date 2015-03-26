<?php
/**
* Copyright (C) 2015 Luis Cortés <YET TO BE DETERMINED>
*
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
**/
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
