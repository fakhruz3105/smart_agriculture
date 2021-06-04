@extends('backend.layouts.app')

@section('title', __('Valve Switch'))

@section('content')
    <div class="container-fluid p-0">

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-6 box-col-6">
                <div class="card custom-card">
                    <div class="text-center profile-details mt-2">
                        <h4>Valve Switch</h4>
                        <h6>Latest Data</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Temperature</h6>
                            <h3 class="">{{ temperatureFormat($live->temperature) }}</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Humidity</h6>
                            <h3><span class="">{{ humidityFormat($live->humidity) }}</span></h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Ph</h6>
                            <h3><span class="">{{ phFormat($live->ph) }}</span></h3>
                        </div>
                    </div>

                    @if(getValveStatus() == 'on')
                        <div class="card-footer row">
                            <div class="col-6 col-sm-6">
                                <h6>Started On</h6>
                                <h3><span class="text-success">{{ detetimeFormat($usage->start, 'h:i A') }}</span></h3>
                            </div>
                            <div class="col-6 col-sm-6">
                                <h6>Total Water Consumed(L)</h6>
                                <h3><span class="text-warning font-weight-bold">{{ litreFormat(calculateUsage($usage->start, \Carbon\Carbon::now())) }}</span></h3>
                            </div>
                        </div>
                    @endif

                    <div class="m-3">
                        @if(getValveStatus() == 'off')
                        <form method="post" action="{{ route('admin.water.valve-change') }}">
                            @csrf
                            <input type="hidden" name="status" value="on">
                            <button type="submit" class="btn btn-lg btn-success rounded-pill btn-block">On</button>
                        </form>
                        @else
                            <form method="post" action="{{ route('admin.water.valve-change') }}">
                                @csrf
                                <input type="hidden" name="status" value="off">
                                <button type="submit" class="btn btn-lg btn-danger rounded-pill btn-block">Off</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')

@endpush
