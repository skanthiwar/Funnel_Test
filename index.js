

function validateAndSubmit() {
  if (validate()) {
      document.getElementById('submit_form').submit();
  }
}

function validate(){
     var firstname = document.getElementById("firstname").value;
     var lastname = document.getElementById("lastname").value;
     var address = document.getElementById("address").value;
     if(firstname == ""){
       document.getElementById("ferror").innerHTML="First Name is required";
       document.getElementById("firstname").focus();
       return false;
      }else{
        document.getElementById("ferror").innerHTML="";
      }
      
      if(lastname == ""){
        document.getElementById("lerror").innerHTML="Last Name is required";
        document.getElementById("lastname").focus();
        return false;  
      }else{
        document.getElementById("lerror").innerHTML="";
      }
      
      if(address == ""){
        document.getElementById("aerror").innerHTML="Address is required";
        document.getElementById("address").focus();
        return false;
      }else{
        document.getElementById("aerror").innerHTML="";
      }
      return true;
 }




