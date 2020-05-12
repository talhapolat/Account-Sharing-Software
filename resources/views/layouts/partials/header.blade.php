<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
{{--    <a class="navbar-brand" style="font-size: 30px" href="/">Premium Accounts</a>--}}
    <a href="/"> <img src="/logo.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-center">
            @foreach($categories as $category)
                <li class="nav-item  p-2">
                    <a href="{{ route('category', $category->slug) }}" class="nav-link"><span class="pcoded-micon"><i
                                style="font-size:20px;"
                                class="fas fa-home text-success p-2 "></i></span><span
                            class="pcoded-mtext">{{$category->title}}</span></a>
                </li>
            @endforeach
                <li class="nav-item  p-2">
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="nav-link"><span class="pcoded-micon"><i
                                style="font-size:20px;"
                                class="fas fa-comment text-success p-2 "></i></span><span
                            class="pcoded-mtext">Comment</span></a>
                </li>
        </ul>
    </div>
</nav>
