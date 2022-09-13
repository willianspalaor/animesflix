$(function(){


	$("#addCategoryForm").submit(function(ev){

		if($(this)[0].checkValidity()){

			ev.preventDefault();
			ev.stopPropagation();

			createCategory($(this).serializeArray(), function(res){
				console.log(res);
			})
		}

	})
});

function createCategory(data, callback){

	$.ajax({
		url : "/admin/category",
		type : "POST",
		dataType : "JSON",
		data : data,
		success : function(response){
			if(typeof(callback) == 'function'){
				callback(response);
			}
		},
		error : function(xhr, status, error){
			console.log(error);
		}
	})
}