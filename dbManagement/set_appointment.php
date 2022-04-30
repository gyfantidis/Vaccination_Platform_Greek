<?php
echo '<meta charset="UTF-8"/>';
session_start();
require 'connectDB.php';
$cit_id = $_SESSION['cit_id'];
//Δεδομένα από την φόρμα
$ap_id = $_POST['ap_id'];
$date = $_POST['date'];
$time = $_POST['time'];
//Καταχώρηση στην βάση το ραντεβού
  $question="INSERT INTO  appointment (id_center,id_citizen,date,time,status)
  VALUES  ('$ap_id','$cit_id','$date','$time','0')";
  if ($mysqli->query($question) === true) {
        echo '  <script language="javascript" type="text/javascript">
                if (!alert ("Συγχαρητήρια! Το ραντεβού σας κλείστηκε για τις '.$date.' στις '.$time.'. ")) {
                    location.href = "../index.html";
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
?>
