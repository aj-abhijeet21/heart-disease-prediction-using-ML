function ValidateForm(){
    var username= document.getElementById("email");
    var phone= document.getElementById("phone");
    var password1= document.getElementById("password1");
    var password2= document.getElementById("password2");
    var email= document.getElementById("email");
    var first_name= document.getElementById("first_name");
    var last_name= document.getElementById("last_name");
    var address= document.getElementById("address");
    var zip= document.getElementById("zipcode");
    var city= document.getElementById("city");
    var state= document.getElementById("state");
    //var isValidEmail= email.checkValidity();
    var valid= true;
    removeMsg();
    //radioValidation();
    if(typeof username == null){
    //username.className="wrong-input";
    document.getElementById("grey-username").innerHTML="Username can't be blank";
    valid=false;
    }
    
    if(first_name.value.length==0){
        first_name.className="wrong-input";
        first_name.nextElementSibling.innerHTML="First name can't be blank";
        valid=false;
    }

    if(last_name.value.length==0){
        last_name.className="wrong-input";
        last_name.nextElementSibling.innerHTML="Last name can't be blank";
        valid=false;
    }

    if(address.value.length==0){
        address.className="wrong-input";
        address.nextElementSibling.innerHTML="Address can't be blank";
        valid=false;
    }

    if(city.value.length==0){
        city.className="wrong-input";
        city.nextElementSibling.innerHTML="City can't be blank";
        valid=false;
    }

    if(email.value.length=="")
    {
        email.className="wrong-input";
        email.nextElementSibling.innerHTML="Please enter a valid username";
    }

    // if(last_name.value.length==0){
    //         last_name.className="wrong-input";
    //         last_name.nextElementSibling.innerHTML="Last name can't be blank";
    //         valid=false;
    // }

    if(phone.value.length==0){
    phone.className="wrong-input";
    phone.nextElementSibling.innerHTML="Contact number should not be less than 10";
    valid=false;
    }
    
    if(password1.value.length<6){
    password1.className="wrong-input";
    password1.nextElementSibling.innerHTML="Password should not be less than 6 characters";
    valid=false;
    }
    
    if(zip.value.length !=6){
        zip.className="wrong-input";
        zip.nextElementSibling.innerHTML="Please enter a valid zip code";
        valid=false;
    }


    if(password1.value != password2.value){
    password2.className="wrong-input";
    password2.nextElementSibling.innerHTML="Passwords do not match";
    valid=false;
    }
    var zipcheck = /^\d{6}$/;
    if(zip.value.match(phoneno))
    {
      valid = true;
    }
    else
    {
    zip.nextElementSibling.innerHTML="Not a valid Zipcode";
    valid = false;
    }
    

    var phoneno = /^\d{10}$/;
    if(phone.value.match(phoneno))
    {
      valid = true;
    }
    else
    {
    phone.nextElementSibling.innerHTML="Not a valid Phone Number";
    valid = false;
    }
    
    var phoneno = /^[0]?[789]\d{9}$/ ;
    if(phoneno.test(phone))
    {
        valid = true;
    }
    else
    {
        valid = false;
    }


    return valid;
    }
    
    
    function removeMsg(){
        var errorinput= document.querySelectorAll("wrong-input");
        [].forEach.call(errorinput, function(el){
            el.classList.remove(".wrong-input");
        });
        
        var errorpara=	document.querySelectorAll(".grey-text2");
        [].forEach.call(errorpara, function(el){
            el.innerHTML="";
        });
    }

    // function radioValidation(){

    //     var gender = document.getElementsByName('exercise');
    //     var genValue = false;

    //     for(var i=0; i<gender.length;i++){
    //         if(gender[i].checked == true){
    //             genValue = true;    
    //         }
    //     }
    //     if(!genValue){
    //         alert("Please Choose the gender");
    //         return false;
    //     }

    // }
    // 