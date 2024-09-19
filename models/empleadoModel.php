<?php
	if($actionsRequired){
		require_once "../core/mainModel.php";
	}else{ 
		require_once "./core/mainModel.php";
	}

	class empleadoModel extends mainModel{

		/*----------  Add Empleado Model  ----------*/
		public function add_empleado_model($data){
			$query=self::connect()->prepare("INSERT INTO empleado(Codigo,Nombres,Apellidos) VALUES(:Codigo,:Nombres,:Apellidos)");
			$query->bindParam(":Codigo",$data['Codigo']);
			$query->bindParam(":Nombres",$data['Nombres']);
			$query->bindParam(":Apellidos",$data['Apellidos']);
			$query->execute();
			return $query;
		}


		/*----------  Data Empleado Model  ----------*/
		public function data_empleado_model($data){
			if($data['Tipo']=="Count"){
				$query=self::connect()->prepare("SELECT Codigo FROM empleado");
			}elseif($data['Tipo']=="Only"){
				$query=self::connect()->prepare("SELECT * FROM empleado WHERE Codigo=:Codigo");
				$query->bindParam(":Codigo",$data['Codigo']);
			}
			$query->execute();
			return $query;
		}


		/*----------  Delete Empleado Model  ----------*/
		public function delete_empleado_model($code){
			$query=self::connect()->prepare("DELETE FROM empleado WHERE Codigo=:Codigo");
			$query->bindParam(":Codigo",$code);
			$query->execute();
			return $query;
		}


		/*----------  Update Empleado Model  ----------*/
		public function update_empleado_model($data){
			$query=self::connect()->prepare("UPDATE empleado SET Nombres=:Nombres,Apellidos=:Apellidos WHERE Codigo=:Codigo");
			$query->bindParam(":Nombres",$data['Nombres']);
			$query->bindParam(":Apellidos",$data['Apellidos']);
			$query->bindParam(":Codigo",$data['Codigo']);
			$query->execute();
			return $query;
		}
	}