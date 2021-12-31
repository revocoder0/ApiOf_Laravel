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
            {{-- Success Message --}}
            @include('alerts.custom_success')
            {{-- End Success Message --}}
            <div class="card-header">
                <h4 class="card-title font-weight-bold">Post</h4>
            </div>
            <!-- table start -->
            <div class="card-body">
                <a href="#" id="deleteAllSelectedPost" class="btn btn-danger btn-sm text-white">Delete Select All</a> <a
                    class="btn btn-primary btn-sm text-white pull-right" href="{{ route('postcreate') }}">Add Post</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary text-center">
                            <th><input type="checkbox" class="selectAll" id="CheckAll"></th>
                            <th>No</th>
                            <th>Feature</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Status</th>
                            <th>Creation date</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($posts) > 0)
                            @foreach ($posts as $key => $post)
                                <tr id="pid{{ $post->id }}" class="text-center">
                                    <td>
                                        <input type="checkbox" name="post_ids" class="checkBoxClass"
                                            value="{{ $post->id }}">
                                    </td>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        @if (isset($post->feature))
                                            <div>
                                                <img src="{{ asset('/storage/uploads/' . $post->feature) }}"
                                                    style="width:50px; ">
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($post->title, 20) }}</td>
                                    <td> {{ Str::limit($post->short_description, 20) }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ Carbon\Carbon::parse($post->created_at)->format('y-M-d') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('detials', $post->id) }}"><button
                                                class="btn btn-secondary btn-sm">Detail</button></a>
                                        <a href="{{ route('postedit', $post->id) }}"><button
                                                class="btn btn-primary btn-sm">Edit</button></a>
                                        <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                                            href="#exampleModalCenter"
                                            data-value="{{ $post->id }}">{{ __('Delete') }}</a>
                                    </td>
                                </tr>
                                @include('post.modal.delete')

                            @endforeach
                            @else
                                <tr>
                                    <td  colspan="10" class="text-center">Post Not Found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {{-- Pagination --}}
                    <div class="d-flex ">
                        {!! $posts->links() !!}
                    </div>
                    {{-- End Pagination --}}
                </div>
            </div>
            <!-- end table-->
        </div>
    </div>
@endsection
