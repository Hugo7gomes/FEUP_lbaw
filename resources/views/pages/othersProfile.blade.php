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
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $userProfile['name'] }}</h5>
            <p class="text-muted mb-1">{{ $userProfile['email'] }}</p>
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
</main>

@endsection

