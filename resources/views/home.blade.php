@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
  <div class="panel-header panel-header-sm">
    <canvas id="bigDashboardChart"></canvas>
  </div>
  <div class="content">
    <div class="row">
      @foreach ($category_posts_count as $category)
      <div class="col-lg-3">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">{{$category->posts->count()}} posts</h5>
            <h4 class="card-title"><a href="{{route('categoryposts', $category->id)}}" class="text-decoration-none">{{$category->name}}</a></h4>
            {{-- <div class="dropdown">
              <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                <i class="now-ui-icons loader_gear"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div> --}}
          </div>
          <div class="card-body">
            <!-- <div class="chart-area">
              <canvas id="lineChartExample"></canvas>
            </div> -->
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons design_bullet-list-67"></i> Category
            </div>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <div class="row">
    <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">All Tags List</h5>
            <h4 class="card-title"> Tag</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Posts
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      FPNCC Member
                    </td>
                    <td>
                      100
                    </td>
                  
                  </tr>
                  <tr>
                    <td>
                      ULA/AA
                    </td>
                    <td>
                      50
                    </td>
                  </tr>
                  <tr>
                    <td>
                      MNDAA
                    </td>
                    <td>
                      30
                    </td>
                  </tr>
                  <tr>
                    <td>
                      TNLA
                    </td>
                    <td>
                      20
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5 class="card-category">All Categories List</h5>
            <h4 class="card-title"> Category</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Name
                  </th>
                  <th>
                    Posts
                  </th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      FPNCC Member
                    </td>
                    <td>
                      100
                    </td>
                  
                  </tr>
                  <tr>
                    <td>
                      ULA/AA
                    </td>
                    <td>
                      50
                    </td>
                  </tr>
                  <tr>
                    <td>
                      MNDAA
                    </td>
                    <td>
                      30
                    </td>
                  </tr>
                  <tr>
                    <td>
                      TNLA
                    </td>
                    <td>
                      20
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
@endpush