$(document).ready(function() {
    //by default hide profile settings
    $( '#update' ).addClass("hidden");

    //on gear icon click
    $('#showUpdate').click(function() {
        //console.log("Clicked");

        //if its hidden, show it
        if($('#update').hasClass("hidden"))
            $( '#update' ).removeClass("hidden").addClass("visible");
        else //vice versa
            $( '#update' ).removeClass("visible").addClass("hidden");

    });
});

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

//on form submit
$('form[name="update"]').submit(function(e) {
    

        var validated = false;

        $('form[name="update"] input').each(function() {
            //save this input in var
            var element = $(this);

            //check if empty and exclude update button
            if (element.val() != "" && element.val() != "Update") {
                validated = true;
                return false;
            }
        });
        
        //if validation fails somewhere, prevent default
        if(!validated)
            e.preventDefault();
    
    });