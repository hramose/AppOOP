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