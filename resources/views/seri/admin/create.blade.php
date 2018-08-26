@extends('layouts.index')

@section('content')

    <div class="seri edit">

        <form method="post" action="/admin/seri/create" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="images">
                <div class="overlay"></div>
                <div class="slider owl-carousel">
                    @foreach(['cat.jpg'] as $item)
                        {{-- <img class="image" src="{{ asset('img/' . $item) }}" /> --}}
                        <div class="slide" style="background-image: url({{ asset('img/' . $item) }})"></div>
                    @endforeach
                </div>
            </div>

            <div class="seri-information container">

                <div class="row">
                    <div class="col-5 col-md-4 col-lg-3">
                        <div class="image" style="background-image:url({{ asset('img/' . 'cat.jpg')}})"></div>
                    </div>

                    <div class="short-information col-7 col-md-8 col-lg-9">
                        <div class="top">
                            <h1>Avengers</h1>
                            <p><textarea class="short no-style" name="short-description">The epic battle to save the world</textarea></p>

                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>

                        <div class="bottom sections hidden-xs-down">

                        </div>

                    </div>
                </div>
                <div class="row seri-body">

                    <div class="sections hidden-sm-up">

                    </div>

                    <div class="col-5 col-md-4 col-lg-3">
                        <div class="seriBar name">
                            {{-- <h2>Genres</h2> --}}
                            <span>Name: </span>
                            <ul>
                                @foreach(['Avengers', 'The Avengers'] as $item)
                                <li><input class="name_input no-style" name="name[]" value="{{ $item }}" placeholder="Title here..."></li>
                                @endforeach
                            </ul>
                            <button class="add_input" id="name" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        {{-- <div class="seriBar genre">
                            <span>Genres: </span>
                            <ul>
                                @foreach(['action', 'horror'] as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div> --}}

                        <div class="seriBar type">
                            <span>Type: </span>
                            <select class="no-style" name="type">
                                @foreach(['Film', 'Animated'] as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="seriBar type">
                            <span>Release date: </span>
                            <input class="no-style" type="date" name="release_date" value="15th June 1998" placeholder=""/>
                        </div>

                        <span>Genres: </span>
                        <select class="genre_select no-style" name="genre[]" multiple>
                          <option value="1">Acura</option>
                          <option value="2">Audi</option>
                          <option value="3">BMW</option>
                          <option value="4">Cadillac</option>
                          <option value="5">Chevrolet</option>
                          <option value="6">Ferrari</option>
                          <option value="7">Ford</option>
                          <option value="8">Honda</option>
                          <option value="9">Lexus</option>
                          <option value="10">Mercedes-Benz</option>
                        </select>

                        <?php // To add: episodes, aired (date to date)?, duration, rating, producers & licensors & studios? ?>
                        <?php // see also: https://myanimelist.net/anime/36456/Boku_no_Hero_Academia_3rd_Season ?>

                    </div>

                    <div class="col-7 col-md-8 col-lg-9">
                        <div class="steps">
                            <h3>Details</h3>
                            <section>
                                <div class="description expand">
                                    <h4>Description</h4>
                                    <textarea class="blend-style" placeholder="Insert description here...">Dit is een test. The Avengers, will they survive against the monsters that have taken over the earth?</textarea>
                                    {{-- <p>Dit is een test. The Avengers, will they survive against the monsters that have taken over the earth?</p> --}}
                                    {{-- <a href="#readmore" class="readmore">Read more</a> --}}
                                </div>
                                <div class="background expand">
                                    <h4>Background information</h4>
                                    <textarea class="blend-style" placeholder="Insert description here...">No background information has been added</textarea>
                                </div>
                            </section>
                            <h3>Videos</h3>
                            <section>
                                <p>Scroll down or up to see the other demos.</p>
                            </section>
                            <h3>Reviews</h3>
                            <section>
                                <p>For more information <a href="https://github.com/rstaib/jquery-steps/wiki">check out the documentation</a>!</p>
                            </section>
                            <h3>Recommendations</h3>
                            <section>
                                <p>See on getting started!</p>
                            </section>
                            <h3>Crew</h3>
                            <section>
                                <div class="crew-group stars">
                                    <?php //TODO change so it actually renders crew from popup ?>
                                    <div class="crew-box" style="background-image: url('/img/<?=$seri['crews'][0]->images?>')">
                                        <input type="hidden" name="crew_id[]" value="<?=$seri['crews'][0]->id?>">
                                    </div>
                                    <a href="#" class="crew-add" data-popup="crews">
                                        <span><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>
                                <div class="form-group">
                                    <div class="col-6">
                                        <label class="labels" for="stars">Stars</label>
                                        <select type="text" class="formInput" id="stars" name="stars[]" multiple>
                                            <option></option>
                                            @foreach($seri['crews'] as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-6">
                            <label class="labels" for="Name">Name</label>
                            <input type="text" class="formInput" id="Name" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-6">
                            <label class="labels" for="description">Description</label>
                            <input type="text" class="formInput" id="description" name="description">
                        </div>
                        <div class="col-6">
                            <label class="labels" for="release_date">Release date</label>
                            <input type="date" class="formInput" id="release_date" name="release_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-6">
                            <label class="labels" for="type">Type</label>
                            <select type="text" class="formInput" id="type" name="type">
                                <option disabled></option>
                                @foreach($seri['types'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="labels" for="genre">Genre</label>
                            <select type="text" class="formInput" id="genre" name="genre[]" multiple>
                                <option></option>
                                @foreach($seri['genres'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">


                        <div class="col-6">
                            <label class="labels" for="writers">Writers</label>
                            <select type="text" class="formInput" id="writers" name="writers[]" multiple>
                                <option></option>
                                @foreach($seri['crews'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="labels" for="directors">Directors</label>
                            <select type="text" class="formInput" id="directors" name="directors[]" multiple>
                                <option></option>
                                @foreach($seri['crews'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="labels" for="cast">Cast</label>
                            <select type="text" class="formInput" id="cast" name="cast[]" multiple>
                                <option></option>
                                @foreach($seri['crews'] as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <input type="submit" class="btn btn-primary green flatButton" id="submit" value="Submit" />
                        </div>
                    </div>

                </div>
        </form>

    </div>

@endsection
