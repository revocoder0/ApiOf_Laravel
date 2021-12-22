@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Setting',
'activePage' => 'Setting',
'activeNav' => '',
])

@section('content')
    <div class="panel-header panel-header-sm">

    </div>

    <div class="content">

        <div class="card">
           <!-- success -->
            @if (session('success'))
                <div class="alert alert-success text-center font-weight-bold alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close btn-close">
                        <i class="now-ui-icons btn-close ui-1_simple-remove"></i>
                    </button>
                </div>
            @endif 
            <!--end  success -->

            <div class="card-header">
                <h5 class="title">{{ __(' Setting') }}</h5>
            </div>

           <!-- start card-body -->
            <div class="card-body">
                <form class="row g-3" action="{{route('postsetting')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 form-group">
                        
                        <label for="Title" >Title</label>
                        <input type="text" name="title" class="form-control" id="title" 
                            placeholder="title">
                            @error('title')
							<small class="text-danger">{{ $message }}</small>                                  
							@enderror
                        <label for="Email" class="form-label mt-3">Email</label>
                        <input type="email" name="email" class="form-control" id="email" 
                            placeholder="name@email.com">
                            @error('email')
							<small class="text-danger">{{ $message }}</small>                                  
							@enderror
                            <div class="mb-3 mt-3 settingtext">
                                <label for="description" class="form-label ">Description</label>
                                <textarea class="form-control settingdes" name="description" id="description" rows="5" placeholder="write description"></textarea>
                                @error('description')
							    <small class="text-danger">{{ $message }}</small>                                  
							    @enderror
                            </div>
                       
                     
                    </div>

                    <div class="col-md-6">
                       
                      
                       <label for="Logo" class="form-label">Choose logo</label>
                        <input  class="form-control" type="file" name="logo" >
                        @error('logo')
							<small class="text-danger">{{ $message }}</small>                                  
						@enderror
                       
                        
                            <label for= "Coverphoto" class="form-label mt-4">Choose coverphoto</label>
                            <input  class="form-control" type="file" name="coverphoto" >
                            @error('coverphoto')
                                <small class="text-danger">{{ $message }}</small>                                  
                            @enderror
                        
                       
                        <div>
                        <button type="submit" class="btn btn-primary btn-round mt-3">{{ __('Save') }}</button>
                        </div>
                    </div>

                    

                   
                </form>
            </div>
            <!-- end card-body -->
            
        </div>
       
      

    </div>

@endsection
