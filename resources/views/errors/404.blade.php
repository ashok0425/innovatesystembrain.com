@extends('frontend.layout.master')
@section('content')
<br/>
<br/>
<div class='container'>

  <center style="margin:10rem; auto">

  <img src="{{asset('404.svg')}}" width='60%'/>
 <br/>
  <br/>
  <br/>
  <a class="btn btn-outline-dark border-2 mt-2 rounded-pill  px-4 text-center" href="{{route('/')}}" type="button">Visit Home page <i class="fas fa-arrow-right"></i></a>

  </center>
</div>




@endsection
