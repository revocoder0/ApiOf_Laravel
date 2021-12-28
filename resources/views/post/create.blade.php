@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Posts',
'activePage' => 'post',
'activeNav' => '',
])
<style>

</style>

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="card">
            {{-- Success Message --}}
            @include('alerts.custom_success')
            {{-- End Success Message --}}
            <div class="row">
                {{-- start col --}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __(' Add Posts') }}</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('poststore') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                @include('alerts.success')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" placeholder="{{ __('Title...') }}" type="text"
                                                name="title" value="{{ old('title') }}" autofocus>
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Description</label>
                                            <textarea name="description" class="form-control" row="5" col="10"
                                                id="summernote" autofocus>{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div> <!-- end card -->
                </div>
                {{-- end col --}}
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Short Description">Short Desciption</label>
                                        <textarea class="form-control description" rows="10"
                                            placeholder="{{ __('Short Description...') }}" name="short_description"
                                            autofocus>{{ old('short_description') }}</textarea>
                                        @error('short_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Category</label>
                                        <select name="category" class="form-control">
                                            <option selected disabled>Choose a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == old('category') ? 'selected' : null }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="m-3">Feature</label>
                                <div class="card-body">
                                    <img id="output">
                                </div>
                                <div class="w-100 m-3 form-group text-center btn btn-dark btn-sm">
                                    <input type="file" name="feature" id="image" class="inputfile"
                                        onchange="previewImage(event)" autofocus />
                                    <label for="file">Choose a feature image</label>

                                </div>
                                @error('feature')
                                    <div class="text-danger m-3">{{ $message }}</div>
                                @enderror
                            </div> <!-- end row -->

                            <div class="row">
                                <input type="checkbox" name="status" id="showFeature" class="m-3" value="1">
                                <label class="m-3">Show Feature</label>
                            </div> <!-- end row -->
                            
                            <div class="row mt-4">
                                <!-- submit and reset button -->
                                <div class="col-md-6">
                                    <button class="btn btn-danger" type="reset" style="width:100%">Reset</button>
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
    @push('js')
        <script>
            //For image preview
            function previewImage(event) {
                var output = document.getElementById('output');
                output.src = URL.createObjectURL(event.target.files[0]);
            }
            //Show Feature 
            
        </script>
    @endpush
