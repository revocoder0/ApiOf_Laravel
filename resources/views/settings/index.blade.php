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
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                        @include('alerts.feedback', ['field' => 'title'])
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __(' Email address') }}</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <label>Logo</label> <br>

                                    <img id="logo"><br>

                                    <div class="form-group text-center btn btn-dark btn-sm">
                                        <input type="file" name="logo" id="image" class="inputfile"
                                            onchange="previewLogo(event)" autofocus />
                                        <label for="file">Change Logo</label>

                                    </div><br />
                                    <label>Cover Photo</label><br>

                                    <img id="output"><br>

                                    <div class="form-group text-center btn btn-dark btn-sm">
                                        <input type="file" name="coverphoto" id="image" class="inputfile"
                                            onchange="previewImage(event)" autofocus />
                                        <label for="file">Change Cover Photo</label>

                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="description">{{ __(' Description') }}</label>
                                        <textarea name="description" id="description" rows="5" class="form-control"
                                            placeholder="write description"></textarea>
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
