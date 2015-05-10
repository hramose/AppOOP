<?php
/**
* Copyright (C) 2015 Luis Cortes <YET TO BE DETERMINED>
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

class Users extends Connection {

	protected $passkey;
	protected $activation;

	public function AccountLoginQuery(){
		
		global $profile;
		global $rankSQL;
		
		@$rankSQL	= $this->Connect()->query("SELECT * FROM `estudiantes` WHERE cedula = '".$_SESSION['cedula']."'");
		$profile	= $rankSQL->fetch_assoc();
	}

	public function AccountLoginCheck(){
		
		global $profile;
		
		if(isset($_SESSION['cedula']) == ''){
			header("Location: ".URL_ESTUDIANTE."login");
			exit();
		}
		if($profile['rolCuenta'] > 1){
			die('<center>
					<h2>&iquest;Que haces aqu&iacute;?</h2>
				</center>');
			header("Location: ".URL_ESTUDIANTE."login");
		}
	}

	public function AccountVerified($passkey, $activation){

		$passkey = filter_var($_GET['passkey'], FILTER_SANITIZE_STRING);

		if($activation = $this->Connect()->query("UPDATE estudiantes SET activation_code=NULL WHERE activation_code='".$passkey."'"))
		{
			echo '
			<div class="alert-page">
				<div class="alert-page-message success-page">
					<p class="text-green title">
						<strong>Su cuenta ahora ya se encuentra activada.<br/>Puede <a href="'.URL_ESTUDIANTE.'login">Iniciar Sesi&oacute;n</a></strong>
					</p>
				</div>
			</div>';
		}
		else
		{
			echo "Some error occuried.";
		}
	}

	public function LoginAlumnos(){

		if (isset($_POST['submit'])) {
			$cedula         = trim($_POST['accountName']);
			$password      = trim($_POST['password']);
			$sha_pass_hash = sha1(strtoupper($cedula) . ":" . strtoupper($password));
			$query         = $this->Connect()->query("SELECT * FROM estudiantes WHERE cedula='{$cedula}' AND password='{$sha_pass_hash}' AND activation_code IS NULL");
			$num_rows      = $query->num_rows;
			$row           = $query->fetch_array();

			if ($num_rows == 1) {

				if($row['activation_code'] == NULL){

					$_SESSION['cedula']		= trim($_POST['accountName']);
					$_SESSION['password']	= trim($_POST['password']);
					$_SESSION['userAgent']	= $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['SKey']		= uniqid(mt_rand(), true);
					$_SESSION['IPaddress']	= $_SERVER['REMOTE_ADDR'];
					$time					= time();
					$fecha					= date("d-m-Y (H:i:s)", $time);
					$enLinea				= $this->Connect()->query("UPDATE `account` SET `enLinea`='1',`IP`='{$_SESSION['IPaddress']}',`navegador`='{$_SESSION['userAgent']}',`ultimaActividad`='{$fecha}',`llaveDeSesion`='{$_SESSION['SKey']}' WHERE `Id`='{$row['Id']}'");
					header("Location: " . URL_ESTUDIANTE . "");
					exit;
				}else{
					echo'<center>
					<div class="alert alert-block alert-danger fade in">
						<button data-dismiss="alert" class="close close-sm" type="button">
							<i class="fa fa-times"></i>
						</button>
						<strong><i class="fa fa-frown-o"></i> &iexcl;LO LAMENTO!</strong> Una de sus credenciales es incorrectas.
					</div>
					</center>';
				}
			}
		}
	}

	public function GradoEstudiante(){

		global $profile;
		if($profile['grado'] == 7){
			echo'Séptimo';
		}elseif($profile['grado'] == 8){
			echo'Octavo';
		}elseif($profile['grado'] == 9){
			echo'Noveno';
		}elseif($profile['grado'] == 10){
			echo'Décimo';
		}elseif($profile['grado'] == 11){
			echo'Undécimo';
		}elseif($profile['grado'] == 12){
			echo'Duodécimo';
		}
	}

  /**
   *  Login Profesores
   */
	public function AccountLoginProfesorCheck(){

		global $profile;

		if(isset($_SESSION['cedula']) == ''){
			header("Location: ".URL_PROFESOR."login");
			exit();
		}
		if($profile['rolCuenta'] > 2){
			die('<center>
					<h2>&iquest;Que haces aqu&iacute;?</h2>
				</center>');
			header("Location: ".URL_PROFESOR."login");
		}
	}

	public function AccountLoginProfesorQuery(){

		global $profile;
		global $rankSQL;

		@$rankSQL	= $this->Connect()->query("SELECT * FROM profesores WHERE cedula = '".$_SESSION['cedula']."'");
		$profile	= $rankSQL->fetch_assoc();
	}

	public function LoginProfesores(){

		if (isset($_POST['submit'])) {
			$cedula         = trim($_POST['accountName']);
			$password      = trim($_POST['password']);
			$sha_pass_hash = sha1(strtoupper($cedula) . ":" . strtoupper($password));
			$query         = $this->Connect()->query("SELECT * FROM profesores WHERE cedula='{$cedula}' AND password='{$sha_pass_hash}' AND activation_code IS NULL");
			$num_rows      = MysqliNumRowsQAPP($query);
			$row           = $query->fetch_array();

			if ($num_rows == 1) {

				if($row['activation_code'] == NULL){

					$_SESSION['cedula']		= trim($_POST['accountName']);
					$_SESSION['password']	= trim($_POST['password']);
					$_SESSION['userAgent']	= $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['SKey']		= uniqid(mt_rand(), true);
					$_SESSION['IPaddress']	= $_SERVER['REMOTE_ADDR'];
					$time					= time();
					$fecha					= date("d-m-Y (H:i:s)", $time);
					$enLinea				= $this->Connect()->query("UPDATE `profesores` SET `enLinea`='1',`IP`='{$_SESSION['IPaddress']}',`navegador`='{$_SESSION['userAgent']}',`ultimaActividad`='{$fecha}',`llaveDeSesion`='{$_SESSION['SKey']}' WHERE `Id`='{$row['Id']}'");
					header("Location: " . URL_PROFESOR . "");
					exit;
				}else{
					echo '<center>
							<div class="alert alert-block alert-danger fade in">
								<button data-dismiss="alert" class="close close-sm" type="button">
									<i class="fa fa-times"></i>
								</button>
								<strong><i class="fa fa-frown-o"></i> &iexcl;LO LAMENTO!</strong> Una de sus credenciales es incorrectas
							</div>
						</center>';
				}
			}
		}
	}

	public function GeneroProfesor(){

		global $profile;
		if($profile['sexo'] == 0){
			echo'Profesor';
		}else{
			echo'Profesora';
		} 
	}

  /**
   *  Login Director
   */
	public function AccountLoginDirectorCheck(){

		global $profile;

		if(isset($_SESSION['cedula']) == ''){
			header("Location: ".URL_DIRECTOR."login");
			exit();
		}
		if($profile['rolCuenta'] > 4){
			die('<center>
					<h2>&iquest;Que haces aqu&iacute;?</h2>
				</center>');
			header("Location: ".URL_DIRECTOR."login");
		}
	}

	public function AccountLoginDirectorQuery(){

		global $profile;
		global $rankSQL;

		@$rankSQL	= $this->Connect()->query("SELECT * FROM `director` WHERE cedula = '".$_SESSION['cedula']."'");
		$profile	= $rankSQL->fetch_assoc();
	}

	public function LoginDirector(){

		if (isset($_POST['submit'])) {
			$cedula         = trim($_POST['accountName']);
			$password      = trim($_POST['password']);
			$sha_pass_hash = sha1(strtoupper($cedula) . ":" . strtoupper($password));
			$query         = $this->Connect()->query("SELECT * FROM `director` WHERE cedula='{$cedula}' AND password='{$sha_pass_hash}' AND activation_code IS NULL");
			$num_rows      = MysqliNumRowsQAPP($query);
			$row           = $query->fetch_array();

			if ($num_rows == 1) {

				if($row['activation_code'] == NULL){

					$_SESSION['cedula']		= trim($_POST['accountName']);
					$_SESSION['password']	= trim($_POST['password']);
					$_SESSION['userAgent']	= $_SERVER['HTTP_USER_AGENT'];
					$_SESSION['SKey']		= uniqid(mt_rand(), true);
					$_SESSION['IPaddress']	= $_SERVER['REMOTE_ADDR'];
					$time					= time();
					$fecha					= date("d-m-Y (H:i:s)", $time);
					$enLinea				= $this->Connect()->query("UPDATE `director` SET `enLinea`='1',`IP`='{$_SESSION['IPaddress']}',`navegador`='{$_SESSION['userAgent']}',`ultimaActividad`='{$fecha}',`llaveDeSesion`='{$_SESSION['SKey']}' WHERE `Id`='{$row['Id']}'");
					header("Location: " . URL_DIRECTOR . "");
					exit;
				}else{
					echo '<center>
							<div class="alert alert-block alert-danger fade in">
								<button data-dismiss="alert" class="close close-sm" type="button">
									<i class="fa fa-times"></i>
								</button>
								<strong><i class="fa fa-frown-o"></i> &iexcl;LO LAMENTO!</strong> Una de sus credenciales es incorrectas
							</div>
						</center>';
				}
			}
		}
	}
}
