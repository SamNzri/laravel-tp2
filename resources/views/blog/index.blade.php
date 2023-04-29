@extends('layouts.app')
@section('title', 'Blog - Welcome')
@section('content')
@php $lang =  session('locale') @endphp
    <h1 class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_list_blogs')</h1>
    <div class="col-md-4">
        <a href="{{ route('blog.create' )}}" class="btn btn-success">@lang('lang.text_add')</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_title')</th>
                <th class="text-white-50 mx-auto mt-2 mb-5">text</th>
                <th class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_category')</th>
                <th class="text-white-50 mx-auto mt-2 mb-5">created at</th>
                <th  class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_download')</th>
                <th  class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_edit')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogs as $blog)
                <tr>
                    <!-- If the user who is currently logged in is the same as the user who created the blog post,
                         display a link to edit the blog post when the user clicks on the title.
                         Otherwise, the title will not be a link and cannot be edited. -->
                    <td> 
                        @if(auth()->user()->id == $blog->user_id)
                            <a href="{{ route('blog.show', $blog->id) }}">{{ $blog->title }}</a>
                        @else
                            {{ $blog->title }}
                        @endif
                    </td>
                    <td>
                    @if($lang == 'fr')
                        {{ $blog->body_fr }}
                    @else
                        {{ $blog->body }}
                    @endif
                    </td>
                    <td>
                    @if($lang == 'fr')
                        {{ $blog->category->category_fr}}
                    @else
                        {{ $blog->category->category }}
                    @endif
                    </td>
                    <td>{{ $blog->created_at }}</td>
                    <td>
                        <a href="{{ route('blog.show.pdf', $blog->id)}}" class="btn btn-warning btn-sm">PDF</a>
                        <!-- <a href="{{ route('blog.download.zip', $blog->id) }}" class="btn btn-success btn-sm">Download</a> -->
                    </td>
                    <td>
                        @if(auth()->user()->id == $blog->user_id)
                        <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-warning btn-sm">@lang('lang.text_edit')</a>    
                        @endif
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-white-50 mx-auto mt-2 mb-5">@lang('lang.text_no_blogs_found')</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
