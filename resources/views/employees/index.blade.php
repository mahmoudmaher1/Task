@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <h2>Employees</h2>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ URL('/home') }}">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </a>
            </div>

        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Image</th>
            <th class="text-center">
                <a href="{{route('employees.create')}}" class="btn btn-success btn-sm">
                    <i class="glyphicon glyphicon-plus"></i>
                </a>
            </th>
        </tr>

        @foreach($employee as $key => $value)
            <tr>
                <td>{{$value->id}}</td>
                <td><a href="">{{$value->firstName}}</a></td>
                <td>{{$value->company}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->image}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('employees.show' , $value->id)}}">
                        <i class="glyphicon glyphicon-th-large"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="{{route('employees.edit' , $value->id)}}">
                        <i class="glyphicon glyphicon-pencil"></i>
                    </a>
                    {!! Form::open(['method'=>'DELETE' , 'route'=>['employees.destroy' , $value->id], 'style'=>'display']) !!}
                    <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">
                        <i class="glyphicon glyphicon-trash"></i>
                    </button>
                    {!! Form::close()!!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection