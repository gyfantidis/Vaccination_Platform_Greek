<?php
echo '<meta charset="UTF-8"/>';
session_start();
require 'connectDB.php';
//Παίρνουμε τα SESSIONS
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['id'];
//Ζητάμε από την βάση εάν υπάρχει το id του γιατρού στον πίνακα center_doctors
$question = "SELECT id_center FROM center_doctors WHERE id_doc = $id";
$result = $mysqli -> query($question);
while ($row = $result->fetch_assoc()) {
  $id_center=$row['id_center'];
}
//Εάν υπάρχει, μήνυμα ότι υπάρχει
if ($result -> num_rows > 0) {
    echo    '<script language="javascript" type="text/javascript">
            if (!alert ("Υπάρχει επιλεγμένο Εμβολιαστικό Κέντρο. Πηγαίνεται στα Προγραμματισμένα Ραντεβού. ")) {
                history.go (-1);
            }
            </script>';
}
else { //Εάν δεν υπάρχει πήγαινε στην σελίδα doctor_set_center.php
  echo   '<script language="javascript" type="text/javascript">
            location.href = "../doctor_set_center.php";
                            </script>';
}
$result->close(); //Κλείσιμο $result για καθαρισμό μνήμης.
$mysqli->close(); //Κλείσιμο σύνδεσης με ΒΔ.

?>
