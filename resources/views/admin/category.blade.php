@extends('layouts.admin')

@section('script')
<script src="/js/admin/xhr/Category.js"></script>
<script src="/js/admin/Category.js"></script>
@stop

@section('body')

<div class="table-responsive">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Categorias</h2>
				</div>
				<div class="col-sm-6">
					<a href="#addCategoryModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Adicionar</span></a>			
				</div>
			</div>
		</div>
		<table id="categoryTable" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>Título</th>
					<th>Ativo</th>
					<th class='text-center'>Ações</th>
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

						@if($category->active)
							<td><i class="material-icons green">&#xE86C;</i></td>
						@else
							<td><i class="material-icons red">&#xE5C9;</i></td>
						@endif

						<td>
							<div class="btn-group">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa-solid fa-grid"></i>
								</button>
								<div class="dropdown-menu">
									<a data-id="{{ $category->id}}" href="#updateCategoryModal" class="dropdown-item updateCategoryButton" data-toggle="modal">Alterar</a>
									<a data-id="{{ $category->id}}" href="#deleteCategoryModal" class="dropdown-item deleteCategoryButton" data-toggle="modal">Remover</a>
									<div class="dropdown-divider"></div>

									@if($category->active)
										<a data-id="{{ $category->id}}" class="dropdown-item inactivateCategoryButton" href="javascript:void(0)">Inativar</a>
									@else
										<a data-id="{{ $category->id}}" class="dropdown-item activateCategoryButton" href="javascript:void(0)">Ativar</a>
									@endif
								</div>
							</div>
						</td>
             		</tr>
                @endforeach
			</tbody>
		</table>
	</div>
</div>        
@stop

@section('modal')
<!-- Add Modal HTML -->
<div id="addCategoryModal" class="modal fade" data-backdrop="static">
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
<div id="updateCategoryModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="updateCategoryForm" method="POST">

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
<div id="deleteCategoryModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="deleteCategoryForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Deletar Categoria</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Tem certeza que deseja remover esse(s) registro(s)?</p>
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
@stop