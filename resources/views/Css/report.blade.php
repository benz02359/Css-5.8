@extends('css.master')


@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">

</style>
@endsection

@section('content')
<div class="main" style="margin-left:120px">
<div class="rep-body" style="display: block;">
                <h4>Today's Insights</h4>
</div>
<div class="row">
  <div class="column">
    <div class="rep">
      <p><i class="fa fa-user"></i></p>
      <h3>2</h3>
      <p>Contact</p>
    </div>
  </div>

  <div class="column">
    <div class="rep">
      <p><i class="fa fa-check"></i></p>
      <h3>10</h3>
      <p>Solution</p>
    </div>
  </div>

  <div class="column">
    <div class="rep">
      <p><i class="fa fa-smile-o"></i></p>
      <h3>1</h3>
      <p>Happy Clients</p>
    </div>
  </div>

  <div class="column">
    <div class="rep">
      <p><i class="fa fa-coffee"></i></p>
      <h3>1</h3>
      <p>Solve Solution</p>
    </div>
  </div>
</div>
</div>
@endsection