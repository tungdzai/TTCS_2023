<div class="dropdown">
    <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        {{__("user.users.language")}}
    </a>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="{{route('admin.language',['vi'])}}">Vietnamese</a></li>
        <li><a class="dropdown-item" href="{{route('admin.language',['en'])}}">English</a></li>
    </ul>
</div>
