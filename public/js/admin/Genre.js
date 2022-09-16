class Genre{

	constructor() {

		this.table = $("#genreTable");
		this.formAdd = $("#addGenreForm");
		this.formUpdate = $("#updateGenreForm");
		this.formDelete = $("#deleteGenreForm");
		this.btnUpdate = $(".updateGenreButton");
		this.btnDelete = $(".deleteGenreButton");
	}

	start(){
		this.bindEventsForms();
		this.bindEventsButtons();
		this.initDataTable();
	}

	bindEventsForms(){

		let _self = this;

		this.formAdd.submit(function(ev){

			if(this.checkValidity()){

				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Genre.create($(this).serializeArray(), function(res){
					
					if(!res.success){
						alert(res.msg); return;
					}

					location.reload();
				});
			}
		});

		this.formUpdate.submit(function(ev){

			if(this.checkValidity()){

				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Genre.update($(this).serializeArray(), function(res){
					
					if(!res.success){
						alert(res.msg); return;
					}

					location.reload();
				});
			}
		});

		this.formDelete.submit(function(ev){

			if(this.checkValidity()){
				ev.preventDefault();
				ev.stopPropagation();

				Xhr_Genre.delete($(this).serializeArray(), function(res){

					if(!res.success){
						alert(res.msg); return;
					}

					location.reload();
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

			Xhr_Genre.get({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				_self.formUpdate.find("input[name='id']").val(res.genre.id);
				_self.formUpdate.find("input[name='title']").val(res.genre.title);
			});
		});
	}

	initDataTable(){
   		this.table.DataTable();
	}

}

$(function(){
	(new Genre()).start();
});

