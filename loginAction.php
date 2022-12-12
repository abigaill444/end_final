<?php
session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
    
    // Include config file
    require_once "includes/config/db.php";
    
    // Define variables and initialize with empty values
    $username = $password = $nombre = $su = "";
    $username_err = $password_err = "";
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        // Check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err = "Por favor, introduce un usuario.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Por favor, introduce una contraseña.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate credentials
        if(empty($username_err) && empty($password_err)){
            // Prepare a select statement
            $sql = "SELECT id, usuario, password, nombre, su FROM usuarios WHERE usuario = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                // Set parameters
                $param_username = $username;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Store result
                    mysqli_stmt_store_result($stmt);
                    
                    // Check if username exists, if yes then verify password
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $nombre, $su);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                // Password is correct, so start a new session
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;   
                                $_SESSION["nombre"] = $nombre;      
                                $_SESSION["su"] = $su;                        
                                
                                // Redirect user to welcome page
                                header("location: index.php");
                            } else{
                                // Display an error message if password is not valid
                                $password_err = "La contraseña ingresada es incorrecta. Por favor, vuelve a intentarlo.";
                            }
                        }
                    } else{
                        // Display an error message if username doesn't exist
                        $username_err = "No se encontró la cuenta. Por favor, vuelve a intentarlo.";
                    }
                } else{
                    echo "Algo salió mal. Por favor, vuelve a intentarlo.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($link);
    }
?>