        <div class="header">
        	<ul class="lista">
                <li><a href="/home">Home</a></li>
            	<li><a href="/table">Work table</a></li>
                <li><a href="/table-tasks">Table</a></li>
                <li><a href="/project">Add Projects</a></li>
                @if ($user->role==2) 
                <li><a href="/admin/users">Users</a></li>
                @endif
                <li><a href="/change-profile-picture">Change profile picture</a></li>
                <li class="logout"><a href="/logout">Logout</a></li>
                <li class="logout"><a href="/profile"> Change password</a></li>
                 <li class="logout"><a href=""> {{$user->email}} </a></li>
                              
                <li class="slika"><a href="/preffered"><img src="{{ $user->profile_picture }}"  width="40" height="40"></a></li>



            </ul>
        </div>