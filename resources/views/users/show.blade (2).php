@extends('layouts.app')

@section('title', $user->name . ' 的个人中心')

@section('content')

<div class="row">
  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card">
      <img class="card-img-top" src="{{ $user->avatar }}" alt="{{ $user->name }}">
      <div class="card-body">
      <div class="card-body">
        <h5><strong>个人简介</strong></h5>
        <p>{{ $user->introduction }}</p>
        <hr>
        <h5><strong>注册于</strong></h5>
        <p>{{ $user->created_at->diffForHumans() }}</p>
      </div>
    </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-6">
          <h5>用户名 :</h5>
          </div>
          <div class="col-sm-6">
          <h1 class="mb-0" style="font-size:22px;"><small>{{ $user->name }}</small></h1>
          </div>
          <div class="col-sm-6">
          <h5>E-mail :</h5>
          </div>
          <div class="col-sm-6">
          <h1 class="mb-0" style="font-size:22px;"><small>{{ $user->email }}</small></h1>
          </div>
        </div>
      </div>
    </div>
    <hr>
    {{-- 用户发布的内容 --}}
    <div class="card">
      <div class="card-body">
      <div class="row">
        <div class="col-sm-4">
        <h3>输入您的生日日期：</h3>
        </div>
          <div class="col-sm-4">
            <input type="datetime-local" id="birthdaytime" name="birthdaytime">
          </div>
          <div class="col-sm-4">
            <a  class="btn btn-lg btn-success" href="{{ route('bazi', Auth::id()) }}" role="button">查看报告</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop