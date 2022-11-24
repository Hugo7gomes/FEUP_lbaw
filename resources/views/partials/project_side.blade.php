<link href="{{ asset('css/project_side.css') }}" rel="stylesheet">

@section('project_side')
<div class="projectSide d-flex flex-column flex-shrink-0 bg-light">
  <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
    <li class="nav-item mySideProjects">
      @foreach ($projects as $project)
        <div class="item" id="project">
          <div class="col-xs-12 col-sm-6 col-md-2">
            <div class="projectsPhoto">
            <a href = "/project/{{$project['id']}}" class="projectSideNav nav-item">{{ strtok($project->name, ' ') }}</a>
            </div>
          </div> 
        </div>
      @endforeach
    </li>
    <a><button class="fa-solid fa-plus addProject" onclick="window.location='{{ route("project/create") }}'"><i class="bi bi-plus"></i></button></a>
  </ul>
  </div>
@endsection
