@extends('layouts.admin')

@section('script')
<script src="/js/admin/xhr/Genre.js"></script>
<script src="/js/admin/Genre.js"></script>
@stop

@section('body')

<div class="table-responsive">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Gêneros</h2>
				</div>
				<div class="col-sm-6">
					<a href="#addGenreModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Adicionar</span></a>			
				</div>
			</div>
		</div>
		<table id="GenreTable" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>Título</th>
					<th class='text-center'>Ações</th>
				</tr>
			</thead>
			<tbody>
			 	@foreach($genres as $genre)
             		<tr>
             			<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox_{{ $genre->id }}" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>{{ $genre->title }}</td>

						<td>
							<div class="btn-group">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa-solid fa-grid"></i>
								</button>
								<div class="dropdown-menu">
									<a data-id="{{ $genre->id}}" href="#updateGenreModal" class="dropdown-item updateGenreButton" data-toggle="modal">Alterar</a>
									<a data-id="{{ $genre->id}}" href="#deleteGenreModal" class="dropdown-item deleteGenreButton" data-toggle="modal">Remover</a>
									<div class="dropdown-divider"></div>
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
<div id="addGenreModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addGenreForm" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Gênero</h4>
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
<div id="updateGenreModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="updateGenreForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Editar Gênero</h4>
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
<div id="deleteGenreModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="deleteGenreForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Deletar Gênero</h4>
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