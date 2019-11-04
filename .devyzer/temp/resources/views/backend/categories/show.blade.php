@extends ('backend.layouts.app')

@section ('title', __('labels.backend.categories.management') . ' | ' . __('labels.backend.categories.view'))

@section('breadcrumb-links')
@include('backend.categories.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.categories.management') }}
                        <small class="text-muted">{{ __('labels.backend.categories.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.categories.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.categories.content.created_at') }}:</strong> {{ $category->updated_at->timezone(get_user_timezone()) }} ({{ $category->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.categories.content.last_updated') }}:</strong> {{ $category->created_at->timezone(get_user_timezone()) }} ({{$category->updated_at->diffForHumans() }})--}}
                        @if ($category->trashed())
                            <strong>{{ __('labels.backend.categories.content.deleted_at') }}:</strong> $category->deleted_at->timezone(get_user_timezone())  ($category->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection