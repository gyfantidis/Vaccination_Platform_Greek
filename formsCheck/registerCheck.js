function check2() {
  let firstname = document.getElementById("firstname").value;
  let lastname = document.getElementById("lastname").value;
  let amka = document.getElementById("amka2").value;
  let afm = document.getElementById("afm2").value;
  let passport = document.getElementById("passport").value;
  let age = document.getElementById("age").value;
  let email = document.getElementById("email").value;
  let phone = document.getElementById("phone").value;
  let role = document.getElementById("role").value;


  if(firstname=="" || lastname=="" || amka =="" || afm =="" || passport =="" || age =="" || phone =="" || role=="" ){
    alert ("Παρακαλώ συμπληρώστε όλα τα υποχρεωτικά πεδία");
    return false;
  }
  else if (afm.length != 9 && amka.length != 11) {
    alert (`Ο ΑΜΚΑ θα πρέπε να έχει 11 ψηφία
      ο ΑΦΜ θα πρέπει να έχει 9 ψηφία `);
      return false;
      }
  else if(amka.length != 11){
    alert ("Ο ΑΜΚΑ θα πρέπε να έχει 11 ψηφία");
    return false;
    }
  else if(afm.length != 9){
    alert ("Ο ΑΦΜ θα πρέπε να έχει 9 ψηφία");
    return false;
    }
  else if(email!="" && !ValidateEmail(email)){
    alert ("Παρακαλώ συμπληρώστε ένα έγκυρο e-mail ");
    return false;
  }
  else {
    return true;
  }
}
function ValidateEmail(mail)
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
}
