   function ValidateForm(){
    var age= document.getElementById("age");
    var sex= document.getElementById("sex");//
    var cholestrol= document.getElementById("cholestrol");
    var chest_pain= document.getElementById("chest_pain");
    var rblood_pressure= document.getElementById("rblood_pressure");
    var heart_rate= document.getElementById("heart_rate");
    var ecg= document.getElementById("ecg");
    var angina= document.getElementById("angina");//
    var oldpeak= document.getElementById("oldpeak");
    var ca= document.getElementById("ca");
    var thal= document.getElementById("thal");
    var diabeties= document.getElementById("diabeties");//
    var fblood_sugar= document.getElementById("fblood_sugar");
    var slope= document.getElementById("slope");//
    var smoke= document.getElementById("smoke");//
    var attack= document.getElementById("attack");//
    var exercise= document.getElementById("exercise");//
    var bg = document.getElementById("blood_group");

    //var isValidEmail= email.checkValidity();
    var valid= true;
    removeMsg();

    if(age.value.length==0){
    age.className="wrong-input";
    age.nextElementSibling.innerHTML="Age can't be blank";
    valid=false;
    }


    if(cholestrol.value.length==0){
    cholestrol.className="wrong-input";
    cholestrol.nextElementSibling.innerHTML="Cholestrol can't be blank";
    valid=false;
    }

    if(rblood_pressure.value.length==0){
    rblood_pressure.className="wrong-input";
    rblood_pressure.nextElementSibling.innerHTML="Resting Blood Pressure can't be blank";
    valid=false;
    }
    
    if(heart_rate.value.length==0){
    heart_rate.className="wrong-input";
    heart_rate.nextElementSibling.innerHTML="Heart Rate can't be blank";
    valid=false;
    }

    if(cholestrol.value.length==0){
    cholestrol.className="wrong-input";
    cholestrol.nextElementSibling.innerHTML="Cholestrol can't be blank";
    valid=false;
    }

    if(chest_pain.selectedIndex == 1){
    chest_pain.className="wrong-input";
    chest_pain.nextElementSibling.innerHTML="Chest Pain can't be blank";
    valid=false;
    }

    if(bg.value == "-"){
    blood_group.className="wrong-input";
    blood_group.nextElementSibling.innerHTML="Blood Group can't be blank";
    valid=false;
    }

    if(fblood_sugar.selectedIndex == 1){
    fblood_sugar.className="wrong-input";
    fblood_sugar.nextElementSibling.innerHTML="Fasting Blood Sugar Pain can't be blank";
    valid=false;
    }

    if(ecg.selectedIndex == 1){
    ecg.className="wrong-input";
    ecg.nextElementSibling.innerHTML="ECG can't be blank";
    valid=false;
    }

    if(oldpeak.selectedIndex == 1){
    oldpeak.className="wrong-input";
    ecg.nextElementSibling.innerHTML="Oldpeak can't be blank";
    valid=false;
    }

    if(ca.selectedIndex == 1){
    ca.className="wrong-input";
    ca.nextElementSibling.innerHTML="CA can't be blank";
    valid=false;
    }

    if(thal.selectedIndex == 1){
    thal.className="wrong-input";
    thal.nextElementSibling.innerHTML="Thal can't be blank";
    valid=false;
    }

    if (!(sex[0].checked || sex[1].checked)) {
    //sex.className="wrong-input";
    sex.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }

    if (!(slope[0].checked || slope[1].checked)) {
    slope.className="wrong-input";
    slope.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }

    if (!(angina[0].checked || angina[1].checked)) {
    angina.className="wrong-input";
    angina.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }
    
    if (!(diabeties[0].checked || diabeties[1].checked)) {
    diabeties.className="wrong-input";
    diabeties.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }

    if (!(smoke[0].checked || smoke[1].checked)) {
    smoke.className="wrong-input";
    smoke.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }

    if (!(exercise[0].checked || exercise[1].checked)) {
    exercise.className="wrong-input";
    exercise.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }

    if (!(attack[0].checked || attack[1].checked)) {
    attack.className="wrong-input";
    attack.nextElementSibling.innerHTML="Please select an option";
    valid=false;
    }




    return valid;
    }
    
    
    function removeMsg(){
        var errorinput= document.querySelectorAll("wrong-input");
        [].forEach.call(errorinput, function(el){
            el.classList.remove(".wrong-input");
        });
        
        var errorpara=  document.querySelectorAll(".grey-text2");
        [].forEach.call(errorpara, function(el){
            el.innerHTML="";
        });
    }
