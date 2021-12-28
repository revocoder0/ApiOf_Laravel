@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Category',
'activePage' => 'category',
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
                <h5 class="title">{{ __(' Category') }}</h5>
            </div>

            {{-- Create Category Form --}}
            <div class="card-body">
                <form class="row g-3" action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="col-md-4 form-group">
                        <label for="Name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}"
                            placeholder="Name...">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="Slug" class="form-label">{{__('Slug')}}</label>
                        <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug') }}"
                            placeholder="Slug...">
                        @error('slug')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="Order" class="form-label">{{__('Order')}}</label>
                        <input type="text" name="order" class="form-control" id="order" value="{{ old('order') }}"
                            placeholder="Order...">
                        @error('order')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-round ">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
            {{-- End Create Category Form --}}
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
                                        Name
                                    </th>
                                    <th>
                                        Slug
                                    </th>
                                    <th>
                                        Order
                                    </th>
                                    <th>
                                        Creation Date
                                    </th>
                                    <th class="text-right">
                                        Actions
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                        <tr id="category_id{{ $category->id }}">
                                            <td>
                                                <input type="checkbox" name="ids" value="{{ $category->id }}">
                                            </td>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{ $category->name }}
                                            </td>

                                            <td>
                                                {{ $category->slug }}
                                            </td>

                                            <td>
                                                {{ $category->order }}
                                            </td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($category->created_at)->format('d-m-Y') }}
                                            </td>
                                            <td class="text-right">


                                                <a href="#" data-toggle="modal"
                                                    data-target="#ModalEdit{{ $category->id }}">
                                                    <button type="button" class="btn btn-primary btn-sm">{{__('Edit')}}</button>
                                                </a>
                                                <a class="btn btn-danger btn-sm del_btn" data-toggle="modal"
                                                    href="#exampleModalCenter"
                                                    data-value="{{ $category->id }}">{{__('Delete')}}</a>

                                            </td>
                                        </tr>

                                        @include('category.modal.edit')
                                        @include('category.modal.delete')


                                    @endforeach
                                </tbody>
                            </table>
                            {{-- Pagination --}}
                            <div class="d-flex ">
                                {!! $categories->links() !!}
                            </div>
                            {{-- End Pagination --}}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
