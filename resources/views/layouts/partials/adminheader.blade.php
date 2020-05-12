<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    {{--    <a class="navbar-brand" style="font-size: 30px" href="/">Premium Accounts</a>--}}
    <a href="/"> <img src="/logo.png" alt=""> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav text-center">

                <li class="nav-item  p-2">
                    <a href="/panel/admin/home" class="nav-link"><span class="pcoded-micon"><i
                                style="font-size:20px;"
                                class="fas fa-home text-success p-2 "></i></span><span
                            class="pcoded-mtext"> Home </span></a>
                </li>

            <li class="nav-item  p-2">
                <a href="/panel/admin/home/category" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-home text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Category List </span></a>
            </li>

            <li class="nav-item  p-2">
                <a href="/panel/admin/home/accounts" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-home text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Account List </span></a>
            </li>

            <li class="nav-item  p-2">
                <a href="/panel/admin/home/comments" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-home text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Comment List </span></a>
            </li>
            <li class="nav-item  p-2">
                <a href="/panel/admin/home/tags" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-home text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Tag List </span></a>
            </li>
            <?php
            if (session('userlogin') == true) {
            ?>
            <li class="nav-item  p-2">
                <a href="{{route('adminpasswordchange')}}" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-sign-out-alt text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Change Password </span></a>
            </li>

            <li class="nav-item  p-2">
                <a href="{{route('adminout')}}" class="nav-link"><span class="pcoded-micon"><i
                            style="font-size:20px;"
                            class="fas fa-sign-out-alt text-success p-2 "></i></span><span
                        class="pcoded-mtext"> Logout </span></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>
