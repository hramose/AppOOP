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
| Info: Session for Accounts.
| Special: DO NOT TOUCH!
|--------------------------------------------------------------------------|
| Creates Sessions that are saved so that accounts can stay connected.
|--------------------------------------------------------------------------|
*/
if (!isset($_SESSION))
    session_start();
/*
|--------------------------------------------------------------------------|
| Info: Session for Accounts. END.
|--------------------------------------------------------------------------|
*/

/*
|--------------------------------------------------------------------------|
| Info: AppOOP Sistema Idioma.
|--------------------------------------------------------------------------|
| Especifica el idioma que AppOOP mostrará.
|--------------------------------------------------------------------------|
*/
define('LANGUAGE',	'en');

/*
|--------------------------------------------------------------------------|
| Info: AppOOP Sistema Idioma END.
|--------------------------------------------------------------------------|
*/
/*
|--------------------------------------------------------------------------|
| Info: AppOOP Sistema Comunitario.
|--------------------------------------------------------------------------|
| Importantes Enlaces a sitios sociales y el título de la AppOOP.
|--------------------------------------------------------------------------|
*/
define('TITULO',	'AppOOP');
define('FACEBOOK', 	'https://www.facebook.com/');
define('TWITTER',  	'https://twitter.com/');
define('YOUTUBE',  	'https://www.youtube.com/');
define('REDDIT',   	'https://www.reddit.com/');

/*
|--------------------------------------------------------------------------|
| Info: URL BASE de AppOOP.
|--------------------------------------------------------------------------|
*/
define('BASE_URL',	'');

/*
|--------------------------------------------------------------------------|
| MAINTENANCE
| DEVELOPMENT_ENVIRONMENT
| DIRECTORY_SEPARATOR
| Dirname __ROOT__
| Special: DO NOT TOUCH!
|--------------------------------------------------------------------------|
*/
define('MAINTENANCE', false);
define('DEVELOPMENT_ENVIRONMENT', false);
define('DS', DIRECTORY_SEPARATOR);
define('__ROOT__', dirname(dirname(__FILE__)));

/*
|--------------------------------------------------------------------------|
| System Core AppOOP.
|--------------------------------------------------------------------------|
*/
require(__ROOT__.DS.'sistema'.DS.'nucleo.php');