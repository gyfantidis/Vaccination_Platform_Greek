<!DOCTYPE html>
<?php
require 'dbManagement/connectDB.php';
session_start();

$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
//Ερώτημα προς την βάση για τα στοιχεία του χρήστη με το ΑΜΚΑ του SESSION
$question = "SELECT * FROM user WHERE amka = $amka";
$result = $mysqli->query($question);
  if($result){
    if($result->num_rows >0){
      while($row=$result->fetch_assoc()){
        $id= $row['id'];
        $firstname= $row['first_name'];
        $lastname= $row['last_name'];
        $passport= $row['passport'];
        $age= $row['age'];
        $sex= $row['sex'];
        $email= $row['email'];
        $phone= $row['phone'];
}}}
//Περνάμε στα SESSIONS την ηλικία και το id του χρήστη
//για να τα χρησιμοποιήσουμε σε άλλες σελίδες
$_SESSION['cit_id']=$id;
$_SESSION['age']=$age;
?>

<html>
<title>Σελίδα του Πολίτη</title>

<!-- Πληροφορίες Μεταδεδομένων (Metadata)  -->
<meta charset="UTF-8">
<meta name="description" content="Σελίδα του Πολίτη">
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
    <div class="w3-center w3-padding-large">
      <!-- Ο πίνακας με τα στοιχεία του Πολίτη -->
      <table class="w3-center>">
      <tr>
        <td class=w3-yellow><h5><b><?php echo $lastname; ?></b></h5></td>
        <td class=w3-yellow><h5><b><?php echo $firstname; ?></b></h5></td>
        <td class=w3-pale-yellow><label for="phone"><i></i>Τηλέφωνο</label></td>
        <td><h5> <?php echo $phone; ?> </h5></td>
      </tr>
      <tr>
        <td class=w3-pale-yellow><label for="amka"><i></i>A.M.K.A.</label></td>
        <td><h5> <?php echo $amka; ?> </h5></td>
        <td class=w3-pale-yellow><label for="afm"><i></i>Α.Φ.Μ.</label></td>
        <td><h5> <?php echo $afm; ?> </h5></td>
      </tr>
      <tr>
        <td class=w3-pale-yellow><label for="age"><i></i>Ηλικία</label></td>
        <td><h5> <?php echo $age; ?> </h5></td>
        <td class=w3-pale-yellow><label for="passport"><i></i>Αρ. Ταυτότητας</label></td>
        <td><h5> <?php echo $passport; ?> </h5></td>
      </tr>
      <tr>
        <td class=w3-pale-yellow><label for="sex"><i></i>Φύλο</label></td>
        <td><h5> <?php if($sex=='M') echo 'Άνδρας'; else echo 'Γυναίκα'; ?> </h5></td>
        <td class=w3-pale-yellow><label for="email"><i></i>e-mail</label></td>
        <td><h5> <?php echo $email; ?> </h5></td>
      </tr>
    </table>
      <br />
      <br />

      <?php
      //Ερώτηση προς την βάση εάν ο πολίτης έχει κλεισμένο ραντεβού
      $question1 = "SELECT * FROM appointment WHERE id_citizen = $id";
      $result1 = $mysqli->query($question1);
      //Εάν δεν έχει ραντεβού εμφανίζεται το κουμπί κλείστε το ραντεβού σας
      if ($result1 -> num_rows == 0) {
          echo   '<div class="w3-center w3-button w3-indigo w3-container">
        <h6><a title="Είσοδος"  href="dbManagement/ageCheck.php"> Κλείστε το Ραντεβού σας </a></h6>';
        }
        //Εάν έχει κλεισμένο ραντεβού
      else {
          //πέρνουμε από την βάση τις πληροφορίες για το ραντεβού
        while ($row1 = $result1->fetch_assoc()) {
          $id_app=$row1['id'];
          $date=$row1['date'];
          $time=$row1['time'];
          $status=$row1['status'];
          $id_center = $row1['id_center'];
          $_SESSION['id']=$id_app;
        }
        //πέρνουμε από την βάση τις πληροφορίες για το εμβολιαστικό κέντρο
        $result2 = $mysqli->query("SELECT name FROM center WHERE id = $id_center");

        while ($raw2=$result2->fetch_assoc()){
          $center_name=$raw2['name'];
        }
          //Εμφανίζουμε πληροφορίες για το ραντεβού
        echo '<h3>Το ραντεβού για τον Εμβολιασμό σας είναι στις : <b>' .$date. '</b> </h3>';
        echo '<h3>Ο εμβολιασμός θα πραγματοποιηθεί στο : <b>' .$center_name. '</b> </h3>';
        echo '<h3>Η ώρα του ραντεβού είναι στις : <b>' .$time. '</b> </h3>';
          //Κουμπί ακύρωση του Ραντεβού
        echo   '<div class="w3-center w3-button w3-indigo w3-container ">
      <h6><a title="Ακύρωση" href="dbManagement/check_for_del_appointment.php"> Ακύρωση του Ραντεβού </a></h6>';
      }

      
?>
        </div>
      </div>
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
