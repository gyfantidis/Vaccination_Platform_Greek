<?php
require 'connectDB.php';
session_start();
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['id'];
$ap_id = $_POST['ap_id'];
//Παίρνουμε την κατάσταση του id ραντεβού
  $question = "SELECT status FROM appointment WHERE id = $ap_id";
  $result = $mysqli -> query($question);
  while ($row = $result->fetch_assoc()) {
      $status=$row['status'];
  }
  //Εάν είναι μη ολοκληρωμένο
  if ($status== 0) {
    $question2="UPDATE appointment SET status = '1' WHERE id =$ap_id";
    if ($mysqli->query($question2) === true) {
          echo '  <script language="javascript" type="text/javascript">
                  if (!alert ("Συγχαρητήρια! Η αλλαγή κατάστασης του Εμβολιασμου πραγματοποιήθηκε.")) {
                      history.go (-1);
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
else{//εάν είναι ολοκληρωμένο
  $question3="UPDATE appointment SET status = '0' WHERE id =$ap_id";
  if ($mysqli->query($question3) === true) {
        echo '  <script language="javascript" type="text/javascript">
                if (!alert ("Συγχαρητήρια! Η αλλαγή κατάστασης του Εμβολιασμου πραγματοποιήθηκε.")) {
                    history.go (-1);
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

?>
