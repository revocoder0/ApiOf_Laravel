@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'User Setting',
    'activePage' => 'setting',
    'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
  <div class="content">
              @if (session('success'))
                <div class="alert alert-success text-center font-weight-bold alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close btn-close">
                        <i class="now-ui-icons btn-close ui-1_simple-remove"></i>
                    </button>
                </div>
            @endif
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h5 class="title">{{__("Create User setting")}}</h5>
          </div>
          <!-- start card-body -->
          <div class="card-body">
            <form method="POST" action="{{ route('storesetting') }}" autocomplete="off"
            enctype="multipart/form-data">
            @csrf
            @include('alerts.success')
              <div class="row">
              </div>
                <div class="row">
                    <div class="col-md-7 pr-1">
                        <div class="form-group">
                            <label for="title">{{__(" Title")}}</label>
                            <input type="text" name="title" class="form-control" value="{{ $setting->title?$setting->title:null }}" placeholder="Title">
                            @include('alerts.feedback', ['field' => 'title'])
                          </div>
                      
                        <div class="form-group">
                            <label for="email">{{__(" Email address")}}</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{$setting->email?$setting->email:null}}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
            
                        <div class="logo">
                            <label for="logo">{{__(" Logo")}}</label>
                            <input type="file" name="logo" class="form-control">
                            @include('alerts.feedback', ['field' => 'logo'])
                            <p class="mt-2"><img class="avatar border-gray" src="{{asset('/storage/upload/'.$setting->logo)}}" alt="{{$setting->logo}}" title="logo"></p>
                        </div>
                        
                        <div class="coverphoto mt-2">
                            <label for="coverphoto">{{__(" Cover Photo")}}</label>
                            <input type="file" name="coverphoto" class="form-control">
                            @include('alerts.feedback', ['field' => 'coverphoto'])
                            <p class="mt-2"><img class="avatar border-gray" src="{{asset('/storage/upload/'.$setting->cover_photo)}}" alt="{{$setting->cover_photo}}" title="logo"></p>
                        </div>
                        
                        <div class="form-group mt-2">
                            <label for="description">{{__(" Description")}}</label>
                            <textarea name="description" id="description"  rows="5" class="form-control" placeholder="write description">{{$setting->description?$setting->description:null}}</textarea>
                            @include('alerts.feedback', ['field' => 'description'])
                        </div>
                       
                  </div>
                </div>
              <div class="card-footer ">
                <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
              </div>
            </form>
          </div>
          <!-- end card-body -->
        </div>
      </div>
    
      <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="{{asset('/storage/upload/'.$setting->cover_photo)}}" alt="{{$setting->cover_photo}}" title="cover photo">
            </div>
            <div class="card-body">
                <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="{{asset('/storage/upload/'.$setting->logo)}}" alt="{{$setting->logo}}" title="logo">
                    <h5 class="title">{{$setting->title}}</h5>
                </a>
                <p class="email">
                {{$setting->email}}
                </p>
                <p class="description">
                {{$setting->description}}
                </p>
                </div>
          </div> 
        </div>
      </div>
    </div>
  
@endsection