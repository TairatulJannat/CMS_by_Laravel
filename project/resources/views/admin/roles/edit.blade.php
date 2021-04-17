<x-admin-master>
@section('content')
<h1>Update Role</h1>
<form  method="post" action="{{route('role.update',$role->id)}}">
@csrf
@method('PUT')
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="name" value="{{$role->name}}" id="title" aria-describedby="">
    </div>
    <div class="form-group">
        <label for="title">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$role->slug}}" id="title" aria-describedby="">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">update</button>
    </div>

</form>

@endsection 

</x-admin-master>