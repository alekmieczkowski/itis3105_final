/*Signin Validation stuff*/
var validations = {};

function validate_password(){
        /*Check Passwords*/
        var pass = $('form[name="signin"] input[name="password"]').val();
        var pass_c = $('form[name="signin"] input[name="confirmPassword"]').val();
    
        //Verify Password and Confirm Password

            if ( pass != pass_c) {
                $('#errors').text('Please make sure your Passwords match');
                validations['password'] = false;
            }
            else{
                $('#errors').text('');
                validations['password'] = true;
            }

}

function validate_email(){
     //email value
     var email_val = $('form[name="signin"] input[name="email"]').val();
     var email = $('form[name="signin"] input[name="email"]');
     
     //if email field is blank remove error
     if(email_val == ''){
         $('#errors').text('');
     }
     //else do ajax call to check input
     else{
         //ajax call
         $.ajax({ 
             url: '../db/user_sql.php?action=checkEmail&value='+email_val
         }).done(function(isValid){
             console.log("Return Value: " + isValid);

             //email error if data is false;
             if(isValid == 1){
                 $('#errors').text('');
                 validations['email'] = true;
                 $(email).removeClass("error");
                 
             }
             else{
                 $('#errors').text('Email Already Exists!');
                 validations['email'] = false;
                 $(email).addClass("error");
  
                 
                 
             }
     
         }).fail(function(){
             //if there is ajax error print error
             $('#errors').text('AJAX error');
         })
     }
}

function validate_username(){
     //email value
     var uname_val = $('form[name="signin"] input[name="userName"]').val();
     var uname = $('form[name="signin"] input[name="userName"]');
     
     //if email field is blank remove error
     if(uname_val == ''){
         $('#errors').text('');
     }
     //else do ajax call to check input
     else{
         //ajax call
         $.ajax({ 
             url: '../db/user_sql.php?action=checkUsername&value='+uname_val
         }).done(function(isValid){

             //email error if data is false;
             if(isValid == 1){
                 $('#errors').text('');
                 validations['username'] = true;
                 $(uname).removeClass("error");
             }
             else{
                 $('#errors').text('Username Already Exists!');
                 validations['username'] = false;
                 $(uname).addClass("error");
             }
     
         }).fail(function(){
             //if there is ajax error print error
             $('#errors').text('AJAX error');
         })
     }
}

$(document).ready(function () {


    /*Set Default Radio Button*/
    var $radios = $('input:checkbox[name=role]');

    if($radios.is(':checked') === false) {

        //user is checked by default
        $radios.filter('[value="0"]').prop('checked', true);
    }

    /*Check Passwords*/
    $('form[name="signin"] input[name="confirmPassword"]').keyup(validate_password);

    /*Check Email*/
    $('form[name="signin"] input[name="email"]').keyup(validate_email);

    /*Check UserName*/
    $('form[name="signin"] input[name="userName"]').keyup(validate_username);

}); 

//on form submit
$('form[name="signin"]').submit(function(e) {

    //should be set to true; false for testing purposes
    var validated = true;

    console.log("Testing Validation");
    //if errors exist, do not allow signin
    for(var key in validations){
        if(!validations[key])
            validated = false;
    }

    //if validation fails somewhere, prevent default
    if(!validated)
        e.preventDefault();

});

    
