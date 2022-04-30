<!DOCTYPE html>
<html>
<?php
      require 'connectDB.php';
      session_start();
      //Παίρνουμε από τα SESSIONS το id του πολίτη
      $id=$_SESSION['cit_id'];
      //διέγραψε από τον πίνακα των ραντεβού
      //όσα ραντεβού έχει ο πολίτης
      $question = "DELETE FROM appointment WHERE id_citizen=$id";
      $mysqli->query($question);
      //Δείξε μήνυμα ότι διαγράφηκε το ραντεβού
      //και πήγαινε πίσω στην σελίδα του πολίτη
      echo    '<script language="javascript" type="text/javascript">
              if (!alert ("Το ραντεβού σας διαγράφηκε. ")) {
                  location.href = "../citizen.php";
              }
              </script>';
?>
</html>
