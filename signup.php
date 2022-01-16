<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  
  $password_encrypt = password_hash($password, PASSWORD_BCRYPT);

  $emailCheck = "SELECT * FROM user WHERE email='$email' ";
  $query = mysqli_query($conn, $emailCheck);  

  $emailCount = mysqli_num_rows($query);    // 1
  if($emailCount){
    ?>
    <script>
      alert("choose another email");
    </script>
    <?php
  }

  else{
  $sql = "INSERT INTO user (username, email, password, notes) VALUES ('$username', '$email', '$password_encrypt', '')";
  $sqlQuery = mysqli_query($conn, $sql);  

  if($sqlQuery)
  {
    ?>
      <script>
        alert("You have successfully registered on Secret Diary");
        window.location.href='login.php';
      </script>
    <?php
  }
  else
  {   
    ?>
      <script>
        alert(" Some Technical error .");
      </script>
    <?php
  }
  }

}
?>











<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style_signup.css">
  </head>
  <body>

  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                <div class="form-outline mb-4">
                  <input name="username" type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Enter your name" required/>
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="email" type="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email address" required/>
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" required/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button name="submit" type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">SIGNUP</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>