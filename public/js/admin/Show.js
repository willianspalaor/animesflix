class Show{

	constructor() {

		this.table = $("#showTable");
		this.formAdd = $("#addShowForm");
		this.formUpdate = $("#updateShowForm");
		this.formDelete = $("#deleteShowForm");
		this.formUploadCover = $("#uploadCoverForm");
		this.formUploadTrailer = $("#uploadTrailerForm");
		this.btnUpdate = $(".updateShowButton");
		this.btnDelete = $(".deleteShowButton");
		this.btnActivate = $(".activateShowButton");
		this.btnInactivate = $(".inactivateShowButton");
		this.btnUploadCover = $(".uploadCoverButton");
		this.btnUploadFileCover = $(".uploadFileCoverButton");
		this.btnUploadTrailer = $(".uploadTrailerButton");
		this.btnUploadFileTrailer = $(".uploadFileTrailerButton");
		this.selectMultiple = $(".select-multiple");
	}

	start(){
		this.bindEventsForms();
		this.bindEventsButtons();
		this.initDataTable();
		this.initSelect2();
	}

	bindEventsForms(){

		let _self = this;

		this.formAdd.submit(function(ev){

			if(this.checkValidity()){

				ev.preventDefault();
				ev.stopPropagation();
				
				Xhr_Show.create($(this).serializeArray(), function(res){
					
					if(!res.success){
						alert(res.msg); return;
					}

					alert("Show criado com sucesso!"); location.reload();
				});
			}
		});

		this.formUpdate.submit(function(ev){

			let formData = new FormData(this);

			if(this.checkValidity()){

				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Show.update($(this).serializeArray(), function(res){
					
					if(!res.success){
						alert(res.msg); return;
					}

					alert("Show alterado com sucesso!"); location.reload();
				});
			}
		});

		this.formDelete.submit(function(ev){

			if(this.checkValidity()){
				
				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Show.delete($(this).serializeArray(), function(res){

					if(!res.success){
						alert(res.msg); return;
					}

					location.reload();
				});
			}
		});

		this.formUploadCover.submit(function(ev){

			let formData = new FormData(this);

			if(this.checkValidity()){
				
				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Show.uploadCover(formData.get('id'), formData, function(res){

					if(!res.success){
						alert(res.msg); return;
					}
				
					alert("Capa anexada com sucesso!"); location.reload();
				});
			}
		});

		this.formUploadTrailer.submit(function(ev){

			let formData = new FormData(this);

			if(this.checkValidity()){
				
				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Show.uploadTrailer(formData.get('id'), formData, function(res){

					if(!res.success){
						alert(res.msg); return;
					}
				
					alert("Trailer anexado com sucesso!"); location.reload();
				});
			}
		});
	}

	bindEventsButtons(){

		let _self = this;

		this.btnDelete.click(function(){
			_self.formDelete.find("input[name='id']").val($(this).data("id"));
		});

		this.btnUpdate.click(function(){

			Xhr_Show.get({id : $(this).data("id")}, function(res){

				console.log(res);

				if(!res.success){
					alert(res.msg); return;
				}

				_self.formUpdate.find("input[name='id']").val(res.show.id);
				_self.formUpdate.find("input[name='title']").val(res.show.title);
				_self.formUpdate.find("select[name='type']").val(res.show.type);
				_self.formUpdate.find("select[name^='category']").val(res.show.categories).trigger("change");
				_self.formUpdate.find("select[name^='genre']").val(res.show.genres).trigger("change");

			});
		});

		this.btnActivate.click(function(){

			Xhr_Show.activate({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				location.reload();
			});
		});

		this.btnInactivate.click(function(){

			Xhr_Show.inactivate({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				location.reload();
			});
		});

		this.btnUploadCover.click(function(){
			_self.formUploadCover.find("input[name='id']").val($(this).data("id"));
			_self.formUploadCover.find("img").attr('src', $(this).data("cover"));
		});

		this.btnUploadFileCover.change(function(){
			Helper.readURL(this, _self.formUploadCover.find("img[rel='cover']"));
		});

		this.btnUploadTrailer.click(function(){
			_self.formUploadTrailer.find("input[name='id']").val($(this).data("id"));
			_self.formUploadTrailer.find("video").attr('src', $(this).data("trailer"));
		});

		this.btnUploadFileTrailer.change(function(){
			Helper.readURL(this, _self.formUploadTrailer.find("video[rel='trailer']"));
		});
	}

	initDataTable(){
   		this.table.DataTable();
	}

	initSelect2(){
		this.selectMultiple.select2({
			width: '100%'	
		});
	}	
}

$(function(){
	(new Show()).start();
});

