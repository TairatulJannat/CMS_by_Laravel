<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Posts</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Posts</h6>
           
            <a class="collapse-item" href="{{route('post.create')}}">Create a post</a>
            <a class="collapse-item" href="{{route('user.posts')}}">YOUR POST</a>
            @if(auth()->user()->userHasRole('Admin'))

            <a class="collapse-item" href="{{route('user_all.posts')}}">View all post</a>
            @endif
          </div> 
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Catogories</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories:</h6>
            @if(auth()->user()->userHasRole('Admin'))
            <a class="collapse-item" href="{{route('category.create')}}">Create Categories</a>
            <a class="collapse-item" href="{{route('category.index')}}">View all Categories</a>
            @endif
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Roles Management</span>
        </a>
        <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Roles:</h6>
            @if(auth()->user()->userHasRole('Admin'))
            <a class="collapse-item" href="{{route('role.create')}}">Create Role</a>
            <a class="collapse-item" href="{{route('role.index')}}">View all Role</a>
            <a class="collapse-item" href="{{route('role.manage')}}">Users Role manage</a>
            @endif
          </div>
        </div>
      </li>
