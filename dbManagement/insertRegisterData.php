<?php
require 'connectDB.php';
//ΕΙΣΑΓΩΓΗ ΔΕΔΟΜΕΝΩΝ ΑΠΟ ΤΗΝ ΦΟΡΜΑ
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$amka = $_POST['amka2'];
$afm = $_POST['afm2'];
$passport = $_POST['passport'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];

//Ελέγχουμε εάν το ΑΜΚΑ δεν υπάρχει ήδη στη Β.Δ. από άλλον λογαριασμό
$question = "SELECT amka FROM user WHERE amka = $amka ";
$result = $mysqli->query($question);
if ($result->num_rows == 0) { //Αν τo AMKA δεν βρεθεί στη Β.Δ. εισάγουμε νέα εγγραφή.
$question="INSERT INTO
user (first_name, last_name, amka, afm, passport, age, sex, email, phone, role)
VALUES
('$firstname','$lastname','$amka','$afm','$passport','$age','$sex','$email','$phone','$role')";
//Εάν η εγγραφή ολοκληρωθεί σωστά
if ($mysqli->query($question) === true) {
      echo '  <script language="javascript" type="text/javascript">
              if (!alert ("Συγχαρητήρια! Η εγγραφή πραγματοποιήθηκε. Μπορείτε πλέον να συνδεθείτε.")) {
                location.href = "../login.html";
                                }  </script>';
                        exit();
                    } else { //Αν η εγγραφή αποτύχει εξαιτίας ενός σφάλματος.
                        echo '  <script language="javascript" type="text/javascript">
                                if (!alert ("Σφάλμα! Η εγγραφή δεν πραγματοποιήθηκε: ' . $mysqli->error . '")) {
                                    history.go (-1);
                                }   </script>';
                    }
                  } else { //Αν το AMKA υπάρχει ήδη στη Β.Δ. ενημέρώνουμε τον χρήστη για την αποτυχία εγγραφής.
                      echo '  <script language="javascript" type="text/javascript">
                              if (!alert ("Ο AMKA χρησιμοποιείται ήδη από άλλο χρήστη!Προσπαθήστε ξανά με το σωστό ΑΜΚΑ.")) {
                                history.go (-1);
                              }    </script>';
                      exit();
                        }
$result->close(); //Κλείσιμο $result για καθαρισμό μνήμης.
$mysqli->close(); //Κλείσιμο σύνδεσης με ΒΔ.
?>
