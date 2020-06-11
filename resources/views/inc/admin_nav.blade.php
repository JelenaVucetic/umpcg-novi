<div class="admin-nav">
        <ul>
            <li  class="{{ Request::path() === 'dashboard' ? 'myActive' : '' }}" ><a href="/dashboard">Objave</a></li>
            <li  class="{{ Request::path() === 'showMembers' ? 'myActive' : '' }}"><a href="/showMembers">Članovi</a></li>
        </ul>
    </div> <br>
<hr style="margin-left:0px;">