<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SeriTV</title>

        {{-- CSS --}}
        <link rel="stylesheet" type="text/css" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/libs/owlcarousel/dist/assets/owl.theme.default.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="/css/materialFormStyles.css"> --}}
        <link rel="stylesheet" type="text/css" href="/css/dropzone.css">
        <link href="/css/simply-tag.css" rel="stylesheet">
        <link href="/css/tokenize2.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/style.css">

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    </head>
    <body class="{{ str_replace('/', '_', Request::path()) }}">

        <?php // Check permissions ?>
        {{-- @include('layouts.permissions') --}}

        <?php // Add navigation ?>
        @include('layouts.nav')

        <div class="content">
            @yield('content')
        </div>

        <!-- Modal -->
        <div class="modal fade" id="crewsModal" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Modal Header</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">

                {{-- Search crew --}}

                {{-- Render crew --}}
                <div class="crew-group stars">
                    @foreach( $seri['crews'] as $item)
                        <?php $image = explode(',', $item->images)[0]; ?>
                        <div class="crew-box">
                            <input type="hidden" name="crew_id[]" value="{{$item->id}}" />
                            <div class="image" style="background-image: url('/img/'{{$image}})"></div>
                            <div class="title">{{ $item->name }}</div>
                            <div class="role">
                                <div class="actor">{{ $item->name }}</div>
                                <div class="name"><input name="crew[{{$item->id}}][role]" class="form-control" value=""></div>
                            </div>
                        </div>
                    @endforeach
                </div>

              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" id="addCrew" data-dismiss="modal">Add crew</button>
              </div>

            </div>

          </div>
        </div>

        <?php // Add footer ?>
        @include('layouts.footer')

    </body>
</html>
