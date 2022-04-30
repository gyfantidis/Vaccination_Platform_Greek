<?php
session_start();//ανοίγουμε το session
require 'dbManagement/connectDB.php';//συνδέουμε την βάση δεδομένων
$amka = $_SESSION['amka'];
$afm =  $_SESSION['afm'];

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> <!-- εισάγουμε το stylesheet της xsl-->
</head>

<body>
<br/>
<br/>
<br/>


<?php

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

		$center_id = $_SESSION['center_id'];
    //Παίρνουμε τα στοιχεία του εμβολιαστικού κέντρου
    $question2 = "SELECT * FROM center WHERE id = $center_id";
    $result2 = $mysqli -> query($question2);
    while ($row2 = $result2->fetch_assoc()) {
      $center_name1=$row2['name'];
			$center_address1=$row2['address'];
			$center_tk1=$row2['t_k'];
			$center_phone1=$row2['phone'];
    }
		  //Παίρνουμε όλα τα ραντεβού και τους χρήστες που θα εμβολιαστούν
		$i=-1;
		$question3 = "SELECT * FROM appointment
								LEFT JOIN user ON id_citizen=user.id
				  			WHERE id_center = $center_id GROUP BY date,time";
		$result3 = $mysqli -> query($question3);
		while ($row3 = @mysqli_fetch_array($result3)) {// θέτουμε σε πίνακα μια γραμμή αποτελεσμάτων απο τον πίνακα
		$i++;
		$dedomena[$i]['date'] = $row3['date'];//απο τον πίνακα θέτουμε σε ξεχωριστές μεταβλητές ουσιαστικά την κάθε στήλη
		$dedomena[$i]['time'] = $row3['time'];
		$dedomena[$i]['status'] = $row3['status'];
		$dedomena[$i]['first_name'] = $row3['first_name'];
		$dedomena[$i]['last_name'] = $row3['last_name'];
		$dedomena[$i]['amka'] = $row3['amka'];
		$dedomena[$i]['age'] = $row3['age'];

	}


     //Αν υπάρχουν δεδομένα
    	 if(!empty($dedomena)){//εάν υπάρχουν δεδομένα στον  πίνακα

			/* Δημιουργία νέας οντότητας της κλάσης DomImplementation. Δηλώνουμε ότι θα υπάρχει ένα εξωτερικό dtd
             * αρχείο με το όνομα 'transactions.dtd', το οποίο θα χρησιμοποιείται για τον έλεγχο εγκυρότητας του
             * εκάστοτε παραγόμενου xml. Το κάθε xml που δημιουργείται, θα έχει ως αναφορά το dtd που δηλώσαμε κι
             * επιπλέον, θα έχει κωδικοποίηση UTF-8 (για να είμαστε σίγουροι για την υποστήριξη των Ελληνικών χαρακτήρων)
             * κι ενεργοποιούμε την xml μορφοποίηση, ώστε να απεικονίζεται με τη γνώριμη μορφή.
             */

		  	 $imp = new DOMImplementation;
		  	 $dtd = $imp->createDocumentType('transactions','','transactions.dtd');
		   	 $xml_filename = "./transactions.xml";
			 $xml = $imp->createDocument("","",$dtd); $xml->encoding = 'UTF-8';
			 $xml->formatOutput = true;

			 //Δημιουργούμε το στοιχείο transactions και το προσθέτουμε στο xml.
			 $transactions = $xml->createElement("transactions");
			 $xml->appendChild($transactions);
		     //Δημιουργούμε τα στοιχεία και το προσθέτουμε στο transactions.
	 		 $doctor_lname = $xml->createElement("doctor_lname",$lastname);
			 $transactions->appendChild($doctor_lname);
			 $doctor_fname = $xml->createElement("doctor_fname",$firstname);
			 $transactions->appendChild($doctor_fname);
			 $doctor_passport = $xml->createElement("doctor_passport",$passport);
			 $transactions->appendChild($doctor_passport);
			 $doctor_email = $xml->createElement("doctor_email",$email);
			 $transactions->appendChild($doctor_email);
			 $center_name = $xml->createElement("center_name",$center_name1);
			 $transactions->appendChild($center_name);
			 $center_address = $xml->createElement("center_address",$center_address1);
			 $transactions->appendChild($center_address);
			 $center_tk = $xml->createElement("center_tk",$center_tk1);
			 $transactions->appendChild($center_tk);
			 $center_phone = $xml->createElement("center_phone",$center_phone1);
			 $transactions->appendChild($center_phone);


			foreach($dedomena as $in => $value)
			{
				//Δημιουργούμε ένα στοιχείο appointment και το προσθέτουμε στο transactions.
				$appointment = $xml->createElement("appointment");
				$transactions->appendChild($appointment);
 				//Δημιουργούμε τα στοιχεία - παιδιά
				$adate=$xml->createElement("date",$value['date']);
				$appointment->appendChild($adate);

				$atime=$xml->createElement("time",$value['time']);
				$appointment->appendChild($atime);

				$alname=$xml->createElement("last_name",$value['last_name']);
				$appointment->appendChild($alname);

				$afname=$xml->createElement("first_name",$value['first_name']);
				$appointment->appendChild($afname);

				$aamka=$xml->createElement("amka",$value['amka']);
				$appointment->appendChild($aamka);

				$aage=$xml->createElement("age",$value['age']);
				$appointment->appendChild($aage);

				$astatus=$xml->createElement("status",$value['status']);
				$appointment->appendChild($astatus);


			}


			$xml->saveXML();//Ολοκλήρωση της δημιουργίας του xml αρχείου και αποθήκευση με το όνομα 'transactions.xml'
            $xml->save("./transactions.xml");

			if ($xml)//εάν υπάρχει το xml δηλαδή έχει μέσα δεδομένα
			{
				//Αποθηκεύουμε σε μεταβλητή την τοποθεσία αποθήκευσης .xml & .xsl
				$xml_filename = "./transactions.xml";
				$xsl_filename = "./transactions.xsl";


				if(!$xml->validate()){//Έλεγχος εγκυρότητας του xml αρχείου με βάση το transaction.dtd που δώσαμε

						echo '<script language="javascript">alert("Το παραγόμενο αρχείο XML δεν μπορεί να υλοποιηθεί με βάση το DTD του 1ου ερωτήματος!");
						document.location="doctor.php";</script>';

				}else{

					echo"
					<table align= 'center'>
					<th><font size='5'>ΣΤΟΙΧΕΙΑ ΡΑΝΤΕΒΟΥ ΙΑΤΡΟΥ</th>
					</table>
					";
					//Φορτώνουμε το xml αρχείο
					$xml = new DOMDocument();
					$xml->load($xml_filename);
					//Φορτώνουμε το xsl αρχείο
					$xsl = new DOMDocument();
					$xsl->load($xsl_filename);
					//Επεξεργασία και εξαγωγή αποτελεσμάτων
					$proc = new XSLTProcessor();
					$proc->importStyleSheet($xsl);
					echo $proc->transformToXML($xml);
					//ανοίγουμε νέα καρτέλα με το xml
					echo"
					<br/>

					<div style='text-align:center; font-size:30px;'>
		        <h6><a title=Back to doctor.php href=./doctor.php> Πίσω </a></h6>
		      </div>
					<br />

					<a style='font-size:20px; text-align:center;display:block;' href='transactions.xml'
					target='_blank'>Πατήστε εδώ για να δείτε σε νέο παράθυρο το αρχείο xml</a>";

				}

			}}
?>

	</body>
</html>
