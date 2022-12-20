<link href="{{ asset('css/project_side.css') }}" rel="stylesheet">
<script src={{ asset('js/sideNav.js') }} defer></script>
@section('project_side')
  <nav class="navbar-fixed-left d-block bg-white">
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
          <button id="favoriteProjectsTitle" class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#favoriteProjects-collapse" aria-expanded="true">
          <i class="bi bi-chevron-down"></i><span class="">Favorite Projects</span>
          </button>
          <a href='{{ route("project/create") }}' id="newProject" class="btn btn-toggle align-items-center rounded collapsed btn-secondary" aria-expanded="true">
            New
          </a>
        <div class="collapse show" id="favoriteProjects-collapse">
          <ul class=" favoriteProjects nav-pills btn-toggle-nav list-unstyled fw-normal pb-1 large">
            @foreach ($user->favoriteProjects() as $projectFavorite)
              <li id = "proj{{$projectFavorite->id}}" ><a href="{{url('project/'.$projectFavorite->id)}}" class="nav-link link-dark rounded font-weight-bold">{{$projectFavorite->name}}</a></li>
            @endforeach
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <ul class = "nav nav-pills flex-sm-column mb-auto ">
          <li class = "nav-item">
            <a href = "{{url('project/'.$project->id)}}" class="nav-link link-dark" id="boardProjectButton">Board</a>
          </li>
          @if($project->is_coordinator($user))
          <li class = "nav-item">
            <a href = "{{route('project.editShow', ['project_id' => $project->id])}}" class="nav-link link-dark" id="editProjectButton">General Settings</a>
          </li>
          @endif
          <li class = "nav-item">
            <a  href = "{{route('project.members', ['project_id' => $project->id])}}" class="nav-link link-dark " id="teamMembersProjectButton">Project Members</a>
          </li>
          <li class = "nav-item">
            <form method="POST" action = "{{ route('project.leave', ['project_id' => $project->id]) }}" >
              @csrf
              <button type="submit" class="btn btn-outline-danger nav-link btn-block text-left" id="leaveProjectButton">Leave Project</button>
            </form>
          <li>
      </ul>
    </ul>
  </nav>
@endsection
