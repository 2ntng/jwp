/**
 * Update field "npm" dengan ajax.
 * Parameter ajax sesuai pada form dengan field "email".
 *
 */
function UpdateNpm() {
  let email = document.getElementById('email').value;

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById("npm").value = this.responseText;
  };
  xhttp.open("GET", "ajax/get_npm.php?email=" + email);
  xhttp.send();
}

/**
 * Update field "ipk" dengan ajax.
 * Parameter ajax sesuai pada form dengan field "email" dan semester.
 * Jika IPK lebih dari 3 maka mengaktifkan elemen beasiswa, berkas dan btnSubmit.
 */
function UpdateIpk() {
  let email = document.getElementById('email').value;
  let semester = document.getElementById('semester').value;

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    document.getElementById("ipk_terakhir").value = this.responseText;
    if (this.responseText != "IPK tidak ditemukan" && parseFloat(this.responseText) > 3 ) {
      document.getElementById("beasiswa").disabled = false;
      document.getElementById("berkas").disabled = false;
      document.getElementById("btnSubmit").disabled = false;
    } else {
      document.getElementById("beasiswa").disabled = true;
      document.getElementById("berkas").disabled = true;
      document.getElementById("btnSubmit").disabled = true;
    }
  };
  xhttp.open("GET", "ajax/get_ipk.php?email=" + email + "&semester=" + semester);
  xhttp.send();
}