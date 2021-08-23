var uname = document.forms['login_form']['uname'];
var password = document.forms['login_form']['password'];
var npassword = document.forms['otp_form']['new_password'];
var cnpassword = document.forms['otp_form']['confirm_password'];
var otp = document.forms['otp_form']['otp_num'];
var uname_error = document.getElementById('uname_error');
var password_error = document.getElementById('password_error');
var otp_error = document.getElementById('otp_error');
var np_error = document.getElementById('np_error');
var cnp_error = document.getElementById('cnp_error');
var npmatch_error = document.getElementById('npmatch_error');

function validated(){
  no_uname.style.display = "none";
  uname_error.style.display = "none";
  password_error.style.display = "none";
  if(uname.value == '' || uname.value == null){
    uname.style.border = "2px border";
    uname_error.style.display = "block";
    uname.focus();
    return false;
  }

  if(password.value == '' || password.value == null){
    password.style.border = "2px border";
    password_error.style.display = "block";
    password.focus();
    return false;
  }
  return true;
}

function validate_reset(){
  otp_error.style.display = "none";
  np_error.style.display = "none";
  cnp_error.style.display = "none";

  if(otp.value == '' || otp.value == null){
    otp.style.border = "2px border";
    otp_error.style.display = "block";
    otp.focus();
    return false;
  }

  if(npassword.value == '' || npassword.value == null){
    npassword.style.border = "2px border";
    np_error.style.display = "block";
    npassword.focus();
    return false;
  }

  if(cnpassword.value == '' || cnpassword.value == null){
    cnpassword.style.border = "2px border";
    cnp_error.style.display = "block";
    cnpassword.focus();
    return false;
  }

  return true;
}
