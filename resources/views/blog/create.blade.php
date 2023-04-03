@extends('layouts.app')
@section('title', 'Etudiant - Modifier')
@section('content')
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Ajouter Etudiant
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
                    <form method="post">
                    @csrf
                    @method('post')
                        <div class="card-header">
                            Formulaire
                        </div>
                        <div class="card-body">  
                   
                                <div class="control-group col-12">
                                    <label for="title">Nom</label>
                                    <input type="text" id="title" name="nom" class="form-control" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="adresse">Adress</label>
                                    <input type="text" id="title" name="adresse" class="form-control" required>
                                </div>  
                                <div class="control-group col-12">
                                    <label for="phone">Telephone</label>
                                    <input type="number" id="title" name="phone" class="form-control" required >
                                </div> 
                                <div class="control-group col-12">
                                    <label for="email">Courriel</label>
                                    <input type="email" id="title" name="email" class="form-control" required >
                                </div> 
                                <div class="control-group col-12">
                                    <label for="date_de_naissance">Date De Naissaince</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" required >
                                </div> 

                                <div class="control-group col-12">
                                    <label for="ville">Ville</label>
                                    <select id="ville" name="ville_id" class="form-control" required>
                                    @foreach($villes as $ville)
                                        <option value="{{ $ville->id }}" {{ $ville->ville_id == $ville->id ? 'selected' : '' }}>
                                    {{ $ville->nom }} &#9658;
                                        </option>
                                     @endforeach
                                    </select>
                                </div>
                              
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-success" value="Ajouter">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection