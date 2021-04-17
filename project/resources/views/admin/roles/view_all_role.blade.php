<x-admin-master>


@section('content')


        <!-- Blog Post -->
@foreach($roles as $role)
        <div class="card mb-4">
          <div class="card-body">
            <h5>Role Name: {{$role->name}}</h5>
       
            <form action="{{route('role.destroy',$role->id)}}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{route('role.edit',$role->id)}}"class="btn btn-dark">Edit</a>
            <button class="btn btn-danger">Delete</button>
            </form>
            
          </div> 
        
           
        </div>
@endforeach

@endsection
</x-admin-master>