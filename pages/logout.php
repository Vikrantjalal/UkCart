<?php
session_start();            // Session start karo
session_unset();            // Saare session variables ko hatao
session_destroy();          // Session completely destroy karo

// Redirect to login ya homepage
header("Location: ../index.php"); 
exit();
?>
