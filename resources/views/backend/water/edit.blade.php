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
                        <x-forms.post :action="route('admin.water.update', $schedule->id)">
                            <div class="form-group">
                                <input type="time" name="start" id="start" class="form-control timepicker" placeholder="{{ __('Start Time') }}" value="{{ $schedule->start }}" />
                            </div>
                            <div class="form-group">
                                <input type="time" name="end" id="end" class="form-control timepicker" placeholder="{{ __('End Time') }}" value="{{ $schedule->end }}" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="active" id="active" class="checkbox"  value="1" {{ ($schedule->active == 1)? "checked" : "" }}><label for="active" class=""> Active</label>
                            </div>
                            <button type="submit" class="btn btn-success text-center">Update</button>
                            <a href="{{ route('admin.water.index') }}" class="btn btn-dark text-center">Back</a>

                        </x-forms.post>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
@endpush
