$(document).ready(function(){
   //if action=='delete' then remove unnecessary fields
var action = $('#action');
var uploader = $('#uploader');
var highlights = $('#highlights');

action.change(function(){
    var selection = $(this).children('option:selected').val();
    if(selection=='delete'){
        $('#pdf').removeAttr('required');
        $('#description').removeAttr('required');      
        uploader.hide();
        highlights.hide();
        
    }
    if(selection=='add'){
        $('#pdf').prop('required',true);
        $('#description').prop('required',true);     
        uploader.show();
        highlights.show();
    }
});







});