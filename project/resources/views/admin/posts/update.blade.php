<x-admin-master>
@section('content')
<h1>Create</h1>
<form  method="post" action="{{route('updated.posts',$post->id)}}" enctype="multipart/form-data">
@csrf
@method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}" aria-describedby="" placeholder="Enter title">
    </div>

    <div class="form-group">
     <img class="card-img-top" src="/storage/{{$post->post_image}}" alt="Card image cap" width=900 height=300>
        <label for="file">File</label>
        <input type="file" 
        class="form-control" 
        name="post_image"
        id="post_image">
    </div>
    <div class="form-group">
<textarea name="body"
 class="form-control" 
 id="body" 
 cols="30" 
 rows="10">{{$post->body}}</textarea>
    </div>



    <div class="form-group">
        <button type="submit" class="btn  btn-primary">UPDATE</button>
    </div>

</form>

@endsection 

</x-admin-master>