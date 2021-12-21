@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Posts',
    'activePage' => 'profile',
    'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
    <div class="card">
          <div class="card-header">
              <a class="btn btn-primary btn-round text-white pull-right" href="#">View All</a>
            <h4 class="card-title">Post</h4>
            <div class="col-12 mt-2">
                                        </div>
          </div>
          <div class="card-body">
            <div class="toolbar">
             
            </div>
            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                <th>No</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Short Description</th>
                  <th>Category</th>
                  <th>User</th>
                  <th>Creation date</th>
                  <th class="disabled-sorting text-right">Actions</th>
                </tr>
              </thead>
              
              <tbody>
              @foreach($posts as $key=>$post)
                <tr>
                    <td>1</td>
                    <td>
                    @if(isset($post->feature))
					<img src="{{asset('/storage/uploads/'. $post->feature)}}" class="img-thumbnial" style="width: 50px;">
					@endif
                    </td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->short_description}}</td>
                    <td>Category</td>
                    <td>Kyaw Soe Hla</td>
                    <td>{{Carbon\Carbon::parse($post->created_at)->format('y-M-d')}}</td>
                    <td class="text-right">

                    <a href="{{ route ('edit', $post->id) }}"><button class="btn btn-info btn-sm">Edit</button></a>
                    <a href=""><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure!');">Delete</button></a>
                    
                    </td>
                  </tr>
                  @endforeach
                              </tbody>
            </table>
          </div>
          <!-- end content-->
        </div>
    </div>

  
@endsection

