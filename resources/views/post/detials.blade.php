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
            <div class="card-group ml-5">
                <div class="card-title">
                    <h4 class="text-center">{{ $post->title }}</h4>
                </div>
                <div class="card-img">
                    <ul class="list-inline">
                        <li class="list-inline-item"><i class="now-ui-icons ui-2_time-alarm"> </i></li>
                        {{ $post->created_at->diffForHumans() }}
                        <li class="list-inline-item ml-5"><i class="now-ui-icons users_single-02"></i></li>
                        {{ $post->user->name }}
                    </ul>
                    @if ($post->status===1)
                        <img src="{{ asset('/storage/uploads/' . $post->feature) }}" class="img-thumbnial" style="width: 50%;">
                    @endif
                    
                    <ul class="list-inline">
                        <li class="list-inline-item">Arakan Reader, </li>
                        <li class="list-inline-item">{{ Carbon\Carbon::parse($post->created_at)->format('y-M-d') }}</i></li>
                    </ul>
                </div>
                <div class="card-body">
                    {!! $post->description !!}
                </div>
                <div class="card-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">tagname</li>
                        <li class="list-inline-item">{{ $post->category->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
