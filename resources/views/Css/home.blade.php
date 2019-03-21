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
    <strong>Home</strong>
</section>
    <div class="container">
    <div class="card card-default col-sm-2">
    <div class="card-header">
                        <strong>Solutions</strong>
</div>
                <div class="card-body">
                    <h1></h1>
                </div>
            </div>
        
        <div class="card card-default col-sm-2">
        <div class="card-header">
                        <strong>solve</strong>
</div>
            <div class="card-body">
                <h1>1</h1>
            </div>
        </div>

        <div class="card card-default col-sm-2">
        <div class="card-header">
                        <strong>unsolve</strong>
</div>
            <div class="card-body">
                <h1>2</h1>
            </div>
        </div>
        
    </div>
    
<br><br><br><br><br><br><br><br>
    <div class="container satis">
    <div class="card card-large col-sm-4">
    <div class="card-header">
                        <h1>Customer satisfaction</h1>
    </div>
                        <strong>received 2</h1>
                <div class="card-body">
                    <li class="fa fa-smile-o">Happy 2</li>
                    <li class="fa fa-frown-o">Sad 0</li>
                </div>
            </div>
    </div>
</div>
    


@endsection