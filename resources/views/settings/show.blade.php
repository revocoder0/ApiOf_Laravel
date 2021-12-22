@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Show Setting',
'activePage' => 'Show Setting',
'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">

    </div>

    <div class="content">

        <div class="card">
           
            <div class="card-header">
                <h5 class="title">{{ __('Show Setting') }}</h5>
            </div>

           <!-- start card-body -->
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="text-center">
                        <th>
                            No
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Logo
                        </th>
                        <th>
                            Cover Photo
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        @foreach($settings as $key=>$setting)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$setting->title}}</td>
                            <td>{{$setting->description}}</td>
                            <td>{{$setting->email}}</td>
                            <td><img src="{{ asset('storage/upload/' . $setting->logo) }}" /></td>
                            <td><img src="{{ asset('storage/upload/' . $setting->cover_photo) }}" /></td>
                            <td><a href="#" class="btn btn-success">edit</a></td>
                            <td><a href="#" class="btn btn-danger">delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- end card-body -->
            
        </div>
       
      

    </div>

@endsection
