@extends('base')
@section('content')
<h1>Mon Blog</h1>
@foreach ($posts as $post)
<h2><a class="btn btn-primary" href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">{{ $post->title }}</a></h2>
<p>{{ $post->content }}</p>
@endforeach
{{$posts->links()}}
@endsection