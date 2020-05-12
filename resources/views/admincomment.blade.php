@extends('layouts.adminmaster')
@section('title', "Admin Panel")
@section('content')
    <div class="container-fluid" style="margin-top: 120px;">

        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">

                <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-success mb-1">ADD COMMENT</button>
                <div class="card" style="background-color: #323437; color: grey ">
                    <center>
                        <div class="card-header">
                            <h5>Comment List</h5>
                        </div>
                    </center>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-center">
                                <tr>
                                    <th style="border-bottom: none">Name</th>
                                    <th style="border-bottom: none">Comment</th>
                                    <th style="border-bottom: none">Account</th>
                                    <th style="border-bottom: none">Date</th>
                                    <th style="border-bottom: none">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-center">
                                @foreach($comments as $comment)
                                    <tr style="cursor: pointer">
                                        <td style="color: greenyellow"> {{$comment->name}} </td>
                                        <td> {{$comment->comment}}</td>
                                        </td>
                                        <td>{{$comment->account}}</td>
                                        <td> {{ $comment->created_at }}</td>
                                        <td>
                                            <button onclick="window.location.href='{{route('admindeletecomment', $comment->id)}}'" class="btn btn-danger">DELETE</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bg-dark">
                    <div class="modal-header" style="border-bottom: none; color: grey">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Comment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('adminaddcomment')}}">
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
                                <button type="submit" class="btn btn-glow-dark">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
