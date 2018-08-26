@extends('layouts.ajax')

{{-- Overlay background }}
<div class="SeriOverlay"></div>

{{-- Popup --}}
<div class="SeriPopup">
    <div class="sp-head">
        <span>Crew</span>
        <a href=""><i class="fa fa-times"></i></a>
    </div>
    <div class="sp-body">
        <input type="text" name="crew_search" placeholder="Type name here to search...">
        {{-- Render crew --}}
        <div class="crew-group stars">
            @foreach( $crew as $item)
                @if($image = explode(',', $item->images)[0])
                <div class="crew-box">
                    <input type="hidden" name="crew_id[]" value="{{$item->id}}" />
                    <input type="hidden" name="crew_name" value="{{strtoupper($item->name)}}" />
                    <div class="image" style="background-image: url('/img/{{ $image }}')"></div>
                    <div class="title">{{ $item->name }}</div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
