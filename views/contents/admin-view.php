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
	require_once "./controllers/adminController.php";

	$insAdmin = new adminController();

	if(isset($_POST['name']) && isset($_POST['username'])){
		echo $insAdmin->add_admin_controller();
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
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="20">
										</div>
				    				</div>
				    			</div>
				    		</div>							
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-6">
									<div class="form-group label-floating">
										  	<label class="control-label">Tipo de Documento</label>
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required="" maxlength="20">
										</div>
				    				</div>
				    			</div>
				    		</div>							
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nombres *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Ape. Paterno *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Ape. Materno *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="container-fluid">
				    			<div class="row">
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Género</label>
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Lugar de Nacimiento *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">País *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="lastname" value="<?php if(isset($_POST['lastname'])){ echo $_POST['lastname']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    			</div>
				    		</div>	
				    		<div class="container-fluid">
				    			<div class="row">
									<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Dirección *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
									</div>								
				    				<div class="col-xs-12 col-sm-4">
								    	<div class="form-group label-floating">
										  	<label class="control-label">Nro *</label>
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
										</div>
				    				</div>
				    				<div class="col-xs-12 col-sm-4">
										<div class="form-group label-floating">
										  	<label class="control-label">Zona</label>
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<select name="gender" class="form-control">
										  		<?php 
										  			if(isset($_POST['gender'])){ 
										  				echo '<option value="'.$_POST['gender'].'">'.$_POST['gender'].' Actual</option>'; 
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
										  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" class="form-control" type="text" name="name" value="<?php if(isset($_POST['name'])){ echo $_POST['name']; } ?>" required="" maxlength="50">
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
