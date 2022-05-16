@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Tags All',
'activePage' => 'post',
'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="card">
            <div class="card-group m-3">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary text-center">
                            <th>No</th>
                            <th>Feature</th>
                            <th>Title</th>
                            <th>Tags</th>
                            <th>User</th>
                            <th>Creation date</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @if(count($tags) > 0)
                            @foreach ($tags as $key => $post)
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if (isset($post->feature))
                                            <div>
                                                <img src="{{ asset('/storage/uploads/' . $post->feature) }}"
                                                    style="width:50px; ">
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($post->title, 30) }}</td>
                                    <td>
                                    @foreach ($post->tags as $key=>$tag)
                                    <span class="bg-primary text-white p-1 rounded-pill">{{$tag->tags}}</span>
                                    @endforeach
                                    </td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($post->created_at)->format('y-M-d') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('post.show', $post->id) }}"><button
                                                class="btn btn-secondary btn-sm">Detail</button></a>
                                        <a href="{{ route('post.edit', $post->id) }}"><button
                                                class="btn btn-primary btn-sm">Edit</button></a>
                                        <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                                            href="#exampleModalCenter"
                                            data-value="{{ $post->id }}">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                @include('post.partials.modal.delete')

                            @endforeach
                            @else
                                <tr>
                                    <td  colspan="10" class="text-center">Post Not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


