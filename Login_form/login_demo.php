<?php
	session_start();
    //check if the user is already logged in,if yes then redirect him to wellcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] ===true){
        header("location:welcome_demo.php");
        exit;
    }

    //include config file
    require_once "config_demo.php";

    //define variables and initialize with empty values
    $username = $password ="";
    $username_err = $password_err = $login_err="";

    //processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //check if username is empty
        if(empty(trim($_POST["username"]))){
            $username_err="Please enter username.";
        }else{
            $username = trim($_POST["username"]);
        }

        //check if password is empty
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password";
        }else{
            $password = trim($_POST["password"]);
        }

        //validate credentials
        if(empty($username_err) && empty($password_err)){
            //prepare a select statement
            $sql="select id,username,password from users1 where username=?";
            if($stmt=$mysqli->prepare($sql)){
                //bind variables to the prepare statement as parametors
                $stmt->bind_param("s",$param_username);

                //set parameters
                $param_username = $username;

                //attempt to execute the prepared statement
                if($stmt->execute()){
                    //store result
                    $stmt->store_result();

                    //check if username exists,if yes then varify password
                    if($stmt->num_rows ==1){
                        //bind result variables
                        $stmt->bind_result($id,$username,$hashed_password);
                        if($stmt->fetch()){
                            if(password_verify($password,$hashed_password)){
                                //password is correct, so start a new session
                                session_start();

                                //store data in seesion varibles
                                $_SESSION["loggedin"]=true;
                                $_SESSION["id"]=$id;
                                $_SESSION["username"]=$username;

                                //redrect user to welcom page
                                header("location:welcome_demo.php");
                            }else{
                                //password doesn't exist display a generic error message
                                $login_err="Invalid username or password";
                            }
                        }

                        
                    }else{
                            $login_err="Invalid username or password";
                        }
                }else{
                    echo "Oops! Something went wrong.Plese try again later.";
                }

                $stmt->close();
            }
        }
        $mysqli->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register_demo.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>