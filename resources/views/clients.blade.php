@extends('layouts.template')
@php
  $pagetype = "Table";
@endphp
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Clients</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Clients</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<div class="card">

  <div class="card-body">
    <a href="{{url('addclient')}}" class="btn btn-primary" style="float: right;">Add New</a>
<br><br><br>
    <table class="table responsive-table" id="products">
        <thead>
            <tr>
                <th width="20">#</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>Contact Person</th>
                <th>Phone Number</th>
                <th>Jobs Done</th>
                <th>Ongoing Project</th>
                <th>Projects</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allclients as $cl)

                <tr
                    @if ($cl->status=="Active")
                        style="background-color: azure !important;"
                    @endif
                >
                    <td>{{$cl->id}}</td>
                    <td>{{$cl->company_name}}</td>
                    <td>{{$cl->address}}</td>
                    <td>{{$cl->name}}</td>
                    <td>{{$cl->phone_number}}</td>

                    <td>{{$cl->projects->count()}}</td>
                    <td>{{isset($cl->projects) && $cl->projects->count()>0 ? $cl->projects->where('status','Ongoing')->first()->title : "None"}}</td>
                    <td width="90">
                        <div class="btn-group">
                            <a href="/client-projects/{{$cl->id}}" class="btn btn-success btn-xs">Projects<i class="lnr lnr-list"></i></a>

                            <a href="/new-project/{{$cl->id}}/" class="btn btn-primary btn-xs">New<i class="lnr lnr-plus"></i></a>
                        </div>
                    </td>

                </tr>
            @endforeach


        </tbody>
    </table>
  </div>
</div>
@endsection
