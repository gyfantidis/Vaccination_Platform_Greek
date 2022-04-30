<?php
echo '<meta charset="UTF-8"/>';
session_start();
require 'connectDB.php';

$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['id'];
//Παίρνουμε τα κέντρα που υπάρχει το id του γιατρού
$question = "SELECT id_center FROM center_doctors WHERE id_doc = $id";
$result = $mysqli -> query($question);
while ($row = $result->fetch_assoc()) {
  $id_center=$row['id_center'];
}
//Εάν δεν υπάρχει το id του γιατρού στον πίνακα center_doctors
if ($result -> num_rows == 0) {
    echo    '<script language="javascript" type="text/javascript">
            if (!alert ("Δεν έχεις επιλέξει Εμβολιαστικό Κέντρο. Παρακαλώ πήγαινε να δηλώσεις Εμβολιαστικό Κέντρο ")) {
                history.go (-1);
            }
            </script>';
}

else {//Εάν υπάρχει πήγαινε στην σελίδα πήγαινε στην σελίδα doctor.php
  $_SESSION['center_id']=$id_center;
  $_SESSION['appointment_check']=true;
  echo   '<script language="javascript" type="text/javascript">
            location.href = "../doctor.php";
                            </script>';
}

$result->close(); //Κλείσιμο $result για καθαρισμό μνήμης.
$mysqli->close(); //Κλείσιμο σύνδεσης με ΒΔ.

?>
