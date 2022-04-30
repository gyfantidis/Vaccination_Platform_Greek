<?php
require 'dbManagement/connectDB.php';
session_start();
//Παίρνουμε τα SESSIONS αμκα, αφμ και id πολίτη
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];
$id = $_SESSION['cit_id'];
?>

<!DOCTYPE html>

<html>
<title>Σελίδα των Ραντεβού</title>

<!-- Πληροφορίες Μεταδεδομένων (Metadata)  -->
<meta charset="UTF-8">
<meta name="description" content="Σελίδα των Ραντεβού">
<meta name="keywords" content="covid 19, Εμβολιαστικό Κέντρο, Αθήνα, Θεσσαλονίκη, εμβόλιο">
<meta name="author" content="Ioannis Yfantidis / ggyfantidis@gmail.com">


<head>
<!-- Εισαγωγή CSS Links -->
<!-- Βιβλιοθήκη w3css -->
<link rel="stylesheet" href="css/w3.css">
<!-- Εικαστικό θέμα -->
<link rel="stylesheet" href="css/w3-theme-grey.css">
<!-- Εικαστικές παραμετροποποιήσεις  -->
<link rel="stylesheet" href="css/custom.css">
</head>

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

  <main id="col" class="w3-row">

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

      <!-- drop down menu -->
      <form  method='POST' action='' class='mb-3' >
      <?php
            //Παίρνουμε από την βάση τα εμβολιαστικά κέντρα
            $result = $mysqli->query("SELECT id, name FROM center");
                echo "<select name='val_center' id='val_center'>
                <option selected disabled>Διάλεξε το Εμβολιαστικό Κέντρο</option>";

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
        <input type="submit" name="submit" value="Επιλογή"
              class=" w3-center w3-padding w3-margin  w3-indigo ">
</form>
<!-- Εμφάνιση Ραντεβού του εμβολιαστικού κέντρου -->
<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['val_center'])) {
          $center_id = $_POST['val_center'];
          //Παίρνουμε από την βάση το όνομα του εμβολιαστικού κέντρου
          $question2 = "SELECT name FROM center WHERE id = $center_id";
          $result2 = $mysqli -> query($question2);
          while ($row2 = $result2->fetch_assoc()) {
            $center_name=$row2['name'];
          }
          //Ερώτημα για τα ραντεβού του εμβολιαστικού κέντρου
         $question3 = "SELECT date,time FROM appointment WHERE id_center = $center_id";

        echo '<div>
          <h3> Τα Ραντεβού </h3>
          <h4> '.$center_name.' </h4>
          </div>
          <!-- Πίνακας Ραντεβού -->
          <table class="w3-light-gray w3-center>">
          <tr>
          <td><label for="time"><i></i>Ώρα του Ραντεβού</label></td>
          <td><label for="0104"><i></i>01-04-2022</label></td>
          <td><label for="0204"><i></i>02-04-2022</label></td>
          </tr>
          <tr>
          <td><label for="time0800"><i></i>08:00 πμ</label></td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result3 = $mysqli -> query($question3);
          $free=false;
          while ($row3 = $result3->fetch_assoc()) {
          $date='2022-04-01';
          $time='08:00:00';
          //Εάν υπάρχει ραντεβού την συγκεκριμένη ώρα και ημέρα
          if(($time==$row3['time']) && ($date==$row3['date'])){
            echo '<td class=w3-red><label id=closed>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{//Εάν δεν υπάρχει
            $free=true;
          }}

          if($free==true){//Εάν υπάρχει εμφάνισέ το
            echo '<td class=w3-green><label>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form name=sub1 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=center_id value=$center_id name=ap_id /><br />
            <input type=hidden id=date value=$date name=date />
            <input type=hidden id=time value=$time name=time />
            <input type=submit name=submit1  value=Επιλογή_Ραντεβού>
            </form>";
     }
      echo'
        </td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result4 = $mysqli -> query($question3);
          $free=false;
          while ($row4 = $result4->fetch_assoc()) {
          $date='2022-04-02';
          $time='08:00:00';

          if(($time==$row4['time']) && ($date==$row4['date'])){
            echo '<td class=w3-red><label id=closed>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{
            $free=true;
          }}

          if($free==true){
            echo '<td class=w3-green><label>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form  name=sub2 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=center_id value=$center_id name=ap_id /><br />
            <input type=hidden id=date value=$date name=date />
            <input type=hidden id=time value=$time name=time />
            <input type=submit name=submit2   value=Επιλογή_Ραντεβού >
            </form>";
     }
          echo'
          </td>
          </tr>
          <tr>
          <td>
          <label for="time0900"><i></i>09:00 πμ</label></td>
          </td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result5 = $mysqli -> query($question3);
          $free=false;
          while ($row5 = $result5->fetch_assoc()) {
          $date='2022-04-01';
          $time='09:00:00';

          if(($time==$row5['time']) && ($date==$row5['date'])){
            echo '<td class=w3-red><label id=closed>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{
            $free=true;
          }}

          if($free==true){
            echo '<td class=w3-green><label>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form  name=sub3 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=ap_id value=$center_id name=ap_id /><br />
            <input type=hidden id=ap_id value=$date name=date />
            <input type=hidden id=ap_id value=$time name=time />
            <input type=submit name=submit3 value=Επιλογή_Ραντεβού>
            </form>";
          }
          echo'
          </td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result6 = $mysqli -> query($question3);
          $free=false;
          while ($row6 = $result6->fetch_assoc()) {
          $date='2022-04-02';
          $time='09:00:00';

          if(($time==$row6['time']) && ($date==$row6['date'])){
            echo '<td class=w3-red><label id=closed>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{
            $free=true;
          }}

          if($free==true){
            echo '<td class=w3-green><label>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form  name=sub4 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=ap_id value=$center_id name=ap_id /><br />
            <input type=hidden id=ap_id value=$date name=date />
            <input type=hidden id=ap_id value=$time name=time />
            <input type=submit name=submit4 value=Επιλογή_Ραντεβού>
            </form>";
          }
          echo'
          </td>
          </tr>
          <tr>
          <td>
          <label for="time1000"><i></i>10:00 πμ</label></td>
          </td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result7 = $mysqli -> query($question3);
          $free=false;
          while ($row7 = $result7->fetch_assoc()) {
          $date='2022-04-01';
          $time='10:00:00';

          if(($time==$row7['time']) && ($date==$row7['date'])){
            echo '<td class=w3-red><label id=closed>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{
            $free=true;
          }}

          if($free==true){
            echo '<td class=w3-green><label class=w3-green>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form  name=sub5 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=ap_id value=$center_id name=ap_id /><br />
            <input type=hidden id=ap_id value=$date name=date />
            <input type=hidden id=ap_id value=$time name=time />
            <input type=submit name=submit5 value=Επιλογή_Ραντεβού>
            </form>";
          }
          echo'
          </td>
          ';
          //Ερώτηση για συγκεκριμένη ημέρα και ώρα
          $result8 = $mysqli -> query($question3);
          $free=false;
          while ($row8 = $result8->fetch_assoc()) {
          $date='2022-04-02';
          $time='10:00:00';

          if(($time==$row8['time']) && ($date==$row8['date'])){
            echo '<td class=w3-red><label id=col>ΚΛΕΙΣΜΕΝΟ</label>';
            $free=false;
            break;
          }
          else{
            $free=true;
          }}

          if($free==true){
            echo '<td class=w3-green><label>ΕΛΕΥΘΕΡΟ</label>';
            echo "<form  name=sub6 method=POST action=dbManagement/set_appointment.php class=mb-3>
            <input type=hidden id=ap_id value=$center_id name=ap_id /><br />
            <input type=hidden id=ap_id value=$date name=date />
            <input type=hidden id=ap_id value=$time name=time />
            <input type=submit name=submit6 value=Επιλογή_Ραντεβού>
            </form>";
          }
          echo'
          </td>
          </tr>
          </table>
          ';

        } else {//Εάν δεν έχεις επιλέξει κέντρο
          echo 'Παρακαλώ επέλεξε Εμβολιαστικό Κέντρο.';
        }
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
