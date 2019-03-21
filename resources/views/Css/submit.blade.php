@extends('css.master')

@section('style')
<style type="text/css">
.card.card-default{
    margin: 5px 5px;
    width: 15%;
    position:relative;
    display:block;
    padding-left: 0;
    padding-right: 6px;
    padding: 5px 5px;
}
</style>
@endsection

@section('content')
<div class="sidenav">
            <a href="{{url('/')}}" class="fa fa-home"> Home</a>
            <a href="{{url('/help')}}" class="fa fa-search"> Helper</a>
            <a href="{{url('/contact')}}" class="fa fa-id-card-o"> Contact</a>
            <a href="{{url('/solution')}}" class="fa fa-question-circle-o"> Solution</a>
            <a href="{{url('/forum')}}" class="fa fa-comments-o"> Forums</a>
            <a href="{{url('/report')}}" class="fa fa-bar-chart-o"> Reports</a>
        </div>

<div class="main" style="margin-left:120px">
<section class="header-primary container-fluid">
    <strong>Submit</strong>
</section>
<div class="row">
  <div class="col-md-12"><br />
  <h3 align="center">เพิ่มข้อมูลปัญหา</h3><br />
  @if(count($errors) > 0)
    <div class="alert alert-danger">
    <ul> @foreach($errors->all() as $errors)
    <li>{{$errors}}</li>
    @endforeach
    </ul>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

  <form method="post" action="{{url('solution')}}">
   @csrf
    <div class="form=group">
      <input type="text" name="title" class="form-control" placeholder="ป้อนหัวข้อ"   />
    </div>
    <div class="form-group">
      <input type="text" name="detail" class="form-control" placeholder="ป้อนรายละเอียด   "/>
    </div>
    <div class="form=group">
      <input type="submit" class="btn btn-primary" value="submit"/>
    </div>
  </form>
  </div>
</div>

    


@endsection