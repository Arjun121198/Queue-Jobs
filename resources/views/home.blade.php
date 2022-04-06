@extends('layouts.master')
@section('title','home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="container">
                <div class="pull-right">
                    <a class="btn btn-success" href="form">Add Details</a>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        @foreach ($cruds as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->email }}</td>
            <td>{{ $product->phone }}</td>
        </tr>
        @endforeach
    </table>
</div>
<div class="container">
    <div class="pull-right">
        <a class="btn btn-success" href="queue">Send Mail</a>
    </div>
</div>
@endsection