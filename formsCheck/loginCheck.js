function check() {
  let amka = document.getElementById("amka").value;
  let afm = document.getElementById("afm").value;
  let text = " ";



  if (afm.length != 9 && amka.length != 11) {
    alert (`Ο ΑΜΚΑ θα πρέπε να έχει 11 ψηφία
      Ο ΑΦΜ θα πρέπει να έχει 9 ψηφία`);
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
  else {
    return true;
  }

}
