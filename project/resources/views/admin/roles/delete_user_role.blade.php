<x-admin-master>


@section('content')


 
  <div class="card mb-4">
    <div class="card-body">
    <form action="{{route('role.deleted',$user->id)}}" method="post">
    @csrf
  
    <label for="role">Roles</label>
        <select name="role_id" id="">
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        <input type="submit" class="btn btn-danger" value="Delete">
        </select>
    </form>
    </div> 
  </div>


@endsection
</x-admin-master>