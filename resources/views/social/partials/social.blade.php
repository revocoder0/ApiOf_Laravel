@foreach($socials as $key=>$social)
                  <tr>
                    <td>{{$socials->firstItem() +$key}}</td>
                    <td>{{$social->name}}</td>
                    <td class="pt-2"><a href="#" style="padding: 0rem;"><img src="{{asset('/storage/uploads/'.$social->icon)}}" data-toggle="modal"
                            data-target="#exampleModal" width="75px" height="60px" alt="..."></a></td>
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
                  @include('social.partials.modal.edit')
                  @include('social.partials.modal.delete')
                  @endforeach