@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <h2 style="color: darkgreen;"><b>SHORT URL</b></h2>
    </div>
<br>
</div>
<section style="background-color: lightgray;width: auto">
    <div class="container">
        <br>
        <div class="row justify-content-center" >
            <h3>Paste the URL to be shortened</h3>
        </div>

        <br>
        <form  action="{{url('/shorten')}}" method="post">
            @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="link" style="height: 60px" placeholder="Enter the link here" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Shorten URL</button>
            </div>
        </div>
        </form>
    </div>
    <br>

    @if(Session::has('success'))
      <div class="row justify-content-center">
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
      </div>
        <div class="row justify-content-center">
        <div class="alert alert-primary" role="alert">
            My Short URL :  <a href="{{url('/'.Session::get('code'))}}" class="alert-link" target="_blank">{{url('/'.Session::get('code'))}}</a>
        </div>
        </div>
        @endif

</section>
<br>

@endsection
