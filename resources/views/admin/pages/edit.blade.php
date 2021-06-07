@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif



                    <form action="{{ route('admin.pages.update', $page) }}" method="POST"> @csrf @method('PUT')
                    <div class="card-header">{{ __('Edit Page') }}</div>



                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input class="form-control" value="{{ $page->title }}" type="text" name="title" id="title" placeholder="{{ __('Page title') }}">
                                </div>

                                <div class="form-group">
                                    <label for="content">{{ __('Content') }}</label>
                                    <textarea class="form-control" name="content" rows="5" id="textarea">{{ $page->content }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">{{ __('Update Page') }}</button>
                    </div>
                </form>


                </div>

            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
@include('admin.ckeditor')

@endsection
