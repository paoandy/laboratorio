
 <?php
    $query = new query;
       $form = new Zebra_Form('formusuario');
	   $form->add('label', 'nombre_usuario', 'nombre', 'Nombre:');
	      $obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Usuario'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 100 caracteres'),
	 ));
	$form->add('label', 'apellido_usuario', 'apellido', 'Apellido:');
	      $obj = $form->add('text', 'apellido', '', array('placeholder' => 'Apellido del Usuario'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 100 caracteres'),
	 ));
    //	CI del Usuario
       $form->add('label', 'ci_usuario', 'ci', 'CI:');
	     $obj = $form->add('text', 'ci', '', array('placeholder' => 'Carnet de Identidad'));
	     // set rules
	      $obj->set_rule(array(
		   'digits' => array('8','error','Por Favor Solamente digitos'),
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(7,7,'error','El valor debe ser al menos 7 digitos'),
	 ));
     //telefono del usuario
       $form->add('label', 'telefono_usuario', 'telefono', 'Telefono:');
	     $obj = $form->add('text', 'telefono', '', array('placeholder' => 'Telefono del Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   //'required' => array('error', 'este campo es requerido!'),
		   'digits' => array('8','error','Por Favor Solamente digitos'),
		   'length'     =>  array(8,8,'error','El valor debe ser 7 digitos'),
	 ));
      //email
	 $form->add('label', 'label_email', 'email', 'Email');
		$obj = $form->add('text', 'email', '', array('autocomplete' => 'off','placeholder' => 'email@dominio.com'));
		    // set rules
		    $obj->set_rule(array(
			//'required'  =>  array('error', 'Email es requiredo!'),
			'email'     =>  array('error', 'el email no es valido!'),
		
		    ));
     //	Login Usuario
       $form->add('label', 'login_usuario', 'login', 'Login:');
	     $obj = $form->add('text', 'login', '', array('placeholder' => 'Login Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(5,10,'error','El valor debe estar entre 5 y 10 digitos'),
	 ));
     //	password Usuario
       $form->add('label', 'label_password', 'password', 'Password');
	     $obj = $form->add('password', 'password', '', array('autocomplete' => 'off','placeholder' => 'password'));
	       $obj->set_rule(array(
		   'required'  => array('error', 'Password is requiredo!'),
		   'length'    => array(6, 10, 'error', 'The password must have between 6 and 10 characters!'),
	 ));
      // tipo Usuario
       $form->add('label', 'tipo_usuario', 'tipousuario', 'Tipo:');
	     $obj = $form->add('select', 'tipousuario', '');
             $obj->add_options( array('0'=>'Administrador', '1'=>'Secretaria', '2'=>'Tecnico') );
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
	 ));

     $obj = $form->add('hidden', 'idusuario', $query->siguiente('idusuario','usuario') );
    // "submit"
     $form->add('submit', 'btnsubmit', 'Agregar');
    // if the form is valid
    if ($form->validate()) {
	     $idusuario = $_POST['idusuario'];
             $nombre = $_POST['nombre'];
	     $apellido = $_POST['apellido'];
	     $ci = $_POST['ci'];
	     $telefono = $_POST['telefono'];
	     $email = $_POST['email'];
	     $login = $_POST['login'];
	     $password= $_POST['password'];
	     $tipousuario = $_POST['tipousuario'];
	     
	     $consulta = $query->getRowsArray('CI,LOGIN' ,'usuario',"WHERE ci= '".$ci."' AND login='".$login."'");
	     
	     if ( sizeof($consulta)) { 
	      echo "<script> $(document).ready(function() { Messenger().post({ message: 'El Usuario ya Existe.',  showCloseButton: true }); }); </script>";	// Avisa que existe el usuario
	       $form->reset();					// Resetea el formulario
	     }
	       else {
	       $query->dbInsert(array('nombre'=>$nombre,'apellido'=>$apellido,'ci'=>$ci,'telefono'=>$telefono,'email'=>$email,'login'=>$login,'password'=>$password,'tipousuario'=>$tipousuario), 'usuario');
		   echo "<script> $(document).ready(function() { Messenger().post({ message: 'Nuevo Registro...<br><br>El Usuario Se Registro Satisfactoriamente.',  showCloseButton: true }); }); </script>";
		}
		$form->reset();
    }
        // generate output using a custom template
        $form->render('*horizontal');

?>
