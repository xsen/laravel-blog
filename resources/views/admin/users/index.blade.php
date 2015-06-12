@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Articles</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="dataTable_wrapper">
			<table class="table table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Category</th>
						<th>Tags</th>
						<th>Click</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($articles as $article)
					<tr>
						<td>{{ $article->id }}</td>
						<td>{{ $article->title }}</td>
						<td>{{ $article->category->name }}</td>
						<td>@foreach($article->tags as $tag){{ $tag->name }} @endforeach  </td>
						<td>{{ $article->click }}</td>
						<td>{{ $article->created_at }}</td>
						<td>
							{!! Form::open(['method' => 'get', 'url' => 'admin/articles/'.$article->id.'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-success btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> Edite</button>
							{!! Form::close() !!}

							{!! Form::open(['method' => 'delete', 'url' => 'admin/articles/'.$article->id, 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-sm btn-danger iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
					 {{ $articles->count() }} {{ $articles->lastPage() }} {{ $articles->total() }} .
				</div>
			</div>
			<div class="col-sm-6">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
					{!! $articles->render() !!}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
