<!DOCTYPE html>
<?php
require 'dbManagement/connectDB.php';
session_start();
//Παίρνουμε τα SESSIONS
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
//Παίρνουμε από την β΄΄αση τα στοιχεία του Γιατρού - χρήστη
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
//Παιρνάμε στα SESSIONS το id του χρήστη
$_SESSION['id'] = $id;
?>

<html>
<title>Σελίδα του Γιατρού</title>

<!-- Πληροφορίες Μεταδεδομένων (Metadata)  -->
<meta charset="UTF-8">
<meta name="description" content="Σελίδα του Γιατρού">
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
      <br />
      <br />
      <br />
      <br />
    <div class="w3-center w3-padding-large">
      <!-- Ο πίνακας με τα στοιχεία του χρήστη -->
      <table class="w3-center>">
      <tr>
        <td class=w3-yellow><h5> <?php echo $lastname; ?> </h5></td>
        <td class=w3-yellow><h5> <?php echo $firstname; ?> </h5></td>
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
      <!-- Κουμπί δήλωση εμβολιαστικού κέντρου -->
      <div class=" w3-button w3-indigo w3-container">
        <h6><a title="Δήλωση Εμβολιαστικού Κέντρου" href="dbManagement/doctor_check_center.php"> Δήλωση Εμβολιαστικού Κέντρου </a></h6>
            </div>
      <!-- Κουμπί προγραμματισμένα ραντεβού -->
      <div class=" w3-button w3-indigo w3-container">
            <h6><a title="Προγραμματισμένα Ραντεβού" href="dbManagement/doctor_check_appointment.php"> Προγραμματισμένα Ραντεβού </a></h6>
          </div>

<?php
if($_SESSION['appointment_check']==true){

    $center_id = $_SESSION['center_id'];
    //Παίρνουμε το όνομα του εμβολιαστικού κέντρου
    $question2 = "SELECT name FROM center WHERE id = $center_id";
    $result2 = $mysqli -> query($question2);
    while ($row2 = $result2->fetch_assoc()) {
      $center_name=$row2['name'];
    }
    //Παίρνουμε όλα τα ραντεβού του εμβολιαστικού κέντρου
    $question3 = "SELECT * FROM appointment WHERE id_center = $center_id";

    echo '<div>
    <br />
      <h3> Τα Ραντεβού </h3>
      <h4> '.$center_name.' </h4>
        </div>
    <br />
    <div class="w3-row">
    <div class="w3-third ">
    <h2></h2>
  </div>
    <div style="text-align:center" class= "w3-container w3-third w3-padding w3-buttom w3-indigo" >
      <h6><a title="Εξαγωγή XML" href="./exagogi_xml.php">Εξαγωγή XML</a></h6>
    </div>
    </div>
    <br />
    <br />


    <!-- Ο πίνακας με τα ραντεβού -->
    <table class="w3-center>">
    <tr>
    <td><label for="time"><i></i>Ώρα του Ραντεβού</label></td>
    <td><label for="0104"><i></i>01-04-2022</label></td>
    <td><label for="0204"><i></i>02-04-2022</label></td>
    </tr>
    <tr>
    <td><label for="time0800"><i></i>08:00 πμ</label></td>
    <td> ';
    //Παίρνουμε από την βάση τα ραντεβού του κέντρου
    $result3 = $mysqli -> query($question3);
    while ($row3 = $result3->fetch_assoc()) {
      $date=$row3['date'];
      $time=$row3['time'];
      $id_cit=$row3['id_citizen'];
      $status=$row3['status'];
      $ap_id=$row3['id'];
      //Εάν ταιριάζουμε με την συγκεκριμένη ημερομηνία
    if(($time=='08:00:00') && ($date=='2022-04-01')){
      //Παίρνουμε τα στοιχεία του πολίτη
        $result11 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
        while ($row11 = $result11->fetch_assoc()) {
          $fname=$row11['first_name'];
          $lname=$row11['last_name'];
          $amkac=$row11['amka'];

      echo"  <h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
      <h5>ΑΜΚΑ : $amkac </h5>
      ";
        if($status==0){//Εάν η κατάσταση είναι μη ολοκληρωμένη
          echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
        }
        else{//Εάν η κατάσταση είναι ολοκλήρωμένος
          echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
        }
        //Κουμπί αλλαγής κατάστασης
      echo "<form name=form4 action=dbManagement/change_status.php method = post>
      <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
    <input type = submit name=change_status1 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
    </form>
 ";
}
}
}

    echo'

    </td>
    <td>';
    $result4 = $mysqli -> query($question3);
    while ($row4 = $result4->fetch_assoc()) {
      $date=$row4['date'];
      $time=$row4['time'];
      $id_cit=$row4['id_citizen'];
      $status=$row4['status'];
      $ap_id=$row4['id'];

      if(($time=='08:00:00') && ($date=='2022-04-02')){
          $result12 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
          while ($row12 = $result12->fetch_assoc()) {
            $fname=$row12['first_name'];
            $lname=$row12['last_name'];
            $amkac=$row12['amka'];

        echo"<h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
        <h5>ΑΜΚΑ : $amkac </h5>
        ";
          if($status==0){
            echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          else{
            echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          echo "<form name=form4 action=dbManagement/change_status.php method = post>
          <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
        <input type = submit name=change_status2 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
        </form>
        ";
  }
  }
}

    echo'
    </td>
    </tr>
    <tr>
    <td>
    <label for="time0900"><i></i>09:00 πμ</label></td>
    </td>
    <td>';

    $result5 = $mysqli -> query($question3);
    while ($row5 = $result5->fetch_assoc()) {
      $date=$row5['date'];
      $time=$row5['time'];
      $id_cit=$row5['id_citizen'];
      $status=$row5['status'];
      $ap_id=$row5['id'];

    if(($time=='09:00:00') && ($date=='2022-04-01')){
        $result11 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
        while ($row13 = $result11->fetch_assoc()) {
          $fname=$row13['first_name'];
          $lname=$row13['last_name'];
          $amkac=$row13['amka'];

      echo"<h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
      <h5>ΑΜΚΑ : $amkac </h5>
      ";
        if($status==0){
          echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
        }
        else{
          echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
        }

      echo "<form name=form4 action=dbManagement/change_status.php method = post>
      <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
    <input type = submit name=change_status1 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
    </form> ";
  }
  }
}
    echo'

    </td>
    <td>';
    $result6 = $mysqli -> query($question3);
    while ($row6 = $result6->fetch_assoc()) {
      $date=$row6['date'];
      $time=$row6['time'];
      $id_cit=$row6['id_citizen'];
      $status=$row6['status'];
      $ap_id=$row6['id'];
      if(($time=='09:00:00') && ($date=='2022-04-02')){
          $result14 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
          while ($row14 = $result14->fetch_assoc()) {
            $fname=$row14['first_name'];
            $lname=$row14['last_name'];
            $amkac=$row14['amka'];

        echo"<h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
        <h5>ΑΜΚΑ : $amkac </h5>
        ";
          if($status==0){
            echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          else{
            echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          echo "<form name=form4 action=dbManagement/change_status.php method = post>
          <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
        <input type = submit name=change_status4 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
        </form>        ";

    }
    }
}
    echo'

    </td>
    </tr>
    <tr>
    <td>
    <label for="time1000"><i></i>10:00 πμ</label></td>
    </td>
    <td>';
    $result7 = $mysqli -> query($question3);
    while ($row7 = $result7->fetch_assoc()) {
      $date=$row7['date'];
      $time=$row7['time'];
      $id_cit=$row7['id_citizen'];
      $status=$row7['status'];
      $ap_id=$row7['id'];

      if(($time=='10:00:00') && ($date=='2022-04-01')){
          $result15 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
          while ($row15 = $result15->fetch_assoc()) {
            $fname=$row15['first_name'];
            $lname=$row15['last_name'];
            $amkac=$row15['amka'];

        echo"<h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
        <h5>ΑΜΚΑ : $amkac </h5>
        ";
          if($status==0){
            echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          else{
            echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          echo "<form name=form4 action=dbManagement/change_status.php method = post>
          <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
        <input type = submit name=change_status5 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
        </form>     ";
  }
  }
}
    echo'

    </td>
    <td>';
    $result8 = $mysqli -> query($question3);
    while ($row8 = $result8->fetch_assoc()) {
      $date=$row8['date'];
      $time=$row8['time'];
      $id_cit=$row8['id_citizen'];
      $status=$row8['status'];
      $ap_id=$row8['id'];

      if(($time=='10:00:00') && ($date=='2022-04-02')){
          $result16 = $mysqli -> query("SELECT id, first_name, last_name, amka FROM user WHERE id = $id_cit");
          while ($row16 = $result16->fetch_assoc()) {
            $fname=$row16['first_name'];
            $lname=$row16['last_name'];
            $amkac=$row16['amka'];

        echo"<h5>ΟΝΟΜΑΤΕΠΩΝΥΜΟ : $fname $lname </h5>
        <h5>ΑΜΚΑ : $amkac </h5>
        ";
          if($status==0){
            echo '<h5 class=w3-red>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΜΗ ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          else{
            echo '<h5 class=w3-blue>ΚΑΤΑΣΤΑΣΗ ΕΜΒΟΛΙΑΣΜΟΥ : ΟΛΟΚΛΗΡΩΜΕΝΟΣ </h5>';
          }
          echo "<form name=form4 action=dbManagement/change_status.php method = post>
          <input type=hidden id=ap_id value=$ap_id name=ap_id /><br />
        <input type = submit name=change_status6 value=Αλλαγή_Κατάστασης_Εμβολιασμού />
        </form>  ";
  }
  }
}
    echo'
    </td>
    </tr>
    </table>
    ';

}

  else{
    echo '';
  }

  ?>
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
