$(document).ready(function(){
   var recipeBox = $('#recipe-textbox');
   var btnAdd = $('#btn-add');
   var cart = $('.cart');
   var modify = $('#modify-list');
   var fname = $('#firstname');
   var lname = $('#lastname');
   var form = $('#form');

   btnAdd.on('click', function(){
      if(recipeBox.val().length > 0){
         cart.append(`<div>Recipe: <p>${recipeBox.val()} <button id="btn-delete">Remove</button></p></div>`);
         recipeBox.val('');

         $('#btn-delete').click(function(){
            $(this).parentsUntil('.cart').remove();
         });         
      }else if(recipeBox.val().length <= 0){
         alert('required');
      }
   });

   modify.on('click', function(){
      //children
      // $('#check-list').children().css({"color" : "red", "background-color" : "black" });

      //find
      // $('#check-list').find(".unq").css({"color" : "red", "background-color" : "black" });

      //first
      // $('#check-list > ul > li').first().css({"color" : "red", "background-color" : "black" });

      //eq
      // $('#check-list > ul > li').eq(2 + 1).css({"color" : "red", "background-color" : "black" });    
      
      //filter
      // $('#check-list > ul > li').filter('.unq').css({"color" : "red", "background-color" : "black" });

      //not
      
   });

   //AJAX
   $('#btn-load').on('click', function(){
      //url data callback(optional)
      // $('#main-container').load('sample.txt #data');

      //get request
      $.get("https://jsonplaceholder.typicode.com/users/", function(data, status){
         data.forEach(element => {
            $('#main-container').append(`<p>${element.name}</p>`);
         });
      });
   });

   //AJAX 
   form.on('submit', function(e){
      //get length
      // var lg = $(this).val().length;
      
      //preventing default submit of the form
      e.preventDefault();

      $.ajax({
         type: 'POST',
         url: 'process.php',
         data: {firstname : fname.val(),  lastname : lname.val()},
         success: function(response){
            var data = JSON.parse(response);

            $('#main-container').append(`<p>${data.firstname} ${data.lastname}</p>`);
         }
      });

   });
});