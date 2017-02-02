<?php
include_once('config.php');
include_once('administradorBD.php');

class autos{

	private function obtieneAutos(){
		$sql = "SELECT l.* FROM Autos AS l ";
		$db = new administradorBD();
		return $db->executeQuery($sql);
	}

	public function obtieneJSONAutos(){
		$json="";
		$i=0;
		$result = $this->obtieneAutos();
		$json .= "{\"Autos\" : [ ";

		while($row = mysql_fetch_array($result)){
			if($i >0)
				$json .= ",";
				$json .= "{ \"id\": ".$row['idAutos'].", \"auto\":\"".$row['Auto']."\",\"marca\": \"".$row['Marca']."\" ";
				$json .= "}";
				$i++;
		}

		$json .= "]";
		$json .= "}";

		return $json;
	}
}

?>
