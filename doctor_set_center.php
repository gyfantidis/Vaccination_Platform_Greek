<?php
require 'dbManagement/connectDB.php';
session_start();
//Παίρνουμε τα SESSIONS
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['id'];
?>

<!DOCTYPE html>

<html>
<title>Σελίδα Επιλογή εμβολιαστικού Κέντρου από τον Γιατρό</title>

<!-- Πληροφορίες Μεταδεδομένων (Metadata)  -->
<meta charset="UTF-8">
<meta name="description" content="Σελίδα Επιλογή εμβολιαστικού Κέντρου από τον Γιατρό">
<meta name="keywords" content="covid 19, Εμβολιαστικό Κέντρο, Αθήνα, Θεσσαλονίκη, εμβόλιο">
<meta name="author" content="Ioannis Yfantidis / ggyfantidis@gmail.com">


<!-- Εισαγωγή CSS Links -->
<!-- Βιβλιοθήκη w3css -->
<link rel="stylesheet" href="css/w3.css">
<!-- Εικαστικό θέμα -->
<link rel="stylesheet" href="css/w3-theme-grey.css">
<!-- Ενσωμάτωση των fontawesome icons theme -->
<link rel="stylesheet" href="css/all.min.css">
<!-- Εικαστικές παραμετροποποιήσεις  -->
<link rel="stylesheet" href="css/custom.css">


<body>
  <!-- Εισαγωγή επικεφαλίδας χωρισμένη σε 3 μέρη των 1/4,2/4 και 1/4  -->

  <header class="w3-container w3-theme-l1">
    <div class="w3-theme-l1 w3-row w3-padding-24 w3-center">
      <div class="w3-quarter w3-container">
        <a href="index.html">
          <img id="logo" src="img/logo.png" style="width: 200px" alt="logo" /></a>
      </div>
      <div class="w3-half w3-container">
        <p>
          <strong>Πλατφόρμα εμβολιασμού</strong>
          <br>Υπουργείο Υγείας

        </p>
      </div>
      <div class="w3-center w3-buttom w3-indigo w3-quarter w3-container">
        <h6><a title="Αποσύνδεση" href="index.html">Αποσύνδεση</a></h6>
      </div>
    </div>
  </header>
  <!-- End Header -->

  <main class="w3-row">

    <!-- Menu -->
    <!-- Δημιουργία του menu πλοήγησης αριστερά και στο 20% της οθόνης -->
    <aside class="w3-center w3-col  w3-theme-l1 w3-bar-block" style="width:20%">
      <a href="index.html" class="w3-bar-item w3-border w3-border-black w3-button w3-padding-16 w3-mobile">Αρχική σελίδα</a>
      <a href="centers.html" class="w3-bar-item w3-button w3-border w3-border-black w3-padding-16 w3-mobile">Εμβολιαστικά Κέντρα</a>
      <a href="instructions.html" class="w3-bar-item w3-button w3-border w3-border-black w3-padding-16 w3-mobile">Οδηγίες εμβολιασμού</a>
      <a href="login_instr.html" class="w3-bar-item w3-button w3-border w3-border-black w3-padding-16 w3-mobile">Οδηγίες εγγραφής/εισόδου</a>
      <a href="announcements.html" class="w3-bar-item w3-button w3-border w3-border-black w3-padding-16 w3-mobile">Ανακοινώσεις</a>
    </aside>
    <!-- End Menu -->

    <!-- main login -->
    <main class="w3-rest" style="line-height:1">
    <div class="w3-center w3-padding-large" >

      <!-- To drop down menu -->
    <form name = "registerForm" method='POST' action='dbManagement/set_doc_center_in_db.php' >
      <?php
            $result = $mysqli->query("SELECT id, name FROM center");
                echo "<select name='val_center' id='val_center'>
                <option selected disabled option value='0'>Διάλεξε το Εμβολιαστικό Κέντρο</option>";
                while ($row = $result->fetch_assoc()) {
                              unset($id, $name);
                              $id = $row['id'];
                              $name = $row['name'];
                              echo '<option value="'.$id.'">'.$name.'</option>';

            }

                echo "</select>";
      ?>

      <br />
      <br />
        <!-- Το κουμπί επιλογής -->
        <input type="submit" name="Επιλογή" value="Επιλογή"
              class=" w3-center w3-padding w3-margin  w3-indigo "
              >

</form>

      </main>
    <!-- Endmain login -->
  </main>

  <!-- Footer -->
  <footer class="w3-container  w3-teal w3-padding-large w3-row w3-theme-l1">
    <div class="w3-center">
      <a title="Όροι Χρήσης" href="files/terms.pdf" target="_blank">Όροι Χρήσης</a> |
      <a title="Πολιτική απορρήτου" href="files/privacy.pdf" target="_blank">Πολιτική απορρήτου</a>
    </div>
  </footer>
  <!-- End Footer -->
</body>


</html>
