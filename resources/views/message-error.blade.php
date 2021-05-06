@if ($errors->any())
  <div class="card-body">
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{ $error }}
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@elseif(session()->get('flash_success'))
  <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

    @if(is_array(json_decode(session()->get('flash_success'), true)))
      {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
    @else
      {!! session()->get('flash_success') !!}
    @endif
  </div>
@endif
