<?php
require 'connectDB.php';
session_start();
//Παίρνουμε τα SESSIONS
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['id'];
//Παίρνουμε από την φόρμα το id του κέντρου
  $id_cen = $_POST['val_center'];
  //Παίρνουμε από την βάση το όνομα του κέντρου
  $question = "SELECT name FROM center WHERE id = $id_cen";
  $result = $mysqli -> query($question);
  while ($row = $result->fetch_assoc()) {
      $name=$row['name'];
  }
//Εάν έχουμε επιλέξει εμβολίαστικό κέντρο
  if ($id_cen > 0) {
    //Εγγραφή στην βάση
    $question="INSERT INTO  center_doctors (id_doc,id_center)
    VALUES  ('$id','$id_cen')";
    if ($mysqli->query($question) === true) {//Εάν ολοκληρωθεί η εγγραφή, πήγαινε στην αρχική σελίδα
          echo '  <script language="javascript" type="text/javascript">
                  if (!alert ("Συγχαρητήρια! Η εγγραφή πραγματοποιήθηκε. Το εμβολιαστικό σας κέντρο είναι το : '.$name.'.")) {
                      location.href = "../login.html";
                                    }
                                    </script>';
                            exit();
                        } else { //Αν η εγγραφή αποτύχει εξαιτίας ενός σφάλματος.
                            echo '  <script language="javascript" type="text/javascript">
                                    if (!alert ("Σφάλμα! Η εγγραφή δεν πραγματοποιήθηκε: ' . $mysqli->error . '")) {
                                        history.go (-1);
                                    }
                                    </script>';
                        }
}

else{//Εάν δεν έχει επιλεγεί εμβολιαστικό κέντρο
  echo    '<script language="javascript" type="text/javascript">
          if (!alert ("Παρακαλώ επιλέξτε Εμβολιαστικό Κέντρο")) {
              history.go (-1);
          }
          </script>';
}
?>
