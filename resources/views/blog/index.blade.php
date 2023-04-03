@extends('layouts.app')
@section('title', 'Etudiants')
@section('content')
    <h1 class="text-white-50 mx-auto mt-2 mb-5">Liste des étudiants</h1>
    <table class="table">
        <thead>
            <tr>
                <th class="text-white-50 mx-auto mt-2 mb-5">Nom</th>
                <th class="text-white-50 mx-auto mt-2 mb-5">Courriel</th>
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
