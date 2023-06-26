<?php require_once "./includes/header.php"?>


<div class="container py-5">
    <div class="row py-5 justify-content-center">
        <div class="col-md-4 py-5">
            <div class="card card-body shadow-sm">
                <?php 
    
                    require_once "./db.config.php";
    
                    if (isset($_POST['login'])) { 
                        
                        if ($mysqli->connect_error) { 
                            die("Connection failed: " . $mysqli->connect_error); 
                        } 

                        // Prepare and bind the SQL statement 
                        $stmt = $mysqli->prepare("SELECT id, password FROM users WHERE username = ?"); 
                        $stmt->bind_param("s", $username); 

                        // Get the form data 
                        $username = $_POST['username']; 
                        $password = $_POST['password']; 

                        // Execute the SQL statement 
                        $stmt->execute(); 
                        $stmt->store_result(); 

                        // Check if the user exists 
                        if ($stmt->num_rows > 0) { 

                        // Bind the result to variables 
                        $stmt->bind_result($id, $hashed_password); 

                        // Fetch the result 
                        $stmt->fetch(); 

                        // Verify the password 
                        if (password_verify($password, $hashed_password)) { 

                        // Set the session variables 
                        $_SESSION['loggedin'] = true; 
                        $_SESSION['id'] = $id; 
                        $_SESSION['username'] = $username; 
                        $_SESSION['email'] = $email;

                        // Redirect to the user's dashboard 
                        header("Location: dashboard.php");

                        exit; 
                        
                        } else {
                            echo '<p class="alert alert-danger">Incorrect password!</p>'; 
                        } 
                    } else { 
                        echo '<p class="alert alert-danger">User not found!</p>'; 
                    } 

                    // Close the connection 
                    $stmt->close(); $mysqli->close(); }?>
                <h3>Login</h3>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input id="username" name="username" class="form-control" placeholder="Username" required=""
                            type="text" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="password" class="form-control" name="password" required="" type="password" />
                    </div>
                    <div class="form-group">
                        <input name="login" type="submit" value="Login" class="btn btn-block btn-primary" />
                    </div>
                    <p>
                        I don't have an <a href="register.php">account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>