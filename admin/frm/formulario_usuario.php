
 <?php
    $query = new query;
       $form = new Zebra_Form('formusuario');
	   $form->add('label', 'nombre_usuario', 'nombre', 'Nombre usuario:');
	      $obj = $form->add('text', 'nombre', '', array('placeholder' => 'Nombre del Usuario'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 100 caracteres'),
	 ));
	$form->add('label', 'apellido_usuario', 'apellido', 'Apellido usuario:');
	      $obj = $form->add('text', 'apellido', '', array('placeholder' => 'Apellido del Usuario'));
	     // set rules
		$obj->set_rule(array(
		    'alphabet' => array('','error','Por Favor Solamente Letras'),
		    'required' => array('error', 'este campo es requerido!'),
		    'length'     =>  array(3,100,'error','El valor debe estar entre 3 y 100 caracteres'),
	 ));
    //	CI del Usuario
       $form->add('label', 'ci_usuario', 'ci', 'CI usuario:');
	     $obj = $form->add('text', 'ci', '', array('placeholder' => 'Carnet de Identidad'));
	     // set rules
	      $obj->set_rule(array(
		   'digits' => array('8','error','Por Favor Solamente digitos'),
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(8,8,'error','El valor debe ser al menos 8 digitos'),
	 ));
     //telefono del usuario      
       $form->add('label', 'telefono_usuario', 'telefono', 'Telefono Usuario:');
	     $obj = $form->add('text', 'telefono', '', array('placeholder' => 'Telefono del Usuario'));
	     // set rules
	      $obj->set_rule(array(
		   'required' => array('error', 'este campo es requerido!'),
		   'length'     =>  array(8,8,'error','El valor debe ser 8 digitos'),
	 ));
     //	Login Usuario      
       $form->add('label', 'login_usuario', 'login', 'Login Usuario:');
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
       $form->add('label', 'tipo_usuario', 'tipousuario', 'Tipo Usuario:');
	     $obj = $form->add('text', 'tipousuario', '', array('placeholder' => 'Tipo Usuario'));
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
	     $login = $_POST['login'];
	     $password= $_POST['password'];
	     $tipousuario = $_POST['tipousuario'];
             $query->dbInsert(array('idusuario'=>$idusuario,'nombre'=>$nombre,'apellido'=>$apellido,'ci'=>$ci,'telefono'=>$telefono,'login'=>$login,'password'=>$password,'tipousuario'=>$tipousuario), 'usuario');

      echo "<script>alert('Se Agrego un nuevo usuario');</script>";
    } 
        // generate output using a custom template
        $form->render('*horizontal');

?>