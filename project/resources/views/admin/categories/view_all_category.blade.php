<x-admin-master>


@section('content')


        <!-- Blog Post -->
@foreach($categories as $category)
        <div class="card mb-4">
          <div class="card-body">
            <h5>Category Name: {{$category->name}}</h5>
       
            <form action="{{route('category.destroy',$category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{route('category.edit',$category->id)}}"class="btn btn-dark">Edit</a>
            <button class="btn btn-danger">Delete</button>
            </form>
            
          </div> 
        
           
        </div>
@endforeach

@endsection
</x-admin-master>