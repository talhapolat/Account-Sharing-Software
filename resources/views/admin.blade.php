@extends('layouts.adminmaster')
@section('title', "Admin Panel")
@section('content')
    <div class="container-fluid" style="margin-top: 120px;">

        <div class="row">
            <div class="col-md-6 mt-4">

                <div class="card" style="background-color: #323437; color: grey ">
                    <center>
                        <div class="card-header">
                            <h5>{{session()->get('username')}}</h5>
                            <h5>The Last Accounts</h5>
                        </div>
                    </center>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th style="border-bottom: none">Account</th>
                                    <th style="border-bottom: none">Username</th>
                                    <th style="border-bottom: none">Password</th>
                                    <th style="border-bottom: none">Type</th>
                                    <th style="border-bottom: none">Date</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $range = 5 ?>

                                @foreach($accounts as $account)
                                    <tr style="cursor: pointer">
                                        {{--                                        <th class="text-center"><img src="assets\images\spo.png" alt="user"--}}
                                        {{--                                                                     class="avatar-sm rounded-circle"--}}
                                        {{--                                                                     style="width:37px"></th>--}}
                                        <td style="color: greenyellow"> {{$account->categories[0]->title}} </td>
                                        <td> {{$account->username}}</td>
                                        <td> {{$account->password}}
                                        </td>
                                        <td> PREMIUM</td>
                                        <td> {{ rand($range,$range+10) }} minutes ago</td>
                                        <?php $range = $range + 10 ?>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 mt-4">

                <div class="card" style="background-color: #323437; color: grey ">
                    <center>
                        <div class="card-header">
                            <h5>The Last Comments</h5>
                        </div>
                    </center>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th style="border-bottom: none">Name</th>
                                    <th style="border-bottom: none">Account</th>
                                    <th style="border-bottom: none">Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comments as $comment)

                                    <tr>
                                        <td> {{$comment->name}}</td>
                                        <td> {{$comment->account}}
                                        </td>
                                        <td> {{$comment->comment}} </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </div>
@endsection
