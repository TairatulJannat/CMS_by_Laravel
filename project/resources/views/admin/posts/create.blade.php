<x-admin-master>
@section('content')
<h1>Create</h1>
<form  method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
@csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title"  id="title" aria-describedby="" placeholder="Enter title">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select name="category_id" id="">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        
        </select>
    </div>

    <div class="form-group">
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
 rows="10"></textarea>
    </div>



    <div class="form-group">
        <input type="submit" class="btn  btn-primary"  name="submit">
    </div>

</form>

@endsection 

</x-admin-master>