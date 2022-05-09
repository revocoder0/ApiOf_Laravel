@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Setting',
'activePage' => 'setting',
'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    @include('alerts.custom_success')
                    <div class="card-header">
                        <h5 class="title">{{ __('Setting') }}</h5>
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
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <label for="title">{{ __(' Title') }}</label>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $setting->title ? $setting->title : null }}" placeholder="Title">
                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"
                                            value="{{ $setting->email ? $setting->email : null }}">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <label>Logo</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group text-center btn btn-dark btn-sm">
                                                <input type="file" name="logo" id="image" class="inputfile"
                                                    onchange="previewLogo(event)" autofocus />
                                            
                                                <label for="file">Choose file </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <img id="logo" width="80"><br>
                                        </div>
                                    </div>

                                    <label>Cover Photo</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group text-center btn btn-dark btn-sm">
                                                <input type="file" name="coverphoto" id="image" class="inputfile"
                                                    onchange="previewImage(event)" autofocus />
                                                <label for="file">Choose file</label>
        
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <img id="output" width="100"><br>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="description">{{ __(' Description') }}</label>
                                        <textarea name="description" id="description" rows="5" class="form-control"
                                            placeholder="write description">{{ $setting->description ? $setting->description : null }}</textarea>
                                        @include('alerts.feedback', ['field' => 'description'])
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-primary btn-round">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('/storage/upload/' . $setting->cover_photo) }}"
                            alt="{{ $setting->cover_photo }}" title="cover photo">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('/storage/upload/' . $setting->logo) }}"
                                    alt="{{ $setting->logo }}" title="logo" class="w-80">
                                <h5 class="title">{{ $setting->title }}</h5>
                            </a>
                            <p class="text-primary">
                                {{ $setting->email }}
                            </p>
                            <p class="text-dark">
                                {{ $setting->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @push('js')
        <script>
            //For image preview
            function previewImage(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            }
            //For image preview
            function previewLogo(event) {
                var logo = document.getElementById('logo');
                logo.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    @endpush
