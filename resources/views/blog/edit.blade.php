@extends('base')
@section('content')
<form action="" method="post">
    @csrf
    <div>
<label for="title">Titre</label>
        <input type="text" name="title" value="{{old('title',$post->title)}}" id="">
        @error('title')
        {{$message}}
    
        @enderror
    </div>
    <div>
<label for="slug">Slug</label>
        <input type="text" name="slug" value="{{old('slug',$post->slug)}}" id="">
        @error('slug')
        {{$message}}
    
        @enderror
    </div>
    <textarea name="content" id="" cols="30" rows="10">Contee demonstration</textarea>
    <button>Enregistrer</button>
</form>
@endsection