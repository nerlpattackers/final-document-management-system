@extends('layouts.app')

@section('content')
    {{-- TITLE WRAPPER --}}
    <div class="container-fluid mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h3>Dashboard</h3>
                </div>
            </div>
        </div>
    </div>

    @if (session('failed'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-danger alert-dismissable d-flex justify-content-between">
                    {{ session('failed') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session('success'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            {{-- INCOMING FILES COUNTER --}}
            <div class="col-9">
                <a href="{{ url('/incoming_documents') }}" class="w-100 text-reset">
                    <div class="card-style-2 d-flex justify-content-between incoming-docs">
                        <div class="left-side">
                            <h4>Incoming Documents</h4>
                            <div class="d-flex mt-3">
                                <p class="">{{ $incoming }} files,</p>
                                <p class="mx-1">{{ $incomingCategories }} Folders</p>
                            </div>
                        </div>
                        <div class="right-side d-flex align-items-center">
                            <i class="lni lni-chevron-right text-dark"></i>
                        </div>
                    </div>
                </a>
                {{-- OUTGOING FILES COUNTER --}}
                <a href="{{ url('/outgoing_documents') }}" class="w-100 mt-1 text-reset">
                    <div class="card-style-2 d-flex justify-content-between incoming-docs">
                        <div class="left-side">
                            <h4>Outgoing Documents</h4>
                            <div class="d-flex mt-3">
                                <p class="">{{ $outgoing }} files,</p>
                                <p class="mx-1">{{ $outgoingCategories }} Folders</p>
                            </div>
                        </div>
                        <div class="right-side d-flex align-items-center">
                            <i class="lni lni-chevron-right text-dark"></i>
                        </div>
                    </div>
                </a>
                {{-- <div class="col-6 mt-1 text-center d-flex align-items-center">
                    <a href="{{ url('/export') }}" class="text-reset backup-btn card-style-2 me-1">
                        Export Record <i class="fas fa-file-export"></i>
                    </a>
                    <a href="" class="text-reset backup-btn card-style-2" data-bs-toggle="modal" data-bs-target="#importDatabase">
                        Import Record <i class="fas fa-file-import"></i>
                    </a>
                </div> --}}
            </div> 
            {{-- STORAGE GRAPH --}}
            <div class="col-3 d-flex justify-content-center">
                <div class="card card-style-2 graph shadow">
                    <div class="card-content">
                        <div class="chart-container">
                            <canvas id="disk-space-chart"></canvas>      
                        </div>
                        <div class="description-container text-center mt-3">
                            <h4 class="mb-3">Storage Space</h4>
                            <p>
                                {{ $usedSpaceFormatted }} / {{ $totalSpaceFormatted }}
                            </p>
                            <p>
                                Free space: {{ $freeSpaceFormatted }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('importModal')
    {{-- SCRIPT FOR CHART JS --}}
    <script>
        var ctx = document.getElementById('disk-space-chart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Free Space', 'Used Space'],
                datasets: [{
                    data: [{{ $freeSpacePercent }}, {{ $usedSpacePercent }}],
                    backgroundColor: ['rgb(22, 36, 83)', 'rgb(136, 13, 13)']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Disk Space Usage'
                }
            }
        });
    </script>
@endsection
