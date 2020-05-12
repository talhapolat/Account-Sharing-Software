@extends('layouts.adminmaster')
@section('title', "Admin Panel")
@section('content')
    <div class="container-fluid" style="margin-top: 120px;">

        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">

                <button  data-toggle="modal" data-target="#exampleModalCenter"  class="btn btn-success mb-1">ADD CATEGORY</button>
                <div class="card" style="background-color: #323437; color: grey ">
                    <center>
                        <div class="card-header">
                            <h5>Category List</h5>
                        </div>
                    </center>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                <tr>
                                    <th style="border-bottom: none">Title</th>
                                    <th style="border-bottom: none">Slug</th>
                                    <th style="border-bottom: none">Description</th>
                                    <th style="border-bottom: none">Keywords</th>
                                    <th style="border-bottom: none">Action</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($categories as $category)
                                    <tr style="cursor: pointer">
                                        <td style="color: greenyellow"> {{$category->title}} </td>
                                        <td> {{$category->slug}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>{{$category->keywords}}</td>
                                        <td>
                                            <button onclick="window.location.href='{{route('admindeletecategory', $category->id)}}'" class="btn btn-danger">DELETE</button></td>
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('adminaddcategory')}}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; color: white" type="text" name="title" class="form-control bg-dark" placeholder="Title" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; color: white" type="text" name="slug" class="form-control bg-dark" placeholder="Slug" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; color: white" type="text" name="description" class="form-control bg-dark" placeholder="Description" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input style="border-top: none; border-left: none; border-right: none; border-bottom: none; color: white"  type="text" name="keywords" class="form-control bg-dark" placeholder="Keywords" required>
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
