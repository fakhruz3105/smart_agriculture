@extends('backend.layouts.app')

@section('title', __('Valve Switch'))

@section('content')
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-md-1">
                <div class="white_card  mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Add New Water Schedule</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <x-forms.post :action="route('admin.water.store')">
                            <div class="form-group">
                                <input type="date" name="date" id="start" class="form-control datepicker" placeholder="{{ __('Start Time') }}" value="{{ old('date') }}" />
                            </div>
                            <div class="form-group">
                                <input type="time" name="time" id="time" class="form-control timepicker" placeholder="{{ __('End Time') }}" value="{{ old('time') }}" />
                            </div>
                            <button type="submit" class="btn btn-success text-center">Create</button>
                            <button type="submit" class="btn btn-dark text-center">Back</button>

                        </x-forms.post>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
@endpush
