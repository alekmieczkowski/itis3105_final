/*Signin Validation stuff*/


function ajax_call(action_stuff, value_stuff){
    return $.ajax({ url: '../../db/user_sql.php',
    data: {action: action_stuff, value: value_stuff},
    type: 'post',
    success: function(mydata) {
                console.log("mydata: "+mydata);
                //if(typeof callback === 'function') callback.apply(this, mydata);
             }
    });
}

    $('form[name="signin"]').submit(function(e) {

        // username
        var uname = $('form[name="signin"] input[name="userName"]').val();

        // passwords
        var pass = $('form[name="signin"] input[name="password"]').val();
        var pass_c = $('form[name="signin"] input[name="confirmPassword"]').val();

        // email
        var email = $('form[name="signin"] input[name="email"]').val();

        //Verify Password and Confirm Password
        if ( pass != pass_c) {
            e.preventDefault();
            $('#errors').text('Please make sure your Passwords match');
        }

        //Verify Email
        var emailVerified = false;
        ajax_call('checkEmail', email).done(function(data){
            emailVerified = data;
        }).fail(function(){
            $('#errors').text('AJAX error');
        });

        //call ajax and edit verification to response
        //ajax_call('checkEmail', email, function(data){
        //    emailVerified = data;
        //}); 

        console.log("email Status: " + emailVerified);

        if(!emailVerified){
            e.preventDefault();
            $('#errors').text('Email Address already exists!');
        }

        //verify username
        //var unameVerified = ajax_call('checkUsername', uname);
        

        //if(!unameVerified){
        //    e.preventDefault();
         //   $('#errors').text('Username already exists!');
        //}


    });

    
