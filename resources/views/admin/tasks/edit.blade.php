@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    @if ($errors->storetask->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->storetask->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}" method="POST"> @csrf @method('PUT')
                    <div class="card-header">{{ __('Edit Task') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input class="form-control" value="{{ $task->name }}" type="text" name="name" id="name" placeholder="{{ __('Task name') }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea class="form-control" name="description" rows="5" id="textarea">{{ $task->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">{{ __('Update Task') }}</button>
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

