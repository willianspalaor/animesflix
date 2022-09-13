@extends('layouts.admin')

@section('script')
	<script src="/js/admin/category.js"></script>
@stop

@section('body')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Categorias</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addCategoryModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar</span></a>
						<a href="#deleteCategoryModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Remover</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Título</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
				 	@foreach($categories as $category)
                 		<tr>
                 			<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox_{{ $category->id }}" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td>{{ $category->title }}</td>
							<td>
								<a href="#editCategoryModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteCategoryModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
                 		</tr>
                    @endforeach
				</tbody>
			</table>
			
			<!--<div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div>
			-->
		</div>
	</div>        
</div>
@stop

@section('modal')
<!-- Add Modal HTML -->
<div id="addCategoryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addCategoryForm" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Título</label>
						<input name="title" type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Adicionar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editCategoryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Editar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Título</label>
						<input name="title" type="text" class="form-control" required>
					</div>		
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Salvar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteCategoryModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Deletar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Tem certeza que deseja remover esses registros?</p>
					<p class="text-danger"><small>Esta ação não pode ser desfeita.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Deletar">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
@stop