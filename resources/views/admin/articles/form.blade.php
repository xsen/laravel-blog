<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['id' => 'theme', 'class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Please Enter some text...',  'style' => 'overflow-x:hidden', 'rows' => '22']) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Category:') !!}
	<select class="form-control" name="category_id" id="category_id">
		@foreach ($categories['top'] as $top_category)
			<option value="{{ $top_category->id }}"
			@if(isset($article->category_id) && $top_category->id == $article->category_id)
				selected
			@endif
			>{{ $top_category->name }}</option>
			@if(isset($categories['second'][$top_category->id]))
				@foreach ($categories['second'][$top_category->id] as $scategory)
					<option value="{{ $scategory->id }}"
					@if(isset($article->category_id) && $scategory->id == $article->category_id)
						selected
					@endif
					>&nbsp;&nbsp;&nbsp;{{ $scategory->name }}</option>
				@endforeach
			@endif
		@endforeach
	</select>
</div>

<div class="form-group">
	{!! Form::label('tag_list', 'Tags:') !!}
	{!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::label('created_at', 'Time:') !!}
	{!! Form::input('date', 'created_at', $form_date, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('original', 'Original:') !!}
	{!! Form::text('original', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('header')
	<link rel="stylesheet" href="/admin-assets/css/select2.min.css">
	<link rel="stylesheet" href="/admin-assets/css/codemirror.css">
@stop

@section('footer')
	<!-- CodeMirror -->
	<script src="/admin-assets/js/codemirror.js"></script>
	<script src="/admin-assets/js/markdown.js"></script>
	<script src="/admin-assets/js/continuelist.js"></script>

	<!-- inline-attachment -->
	<script src="/admin-assets/js/inline-attachment.js"></script>
	<script src="/admin-assets/js/jquery.inline-attachment.js"></script>

	<!-- select2 -->
	<script src="/admin-assets/js/select2.min.js"></script>
	<script>

		var theme = $('#theme');

		if ( cookies.get('theme') )
		{
			theme.val(cookies.get('theme'));
		}

		theme.on('change',function() {
			var value = $(this).val();
			cookies.set("theme", value);
		});

		if ( cookies.get('editor') )
		{
			$('#editor').text(cookies.get('editor'));
		}

		var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
			mode: 'markdown',
			lineNumbers: true,
			lineWrapping: true,
			theme: "default",
			extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"}
		});

		editor.on('change', function() {
			cookies.set("editor", editor.getValue());
		});

		$('#tag_list').select2({
			placeholder: 'Choose a tag',
			tags: true
		});

		$('#category_id').select2();
		$(function() {
			$('textarea').inlineattachment({
				uploadUrl: '/admin/uploadImage',
				extraParams:{"_token":"{{ csrf_token() }}"}
			});
		});

		$('input[type=submit]').on('click', function(){
			cookies.set("editor", null);
			cookies.set("theme", null);
			return true;
		});
	</script>
@stop
