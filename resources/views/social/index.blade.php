@extends('layouts.app', [
  'namePage' => 'Social',
  'class' => 'sidebar-mini',
  'activePage' => 'social',
])
@section('content')
<div class="panel-header panel-header-sm">
  </div>
  <!-- start content -->
  <div class="content">
    <!-- start card -->
        <div class="card">
        <!-- start section -->
       @include("alerts.custom_success")
          <!-- end section -->
          <div class="card-header">
            <h5 class="title">{{__(" Social")}}</h5>
          </div>
          <div class="card-body">
            <!-- start form -->
            <form action="{{ route('social.store') }}" method="POST" class="row g-3">
              @csrf
              <div class="col-md-4 form-group">
                  <label for="Name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name...">
               @include('alerts.feedback', ['field' => 'name'])
                </div>
                <div class="col-md-4 form-group">
                  <label for="Name" class="form-label">Icon</label>
                  <input type="text" name="icon" class="form-control" value="{{old('icon')}}" placeholder="Icon...">
               @include('alerts.feedback', ['field' => 'icon'])
                </div>
                <div class="col-md-4 form-group">
                  <label for="Name" class="form-label">Link</label>
                  <input type="text" name="link" class="form-control" value="{{old('link')}}" placeholder="link...">
               @include('alerts.feedback', ['field' => 'link'])
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-round ">{{__('Save')}}</button>
                </div>
              </form>
              <!-- end form -->
          </div>
      </div>
      {{-- Social Table --}}
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">{{_("Social Table")}}</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                  <tr class="text-red font-weight-bold">
								<th>No.</th><th>Name</th><th>Icon</th><th>Link</th><th class="text-right">Action</th>
				</tr>
                  </thead>
                  <tbody>
                  @foreach($socials as $key=>$social)
                  <tr>
                    <td>{{$socials->firstItem() +$key}}</td>
                    <td>{{$social->name}}</td>
                    <td>{{$social->icon}}</td>
                    <td>{{$social->link}}</td>
                    <td class="text-right">
                
                    <a href="#" data-toggle="modal" data-target="#Edit{{ $social->id }}">
                    <button type="button" class="btn btn-primary btn-sm">{{__('Edit')}}</button>
                                                </a>
                    <a href="#" data-toggle="modal" data-target="#Delete{{$social->id}}">
                      <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  </a>
                  </td>
                  </tr>
                  @include('social.edit')
                  @include('social.delete')
                  @endforeach
                  </tbody>
                </table>
                            {{-- Pagination --}}
                            <div class="d-flex ">
                                {!! $socials->render() !!}
                            </div>
                            {{-- End Pagination --}}
              </div>
            </div>
          </div>
        </div>
        </div>
      <!-- end card -->
  </div>
@endsection