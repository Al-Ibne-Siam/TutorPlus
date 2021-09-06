var fname = document.getElementById('fname');
var lname = document.getElementById('lname');
var pw = document.getElementById('pw');
var cpw = document.getElementById('cpw');
var mail = document.getElementById('mail');
var pnum = document.getElementById('pnum');
var tnc = document.getElementById('tnc');
var usertype = document.getElementById('usertype-selection');
var registerform = document.getElementById('registerform');


function validRegistration(){

  if(usertype.value=="1"){
    registerform.action = "instructor_dashboard.html";
  } else registerform.action = "dashboard.html";

  if(fname.value==''||fname.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(lname.value==''||lname.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(pw.value==''||pw.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(cpw.value==''||cpw.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(mail.value==''||mail.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(pnum.value==''||pnum.value==null){
    alert("Please fill all the fields");
    return false;
  }
  if(tnc.value==null){
    alert("Please agree to the terms and conditions");
    return false;
  }
  if(pw.value!=cpw.value){
    alert("Password and confirmed password do not match");
    return false;
  }
}
