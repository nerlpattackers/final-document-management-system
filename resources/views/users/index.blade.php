@extends('layouts.app')

@section('content')
    {{-- TITLE WRAPPER --}}
    <div class="container-fluid mt-3 mb-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h3>Users</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="table-wrapper table-responsive">
                <table class="table table-light striped-table shadow">
                    <thead>
                        <tr>
                            <th class="p-3"><h6 class="fw-bold">Name</h6></th>
                            <th class="p-3"><h6 class="fw-bold">Email</h6></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="p-3">
                                    <p>{{ $user->name }}</p>
                                </td>
                                <td class="p-3" style="max-width:50px !important;">
                                    <p>{{ $user->email }}</p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- end table -->
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
