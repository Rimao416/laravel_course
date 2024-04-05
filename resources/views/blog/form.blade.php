<form action="" method="post">
    @csrf
    @method($post->id ? 'PATCH':'POST')
    <div>
<label for="title">Titre</label>
        <input type="text" name="title" value="{{old('title',$post->title)}}" id="">
        @error('title')
        {{$message}}
    
        @enderror
    </div>
    <div>   
<label for="slug">Slug</label>
        <input type="text" name="slug" value.="{{old('slug',$post->slug)}}" id="">
        @error('slug')
        {{$message}}
    
        @enderror
    </div>
    <textarea name="content" id="" cols="30" rows="10">Contee demonstration</textarea>
  @if($post->id)

  <button class="btn btn-primary">Enregistrer</button>
  @else
  <button class="btn btn-primary">Créer</button>
  @endif
</form>