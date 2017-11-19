
//animate between login and sign up
$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");

    //check state of form width, and adjust based on current width
    if( $(".form-login").css('width') == '700px')
        $(".form-login").animate({width: "360px"}, "slow");
    else
        $(".form-login").animate({width: "700px"}, "slow");

    //$('.login-page').removeClass('form-login').addClass('form-register');

 });

 //uncheck user on admin click radiobutton
 $('#check-admin').click(function(){
    $('#check-user').prop('checked', false);
 });

 //uncheck admin on user radio button click
 $('#check-user').click(function(){
    $('#check-admin').prop('checked', false);
 });