@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>
                <div class="card-body">
                    <div class="m-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Total Saving</th>
                                    <th>Number Of Days Due</th>
                                    <th>Due</th>
                                    <th>Advance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($members as $key => $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ number_format($member->my_total_saving, 2) }}</td>
                                        <td>{{ $member->my_total_number_of_due }}</td>
                                        <td>{{ number_format($member->my_total_due, 2) }}</td>
                                        <td>{{ number_format($member->my_total_advance, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection