@extends('layouts.app')
@section('title', 'User List')
@section('content')
@php $lang =  session('locale') @endphp
<div class="row">
    <div class="col-12 text-center pt-3">
        <h1  class="text-white-50 mx-auto mt-2 mb-5"> User List</h1>
    </div>
    <hr>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_user')</th>
                    <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_email')</th>
                    <th class="text-white-50 mx-auto mt-2 mb-5">Post</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->userHasPosts as $post)
                          <p>{{ $post->title }}</p>
                        @endforeach        
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users}}
    </div>
</div>
@endsection