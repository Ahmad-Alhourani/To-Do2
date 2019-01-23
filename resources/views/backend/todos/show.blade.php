@extends ('backend.layouts.app')

@section ('title', __('labels.backend.todos.management') . ' | ' . __('labels.backend.todos.view'))

@section('breadcrumb-links')
@include('backend.todos.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.todos.management') }}
                        <small class="text-muted">{{ __('labels.backend.todos.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.todos.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.todos.content.created_at') }}:</strong> {{ $todo->updated_at->timezone(get_user_timezone()) }} ({{ $todo->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.todos.content.last_updated') }}:</strong> {{ $todo->created_at->timezone(get_user_timezone()) }} ({{$todo->updated_at->diffForHumans() }})--}}
                        @if ($todo->trashed())
                            <strong>{{ __('labels.backend.todos.content.deleted_at') }}:</strong> $todo->deleted_at->timezone(get_user_timezone())  ($todo->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection