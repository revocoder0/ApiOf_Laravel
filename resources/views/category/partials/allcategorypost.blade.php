@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'All Posts Related To Category',
'activePage' => 'home',
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
                <h5 class="title">Posts of {{$categoryposts[0]->category->name}}</h5>
            </div>

        </div>
        {{-- Category Display Table --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Category Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <a href="#" class="btn btn-danger btn-sm" id="deleteAllSelectedRecord">{{__('Delete Select All')}}</a>
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        <input type="checkbox" id="checkAll">
                                    </th>
                                    <th>
                                        No
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                   
                                    <th>
                                        Creation Date
                                    </th>
                                    {{-- <th class="text-right">
                                        Actions
                                    </th> --}}
                                </thead>
                                <tbody>
                                    {{-- Partials/Category --}}
                                    @include('category.partials.categorypostlist')
                                </tbody>
                            </table>
                            {{-- Pagination --}}
                            <div class="d-flex ">
                                {{-- {!! $categoryposts->links() !!} --}}
                            </div>
                            {{-- End Pagination --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
