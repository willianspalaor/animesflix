@extends('layouts.admin')

@section('script')
<script src="/js/admin/xhr/Show.js"></script>
<script src="/js/admin/Show.js"></script>
@stop

@section('body')

<div class="table-responsive">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Shows</h2>
				</div>
				<div class="col-sm-6">
					<a href="#addShowModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Adicionar</span></a>			
				</div>
			</div>
		</div>
		<table id="showTable" class="table table-striped table-hover">
			<thead>
				<tr>
					<th>
						<span class="custom-checkbox">
							<input type="checkbox" id="selectAll">
							<label for="selectAll"></label>
						</span>
					</th>
					<th>Título</th>
					<th>Tipo</th>
					<th>Ativo</th>
					<th>Capa</th>
					<th>Trailer</th>
					<th class='text-center'>Ações</th>
				</tr>
			</thead>
			<tbody>
			 	@foreach($shows as $show)
             		<tr>
             			<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox_{{ $show->id }}" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						<td>{{ $show->title }}</td>
						<td>{{ $show->type }}</td>

						@if($show->active)
							<td><i class="material-icons green">&#xE86C;</i></td>
						@else
							<td><i class="material-icons red">&#xE5C9;</i></td>
						@endif

						<td>
							<a class="uploadCoverButton" href="#uploadCoverModal" data-cover="/{{$show->cover}}" data-id="{{$show->id}}" data-toggle="modal"><i class="material-icons">&#xE3F4;</i>
							@if(empty($show->cover))
								<span class='exc'>!</span>
							@endif
						</td>

						<td>
							<a class="uploadTrailerButton" href="#uploadTrailerModal" data-trailer="/{{$show->trailer}}" data-id="{{$show->id}}" data-toggle="modal"><i class="material-icons">&#xE04B;</i>
							@if(empty($show->trailer))
								<span class='exc'>!</span>
							@endif
						</td>

						<td>
							<div class="btn-group">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa-solid fa-grid"></i>
								</button>
								<div class="dropdown-menu">
									<a data-id="{{ $show->id}}" href="#updateShowModal" class="dropdown-item updateShowButton" data-toggle="modal">Alterar</a>
									<a data-id="{{ $show->id}}" href="#deleteShowModal" class="dropdown-item deleteShowButton" data-toggle="modal">Remover</a>
									<div class="dropdown-divider"></div>

									@if($show->active)
										<a data-id="{{ $show->id}}" class="dropdown-item inactivateShowButton" href="javascript:void(0)">Inativar</a>
									@else
										<a data-id="{{ $show->id}}" class="dropdown-item activateShowButton" href="javascript:void(0)">Ativar</a>
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
<div id="addShowModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="addShowForm" method="POST">
				<div class="modal-header">						
					<h4 class="modal-title">Adicionar Show</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	

					<div class="row form-group">
						<div class="col-sm-6">
							<label>Título</label>
							<input name="title" type="text" class="form-control" required>
						</div>
						<div class="col-sm-6">
							<label>Tipo</label>
							<select name="type" class="form-control" required>
								<option></option>
								<option value="anime">Anime</option>
								<option value="movie">Filme</option>
								<option value="serie">Série</option>
								<option value="documentay">Documentário</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-6">
							<label>Categoria</label>
							<select multiple name="category[]" class="form-control select-multiple" required>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->title}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-6">
							<label>Gênero</label>
							<select multiple name="genre[]" class="form-control select-multiple" required>
								@foreach($genres as $genre)
									<option value="{{$genre->id}}">{{$genre->title}}</option>
								@endforeach
							</select>
						</div>
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
<div id="updateShowModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="updateShowForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Editar Show</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Título</label>
						<input name="title" type="text" class="form-control" disabled>
					</div>	
					<div class="form-group">
						<label>Tipo</label>
						<select name="type" class="form-control" required>
							<option></option>
							<option value="anime">Anime</option>
							<option value="movie">Filme</option>
							<option value="serie">Série</option>
							<option value="documentay">Documentário</option>
						</select>
					</div>	
					<div class="form-group">
						<label>Categoria</label>
						<select multiple name="category[]" class="form-control select-multiple" required>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->title}}</option>
							@endforeach
						</select>
					</div>	
					<div class="form-group">
						<label>Gênero</label>
						<select multiple name="genre[]" class="form-control select-multiple" required>
							@foreach($genres as $genre)
								<option value="{{$genre->id}}">{{$genre->title}}</option>
							@endforeach
						</select>
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
<div id="deleteShowModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="deleteShowForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-header">						
					<h4 class="modal-title">Deletar Show</h4>
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
<!-- Upload Cover Modal HTML -->
<div id="uploadCoverModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="uploadCoverForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-body text-center">	
					<img rel="cover" src="">	
					<div class="form-group" style='padding-top:40px'>
						<input type="file" class="form-control-file uploadFileCoverButton" name="cover" required accept="image/png,image/jpeg">
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

<!-- Upload Trailer Modal HTML -->
<div id="uploadTrailerModal" class="modal fade" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<form id="uploadTrailerForm" method="POST">

				<input type="hidden" name="id" />

				<div class="modal-body text-center">	

					<video width="320" height="240" controls rel="trailer" src=""></video>

					<div class="form-group" style='padding-top:40px'>
						<input type="file" class="form-control-file uploadFileTrailerButton" name="trailer" required accept="video/mp4">
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
@stop
