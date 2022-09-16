let Xhr_Show = new (function () {

	function _get(data, callback){

		$.ajax({
			url : "/admin/show/" + data.id,
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
			url : "/admin/show",
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
			url : "/admin/show/" + data.id,
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
			url : "/admin/show/" + data.id,
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

    function _activate(data, callback){

		$.ajax({
			url : "/admin/show/" + data.id + "/activate",
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

 	function _inactivate(data, callback){

		$.ajax({
			url : "/admin/show/" + data.id + "/inactivate",
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

    function _uploadCover(id, formData, callback){

		$.ajax({
			url: '/admin/show/' + id + '/uploadCover',
			type: 'POST',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
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

 	function _uploadTrailer(id, formData, callback){

		$.ajax({
			url: '/admin/show/' + id + '/uploadTrailer',
			type: 'POST',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
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
        delete : _delete,
        activate : _activate,
        inactivate : _inactivate,
        uploadCover : _uploadCover,
        uploadTrailer : _uploadTrailer
    }

});