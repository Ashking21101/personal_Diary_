<?php
$conn = mysqli_connect('localhost', 'root', '', 'db_2');


if($conn){

}
else{
    ?>
    <script>
        alert("something went wrong");
    </script>
    <?php
}
?>
