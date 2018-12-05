
//PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVERS WHATS TAKING PLACE IN THE CODE
//functions

function validateData(job_title, job_description, job_location, company, category){

    var words_only = /[a-zA-Z ]+/;
    var words_with_numbers = /[a-zA-Z0-9 ].+/;
    var res = false;
    
    if (job_title =="") {
        window.alert('job title issue');
    } else if(!words_only.test(job_title)){
        window.alert("Only letters and white space allowed");    // check if Job Title only contains letters and whitespace
    }else{
        res = true;
    }
    
    if (job_description =="") {
        window.alert('job description issue');
    } else if(!words_with_numbers.test(job_description)){
        window.alert("something went wrong");    // check if Job Title only contains letters and whitespace
    }else{
      res = true;
    }
    
    if (company =="") {
        window.alert('company issue');
    } else if(!words_with_numbers.test(company)){
        window.alert("something went wrong 1");    // check if Job Title only contains letters and whitespace
    }else{
      res = true;
    }
      
    if (job_location =="") {
        window.alert('location issue');
    } else if(!words_with_numbers.test(job_location)){
        window.alert("something went wrong 3");    // check if Job Title only contains letters and whitespace
    }else{
      res = true;
    }
    
    if (category =="blank") {
        window.alert('select a category');
    }else{
      res = true;
    }
    return res;
}


function createJob(job_title, job_description, job_location, company, category){
    var httpRequest = new XMLHttpRequest(); 
    var url = " https://info2180-project3-rijkaa.c9users.io/createNewJob.php/";
    var result;
    job_title = "?title="+ job_title ;
    job_description = "&description=" +job_description;
    job_location = "&location="+ job_location;
    company = "&company="+ company ;
    category = "&category="+ category;
    
    url = url + job_title + job_description + job_location + company + category ;
     
    window.alert(url);
     
    httpRequest.open('POST', url);
    httpRequest.send();
    
    //window.alert(httpRequest);
     
    httpRequest.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            result = httpRequest.responseText;
            if(result == 'true'){
                window.alert('worked in php');
                //window.location.replace(" https://info2180-project3-rijkaa.c9users.io/home.php");
            }else{
                window.alert(result);
                //window.location.replace(" https://info2180-project3-rijkaa.c9users.io/createNewJob.php/");
            }
        }
    };
}

//end functions

window.onload = function() {
    var submit = document.getElementById("newsignup");
    
    submit.onclick = function(){
        var job_title = document.getElementById('job_title').value;    
        var job_description = document.getElementById('job_description').value;
        var job_location = document.getElementById('job_location').value;
        var company = document.getElementById('company').value;
        var category = document.getElementById('category').value;
        
        
        if( validateData(job_title, job_description, job_location, company, category) ){
           if (createJob(job_title, job_description, job_location, company, category)){
               console.log('info added');
           }else{
               console.log('something went wrong');
           }
        }else{
            window.alert("validate failed");
        }
    };
    
};

