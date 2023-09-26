@extends('layouts.app')

@section('content')
    {{-- TITLE AND BREADCRUMBS --}}
    <div class="container-fluid mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h3>{{ $category->name }}</h3>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <nav aria-label="breadcrumb" class="">
                    <ol class="breadcrumb mb-0">
                      <li class="breadcrumb-item"><a href="{{ url('/outgoing_documents') }}">Outgoing Documents</a></li>
                      <li class="breadcrumb-item">{{ $category->name }}</li>
                    </ol>
                </nav> 
            </div>
        </div>
    </div>

    {{-- BACK AND ADD BUTTON --}}
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-6 d-flex align-items-center">
                <a href="{{ url('/outgoing_documents') }}" class="text-dark back-btn"><i class="lni lni-chevron-left me-2"></i>Back</a>
            </div>
            <div class="col-6 text-end">
                {{-- modal button --}}
                <a href="" class="btn primary-btn btn-hover" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="lni lni-plus me-2"></i>New</a>
            </div>
        </div>
    </div>
    
    {{-- INCLUDE THE ADD MODAL --}}
    @include('outgoing.documents.addDocumentModal')

    {{-- Alerts of add and delete --}}
    @if (session('successAdd'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('successAdd') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session('successDelete'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('successDelete') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif
    @if (session('successUpdate'))
        <div class="container-fluid">
            <div class="row">
                <div class="alert alert-success alert-dismissable d-flex justify-content-between">
                    {{ session('successUpdate') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    @endif

    {{-- DISPLAY DATA --}}
    <div class="container-fluid">
        <div class="row">   
            <div class="table-wrapper table-responsive">
                <table id="adminOrderTable" class="table table-light striped-table shadow">
                    <thead>
                        <tr>
                            <th class="text-center"><h6 class="fw-bold">Title</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Subject</h6></th>
                            <th class="text-center"><h6 class="fw-bold">To</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Thru</h6></th>
                            <th class="text-center"><h6 class="fw-bold">From</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Date</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Date Received</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Date Updated</h6></th>
                            <th class="text-center"><h6 class="fw-bold">Actions</h6></th>
                        </tr>
                        <!-- END TABLE ROW-->
                    </thead>
                    <tbody>
                       @foreach ($documents as $documents)
                            <tr>
                                <td class="p-2">
                                    <p class="text-reset">{{ $documents->title }}</p>
                                </td>
                                <td class="p-2">
                                    @if ($documents->subject)
                                        <p class="text-reset">{{ $documents->subject }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->to)
                                        <p class="text-reset">{{ $documents->to }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->thru)
                                        <p class="text-reset">{{ $documents->thru }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->from)
                                        <p class="text-reset">{{ $documents->from }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->date)
                                        <p class="text-reset">{{ date('F j, Y', strtotime($documents->date)) }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->date_received)
                                        <p class="text-reset">{{ date('F j, Y', strtotime($documents->date_received)) }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2">
                                    @if ($documents->updated_at)
                                        <p class="text-reset">{{ date('F j, Y h:i:s', strtotime($documents->updated_at)) }}</p>
                                    @else
                                        <p class="fst-italic">none</p>
                                    @endif
                                </td>
                                <td class="p-2 text-center">
                                    <ul class="btn-group">
                                        <li>
                                            {{-- VIEW BUTTON --}}
                                            <a href="{{ url('/outgoing_documents/' . $documents->id . '/view') }}" class="btn btn-primary me-2 action-btn d-flex justify-content-center align-items-center"><i class="lni lni-eye"></i></a>
                                        </li>
                                        <li>
                                            {{-- UPDATE BUTTON --}}
                                            <a href="" class="btn btn-success me-2 action-btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#update{{ $documents->id }}"><i class="lni lni-pencil"></i></a>
                                        </li>
                                        {{-- INCLUDE THE EDIT MODAL --}}
                                        @include('outgoing.documents.updateDocumentModal')
                                        <li>
                                            {{-- DELETE BTN MODAL --}}
                                            <button type="submit" class="btn btn-danger action-btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#delete{{ $documents->id }}"><i class="lni lni-trash-can"></i></button>
                                        </li>
                                        {{-- INCLUDE THE DELETE MODAL --}}
                                        @include('outgoing.documents.deleteDocumentModal')
                                    </ul>
                                </td>
                            </tr>
                       @endforeach
                    </tbody>
                </table>
                <!-- END TABLE -->
            </div>
        </div>
    </div>
@endsection