@extends('layouts.master')
@section('title','form')
@section('content')
<div class="container">
<form action="formin" autocomplete="off" method="post" id="myForm">
@csrf
  @if(Session::get('fail'))
<div class="alert alert-danger">
  {{ Session::get('fail') }}
</div>
  @endif
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputphone1" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection

@section('scripts')
<script>
  $("#myForm").submit(function(e)
  {
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    if(name == "" && email == "" && phone == "")
    {
      $("#name").css("border-color",'red');
      $("#email").css("border-color",'red');
      $("#phone").css("border-color",'red');
      e.preventDefault();
    }
    else
    {
      $("#name").css("border-color",'unset');
      $("#email").css("border-color",'unset');
      $("#phone").css("border-color",'unset');
    }
    if(name == null || name == "")
    {
      $("#name").css("border-color",'red');
      e.preventDefault();
    }
    else
    {
      $("#name").css("border-color",'unset');
    }
    if(email == null || email == "")
    {
      $("#email").css("border-color",'red');
      e.preventDefault();
    }
    else
    {
      $("#email").css("border-color",'unset');
    }
    if(phone ==null || phone == "")
    {
      $("#phone").css("border-color",'red');
      e.preventDefault();
    }
    else
    {
      $("#phone").css("border-color",'unset');
    }

  });
</script>  
@endsection