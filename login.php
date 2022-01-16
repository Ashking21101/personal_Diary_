<?php
session_start();
include "connection.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailCheck = "SELECT * FROM user WHERE email='$email' ";
    $query = mysqli_query($conn, $emailCheck);  

    $emailCount = mysqli_num_rows($query);    // 1
    if($emailCount){

    // fetching all the details 
    $data = mysqli_fetch_assoc($query);
    // getting the username of user  (here 'name' and 'pass' means it the column in database)
    $_SESSION['username'] = $data['username'];
    // getting password that belong to that email
    $dataPassword = $data['password'];

    
    // checking whether password entered now is same as password entered during registration
    if(password_verify( $password, $dataPassword )){         
      // password_verify( password entered now, password fetched from database)
      ?>
        <script>
          alert("Login Successfull !\n Welcome to Secret Diary, <?php echo $_SESSION['username']?>");
          window.location.href="entry.php?name=<?php echo $_SESSION['username']  ?>";    // passing name in url so that we can update our notes usinng that username.  || '?' used to differentiate every query passed from each others
        </script>
        
      <?php
     
    }else{
      ?>
        <script>
          alert("Password is incorrect !!");
        </script>
      <?php
    }

  }
  else{
      ?>
        <script>
          alert("Email does not exists in our database !!");
        </script>
      <?php
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
    <link rel="stylesheet" href="style_login.css">
  </head>
  <body>


  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <input name="email" type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" required/>
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input name="password" type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" required/>
            <label class="form-label" for="form3Example4">Password</label>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button name="submit" type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                class="link-danger">Signup</a></p>
          </div>

        </form>
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