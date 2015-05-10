<?php
class Calendario extends Connection {

	public function CalendarioDias(){
		switch ($i) {
			case 0:
				echo "Lunes";
				break;
			case 1:
				echo "Martes";
				break;
			case 2:
				echo "Miércoles";
				break;
			case 3:
				echo "Jueves";
				break;
			case 4:
				echo "Viernes";
				break;
		}
	}

}
?>