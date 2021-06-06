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

                    <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST"> @csrf @method('PUT')
                    <div class="card-header">{{ __('Edit Checklist') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input class="form-control" value="{{ $checklist->name }}" type="text" name="name" id="name" placeholder="{{ __('Checklist name') }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">{{ __('Update Checklist') }}</button>
                    </div>
                </form>


                </div>

                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST"> @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm(' {{ __('Are you sure?') }} ');">{{ __('Delete This Checklist Group') }}</button>
                </form>

                <hr>

                <h2>{{ __('List of Tasks') }}</h2>

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>{{ __('List of Tasks') }}</div>
                        <div class="card-body">
                            @livewire('tasks-table', [
                                'checklist' => $checklist
                            ])

                    </div>
                </div>



                    <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST"> @csrf
                        @if ($errors->storetask->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->storetask->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header">{{ __('New Task') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('Name') }}</label>
                                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="description">{{ __('Description') }}</label>
                                            <textarea class="form-control" name="description" rows="5" id="task-textarea">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit">{{ __('Save Task') }}</button>
                            </div>
                        </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#task-textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
