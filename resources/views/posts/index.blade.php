<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>blog</title>
		<!-- Fonts -->
		<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
	</head>
	<body>
		<h1>Blog Name</h1>
		<div class='posts'>
			<p>
				login:{{ Auth::user()->name }}
			</p>
			@foreach ($posts as $post)
				<div class='post'>
					<p href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title}}</p>
					<p class='body'>{{ $post->body }}</p>
					<a href="">{{ $post->category->name }}</a>
					<form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
					    @csrf
					    @method('DELETE')
					    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
					</form>
				</div>
			@endforeach
			<a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
		</div>
		<div class='paginate'>{{ $posts->links()}}</div>
		<div>
			<a href='/posts/create'>create</a>
		</div>
		<script>
		    function deletePost(id) {
		        'use strict'
		
		        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
		            document.getElementById(`form_${id}`).submit();
		        }
		    }
		</script>
	    <div>
	        @foreach($questions as $question)
	            <div>
	                <a href="https://teratail.com/questions/{{ $question['id'] }}">
	                    {{ $question['title'] }}
	                </a>
	            </div>
	        @endforeach
	    </div>
	</body>
</html>

