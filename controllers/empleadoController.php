<?php
	if($actionsRequired){
		require_once "../models/empleadoModel.php";
	}else{ 
		require_once "./models/empleadoModel.php";
	}

	class empleadoController extends empleadoModel{

		/*----------  Add Admin Controller  ----------*/
		public function add_empleado_controller(){
			$cod_empl=self::clean_string($_POST['cod_empl']);
			$tip_docu=self::clean_string($_POST['tip_docu']);  
            $nro_docu=self::clean_string($_POST['nro_docu']); 
            $nom_empl=self::clean_string($_POST['nom_empl']);
            $ape_pate=self::clean_string($_POST['ape_pate']);
            $ape_mate=self::clean_string($_POST['ape_mate']);     
            $sex_empl=self::clean_string($_POST['sex_empl']);      
            $est_civi=self::clean_string($_POST['est_civi']);   
            $gra_acad=self::clean_string($_POST['gra_acad']);
            $fec_naci=self::clean_string($_POST['fec_naci']);      
            $lug_naci=self::clean_string($_POST['lug_naci']);   
            $pai_naci=self::clean_string($_POST['pai_naci']);
            $des_dire=self::clean_string($_POST['des_dire']);      
            $nro_dire=self::clean_string($_POST['nro_dire']);   
            $des_zona=self::clean_string($_POST['des_zona']);
            $reg_pens=self::clean_string($_POST['reg_pens']);   
            $nro_cups=self::clean_string($_POST['nro_cups']);

			$lastname=self::clean_string($_POST['lastname']);
			$username=self::clean_string($_POST['username']);
			$password1=self::clean_string($_POST['password1']);
			$password2=self::clean_string($_POST['password2']);

			if($cod_empl!="" || $tip_docu!="" || $nro_docu!="" || $nom_empl!="" || $ape_pate!="" || $ape_mate!="" || $sex_empl!=""){
				if($password1==$password2){
					$query1=self::execute_single_query("SELECT Usuario FROM cuenta WHERE Usuario='$username'");
					if($query1->rowCount()<=0){

						$query2=self::execute_single_query("SELECT id FROM cuenta");
						$correlative=($query2->rowCount())+1;

						$code=self::generate_code("AC",7,$correlative);
						$password1=self::encryption($password1);

						$dataAccount=[
							"Privilegio"=>1,
							"Usuario"=>$username,
							"Clave"=>$password1,
							"Tipo"=>"Administrador",
							"Genero"=>$gender,
							"Codigo"=>$code
						];

						$dataEmpleado=[
							"Codigo"=>$code,
							"Nombres"=>$name,
							"Apellidos"=>$lastname
						];

						if(self::save_account($dataAccount) && self::add_empleado_model($dataEmpleado)){
							$dataAlert=[
								"title"=>"¡Administrador registrado!",
								"text"=>"El administrador se registró con éxito en el sistema",
								"type"=>"success"
							];
							unset($_POST);
							return self::sweet_alert_single($dataAlert);
						}else{
							$dataAlert=[
								"title"=>"¡Ocurrió un error inesperado!",
								"text"=>"No hemos podido registrar el administrador, por favor intente nuevamente",
								"type"=>"error"
							];
							return self::sweet_alert_single($dataAlert);
						}
					}else{
						$dataAlert=[
							"title"=>"¡Ocurrió un error inesperado!",
							"text"=>"El nombre de usuario que acaba de ingresar ya se encuentra registrado en el sistema, por favor elija otro",
							"type"=>"error"
						];
						return self::sweet_alert_single($dataAlert);
					}
				}else{
					$dataAlert=[
						"title"=>"¡Ocurrió un error inesperado!",
						"text"=>"Las contraseñas que acabas de ingresar no coinciden",
						"type"=>"error"
					];
					return self::sweet_alert_single($dataAlert);
				}
			}else{
				$dataAlert=[
					"title"=>"¡Ocurrió un error inesperado!",
					"text"=>"Debes de llenar todos los campos para registrar al empleado",
					"type"=>"error"
				];
				return self::sweet_alert_single($dataAlert);
			}
		}


		/*----------  Data Empleado Controller  ----------*/
		public function data_empleado_controller($Type,$Code){
			$Type=self::clean_string($Type);
			$Code=self::clean_string($Code);

			$data=[
				"Tipo"=>$Type,
				"Codigo"=>$Code
			];

			if($empleadodata=self::data_empleado_model($data)){
				return $empleadodata;
			}else{
				$dataAlert=[
					"title"=>"¡Ocurrió un error inesperado!",
					"text"=>"No hemos podido seleccionar los datos del administrador",
					"type"=>"error"
				];
				return self::sweet_alert_single($dataAlert);
			}

		}

		/*----------  Pagination Empleado Controller  ----------*/
		public function pagination_empleado_controller($Pagina,$Registros){
			$Pagina=self::clean_string($Pagina);
			$Registros=self::clean_string($Registros);

			$Pagina = (isset($Pagina) && $Pagina>0) ? floor($Pagina) : 1;

			$Inicio = ($Pagina>0) ? (($Pagina * $Registros)-$Registros) : 0;

			$Datos=self::execute_single_query("
				SELECT * FROM empleado WHERE Codigo!='AC03576381' ORDER BY Nombres ASC LIMIT $Inicio,$Registros
			");
			$Datos=$Datos->fetchAll();

			$Total=self::execute_single_query("SELECT * FROM empleado");
			$Total=$Total->rowCount();

			$Npaginas=ceil($Total/$Registros);

			$table='
			<table class="table text-center">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Nombres</th>
						<th class="text-center">Apellidos</th>
						<th class="text-center">A. Datos</th>
						<th class="text-center">A. Cuenta</th>
						<th class="text-center">Eliminar</th>
					</tr>
				</thead>
				<tbody>
			';

			if($Total>=1){
				$nt=$Inicio+1;
				foreach($Datos as $rows){
					$table.='
					<tr>
						<td>'.$nt.'</td>
						<td>'.$rows['Nombres'].'</td>
						<td>'.$rows['Apellidos'].'</td>
						<td>
							<a href="'.SERVERURL.'admininfo/'.$rows['Codigo'].'/" class="btn btn-success btn-raised btn-xs">
								<i class="zmdi zmdi-refresh"></i>
							</a>
						</td>
						<td>
							<a href="'.SERVERURL.'account/'.$rows['Codigo'].'/" class="btn btn-success btn-raised btn-xs">
								<i class="zmdi zmdi-refresh"></i>
							</a>
						</td>
						<td>
							<a href="#!" class="btn btn-danger btn-raised btn-xs btnFormsAjax" data-action="delete" data-id="del-'.$rows['Codigo'].'">
								<i class="zmdi zmdi-delete"></i>
							</a>
							<form action="" id="del-'.$rows['Codigo'].'" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="adminCode" value="'.$rows['Codigo'].'">
							</form>
						</td>
					</tr>
					';
					$nt++;
				}
			}else{
				$table.='
				<tr>
					<td colspan="5">No hay registros en el sistema</td>
				</tr>
				';
			}

			$table.='
				</tbody>
			</table>
			';

			if($Total>=1){
				$table.='
					<nav class="text-center full-width">
						<ul class="pagination pagination-sm">
				';

				if($Pagina==1){
					$table.='<li class="disabled"><a>«</a></li>';
				}else{
					$table.='<li><a href="'.SERVERURL.'adminlist/'.($Pagina-1).'/">«</a></li>';
				}

				for($i=1; $i <= $Npaginas; $i++){
					if($Pagina == $i){
						$table.='<li class="active"><a href="'.SERVERURL.'adminlist/'.$i.'/">'.$i.'</a></li>';
					}else{
						$table.='<li><a href="'.SERVERURL.'adminlist/'.$i.'/">'.$i.'</a></li>';
					}
				}

				if($Pagina==$Npaginas){
					$table.='<li class="disabled"><a>»</a></li>';
				}else{
					$table.='<li><a href="'.SERVERURL.'adminlist/'.($Pagina+1).'/">»</a></li>';
				}

				$table.='
						</ul>
					</nav>
				';
			}

			return $table;
		}


		/*----------  Delete Empleado Controller  ----------*/
		public function delete_empleado_controller($code){
			$code=self::clean_string($code);

			if(self::delete_account($code) && self::delete_empleado_model($code)){
				$dataAlert=[
					"title"=>"¡Administrador eliminado!",
					"text"=>"El administrador ha sido eliminado del sistema satisfactoriamente",
					"type"=>"success"
				];
				return self::sweet_alert_single($dataAlert);
			}else{
				$dataAlert=[
					"title"=>"¡Ocurrió un error inesperado!",
					"text"=>"No pudimos eliminar el administrador por favor intente nuevamente",
					"type"=>"error"
				];
				return self::sweet_alert_single($dataAlert);
			}
		}


		/*----------  Update Empleado Controller  ----------*/
		public function update_empleado_controller(){
			$code=self::clean_string($_POST['code']);
			$name=self::clean_string($_POST['name']);
			$lastname=self::clean_string($_POST['lastname']);

			$data=[
				"Codigo"=>$code,
				"Nombres"=>$name,
				"Apellidos"=>$lastname
			];

			if(self::update_empleado_model($data)){
				$dataAlert=[
					"title"=>"¡Administrador actualizado!",
					"text"=>"Los datos del administrador fueron actualizados con éxito",
					"type"=>"success"
				];
				return self::sweet_alert_single($dataAlert);
			}else{
				$dataAlert=[
					"title"=>"¡Ocurrió un error inesperado!",
					"text"=>"No hemos podido actualizar los datos del administrador, por favor intente nuevamente",
					"type"=>"error"
				];
				return self::sweet_alert_single($dataAlert);
			}
		}
	}