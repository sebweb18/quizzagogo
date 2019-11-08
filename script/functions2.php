<?php 
	session_start();

	// connect to database
	$db = mysqli_connect('localhost', 'miseb', 'aformac', 'quizzagogo');

	// variable declaration
	$username = "";
	//$email    = "";
	$errors   = array(); 

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}


	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM utilisateur WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['pseudo']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			//$password = md5($password);

			$query = "SELECT * FROM utilisateur WHERE pseudo='$username' AND mdp='$password' LIMIT 1";
			$results = mysqli_query($db, $query);
            $res ="toto";
            var_dump($query);
			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
                $logged_in_user = mysqli_fetch_assoc($results);
                $res = $logged_in_user['id_fonction'];
				if ($logged_in_user['id_fonction'] == 1) {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./home.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: index.php');
				}
			}else {
				array_push($errors, "Wrong username/password combination ".$res);
			}
		}
	}

	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['id_fonction'] == 1 ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>