$(document).ready(function(){
    //if action=='delete' then remove unnecessary fields
 var action = $('#action');
 var uploader = $('#uploader');
 var newDate = $('#new-date-div');
 var spaces = $('#space-div');
 newDate.hide();
 
 
 action.change(function(){
     var selection = $(this).children('option:selected').val();
     if(selection=='delete'){
         $('#entry').removeAttr('required');
         $('#spaces').removeAttr('required');    
         uploader.hide();
         newDate.hide();
         spaces.hide();
         
     }
     if(selection=='add'){
         $('#entry').prop('required',true); 
         $('#spaces').prop('required',true);     
         uploader.show();
         spaces.show();
         newDate.hide();

     }
     if(selection=='edit'){
         $('#entry').prop('required',true);
         $('#spaces').prop('required',true); 
         uploader.show();
         newDate.show();
         spaces.show();
     }
 });
 
 
 
 
 
 
 
 });