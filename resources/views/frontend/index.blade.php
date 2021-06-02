@extends('frontend.layouts.vistor')

@section('content')
    <div class="container-fluid p-0 mt-2">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Daily Report</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="chart-currently"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Weekly Report</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="marketchart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30 social_media_card">
                    <div class="white_card_header">
                        <div class="main-title">
                            <h3 class="m-0">Summary</h3>
                            <span>Summary data will refresh every 1 hour <br>
                                <b>Last updated at : {{ detetimeFormat($summary->updated_at, 'h:i A') }}</b>
                            </span>
                        </div>
                    </div>
                    <div class="media_thumb">
                        <img src="{{ asset('assets/img/media.svg') }}" alt="">
                    </div>
                    <div class="media_card_body">
                        <div class="media_card_list">
                            <div class="single_media_card">
                                <span>Average Humidity</span>
                                <h3>{{ humidityFormat($data_summary->humidity->average) }}</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Average Temperature</span>
                                <h3>{{ temperatureFormat($data_summary->temperature->average) }}</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Average PH</span>
                                <h3>{{ phFormat($data_summary->ph->average) }}</h3>
                            </div>
                            <div class="single_media_card">
                                <span>Total Data Collected (Today)</span>
                                <h3>{{ $data_summary->total }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script type="text/javascript">

        var options = {
            chart: {
                height: 250,
                type: "area"
            },
            dataLabels: {
                enabled: false
            },
            series: [
                {name: "Humidity (%)", data: @json($area['humidity'])},
                {name: "Temperature (°C)", data: @json($area['temperature'])},
                {name: "Ph ", data: @json($area['ph'])}
            ],
            colors: [ "#0b7bd6" , "#ff001c", "#2be314"],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 90, 100]
                }
            },
            xaxis: {
                categories: @json($categories)
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart-currently"), options);
        chart.render();


        var options1 = {
            chart: {
                height: 380,
                type: 'bar',
                toolbar: {
                    show: false
                },
            },
            series: [
                {name: 'Humidity (%)', data: @json($weekly['humidity'])},
                {name: 'Temperature (°C)', data: @json($weekly['temperature'])},
                {name: 'Ph ', data: @json($weekly['ph'])}
                ],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: ['50%'],
                    endingShape: 'rounded'
                },
            },
            xaxis: {
                categories: @json($weekly['date']),
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false
                },
            },
            colors: [ "#F65365" , "#0b7bd6", "#2be314"],

            markers: {
                size: 6,
                colors: ['#fff'],
                strokeColor: "#F65365",
                strokeWidth: 3,
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            states: {
                normal: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                hover: {
                    filter: {
                        type: 'none',
                        value: 0
                    }
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: 'none',
                        value: 0
                    }
                }
            },
            grid: {
                borderColor: "#FFCCD2",
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true
                    }
                }
            }
        }

        var chart1 = new ApexCharts(
            document.querySelector("#marketchart"),
            options1
        );

        chart1.render();
    </script>
@endpush
