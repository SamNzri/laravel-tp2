@extends('layouts.app')
@section('title', 'Etudiant - Modifier')
@section('content')
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="text-white-50 mx-auto mt-2 mb-5">
                    Modifier Etudiant
                </h1>
             
            </div> <!--/col-12-->
        </div><!--/row-->
        <div class="col-md-6">
            <a href="{{ route('index')}}" class="btn btn-success btn-sm">Return</a>
        </div>
                <hr>
                <h2 class="display-8 pt-3">
            </h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('etudiant.show', $etudiant->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                   
                                <div class="control-group col-12">
                                    <label for="nom">Nom</label>
                                    <input type="text" id="title" name="nom" class="form-control" value="{{  $etudiant->nom }}" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="adresse">Adress</label>
                                    <input type="text" id="title" name="adresse" class="form-control" value="{{ $etudiant->adresse }}" required>
                                </div>  
                                <div class="control-group col-12">
                                    <label for="phone">Telephone</label>
                                    <input type="tel" id="title" name="phone" class="form-control" value="{{ $etudiant->phone }}" required>
                                </div> 
                                <div class="control-group col-12">
                                    <label for="email">Courriel</label>
                                    <input type="email" id="title" name="email" class="form-control" value="{{ $etudiant->email }}" required>
                                </div> 
                                <div class="control-group col-12">
                                    <label for="date_de_naissance">Date De Naissaince</label>
                                    <input type="date" id="title" name="date_de_naissance" class="form-control" value="{{ $etudiant->date_de_naissance }}" required>
                                </div> 

                                <div class="control-group col-12">
                                    <label for="ville">Ville</label>
                                    <select id="ville" name="ville_id" class="form-control" required>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}" {{ $etudiant->ville_id == $ville->id ? 'selected' : '' }}>
                                    {{ $ville->nom }}  &#9658;
                                        </option>
                                     @endforeach
                                    </select>
                                </div>
                                                            
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-success" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection