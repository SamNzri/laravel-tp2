@extends('layouts.app')
@section('title', $etudiant->nom)
@section('content')
    <div class="row mt-5">
        <div class="col-12">
        <div class="col-md-6">
            <a href="{{ route('index')}}" class="btn btn-success btn-sm">Return</a>
        </div>
            <h2 class="display-8 pt-3">
                {{ $etudiant->nom}}
            </h2>
            <hr>
                {!! $etudiant->body !!}
                <p>Courriel:
                {{ $etudiant->email}}
                </p>
              
                <p>Address:
                {{ $etudiant->adresse}}
                </p>
                <p>Telephone:
                {{ $etudiant->phone}}
                </p>
                <p>Date de naissaince:
                {{ $etudiant->date_de_naissance}}
                </p>
                </p>
                @if($etudiant->Ville)
                <p>Ville:
                {{ $etudiant->Ville->nom}}
                </p>
                @endif
            <hr>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-6">
            <a href="{{ route('etudiant.edit', $etudiant->id)}}" class="btn btn-success btn-sm">Modifier</a>
        </div>
        <div class="col-md-6">
                <input type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete" value="Effacer">
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete the etudiant : {{ $etudiant->nom }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger"> Effacer </button>
            </form>
      </div>
    </div>
  </div>
</div>

@endsection