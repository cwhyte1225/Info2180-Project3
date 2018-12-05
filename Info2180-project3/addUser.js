
//PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVERS WHATS TAKING PLACE IN THE CODE
//functions

function validateUserData(Fname, Lname, Pwrd1, Pwrd2, email, phone){

    var words_only = /[a-zA-Z ]+/;
    var email_patt = /[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{3}/;
    var pwrd_patt = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*)$/;
    var phone_patt = /[0-9]{3}-[0-9]{3}-[0-9]{4}/;
    var res = false;
    
    if (Fname =="") {
        window.alert('FIRST NAME EMPTY');
    } else if(!words_only.test(Fname)){
        window.alert("PLEASE ENTER A VALID FIRST NAME");   
    }else{
        res = true;
    }
    
    if (Lname =="") {
        window.alert('LAST NAME EMPTY ');
    } else if(!words_only.test(Lname)){
        window.alert("PLEASE ENTER A VALID LAST NAME");    
    }else{
      res = true;
    }
    
    if (Pwrd1 =="" || Pwrd2=="") {
        window.alert('PLEASE VERIFY THE PASSWORD');
    }else if(Pwrd1 != Pwrd2){
        window.alert('PASSWORDS DO NOT MATCH');
    }else if(!pwrd_patt.test(Pwrd1)){
        window.alert("INVALID PASSWORD ENTERED nb.passwords need at least 1 upper case letter, 1 lowercase letter and 1 number "); 
    }else{
      res = true;
    }
      
    if (email =="") {
        window.alert('EMAIL EMPTY');
    } else if(!email_patt.test(email)){
        window.alert("INVALID EMAIL ENTERED");    // check if Job Title only contains letters and whitespace
    }else{
      res = true;
    }
    
    if (phone =="") {
        window.alert('ENTER PHONE NUMBER');
    }else if(!phone_patt.test(phone)){
        window.alert('INVALID PHONE NUMBER eg.XXX-XXX-XXXX');        
    }    else{
      res = true;
    }
    return res;
}


function createUser(Fname, Lname, Pwrd1, email, phone){
    var httpRequest = new XMLHttpRequest(); 
    var url = " https://info2180-project3-rijkaa.c9users.io/createNewJob.php/";
    var result;
    Fname = "?Fname="+ Fname ;
    Lname= "&Lname=" +Lname;
    Pwrd1 = "&password="+ Pwrd1;
    email = "&email="+ email ;
    phone = "&phone="+ phone;
    
    url = url + Fname + Lname + Pwrd1 + email + phone ;
     
    httpRequest.open('POST', url);
    httpRequest.send();
    
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = httpRequest.responseText;
            if(result == 'true'){
                window.alert('worked in php');
                return true;
            }else{
                window.alert(result);
                //window.location.replace(" https://info2180-project3-rijkaa.c9users.io/createNewJob.php/");
                return false;
            }
        }
    };
}

//end functions

window.onload = function() {
    var submit = document.getElementById("newsignup");
    
    submit.onclick = function(){
        var Fname = document.getElementById('Fname').value;    
        var Lname = document.getElementById('Lname').value;
        var Pwrd1 = document.getElementById('newpwrd').value;
        var Pwrd2 = document.getElementById('newpwrd2').value;
        var email = document.getElementById('newEmail').value;
        var phone = document.getElementById('telephone').value;
        
        if( validateUserData(Fname, Lname, Pwrd1, Pwrd2, email, phone) ){
           if (createUser(Fname, Lname, Pwrd1, email, phone)){
               console.log('user added');
           }else{
               console.log('something went wrong');
           }
        }else{
            window.alert("validate failed");
        }
    };
    
};

