let Helper = new (function () {

	function _readURL(input, target) {

		let url = input.value;
		let _self = this;

		if (input.files && input.files[0]) {

		    let reader = new FileReader();

		    reader.onload = function (e) {
		        target.attr('src', e.target.result);
		    }

		    reader.readAsDataURL(input.files[0]);
		}
	}

 	return {
    	readURL : _readURL
    }
});