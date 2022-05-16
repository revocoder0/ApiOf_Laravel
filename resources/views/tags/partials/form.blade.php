<!-- start form -->
<form action="{{route('tag_post')}}" method="POST" class="row g-3">
    @csrf
      <div class="col-md-12 form-group">
        <label for="Name" class="form-label">Name</label>
        <input type="text" name="tags" id="input" class="form-control" value="{{old('tags')}}" placeholder="Name...">
        <span id="count" style="padding-left: 93%">0 </span><span> / 40</span>
     @include('alerts.feedback', ['field' => 'tags'])
      </div>
      <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-round ">{{__('Save')}}</button>
      </div>
    </form>
    <!-- end form -->