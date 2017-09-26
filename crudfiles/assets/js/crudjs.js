 $(document).ready(function(){
    $("#submit").click(function(){
        var name=$('#firstname').val();
        var lastname=$('#lastname').val();
        var phone=$('#phone').val();
        var len=phone.length;
        var nameReg  = new RegExp(/^[A-Z]+[a-zA-Z]*$/);
        var lastnamereg = new RegExp(/^[A-Za-z]+$/);
        var phonereg = '/^[0-9]{10}+$/';
         //the below else if block validates the firstname    
         if(name == "" )  
         {
            $('#first').html('Enter First name here');
            $('#firstname').addClass('red');
            return false;
         } 
         else if( !nameReg.test(name))
         {
           
            $('#first').html('first letter must be capital and it allows only characters');
            $('#firstname').addClass('red');
            return false;
         }
         else if(name.length <= 2)
         {
            $('#first').html('First name must be more than 3 characters');
            $('#firstname').addClass('red');
            return false;
         }
         else
         {
            $('#first').html('');
            $('#firstname').removeClass('red');
           
         }
         //the below else if block validates the lastname
         if(lastname == "" ) 
         {
           
            $('#last').html('Enter last name here');
            $('#lastname').addClass('red');  
            return false;
         }
         else if( !lastnamereg.test(lastname))
         {
            $('#last').html('Please enter characters only');
            $('#lastname').addClass('red');
            return false;
         }
         else if(lastname.length <= 1)
         {
            $('#last').html('lastname must be more than 1 character');
            $('#lastname').addClass('red');
            return false;
         }
         else
         {
           $('#last').html('');
           $('#lastname').removeClass('red');
         }
         //the below else if block validates the phone
         if(phone == "") 
         {
            $('#phonemsg').html('enter phone number');
            $('#phone').addClass('red');
            return false;
         } 
         else if(len !=10)
         {
           $('#phonemsg').html('please enter 10 digit number');
           $('#phone').addClass('red');
           return false;
         }
         else if(!phonereg.test(phone))
         {

           $('#phonemsg').html("please enter corrrect formate");
           $('#phone').addClass('red');
           return false;
         }
         else
         {
            $('#phonemsg').html('');
            $('#phone').removeClass('red');
         }
  //      $("#delete").click(function(){
  //   if (!confirm("Do you want to delete")){
  //     return false;
  //   }
  // });

    });

});
