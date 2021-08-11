@extends('backend.layouts.app')

@section('title', __('Valve Switch'))

@section('content')
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="white_card  mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Water Report</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div id="chart"></div>
                    </div>
                </div>

                <div class="white_card  mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Auto Watering Schedule</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">

                        <a href="{{ route('admin.water.create') }}" class="btn btn-success btn-sm float-right m-4">Add New Schedule</a>

                        <table class="table table-striped">
                           <thead>
                           <tr>
                               <th>Time</th>
                               <th>Duration</th>
                               <th>Active</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($schedules as $schedule)
                               <tr>
                                   <td>{{ reformatDateTime($schedule->start, "h:i A")." - ".reformatDateTime($schedule->end, "h:i A") }}</td>
                                   <td>{{ getDiffTime($schedule->start, $schedule->end) }}</td>
                                   <td>
                                        {!! ($schedule->active == 1)? "<span class='badge badge-success'>Active</span>" : "<span class='badge badge-dark'>Inactive</span>" !!}
                                   </td>
                                   <td>
                                       <a href="{{ route('admin.water.edit', $schedule->id) }}"  class="btn btn-info btn-sm">Edit</a>
                                   </td>

                               </tr>
                           @endforeach
                           </tbody>
                       </table>
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
                type: "area",
                height: 300,
                foreColor: "#999",
                stacked: true,
                dropShadow: {
                    enabled: true,
                    enabledSeries: [0],
                    top: -2,
                    left: 2,
                    blur: 5,
                    opacity: 0.06
                }
            },
            colors: ['#0090FF'],
            stroke: {
                curve: "smooth",
                width: 3
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Total Views',
                data: @json($data)
            }],
            markers: {
                size: 0,
                strokeColor: "#fff",
                strokeWidth: 3,
                strokeOpacity: 1,
                fillOpacity: 1,
                hover: {
                    size: 6
                }
            },
            xaxis: {
                type: "datetime",
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    offsetX: 14,
                    offsetY: -5
                },
                tooltip: {
                    enabled: true
                }
            },
            grid: {
                padding: {
                    left: -5,
                    right: 5
                }
            },
            tooltip: {
                x: {
                    format: "dd MMM yyyy"
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left'
            },
            fill: {
                type: "solid",
                fillOpacity: 0.7
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();

        function generateDayWiseTimeSeries(s, count) {
            {{--var values = [@json($data)];--}}
            {{--var i = 0;--}}
            {{--var series = [];--}}
            {{--var x = new Date().getTime();--}}
            {{--while (i < count) {--}}
            {{--    series.push([x, values[s][i]]);--}}
            {{--    x += 86400000;--}}
            {{--    i++;--}}
            {{--}--}}

            console.log()
            return series;
        }

    </script>

@endpush
