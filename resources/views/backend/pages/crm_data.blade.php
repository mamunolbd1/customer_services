@extends('backend.layouts.master')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">CRM Datatable</h1>
    
   <div class="row">
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                CRM DataTable
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Call Type</th>
                            <th>Query Type</th>
                            <th>Call Remarks</th>
                            <th>Alt. Phone Number</th>
                            <th>Address</th>
                            <th>Verbatim</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sl.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone Number</th>
                            <th>Call Type</th>
                            <th>Query Type</th>
                            <th>Call Remarks</th>
                            <th>Alt. Phone Number</th>
                            <th>Address</th>
                            <th>Verbatim</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($info as $info)
                        <tr>
                            <td>{{ $info->id }}</td>
                            <td>{{$info->created_at}}</td>
                            <td>{{$info->name }}</td>
                            <td>{{$info->gender }}</td>
                            <td>{{$info->phone_number}}</td>
                            <td>{{$info->call_type }}</td>
                            <td>{{$info->query_type }}</td>
                            <td>{{$info->call_remarks }}</td>
                            <td>{{$info->alt_phone_number }}</td>
                            <td>{{$info->address }}</td>
                            <td>{{$info->verbatim }}</td>
                        </tr> 
                        @endforeach
                           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection