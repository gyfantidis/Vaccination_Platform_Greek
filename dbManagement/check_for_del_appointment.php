<!DOCTYPE html>
<html>

<script language="javascript">

if (confirm("Επιθυμείται να ακυρωθεί το ραντεβού σας;") == false ) {
  history.go (-1);

} else {
  location.href = "del_appointment.php";
}

  </script>
</html>
