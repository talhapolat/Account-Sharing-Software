@extends('layouts.master')
@section('title', $categoryname . " Free Account")
@section('description', $description)
@section('keywords', $keywords)
@section('content')
    <div class="container-fluid" style="margin-top: 120px;">

        <div class="row">
            <div class="col-md-6 mt-4">


                <div class="card" style="background-color: #323437; color: grey ">
                    <center>
                        <div class="card-header">
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
            <div class="card" style="background-color: #323437;width: 100%; color: grey; margin-top: 50px">
                <div class="card-body">
                    <h4>Tags</h4>
                    @foreach($tags as $tag)
                        <a href="/tags/{{$tag->url}}">{{$tag->title}}</a>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header" style="border-bottom: none; color: grey">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('comment')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; color: white" type="text" name="firstname" class="form-control bg-dark" placeholder="First name" required>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <select class="form-control" name="account"  id="exampleFormControlSelect1" required>
                                            <option readonly="" value="">Select Account</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->title}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; border-bottom: none; color: white" type="text" name="message" class="form-control bg-dark" placeholder="Message" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-glow-dark">Send</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection
