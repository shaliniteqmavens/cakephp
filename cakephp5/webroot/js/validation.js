
    $(document).ready(function() {

        jQuery(document).ready(function () {

            jQuery.validator.addMethod(
                'ContainsAtLeastOneDigit',
                function (value) {
                    return /[0-9]/.test(value);
                },
                'Your password must contain at least one digit.'
                
            );
           
            jQuery.validator.addMethod(
                'ContainsAtLeastOneCapitalLetter',
                function (value) {
                    return /[A-Z]/.test(value);
                },
                'Your password must contain at least one capital letter.'
            );
            jQuery.validator.addMethod(
                'ContainsAtLeastOneLowercaseLetter',
                function (value) {
                    return /[a-z]/.test(value);
                },
                'Your password must contain at least one lower letter.'
            );
            jQuery.validator.addMethod(
                'ContainsAtLeastspecialcharacterLetter',
                function (value) {
                    return /[@#$%^&*!]/.test(value);
                },
                'Your password must contain at least one special character.'
            );

            jQuery.validator.addMethod(
                'Alphabets',
                function (value) {
                    return /^[A-Za-z]+$/.test(value);
                },
                'Only alphabets allowed.'

            );
           });
        $("form").validate({
            // in 'rules' user have to specify all the constraints for respective fields
            rules: {
                
              username: {
                    required: true,
                    maxlength: 10, //for length of lastname
                    Alphabets:true
                },
                age: {
                    required: true,
                    digits: true,
                    maxlength: 50,
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    maxlength: 8,
                    ContainsAtLeastOneDigit:true,
                    ContainsAtLeastspecialcharacterLetter:true,
                    ContainsAtLeastOneCapitalLetter:true,
                    ContainsAtLeastOneLowercaseLetter:true,

                    // regex: /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$@%&? "]).*$/,
                },
               
              
               
                // agree: "required"
                phoneNumber:{
                    required: true,
                    isNumeric:true,
                    maxlength: 10,
                },
            },
            // in 'messages' user have to specify message as per rules
            messages: {
             
                username: {
                    required: " Please enter a username",
                    maxlength: " Your username must consist of only 10 characters"
                },
                password: {
                    required: " Please enter a password",
                    maxlength: " Your password must be consist of at least 8 characters",
                    // regex:"At least 8 characters at least 1 numberat least 1 lowercase character(a- z)at least 1 uppercase character (A-Z)only 0-9a-zA-Z"


                },
                
                age: {
                    required: "Please enter your age",
                    maxlength: "Age must be less than 50"
                },
                email: {
                    required: " Please enter email",
                    // regex: "pattern of email is wrong"
                },
                phoneNumber:{
                    required: " Please enter phone number",
                    isNumeric:"enter only numbers",

                },
                // agree: "Please accept our policy"
            }
        })
     
        });
  

