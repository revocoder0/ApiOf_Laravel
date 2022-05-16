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
                    class="btn btn-primary btn-sm text-white pull-right" href="{{ route('post.create') }}">Add Post</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary text-center" >
                            <th><input type="checkbox" class="selectAll" id="CheckAll"></th>
                            <th>No</th>
                            <th>Feature</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Creation date</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           {{-- Partials/Post --}}
                           @include('post.partials.post')
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
