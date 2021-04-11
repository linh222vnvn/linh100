$(document).ready(function() {
	$.ajax({
		url:"./lietkedc",
		cache:false,
		type:"GET",
        data:{"_token_":"{{csrf_token()}}"},  /////mahuyenxa tu dat
       	success: function(response) {
       		console.log('vaoham');
       		
                           
       	},
       	error:function(request,status,error){
       		console.log("sai ham du lieu dat cong"+error);
       	},

       })


});