<?php
// Main database 
    $server  = "localhost";
    $user = "root";
    $password = "";
    $db = "signup11";

    $conn = mysqli_connect($server,$user,$password,$db);

    if($conn)
    {

    ?>
    <script>

            alert(" Connection  Done");

    </script>
      <?php
    }else
    {
      ?>
        <script>
            alert(" Connection not successful ");
        </script>
      <?php
    }

?>