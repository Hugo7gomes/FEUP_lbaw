@extends('layouts.app')

@section('name', $userProfile->name)

@section('content')

<link href="{{ asset('css/othersProfile.css') }}" rel="stylesheet">

<main>
<div class="container text-center" id="othersProfileBoard">
  <div class="row">
    <div class="col-sm-9" id="userInfo">
      <div class="row">
      <div class="col-8 col-sm-6">
      </div>
    </div>
  </div>
</div>

<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center" id="otherprofile">
            @if($userProfile->photo != null)
              <img src={{asset($userProfile->photo->path)}} alt="avatar" class="rounded-circle shadow-1-strong me-3" width="150px" height="150px">
            @else
              <img src={{asset("avatars/default.png")}} alt="avatar" class="rounded-circle shadow-1-strong me-3" width="150px" height="150px">
            @endif
            <h5 class="my-3">{{ $userProfile['name'] }}</h5>
            <p class="text-muted mb-1">{{ $userProfile['email'] }}</p>
            @if($user->administrator)
              @if($userProfile->banned())
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#unBanAccountModal" >Unban User</button>
              @else
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#banAccountModal" >Ban User</button>
              @endif
            @endif
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body" id="info">
            <div class="row">
                <div class="col-sm-3">
                  <label for="exampleFormControlInput1" class="mb-0">Name</label>
                </div>
                <div class="col-sm-9">
                    <text id="userName" class="text-muted mb-0">{{ $userProfile['name'] }}</text>
                </div>

                <div class="col-sm-3">
                  <label for="exampleFormControlInput1" class="mb-0">Username</label>
                </div>
                <div class="col-sm-9">
                    <text id="userName" class="text-muted mb-0">{{ $userProfile['username'] }}</text>
                </div>

                <div class="col-sm-3">
                  <label for="exampleFormControlInput1" class="mb-0">Email</label>
                </div>
                <div class="col-sm-9">
                    <text id="userName" class="text-muted mb-0">{{ $userProfile['email'] }}</text>
                </div>
            </div>
            
            <div class="row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-9">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
              <section id="usersProjects">
                <h3><b>{{ $userProfile['name']}}</b>'s projects</h3>
                <div class="userProjects">
                @foreach ($userProfile->projects as $project)
                    <div class="item" id="project">
                        <div class="col-xs-12 col-sm-6 col-md-2">
                            <div class="projectPhoto">{{ strtok($project->name, ' ') }}</div>
                        </div>
                    </div>
                @endforeach
                </div>
              </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@if($user->administrator)
  @if($userProfile->banned())
  <div class="modal " id="unBanAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bannig Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action = "{{route('admin.unban', ['idToUnBan'=>$userProfile->id])}}" >
            @csrf
            <button type="submit" class="btn btn-outline-danger nav-link text-right">Unban Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @else
  <div class="modal " id="banAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Bannig Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action = "{{route('admin.ban', ['idToBan'=>$userProfile->id])}}" >
            @csrf
            <div class=" form-group">
              <label for="banDetails">Describe the ban's motive</label>
              <textarea name="banMotive" class="form-control" rows = "3" id="banDetails" placeholder="Ban motive"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-danger nav-link text-right">Ban Account</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
  @endif
@endif
</main>

@endsection

