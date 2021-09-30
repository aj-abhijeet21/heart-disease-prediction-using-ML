function validateFormOnSubmit(signup) {
    reason = "";
    reason += validateName(signup.email);
    reason += validateName(signup.password1);
    reason += validateName(signup.password2);
    reason += validateName(signup.phone);
    reason += validateName(signup.f_name);
    reason += validateName(signup.l_name);
    reason += validateName(signup.dob);
    reason += validateName(signup.address);
    reason += validateName(signup.city);
    reason += validateName(signup.zipcode);
    reason += validateName(signup.state);

    //reason += validateEmail(signup.email);
    reason += validatePhone(signup.phone);
    //reason += validatePet(signup.pet);
    //reason += validateNumber(signup.number);
    reason += validateDisclaimer(signup.disclaimer);

    console.log(reason);
    if (reason.length > 0) {

        return false;
    } 
    else {
        return false;
    }
}

// validate required fields
function validateName(name) {
    var error = "";

    if (name.value.length == 0) {
        name.style.background = 'Red';
        name.nextElementSibling.innerHTML = "The required field has not been filled in";
        var error = "1";
    } else {
        name.style.background = 'White';
        name.nextElementSibling.innerHTML = '';
    }
    return error;
}

// validate email as required field and format
function pwdMatch(pwd1,pwd2) {
    var error = "";

    if (pwd1.value != pwd2.value) {
        name.style.background = 'Red';
        document.getElementById('pwd-error').innerHTML = "Entered Passwords are not matching";
        var error = "1";
    } else {
        name.style.background = 'White';
        document.getElementById('pwd-error').innerHTML = '';
    }
    return error;
}


// validate phone for required and format
function validatePhone(phone) {
    var error = "";
    var stripped = phone.value.replace(/[\(\)\.\-\ ]/g, '');

    if (phone.value == "") {
        document.getElementById('phone-error').innerHTML = "Please enter a phone number";
        phone.style.background = 'Red';
        var error = '6';
    } else if (isNaN(parseInt(stripped))) {
        var error = "5";
        document.getElementById('phone-error').innerHTML = "The phone number contains illegal characters.";
        phone.style.background = 'Red';
    } else if (stripped.length < 10) {
        var error = "6";
        document.getElementById('phone-error').innerHTML = "The phone number is too short.";
        phone.style.background = 'Red';
    } else {
        phone.style.background = 'White';
        document.getElementById('phone-error').innerHTML = '';
    }
    return error;
}

// function validatePet(pet) {
//     if ((signup.pet[0].checked == false) && (signup.pet[1].checked == false) && (signup.pet[2].checked == false)) {
//         document.getElementById('pet-error').innerHTML = "Pet required";
//         var error = "2";
//     } else {
//         document.getElementById('pet-error').innerHTML = '';
//     }
//     return error;
// }

// function validateNumber(number) {
//     var num = document.forms["signup"]["number"];
//     var y = num.value;
//     if (!isNaN(y)) {

//         //alert('va');

//         if (y < 0 || y > 50) {
//             //Wrong
//             number.style.background = 'Red';
//             document.getElementById("number-error").innerHTML = "Must be between 0 and 50.";
//             var error = "10";
//         } else {
//             //Correct
//             number.style.background = 'White';
//             document.getElementById("number-error").innerHTML = "";
//         }
//         return error;
//     } else {
//         document.getElementById("number-error").innerHTML = "Must be a number.";
//         var error = "3";
//     }
//     return error;
// }

function validateDisclaimer(disclaimer) {
    var error = "";

    if (document.getElementById("disclaimer").checked === false) {
        document.getElementById('disclaimer-error').innerHTML = "Required";
        var error = "4";
    } else {
        document.getElementById('disclaimer-error').innerHTML = '';
    }
    return error;
}