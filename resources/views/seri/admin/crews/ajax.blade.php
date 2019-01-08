{{-- Overlay background --}}
<div class="SeriOverlay">

    {{-- Popup --}}
    <div class="SeriPopup">
        <div class="sp-head">
            <span>Crew</span>
            <button class="closeButton"><i class="fa fa-times"></i></button>
        </div>
        <div class="sp-body">

            <input type="text" name="crew_search" placeholder="Type name here to search...">
            {{-- Render crew --}}
            <div class="crew-group {{ $crew_type }}">
                @foreach( $crew as $index => $item)
                    @if($image = explode(',', $item->images)[0])
                    <div class="crew-box {{ ($offset ?: 0) < $index+1 && $index+1 <= ($offset + $amount) ? '' : 'd-none' }}">
                        <input type="hidden" name="crew_id[]" value="{{ $item->id }}" />
                        <input type="hidden" name="crew_name" value="{{ strtoupper($item->name) }}" />
                        <div class="image" style="background-image: url('/img/{{ $image }}')"></div>
                        <div class="title"><span title="{{ $item->name }}">{{ $item->name }}</span></div>
                        <div class="role">
                            <div class="actor">{{ $item->name }}</div>
                            <div class="name"><input name="crew[{{$crew_type}}][{{$item->id}}][role][]" class="form-control"></div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            <ul class="pagination">
              <?php $PagIndex = 0; ?>
              @foreach( $crew as $index => $item)
                  @if($image = explode(',', $item->images)[0] && ($index+1) % 9 == 1)
                      <li class="page-item {{ $offset == ($PagIndex ? $PagIndex * 9 + 1 : 0) ? 'active' : ''}}"><a class="page-link">{{ $PagIndex++ }}</a></li>
                  @endif
              @endforeach
            </ul>

        </div>
        <div class="sp-footer">
            <button class="btn btn-primary addButton">Add crew</button>
        </div>
    </div>

</div>
