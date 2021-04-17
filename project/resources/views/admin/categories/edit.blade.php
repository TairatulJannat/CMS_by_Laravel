<x-admin-master>
@section('content')
<h1>Update Category</h1>
<form  method="post" action="{{route('category.update',$category->id)}}">
@csrf
@method('PUT')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}" id="title" aria-describedby="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">update</button>
    </div>

</form>

@endsection 

</x-admin-master>