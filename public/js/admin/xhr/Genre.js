let Xhr_Genre = new (function () {

	function _get(data, callback){

		$.ajax({
			url : "/admin/genre/" + data.id,
			type : "GET",
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
		});
    }

    function _create(data, callback){

		$.ajax({
			url : "/admin/genre",
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
		});
    }

 	function _update(data, callback){

		$.ajax({
			url : "/admin/genre/" + data.id,
			type : "PUT",
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
		});
    }

    function _delete(data, callback){

    	$.ajax({
			url : "/admin/genre/" + data.id,
			type : "DELETE",
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
		});
    }

    return {
    	get : _get,
        create : _create,
        update : _update,
        delete : _delete
    }

});