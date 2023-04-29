@extends('layouts.app')
@section('title', 'Blog - Create')
@section('content')
@php $lang =  session('locale') @endphp

        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    Ajouter un article
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form method="post">
                    @csrf
                        <div class="card-header">
                        @lang('lang.text_form')
                        </div>
                        <div class="card-body">   
                                <div class="control-grup col-12">
                                    <label for="title">@lang('lang.text_title_message')</label>
                                    <input type="text" id="title" name="title" class="form-control" >
                                </div>
                                <div class="control-grup col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="body"></textarea>
                                </div>
                                <div class="control-grup col-12">
                                    <label for="category">Category</label>
                                    <select id="category" name="categories_id" class="form-control" required>
                                    <option value="">@lang('lang.text_choose_category')</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id}}">{{ $category->category}} </option>
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