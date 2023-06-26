<?php require_once "./includes/header.php"?>

<?php 
    if (isset($_POST['register'])) { 

    require_once "./db.config.php";

    // Check for errors 
    if ($mysqli->connect_error) { die("Connection failed: " . $mysqli->connect_error); } 

    // Prepare and bind the SQL statement 
    $stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); $stmt->bind_param("sss", $username, $email, $password); 

    // Get the form data 
    $username = $_POST['username']; $email = $_POST['email']; $password = $_POST['password']; 

    // Hash the password 
    $password = password_hash($password, PASSWORD_DEFAULT); 

    // Execute the SQL statement 
    if ($stmt->execute()) { echo "New account created successfully!"; } else { echo "Error: " . $stmt->error; } 

    // Close the connection 
    $stmt->close(); $mysqli->close(); }
?>
<div class="container py-5">
    <div class="row py-5 justify-content-center">
        <div class="col-md-4 py-5">
            <div class="card card-body shadow-sm">
                <h3>Register</h3>
                <form action="register.php" method="post">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input id="username" name="username" class="form-control" required="" type="text" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input id="email" name="email" placeholder="email@grace.cd" class="form-control" required=""
                            type="email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input id="password" placeholder="Password" class="form-control" name="password" required=""
                            type="password" />
                    </div>
                    <div class="form-group">
                        <input class="btn btn-block btn-primary" name="register" type="submit" value="Register" />
                    </div>
                    <p>
                        I have an <a href="login.php">account</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

</html>