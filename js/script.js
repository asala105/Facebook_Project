$(document).ready(function () { 
    $("#login").click( function () {
        console.log("login");
        var formElement = $("#loginForm");
        var emailValid = false;
        var passLen = false;
        var emailValue = $("#email").val();
        if (
            emailValue.length > 5 &&
            emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
            emailValue.lastIndexOf("@") != -1
        ){
            emailValid = true;
        }
        if ($("#password").val().length > 5) {
            passLen = true;
        }
        if(!emailValid){
            $("#email_valid").text("Please enter a valid email example@example.example");
        }else{
            $("#email_valid").text("");
        }
        if(!passLen){
            $("#password_valid").text("The password must be at least 5 characters long");
        }else{
            $("#password_valid").text("");
        }
        if(emailValid && passLen){
            formElement.submit();
        }
    });

    $("#signup").click( function () {
        var formElement = $("#signupForm");
        var emailValue = $("#email").val();
        var fname = $("#first_name").val();
        var lname = $("#last_name").val();
        var password = $("#password").val();
        var confirmPass = $("#password_confirm").val();
        var dt = new Date( $("#birthday").val());
        var year = dt.getFullYear();

        userValid = false;
        fnameValid = false;
        lnameValid = false;
        passwordValid = false;
        confirmPassValid = false;
        BDValid = false;
        if (
            emailValue.length > 5 &&
            emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
            emailValue.lastIndexOf("@") != -1
        ){
            emailValid = true;
        }
        if(!emailValid){
            $("#email_valid").text("Please enter a valid email example@example.example");
        }else{
            $("#email_valid").text("");
        }
        //user name validation
        if (fname.length >= 3){
                fnameValid = true;
        }
        if(!fnameValid){
            $("#fname_valid").text("The first name should be at least 3 characters long");
        }
        else{
            $("#fname_valid").text("");
        }
        if (lname.length >= 3){
            lnameValid = true;
        }
        if(!lnameValid){
            $("#lname_valid").text("The last name should be at least 3 characters long");
        }
        else{
            $("#lname_valid").text("");
        }
        //password validation
        if (password.length >= 5) {
            passwordValid = true;
        }
        if(!passwordValid){
            $("#password_valid").text("The password must be at least 5 characters long");
        }
        else{
            $("#password_valid").text("");
        }
        //confirmPass validation
        if (password == confirmPass) {
            confirmPassValid = true;
        }
        if(!confirmPassValid){
            $("#password_confirm_valid").text("The confirm password doesn't match the password");
        }
        else{
            $("#password_confirm_valid").text("");
        }

        if(year <= 2003){
            BDValid = true;
        }
        if(!BDValid){
            $("#BD_valid").text("You must be above 18 years old to signup to this website");
        }
        else{
            $("#BD_valid").text("");
        }
        if(fnameValid && lnameValid && BDValid && emailValid && passwordValid && confirmPassValid){
            formElement.submit();
        }
    });
});
