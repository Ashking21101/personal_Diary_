<?php
session_start();
session_unset();
session_destroy();

?>
<script>
          alert("Logout Successfull!\nCome back soon");
          window.location.href='login.php';
</script>

<?php

?>