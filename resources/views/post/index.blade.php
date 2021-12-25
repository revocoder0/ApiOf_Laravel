@extends('layouts.app', [
    'class' => 'sidebar-mini ',
    'namePage' => 'Posts',
    'activePage' => 'index',
    'activeNav' => '',
])


@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
    <div class="card">
          <div class="card-header">
            <a class="btn btn-primary btn-round text-white pull-right" href="{{route('create')}}">Add Post</a>
            <h4 class="card-title">Post</h4>
          </div>
          <!-- table start -->
          <div class="card-body">
            <a href="#" id="deleteAllSelectedPost" class="btn btn-danger btn-sm text-white">Delete Select All</a>
            <table id="datatable" class="table table-responsive-lg" cellspacing="0" width="100%">
              <thead>
                <tr class="text-center">
                <th><input type="checkbox" class="selectAll" id="CheckAll"></th>
                <th>No</th>
                  <th>Photo</th>
                  <th>Title</th>
                  <th>Short Description</th>
                  <th>Category</th>
                  <th>User</th>
                  <th>Creation date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($posts as $key=>$post)
                <tr class="text-center" id="pid{{$post->id}}">
                    <td>
                        <input type="checkbox" name="post_ids" class="checkBoxClass"  value="{{ $post->id }}">
                    </td>
                    <td>{{++$key}}</td>
                    <td>
                    @if(isset($post->feature))
				        	  <img src="{{asset('/storage/uploads/'. $post->feature)}}" class="img-thumbnial" style="width: 50px;">
					          @endif
                    </td>
                    <td>{{ Str::limit($post->title, 20) }}</td>
                    <td> {{ Str::limit($post->short_description, 20) }}</td>
                    <td>{{$post->category_id}}</td>
                    <td>Htain Linn</td>
                    <td>{{Carbon\Carbon::parse($post->created_at)->format('y-M-d')}}</td>
                    <td>
                    <a href="{{ route ('detials', $post->id) }}"><button class="btn btn-info btn-sm">Details</button></a>
                    <a href="{{ route ('edit', $post->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                    <a href="{{ route ('delete', $post->id) }}"><button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button></a>
                    </td>
                  </tr>
                  
                  @endforeach
              </tbody>
            </table>
          </div>
          <!-- end table-->
        </div>
    </div>
@endsection

