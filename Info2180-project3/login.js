
//PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVERS WHATS TAKING PLACE IN THE CODE
//functions

function validateLogin(email, pwrd){
    
    var status = false;
    var email_patt = /[a-zA-Z]+@[a-zA-Z]+\.[a-zA-Z]{3}/;
    var pwrd_patt = /^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*)$/;

    if (email == "" || pwrd =="") {  //checking if input is empty
        status = false;
         }
    else{
        status = true;
    }
    
    if (email_patt.test(email) && !pwrd_patt.test(pwrd)) { //checking if the format of th email and password are valid
        
        status = true;
         }
    else{
        status = false;
    }
    return status;
}


function userLogin(email, pwrd){
    
     var httpRequest = new XMLHttpRequest(); 
     var url = " https://info2180-project3-rijkaa.c9users.io/login.php/?name=";
     var q = "&pwrd="+ pwrd;
     var result;
     
     url = url+email+q;
     
     console.log(url);
     
     httpRequest.open('POST', url);
     httpRequest.send();
     console.log(httpRequest);
     
     httpRequest.onreadystatechange = function () {
         if (this.readyState == 4 && this.status == 200) {
            result = httpRequest.responseText;
            if(result == 'true'){
                window.location.replace(" https://info2180-project3-rijkaa.c9users.io/home.php");
            }else{
                //window.alert(result);
                window.location.replace(" https://info2180-project3-rijkaa.c9users.io/index.php");
            }
        }
    };
}

//end functions

window.onload = function() {
    var submit = document.getElementById("signin");
    
    submit.onclick = function(){
        var email = document.getElementById("email").value;
        var pwrd = document.getElementById("pwrd").value;
    
        if(validateLogin(email, pwrd)){
            userLogin(email,pwrd);
        }
        
    };
    
    
};

