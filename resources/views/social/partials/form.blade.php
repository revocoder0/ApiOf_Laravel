<!-- start form -->
<form action="{{ route('social.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
    @csrf
    <div class="col-md-4 form-group">
        <label for="Name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name...">
     @include('alerts.feedback', ['field' => 'name'])
      </div>
      <!-- start icon -->
      <div class="col-md-4">
      <label for="exampleInputPassword1">icon </label>
      <input type="file" name="image" class="form-control n-newborder" value="{{old('image')}}">
      @include('alerts.feedback', ['field' => 'image'])
      </div>
        <!-- end icon -->
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