<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
<xsl:output method = "html"></xsl:output>
<xsl:template match="/">
<html>

  <body>
   <!-- Ελέγχουμε εάν έχουμε δεδομένα -->
   <br/>
   <br/>
   <br/>
   <br/>
   <!-- Ελέγχουμε εάν έχουμε δεδομένα με βάση το if της xsl-->
  <xsl:if test="count(/transactions/appointment) &gt; 0">
  <table cellpadding="4"  cellspacing="2" align="center">
  <!--φτιάχουμε πίνακα για να βάλουμε τα δεδομένα μας -->

	<tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Επώνυμο Ιατρού :
	<xsl:value-of select="/transactions/doctor_lname"/></b></td></tr>
  	<tr><td colspan="4"></td></tr>

    <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Όνομα Ιατρού :
  	<xsl:value-of select="/transactions/doctor_fname"/></b></td></tr>
    	<tr><td colspan="4"></td></tr>

      <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Αριθμός Ταυτότητας Ιατρού :
    	<xsl:value-of select="/transactions/doctor_passport"/></b></td></tr>
      	<tr><td colspan="4"></td></tr>

        <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">E-mail Ιατρού :
      	<xsl:value-of select="/transactions/doctor_email"/></b></td></tr>
        	<tr><td colspan="4"></td></tr>

          <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Εμβολιαστικό Κέντρο :
        	<xsl:value-of select="/transactions/center_name"/></b></td></tr>
          	<tr><td colspan="4"></td></tr>

            <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Διεύθυνση :
          	<xsl:value-of select="/transactions/center_address"/></b></td></tr>
            	<tr><td colspan="4"></td></tr>

              <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Ταχιδρομικός Κώδικας :
            	<xsl:value-of select="/transactions/center_tk"/></b></td></tr>
              	<tr><td colspan="4"></td></tr>

                <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Τηλέφωνο :
              	<xsl:value-of select="/transactions/center_phone"/></b></td></tr>
                	<tr><td colspan="4"></td></tr>




		<!-- φτιάχνουμε γραμμές όπου θα έχουμε τον συνολικό αριθμό των ραντεβού, το ποσοστό των ολοκληρωμένων ραντεβού
    και το πρόγραμμα των ραντεβού ταξινομημένα με την ημερομηνία τους -->
	<!-- Με βάση τις μεθόδους sum και div και count της xsl βρίσκουμε τα αποτελέσματα-->

	<tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Συνολικός αριθμός Προγραμματισμένων ραντεβού =
	<xsl:value-of select="count(/transactions/appointment)" /></b></td></tr>
	<tr><td colspan="4"></td></tr>


  <tr> <td align="left" bgcolor="#214186" colspan="4"><b style="color:#747a80">Ποσοστό Ολοκληρωμένων Ραντεβού =
	<xsl:value-of select="100* sum(/transactions/appointment/status) div count(/transactions/appointment)" />%</b></td></tr>
	<tr><td colspan="4"></td></tr>

	</table>

	<xsl:variable name="max1">
		<xsl:for-each select="/transactions/appointment/*">
		<xsl:sort select="." data-type="number" order="descending"/>
		<xsl:if test="position() = 1"><xsl:value-of select="."/></xsl:if>
		</xsl:for-each>
	</xsl:variable>

	<table cellpadding="4" cellspacing="2" align="center">
		<tr>
      <td align="center" bgcolor="#214186"><b style="color:#747a80">Ημέρα</b></td>
      <td align="center" bgcolor="#214186"><b style="color:#747a80">Ώρα</b></td>
			<td align="center" bgcolor="#214186"><b style="color:#747a80">Επώνυμο</b></td>
			<td align="center" bgcolor="#214186"><b style="color:#747a80">Όνομα</b></td>
			<td align="center" bgcolor="#214186"><b style="color:#747a80">ΑΜΚΑ</b></td>
			<td align="center" bgcolor="#214186"><b style="color:#747a80">Ηλικία</b></td>
      <td align="center" bgcolor="#214186"><b style="color:#747a80">Κατάσταση Εμβολιασμού</b></td>

		</tr>

		<xsl:for-each select="transactions/appointment">
		<xsl:sort select="date/time"/>
		<tr>

      <td valign="top" align="center"><xsl:value-of select="date"/></td>
      <td valign="top" align="center"><xsl:value-of select="time"/></td>
		  <td valign="top" align="center"><xsl:value-of select="last_name"/></td>
		  <td valign="top" align="center"><xsl:value-of select="first_name"/></td>
		  <td valign="top" align="center"><xsl:value-of select="amka"/></td>
      <td valign="top" align="center"><xsl:value-of select="age"/></td>
      <td valign="top" align="center"><xsl:value-of select="status"/></td>

		</tr>
		</xsl:for-each>
	</table>






<br/>

</xsl:if>
</body>
</html>

</xsl:template>

</xsl:stylesheet>
