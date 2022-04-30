<?php

echo '<meta charset="UTF-8"/>';
session_start();
require 'connectDB.php';
//πέρνουμε την ηλικία
$age = $_SESSION['age'];
//Εάν δεν ανήκει στην ηλικιακή ομάδα
if (($age<40) || ($age>65)) {
    echo    '<script language="javascript" type="text/javascript">
            if (!alert ("Δεν ανήτεται στην ηλικιακή ομάδα 40 εώς 65 ετών. ")) {
                history.go (-1);
            }
            </script>';
}
//Εάν ανήκει στην ηλικιακή ομάδα πήγαινε στην σελίδα των ραντεβού
else {
  echo   '<script language="javascript" type="text/javascript">
            location.href = "../appointment.php";
                            </script>';
}

$mysqli->close(); //Κλείσιμο σύνδεσης με ΒΔ.

?>
