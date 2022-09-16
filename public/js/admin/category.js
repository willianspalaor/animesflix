class Category{

	constructor() {

		this.table = $("#categoryTable");
		this.formAdd = $("#addCategoryForm");
		this.formUpdate = $("#updateCategoryForm");
		this.formDelete = $("#deleteCategoryForm");
		this.btnUpdate = $(".updateCategoryButton");
		this.btnDelete = $(".deleteCategoryButton");
		this.btnActivate = $(".activateCategoryButton");
		this.btnInactivate = $(".inactivateCategoryButton");
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

				Xhr_Category.create($(this).serializeArray(), function(res){
					
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

				Xhr_Category.update($(this).serializeArray(), function(res){
					
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

				Xhr_Category.delete($(this).serializeArray(), function(res){

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

			Xhr_Category.get({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				_self.formUpdate.find("input[name='id']").val(res.category.id);
				_self.formUpdate.find("input[name='title']").val(res.category.title);
			});
		});

		this.btnActivate.click(function(){

			Xhr_Category.activate({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				location.reload();
			});
		});

		this.btnInactivate.click(function(){

			Xhr_Category.inactivate({id : $(this).data("id")}, function(res){

				if(!res.success){
					alert(res.msg); return;
				}

				location.reload();
			});
		});
	}

	initDataTable(){
   		this.table.DataTable();
	}

}

$(function(){
	(new Category()).start();
});

