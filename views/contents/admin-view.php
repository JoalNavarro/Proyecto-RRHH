<?php if($_SESSION['userType']=="Administrador"): ?>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Empleados <small>(Trabajadores de la empresa)</small></h1>
	</div>
	<p class="lead">
		Bienvenido a la sección de empleados, aquí podrás registrar nuevos trabajadores y sus demas datos (Los campos marcados con * son obligatorios para registrar un administrador).
	</p>
</div>
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li class="active">
	  		<a href="<?php echo SERVERURL; ?>admin/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> Persona
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>adminlist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> Empresa
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>adminlist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> Datos Remunerativos
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>adminlist/" class="btn btn-info">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> Contratos
	  		</a>
	  	</li>				
	</ul>
</div>
<?php 
	require_once "./controllers/empleadoController.php";

	$insEmpleado = new empleadoController();

	if(isset($_POST['name']) && isset($_POST['username'])){
		echo $insEmpleado->add_empleado_controller();
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="panel panel-info">
				<div class="panel-heading">
				    <h3 class="panel-title"><i class="zmdi zmdi-plus"></i> Nuevo Empleado</h3>
				</div>
			  	<div class="panel-body">
				    <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
				    	<fieldset>
				    		<legend><i class="zmdi zmdi-account-box"></i> Datos personales</legend><br>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Código Trabajador *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="cod_empl" value="<?php if(isset($_POST['cod_empl'])){ echo $_POST['cod_empl']; } ?>" required="" maxlength="20">
										</div>
				    				</div>
				    			</div>
				    		</div>							
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
									<div class="form-group label-floating">
										  	<label class="control-label">Tipo de Documento</label>
										  	<select name="tip_docu" class="form-control">
										  		<?php 
										  			if(isset($_POST['tip_docu'])){ 
										  				echo '<option value="'.$_POST['tip_docu'].'">'.$_POST['tip_docu'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="DNI">DNI</option>
									          	<option value="CEX">CEX</option>
												<option value="PAS">PAS</option>
									        </select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Nro. Documento *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="nro_docu" value="<?php if(isset($_POST['nro_docu'])){ echo $_POST['nro_docu']; } ?>" required="" maxlength="20">
										</div>
				    				</div>
				    			</div>
				    		</div>							
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="nom_empl" value="<?php if(isset($_POST['nom_empl'])){ echo $_POST['nom_empl']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Ape. Paterno *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="ape_pate" value="<?php if(isset($_POST['ape_pate'])){ echo $_POST['ape_pate']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Ape. Materno *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="ape_mate" value="<?php if(isset($_POST['ape_mate'])){ echo $_POST['ape_mate']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Género</label>
										  	<select name="sex_empl" class="form-control">
										  		<?php 
										  			if(isset($_POST['sex_empl'])){ 
										  				echo '<option value="'.$_POST['sex_empl'].'">'.$_POST['sex_empl'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="Femenino">Femenino</option>
									          	<option value="Masculino">Masculino</option>
									        </select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Estado Civil</label>
										  	<select name="est_civi" class="form-control">
										  		<?php 
										  			if(isset($_POST['est_civi'])){ 
										  				echo '<option value="'.$_POST['est_civi'].'">'.$_POST['est_civi'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="Soltero">Soltero</option>
									          	<option value="Casado">Casado</option>
									        </select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Instrucción</label>
										  	<select name="gra_acad" class="form-control">
										  		<?php 
										  			if(isset($_POST['gra_acad'])){ 
										  				echo '<option value="'.$_POST['gra_acad'].'">'.$_POST['gra_acad'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="Primaria">Primaria</option>
									          	<option value="Secundaria">Secundaria</option>
									        </select>
										</div>
				    				</div>									
				    			</div>
				    		</div>
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Fecha Nacimiento *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="fec_naci" value="<?php if(isset($_POST['fec_naci'])){ echo $_POST['fec_naci']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Lugar de Nacimiento *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="lug_naci" value="<?php if(isset($_POST['lug_naci'])){ echo $_POST['lug_naci']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">País *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="pai_naci" value="<?php if(isset($_POST['pai_naci'])){ echo $_POST['pai_naci']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    			</div>
				    		</div>	
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Dirección *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="des_dire" value="<?php if(isset($_POST['des_dire'])){ echo $_POST['des_dire']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nro *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="nro_dire" value="<?php if(isset($_POST['nro_dire'])){ echo $_POST['nro_dire']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Zona</label>
										  	<select name="des_zona" class="form-control">
										  		<?php 
										  			if(isset($_POST['des_zona'])){ 
										  				echo '<option value="'.$_POST['des_zona'].'">'.$_POST['des_zona'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="Cooperativa">Cooperativa</option>
									          	<option value="Residencial">Residencial</option>
									        </select>
										</div>
				    				</div>									
				    			</div>
				    		</div>	
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
										  	<label class="control-label">Régimen Pensionario</label>
										  	<select name="reg_pens" class="form-control">
										  		<?php 
										  			if(isset($_POST['reg_pens'])){ 
										  				echo '<option value="'.$_POST['reg_pens'].'">'.$_POST['reg_pens'].' Actual</option>'; 
										  			} 
										  		?>
									          	<option value="ONP">ONP</option>
									          	<option value="AFP">AFP</option>
									        </select>
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-6">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nro CUPS *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="nro_cups" value="<?php if(isset($_POST['nro_cups'])){ echo $_POST['nro_cups']; } ?>" required="" maxlength="50">
										</div>
				    				</div>								
				    			</div>
				    		</div>																												
				    	</fieldset>
						<br><br>				    	
					    <p class="text-center">
					    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
					    </p>
				    </form>
			  	</div>
			</div>
		</div>
	</div>
</div>
<?php 
	else:
		$logout2 = new loginController();
        echo $logout2->login_session_force_destroy_controller(); 
	endif;
?>
