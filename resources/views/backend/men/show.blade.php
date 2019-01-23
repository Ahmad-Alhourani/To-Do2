@extends ('backend.layouts.app')

@section ('title', __('labels.backend.men.management') . ' | ' . __('labels.backend.men.view'))

@section('breadcrumb-links')
@include('backend.men.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.men.management') }}
                        <small class="text-muted">{{ __('labels.backend.men.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.men.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.men.content.created_at') }}:</strong> {{ $man->updated_at->timezone(get_user_timezone()) }} ({{ $man->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.men.content.last_updated') }}:</strong> {{ $man->created_at->timezone(get_user_timezone()) }} ({{$man->updated_at->diffForHumans() }})--}}
                        @if ($man->trashed())
                            <strong>{{ __('labels.backend.men.content.deleted_at') }}:</strong> $man->deleted_at->timezone(get_user_timezone())  ($man->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection