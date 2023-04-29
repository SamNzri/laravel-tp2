@extends('layouts.app')
@section('title', 'Etudiant - Modifier')
@section('content')
@php $lang =  session('locale') @endphp

        <div class="row">
            <div class="col-12 text-center pt-2">
                
             
            </div> <!--/col-12-->
        </div><!--/row-->
        <div class="col-md-6">
            <a href="{{ route('index')}}" class="btn btn-success btn-sm">@lang('lang.button_return')</a>
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
                            <h1>
                                 @lang('lang.text_add_student')
                            </h1> 
                        </div>
                        <div class="card-body">  
                   
                                <div class="control-group col-12">
                                    <label for="title">@lang('lang.text_name')</label>
                                    <input type="text" id="title" name="nom" class="form-control" required>
                                </div>
                                <div class="control-group col-12">
                                    <label for="adresse">@lang('lang.text_address')</label>
                                    <input type="text" id="title" name="adresse" class="form-control" required>
                                </div>  
                                <div class="control-group col-12">
                                    <label for="phone">Telephone</label>
                                    <input type="number" id="title" name="phone" class="form-control" required >
                                </div> 
                                <div class="control-group col-12">
                                    <label for="email">@lang('lang.text_email')</label>
                                    <input type="email" id="title" name="email" class="form-control" required >
                                </div> 
                                <div class="control-group col-12">
                                    <label for="date_de_naissance">@lang('lang.text_dob')</label>
                                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" required >
                                </div> 

                                <div class="control-group col-12">
                                    <label for="ville">@lang('lang.text_city')</label>
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
                            <input type="submit" class="btn btn-success" value="@lang('lang.text_add')">
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
@endsection