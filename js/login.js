$(document).ready(function() {
    $(".eye").click(function(){
        $(this).toggleClass('show');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('show')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');  
        }
    });  
})
$(document).ready(function() {
    $(".eyea").click(function(){
        $(this).toggleClass('show');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('show')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');  
        }
    });  
})
$(document).ready(function() {
    $(".eyeb").click(function(){
        $(this).toggleClass('show');
        $(this).children('i').toggleClass('fa-eye-slash fa-eye');
        if ($(this).hasClass('show')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');  
        }
    });  
})