{{-- Master Layout --}}
@extends('cortex/foundation::adminarea.layouts.default')

{{-- Page Title --}}
@section('title')
    {{ config('app.name') }} » {{ trans('cortex/foundation::common.adminarea') }} » {{ trans('cortex/testimonials::common.testimonials') }} » {{ $testimonial->exists ? $testimonial->name : trans('cortex/testimonials::common.create_testimonial') }}
@endsection

@push('inline-scripts')
    {!! JsValidator::formRequest(Cortex\Testimonials\Http\Requests\Adminarea\TestimonialFormRequest::class)->selector("#adminarea-testimonials-create-form, #adminarea-testimonials-{$testimonial->getKey()}-update-form") !!}
@endpush

{{-- Main Content --}}
@section('content')

    @if($testimonial->exists)
        @include('cortex/foundation::common.partials.confirm-deletion')
    @endif

    <div class="content-wrapper">
        <section class="content-header">
            <h1>{{ Breadcrumbs::render() }}</h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details-tab" data-toggle="tab">{{ trans('cortex/testimonials::common.details') }}</a></li>
                    @if($testimonial->exists) <li><a href="#logs-tab" data-toggle="tab">{{ trans('cortex/testimonials::common.logs') }}</a></li> @endif
                    @if($testimonial->exists && $currentUser->can('delete-testimonials', $testimonial)) <li class="pull-right"><a href="#" data-toggle="modal" data-target="#delete-confirmation" data-modal-action="{{ route('adminarea.testimonials.delete', ['testimonial' => $testimonial]) }}" data-modal-title="{!! trans('cortex/foundation::messages.delete_confirmation_title') !!}" data-modal-body="{!! trans('cortex/foundation::messages.delete_confirmation_body', ['type' => 'testimonial', 'name' => $testimonial->name]) !!}" title="{{ trans('cortex/foundation::common.delete') }}"><i class="fa fa-trash text-danger"></i></a></li> @endif
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="details-tab">

                        @if ($testimonial->exists)
                            {{ Form::model($testimonial, ['url' => route('adminarea.testimonials.update', ['testimonial' => $testimonial]), 'method' => 'put', 'id' => "adminarea-testimonials-{$testimonial->getKey()}-update-form"]) }}
                        @else
                            {{ Form::model($testimonial, ['url' => route('adminarea.testimonials.store'), 'id' => 'adminarea-testimonials-create-form']) }}
                        @endif

                            <div class="row">

                                <div class="col-md-12">

                                    {{-- Body --}}
                                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                        {{ Form::label('body', trans('cortex/testimonials::common.body'), ['class' => 'control-label']) }}
                                        {{ Form::text('body', null, ['class' => 'form-control', 'placeholder' => trans('cortex/testimonials::common.body')]) }}

                                        @if ($errors->has('body'))
                                            <span class="help-block">{{ $errors->first('body') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4">

                                    {{-- Approved --}}
                                    <div class="form-group{{ $errors->has('is_approved') ? ' has-error' : '' }}">
                                        {{ Form::label('is_approved', trans('cortex/testimonials::common.approved'), ['class' => 'control-label']) }}
                                        {{ Form::select('is_approved', [0 => trans('cortex/testimonials::common.no'), 1 => trans('cortex/testimonials::common.yes')], null, ['class' => 'form-control select2', 'data-minimum-results-for-search' => 'Infinity', 'data-width' => '100%']) }}

                                        @if ($errors->has('is_approved'))
                                            <span class="help-block">{{ $errors->first('is_approved') }}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-right">
                                        {{ Form::button(trans('cortex/testimonials::common.submit'), ['class' => 'btn btn-primary btn-flat', 'type' => 'submit']) }}
                                    </div>

                                    @include('cortex/foundation::adminarea.partials.timestamps', ['model' => $testimonial])

                                </div>

                            </div>

                        {{ Form::close() }}

                    </div>

                    @if($testimonial->exists)

                        <div class="tab-pane" id="logs-tab">
                            {!! $logs->table(['class' => 'table table-striped table-hover responsive dataTableBuilder', 'id' => "adminarea-testimonials-{$testimonial->getKey()}-logs-table"]) !!}
                        </div>

                    @endif

                </div>

            </div>

        </section>

    </div>

@endsection

@if($testimonial->exists)

    @push('head-elements')
        <meta name="turbolinks-cache-control" content="no-cache">
    @endpush

    @push('styles')
        <link href="{{ mix('css/datatables.css', 'assets') }}" rel="stylesheet">
    @endpush

    @push('vendor-scripts')
        <script src="{{ mix('js/datatables.js', 'assets') }}" defer></script>
    @endpush

    @push('inline-scripts')
        {!! $logs->scripts() !!}
    @endpush

@endif
