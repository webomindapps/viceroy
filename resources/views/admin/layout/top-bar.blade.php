<div class="col-lg-10 left-area my-auto">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <ul class="sopt">
                
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-2 right-area">
    <h6 class="me-3 pt-2">{{ auth()->user()->name }}</h6>
    <div class="profile-icon">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTscz0eljIO4sQ0qkfpLJrgtl6Kvryp-DA-Hw&usqp=CAU"
            alt="">
    </div>
    <ul class="profile-drop" style="display: none;">
        <li>
            <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                @csrf
                <a onclick="document.getElementById('logoutForm').submit()">Logout</a>
            </form>
        </li>
    </ul>
</div>
