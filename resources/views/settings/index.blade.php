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
                        {{-- Partials/Form --}}
                        @include('settings.partials.create_form')
                    </div>
                    <!-- end card-body -->
                </div>
            </div>
            {{-- Show Data left side --}}
            <div class="col-md-4">
                <div class="card card-user">
                  <div class="image">
                    <img src="{{asset('assets')}}/img/bg5.jpg" alt="...">
                  </div>
                  <div class="card-body">
                    <div class="author">
                      <a href="#">
                        <img class="avatar border-gray" src="{{asset('assets')}}/img/default-avatar.png" alt="...">
                        <h5 class="title">Company Name</h5>
                      </a>
                      <p class="text-primary">
                          example@gmail.com
                      </p>
                      <p class="text-dark">
                        Hello World
                    </p>
                    </div>
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
