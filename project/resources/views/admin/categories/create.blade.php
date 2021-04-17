<x-admin-master>
@section('content')
<h1>Create</h1>
<form  method="post" action="{{route('category.store')}}">
@csrf
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="name" id="title" aria-describedby="" placeholder="Enter name">
    </div>

    <div class="form-group">
        <input type="submit" class="btn  btn-primary"  name="submit">
    </div>

</form>

@endsection 

</x-admin-master>