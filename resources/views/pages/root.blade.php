@extends('layouts.app')
@section('title', '首页')

@section('content')
<div class="offset-lg col-md-12 pt-5">
  <div class="row">
    <div class="col-xl-6">
    </div>
    <div class="col-xs-12 col-xl-6">
      <div class="jumbotron">
        <h1 style="text-align:center">METAPHYSICS CONSULTANCY</h1>
        <h4 style="text-align:center">
            风水免费在线测试
        </h4>
        @guest  
        <p style="text-align:center">
            <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">现在注册</a>
        </p>
        <p style="text-align:center">
            已有账户？<a href="{{ route('login') }}" >点击登陆</a>
        </p>
        @else
        <p style="text-align:center">
            <a class="btn btn-lg btn-success" href="{{ route('users.show', Auth::id()) }}" role="button">现在测试</a>
        </p>
        @endguest
      </div>   
    </div>
  </div>
</div>
@stop