<link href="{{ asset('css/notifications.css') }}" rel="stylesheet">

<div class="container-fluid" >
  <!-- Notifications -->
  <ul class="navbar-nav d-flex flex-row me-1" >
    <li class="nav-item me-3 me-lg-0">
      <div class="dropdown">
        <ul class="not dropdown-menu dropdown-menu-end" style="display:none; "aria-labelledby="navbarDropdownMenuLink">
          @if(isset($notifications) && count($notifications)> 0)  
            @foreach ($notifications as $notification)
            <li>
              <div class="row"> 
                @if($notification->type != 'Invite')
                  <div class ="divNot col"  id = {{$notification->id}}>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <span class="text">{{$notification->text()}}</span>
                        <i class="deleteNot bi bi-x"></i>                        
                      </li>
                    </ul>
                  </div>
                @elseif($notification->type == 'Invite')
                  <div class ="divNot col" id = {{$notification->id}}>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <span class="text">{{$notification->text()}}</span>
                        <div class="buttonsInvite">
                          <form method = "POST" action ="{{ route('project/acceptInvite',['id_project' => $notification->id_project]) }}">
                            @csrf
                            <button type="submit" class="btn btn-success acceptInviteButton">Accept</button>
                          </form>
                          <form method = "POST" action ="{{ route('project/rejectInvite',['id_project' => $notification->id_project]) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger acceptInviteButton">Reject</button>
                          </form>
                        </div>
                      </li>
                    </ul>
                  </div>
                @endif
              </div>
            @endforeach
            @else
              <div class ="col" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <span class="text">Notifications empty aqui</span>
                  </li>
                </ul>
              </div>
            </li>
          @endif
        </ul>
      </div>
    </li>
  </ul>
</div>
