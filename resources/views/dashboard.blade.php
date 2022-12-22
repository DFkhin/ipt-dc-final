@extends('base')

@extends('navbar')

@section('title', 'Dashboard')

@section('content')
<div>
    <div class="container">
        <h1> <span>Welcome</span> to Dashboard !!</h1>
    </div>
</div>

@endsection
<style>
    .container {
        margin-top: 70px;
        background-image: url("images/background.jpg");
        height: 30rem;
        background-repeat: no-repeat;
    }
    h1 {
        margin-left: 230px;
        font-size: 70px;
        color: rgb(102, 236, 25);
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }
  
</style>

