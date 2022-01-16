<?php
session_start();
include "connection.php";
if(isset($_POST['submit']))
{
    $notes = $_POST['text'];
    $user  = $_SESSION['username'];

    $noteSql = "UPDATE user SET notes='$notes' WHERE `username`='$user'";
    $notesQuery = mysqli_query($conn, $noteSql);

    if($notesQuery)
    {
      ?>
        <script>
          alert("Your data saved successfully");
          window.location.href="entry.php?name=<?php echo $_SESSION['username']  ?>";
        </script>
      <?php
    }else
    {
      ?>
        <script>
          alert(" Some Technical error .");
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
  </head>
  <body>
  <form method="POST" action="">
  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea name = "text" class="form-control" id="form4Example3" rows="4"  placeholder="type your message here"></textarea>
    <label class="form-label" for="form4Example3">Message</label>
  </div>

  <!-- Submit button -->
  <button name="submit" type="submit" class="btn btn-primary btn-block mb-4">
    Send
  </button>
  <a href="logout.php" class="link-danger">logout</a>
</form>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>