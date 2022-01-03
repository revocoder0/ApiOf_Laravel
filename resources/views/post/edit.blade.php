@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Posts',
'activePage' => 'post',
'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="card">
            @include('alerts.custom_success')


            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __(' Edit Post') }}</h5>
                        </div>
                        <div class="card-body">

                            <form method="post" action="{{ route('postupdate', $posts->id) }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('alerts.success')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input class="form-control" placeholder="{{ __('Title...') }}" type="text"
                                                name="title" value="{{ $posts->title }}" autofocus>
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Row for tags -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Tags</label>
                                            <select name="tags[]" id="tags" class="form-control" multiple>
                                                <option selected disabled>Select Tags</option>
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                       @if (isset($post))
                                                            @if ($post->hasTag($tag->id))
                                                                selected
                                                            @endif
                                                       @endif
                                                    >
                                                        {{ $tag->tags }}</option>
                                                @endforeach
                                            </select>
                                            @error('tags')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                            <!-- end row for tags -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="title">Description</label>
                                            <textarea name="description" class="form-control" row="10" col="10"
                                                id="summernote">{{ $posts->description }}</textarea>
                                            @error('description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="Short Description">Short Desciption</label>
                                        <textarea class="form-control description" rows="10"
                                            placeholder="{{ __('Short Description...') }}"
                                            name="short_description">{{ $posts->short_description }}</textarea>
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

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $posts->category->id ? 'selected' : null }}>
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
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Edit Date</label>
                                            <input class="form-control" placeholder="{{ __('Date...') }}" type="date"
                                                name="created_at" value="{{Carbon\Carbon::parse($posts->created_at)->format('y-M-d')}}" autofocus>
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                            <div class="row">
                                <label class="m-3">Feature</label>
                                <div class="card-body">
                                    <img src="{{ asset('/storage/uploads/' . $posts->feature) }}" id="output">
                                </div>
                                <div class="w-100 m-3 form-group text-center btn btn-dark btn-sm">
                                    <input type="file" name="feature" id="image" class="inputfile"
                                        onchange="updateImage(event)" autofocus />
                                    <label for="file">Choose a feature image</label>
                                </div>
                                @error('feature')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <input class="m-3" name="status" type="checkbox" value="1" @if( old('status', $posts->status ?? false) ) checked='checked' @endif>
                                <label class="m-3">Show Feature</label>
                            </div> <!-- end row -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-danger" style="width:100%">Reset</button>
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary" style="width:100%" value="Update">
                                </div>
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
            function updateImage(event) {
                var replace = document.getElementById('output');
                replace.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>
    @endpush
