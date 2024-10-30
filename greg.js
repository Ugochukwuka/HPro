var myinput = document.getElementById("passcode");

var letter = document.getElementById("lowercase");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var minimum = document.getElementById("minimum");


var cmyinput = document.getElementById("cpasscode");


myinput.onfocus = function() {
    
    document.getElementById("errormessage").style.display = "block";

}

myinput.onblur = function() {
    
    document.getElementById("errormessage").style.display = "none";

}

//wen a user starts typin sometin inside d input run d below
myinput.onkeyup = function () {
    
    //validate lowercase letters frm a-z
    var lowerCaseLetters = /[a-z]/g;

    if(myinput.value.match(lowerCaseLetters)){
        
        //checks if d value entered is frm a-z
        letter.classList.remove("invalid");
    
        letter.classList.add("valid");
    } else {

        //if its nt der turn it red 
        letter.classList.remove("valid");

        letter.classList.add("invalid")
    }
    
    //validate capital  letters
    var upperCaseLetters = /[A-Z]/g;

    if (myinput.value.match(upperCaseLetters)) {
        
        capital.classList.remove("invalid");

        capital.classList.add("valid");

    } else {

        capital.classList.remove("valid");

        capital.classList.add("invalid");

    }


    //Validate numbers
    var nnumbers = /[0-9]/g;

    if (myinput.value.match(nnumbers)) {
        
        number.classList.remove("invalid");

        number.classList.add("valid");

    } else {

        number.classList.remove("valid");

        number.classList.add("invalid");

    }

   // var numbers = /[0]
    if(myinput.value.length < 8){

        
        minimum.classList.add("invalid");
        
        minimum.classList.remove("valid");
    } else{
        minimum.classList.add("valid");
        
        minimum.classList.remove("invalid");
    }

} 


//below runs for the confirm password
cmyinput.onfocus = function() {
    
    document.getElementById("errormessage").style.display = "block";

}

cmyinput.onblur = function() {
    
    document.getElementById("errormessage").style.display = "none";

}

//wen a user starts typin sometin inside d input run d below
cmyinput.onkeyup = function () {
    
    //validate lowercase letters frm a-z
    var lowerCaseLetters = /[a-z]/g;

    if(cmyinput.value.match(lowerCaseLetters)){
        
        //checks if d value entered is frm a-z
        letter.classList.remove("invalid");
    
        letter.classList.add("valid");
    } else {

        //if its nt der turn it red 
        letter.classList.remove("valid");

        letter.classList.add("invalid")
    }
    
    //validate capital  letters
    var upperCaseLetters = /[A-Z]/g;

    if (cmyinput.value.match(upperCaseLetters)) {
        
        capital.classList.remove("invalid");

        capital.classList.add("valid");

    } else {

        capital.classList.remove("valid");

        capital.classList.add("invalid");

    }


    //Validate numbers
    var nnumbers = /[0-9]/g;

    if (cmyinput.value.match(nnumbers)) {
        
        number.classList.remove("invalid");

        number.classList.add("valid");

    } else {

        number.classList.remove("valid");

        number.classList.add("invalid");

    }

   // var numbers = /[0]
    if(cmyinput.value.length < 8){

        
        minimum.classList.add("invalid");
        
        minimum.classList.remove("valid");
    } else{
        minimum.classList.add("valid");
        
        minimum.classList.remove("invalid");
    }

} 