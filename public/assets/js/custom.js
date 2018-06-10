/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
	$("#register_username").on('blur',function(){
    	var user=$("#register_username").val();
    	$.ajax({
        	url:URL+'username-test',
        	data: {username: user},
        	type: 'POST',
        	success: function(response){
            	if(response=="used"){
                	$("#register_username").css("border","1px solid red");
                	$(".error-message").html('<p>Choose another username</p>')
                	$("#register_username").focus();
                	setTimeout(function(){
                     	$(".error-message").html('<p></p>');
                	},5000);
               	 
            	}else{
                	$("#register_username").css("border","1px solid green");
            	}
           	 
        	}
       	 
    	});
	});
}); 

