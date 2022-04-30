<?php

echo '<meta charset="UTF-8"/>';
session_start();
require 'connectDB.php';
//Εισαγωγή δεδομένων από την φόρμα
$amka = $_POST['amka'];
$afm = $_POST['afm'];
//Ορισμός τον Sessions
$_SESSION['amka'] = $amka;
$_SESSION['afm'] = $afm;
$_SESSION['appointment_check']=false;

//Ερώτημα προς την βάση, εάν υπάρχει χρήστης με το ΑΜΚΑ και το ΑΦΜ
//και εάν ναι να μας επιστρέψει τον ρόλο του
$question = "SELECT amka,role FROM user WHERE amka = $amka AND afm = $afm";
$result = $mysqli -> query($question);
while ($row = $result->fetch_assoc()) {
    $role=$row['role'];
}

if ($result -> num_rows == 0) { //Εάν δεν υπάρχει χρήστης
    echo    '<script language="javascript" type="text/javascript">
            if (!alert ("Τα στοιχεία πρόσβασης είναι λανθασμένα! Προσπαθήστε ξανά.")) {
                history.go (-1);
            }
            </script>';
}
else if($role == 'C'){ //Εάν έχει ρόλο πολίτη, άνοιγμα η σελίδα του πολίτη
  echo   '<script language="javascript" type="text/javascript">
            location.href = "../citizen.php";
                            </script>';
}

else { // Εάν όχι, τότε άνοιγμα η σελίδα του γιατρού
  echo   '<script language="javascript" type="text/javascript">
            location.href = "../doctor.php";
                            </script>';
}


$result->close(); //Κλείσιμο $result για καθαρισμό μνήμης.
$mysqli->close(); //Κλείσιμο σύνδεσης με ΒΔ.

?>
