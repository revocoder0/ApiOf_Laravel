@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Post Detials',
'activePage' => 'post',
'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="card">
            <div class="card-group m-3">
                
                
                <div class="card-body">
                <div class="card-title mt-3">
                    <h3 class="font-weight-bold">{{ $post->title }}</h3>
                    <p class="font-weight-bold">{{ $post->category->name }}</p>
                </div>
                <div class="card-img">
                    {{ $post->user->name }}
                       <p> Posted on {{Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</p>
                        
                    @if ($post->status===1)
                        <img src="{{ asset('/storage/uploads/' . $post->feature) }}" class="img-thumbnial w-100">
                    @endif
                </div>
                    <p>
                    {!! $post->description !!}
                    </p>
                    <p>#tagname</p>
                </div>
                
            </div>
        </div>
    </div>
@endsection
