<?php require_once "./includes/header.php";
if(!isset($_SESSION['username'])){
    header("Location: index.php");
}
?>

<div class="container py-5">
    <div class="row justify-content-center py-5">
        <div class="col-md-6 py-5">
            <div class="card card-body shadow-sm">
                <h3 class="d-flex justify-content-between align-items-center">
                    <span>Welcome to your profile</span>
                    <a href="logout.php" class="btn btn-sm btn-primary">Logout</a>
                </h3>
                <p class="d-flex my-3 justify-content-between align-items-center">
                    <span>Username:</span>
                    <span><?= $_SESSION['username'];?></span>
                </p>
                <p class="d-flex my-3 justify-content-between align-items-center">
                    <span>Email:</span>
                    <span><?= $_SESSION['email'];?></span>
                </p>
            </div>
        </div>
    </div>
</div>
<?php require_once "./includes/footer.php";?>