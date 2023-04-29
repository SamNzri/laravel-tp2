@extends('layouts.app')
@section('title', 'Etudiants')
@section('content')
@php $lang =  session('locale') @endphp
    <h1 class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_list_student')</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_name')</th>
                <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_email')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etudiants as $etudiant)
                <tr>
                    <td> <a href="{{ route('etudiant.show', $etudiant->id) }}">{{ $etudiant->nom }}</a></td>
                    <td>{{ $etudiant->email }}</td>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
