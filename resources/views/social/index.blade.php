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
            {{-- Partials/Form --}}
            @include('social.partials.form')
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
                  {{-- Partials/social --}}
                  @include('social.partials.social')
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