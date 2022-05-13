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
                        {{-- Partials/UpdateForm --}}
                        @include('settings.partials.update_form')
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
