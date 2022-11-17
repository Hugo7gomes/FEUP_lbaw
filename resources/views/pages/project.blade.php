@extends('layouts.app')

@section('name', $project->name)

<link href="{{ asset('css/project.css') }}" rel="stylesheet">

@section('projectSide')
  @include('partials.project_side', ['projects' => $user->projects])
@endsection
<section id="projectSide">
    @yield('projectSide')
</section>

<button class="fa-regular fa-heart favoriteButton"></button>
<button class="addTaks">Add task</button>
<form method="POST" action = "{{ route('task/create', ['id'=>$project->id]) }}" id="createTaks">
      @csrf
      <h4>Name</h4>
      <input type="text" name = "name" placeholder= "Name" id="taksName">
      @if($errors->has('name'))
          <div class="error">{{ $errors->first('name') }}</div>
      @endif
      <h4>Details</h4>
      <input type="text" name = "details" placeholder= "Details" id="userEmail">
      @if($errors->has('details'))
          <div class="error">{{ $errors->first('details') }}</div>
      @endif
      <h4>User assigned</h4>
      <select name="userAssigned">
        @foreach ($coordinators as $coordinator)
            <option value="{{ $coordinator['name']}}" name="{{ $coordinator['name']}}">{{ $coordinator['name']}}</option>
        @endforeach
        @foreach ($collaborators as $collaborator)
            <option value="{{ $collaborator['name']}}" name="{{ $collaborator['name']}}">{{ $collaborator['name']}}</option>
        @endforeach
      </select>
      @if($errors->has('id_user_assigned'))
          <div class="error">{{ $errors->first('id_user_assigned') }}</div>
      @endif
      <h4>Priority</h4>
      <select name="priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
      </select>
      @if($errors->has('priority'))
          <div class="error">{{ $errors->first('priority') }}</div>
      @endif
      <button type="submit" class="btn btn-primary">Create task</button>
    </form>
<div class="boardView">
    <h2>Board View</h2>
    <div id="tasksToDo">
        <h3>To do</h3>
        @foreach ($tasksToDo as $task)
        <div id="tasks">{{ $task['name']}}</div>
        @endforeach
    </div>
    <div id="tasksDoing">
        <h3>Doing</h3>
        @foreach ($tasksDoing as $task)
        <div id="tasks">{{ $task['name']}}</div>
        @endforeach
    </div>
    <div id="tasksDone">
        <h3>Done</h3>
        @foreach ($tasksDone as $task)
        <div id="tasks">{{ $task['name']}}</div>
        @endforeach
    </div>
</div>
@if ($project->is_coordinator($user))
    <a href = "{{route('project/edit', ['id' => $project->id])}}"><button class="editProjectButton">Editar projeto</button></a>
@endif

<div class="teamMembers">
    <h3>Team Members</h3>
    @foreach ($coordinators as $coordinator)
    <div class="coordinator"><b><a href = "/profile/{{$coordinator['username']}}">{{$coordinator['username']}}</a></b></div>
    
    @endforeach
    @foreach ($collaborators as $collaborator)
    <div class="collaborator"><a href = "/profile/{{$collaborator['username']}}">{{$collaborator['username']}}</a></div>
    @endforeach
</div>
