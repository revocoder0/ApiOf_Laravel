@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Posts',
    'activePage' => 'profile',
    'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
    <div class="card">
        <!-- session start -->
        @if(session('success'))
		<div class="alert alert-primary text-center text-white font-weight-bold">	
			{{session('success')}}
		</div>	
        @endif
        <!-- end session -->

        <!-- row start -->
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{__(" Upgrade Posts")}}</h5>
                    </div>
                <div class="card-body">
                    <!-- form start -->
                    <form method="post" action="{{ route('update', $posts->id)}}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('alerts.success')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control" placeholder="{{ __('Title...') }}" type="text" name="title" value="{{$posts->title }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" class="form-control" row="10" col="10" id="summernote" >{{$posts->description }}</textarea>
                            </div>
                        </div>
                       
                    </div>  
                 </div>
            </div> <!-- end card -->
            </div>
            <div class="col-md-3">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                                <label for="Short Description">Short Desciption</label>
                                <textarea class="form-control description" rows="10" placeholder="{{ __('Short Description...') }}" name="short_description">{{ $posts->short_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Category</label>
                                <select name="category" class="form-control">
                                    <option>{{ $posts->category_id }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row"> <!-- row -->
                        <div class="col-md-6">
                            <label for= "title">Feature</label>
                            <input class="file-control" type="file" value="{{$posts->feature}}" name="feature" autofocus>
                        </div>
                    </div> <!-- end row -->
                    <div class="row mt-4"> <!-- submit and reset button -->
                        <div class="col-md-6">
                            <button class="btn btn-danger" style="width:100%">Reset</button>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" style="width:100%" value="Publish">
                        </div>
                    </div>
                 </div>
            </div> <!-- end card -->
            </div>
        </div>
    </div>
  
@endsection

