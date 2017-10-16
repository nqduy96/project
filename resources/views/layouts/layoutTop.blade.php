<div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
        <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
        <a href="{{ route('home.profile') }}" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
        
        <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
        <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-button w3-padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></button>     
            <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
            <a href="#" class="w3-bar-item w3-button">One new friend request</a>
            <a href="#" class="w3-bar-item w3-button">John Doe posted on your wall</a>
            <a href="#" class="w3-bar-item w3-button">Jane likes your post</a>
        </div>
    </div>
        <a href="{{ route('home.logout') }}" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account"><i class="fa fa-sign-out"></i> Logout</a>
    </div>
</div>