<?php
class login
{
  function validate($login,$password) //recives the strings with username & password, returns the user id if the user is registered & false if there were not coincidences in the database
  {
    $query = new query;
    //$pass = md5($password);
    $pass = $password;
    $row = $query->getRowsArray("login, password, idusuario","usuario");
    foreach($row as $key)
    {
      if ($key['login'] == $login && $key['password'] == $pass)
      		return $key['idusuario'];
    }
    return false;
  }
	function loginUser($user_id)
	{
		$query = new query;
		$row = $query -> getRow("idusuario, nombreusuario, tipousuario","usuario","WHERE idusuario= ".$user_id);
		$_SESSION['logged'] = 1;  /* sesion iniciada y 0 nada*/
		$_SESSION['nombreusuario'] = $row['nombreusuario'];
		$_SESSION['idusuario'] = $row['idusuario'];
		$_SESSION['tipousuario'] = $row['tipousuario'];
	}

}
?>