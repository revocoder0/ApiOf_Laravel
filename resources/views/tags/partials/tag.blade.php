@foreach($tags as $key=>$tag)
<tr>
  <td>{{$tags->firstItem() +$key}}</td>
  <td>{{$tag->tags}}</td>
  <td class="text-right">
<a href="#" data-toggle="modal" data-target="#Edit{{$tag->id}}">
    <button type="button" class="btn btn-primary btn-sm">Edit</button>
</a>
<a href="#" data-toggle="modal" data-target="#Delete{{$tag->id}}">
    <button type="button" class="btn btn-danger btn-sm">Delete</button>
</a>
</td>
</tr>
@include('tags.partials.modal.edit')
 @include('tags.partials.modal.delete')
@endforeach