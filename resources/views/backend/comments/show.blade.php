@extends ('backend.layouts.app')

@section ('title', __('labels.backend.comments.management') . ' | ' . __('labels.backend.comments.view'))

@section('breadcrumb-links')
@include('backend.comments.includes.breadcrumb-links')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.comments.management') }}
                        <small class="text-muted">{{ __('labels.backend.comments.view') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4 mb-4">
                <div class="col">
                    @include('backend.comments.view')
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                {{--       <strong>{{ __('labels.backend.comments.content.created_at') }}:</strong> {{ $comment->updated_at->timezone(get_user_timezone()) }} ({{ $comment->created_at->diffForHumans() }}),--}}
                {{--       <strong>{{__('labels.backend.comments.content.last_updated') }}:</strong> {{ $comment->created_at->timezone(get_user_timezone()) }} ({{$comment->updated_at->diffForHumans() }})--}}
                        @if ($comment->trashed())
                            <strong>{{ __('labels.backend.comments.content.deleted_at') }}:</strong> $comment->deleted_at->timezone(get_user_timezone())  ($comment->deleted_at->diffForHumans() )
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection