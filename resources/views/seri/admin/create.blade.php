@extends('layouts.index')

@section('content')

    <div class="seri edit">

        <form method="post" action="/admin/seri/create" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="images">
                <div class="overlay"></div>
                <div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
                    <div id="drag_upload_file">
                        <p>Drop file here</p>
                        <p>or</p>
                        <p><input type="button" value="Select File" onclick="file_explorer();"></p>
                        <input type="file" id="selectfile">
                    </div>
                </div>
                <!-- <div class="slider owl-carousel">
                    @foreach(['cat.jpg'] as $item)
                        <div class="slide dropzone" style="background-image: url({{ asset('img/' . $item) }})"></div>
                    @endforeach
                </div> -->
            </div>

            <div class="seri-information container">

                <div class="row">
                    <div class="col-5 col-md-4 col-lg-3">
                        <div class="image" style="background-image:url({{ asset('img/' . 'cat.jpg')}})"></div>
                        <div class="thumbnailImage" id="uploadFile"></div>
                    </div>

                    <div class="short-information col-7 col-md-8 col-lg-9">
                        <div class="top">
                            <h1>Avengers</h1>
                            <p><textarea class="short no-style" name="short_description">The epic battle to save the world</textarea></p>

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

                    <div class="col-12 col-md-4 col-lg-3">
                        <div class="seriBar name">
                            <span>Name: </span>
                            <ul>
                                <li><input class="name_input no-style" name="name[]" value="" placeholder="Title here..."></li>
                            </ul>
                            <button class="add_input" id="name" type="button">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="seriBar type">
                            <span>Type: </span>
                            <select class="no-style" name="type">
                                @foreach(['Film', 'Anime', 'Manga', 'Cartoon'] as $item)
                                    <option>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="seriBar">
                            <span>Release date: </span>
                            <input class="no-style" type="date" name="release_date" value="15th June 1998" placeholder=""/>
                        </div>

                        <span>Genres: </span>
                        <select class="tags no-style" name="genre[]" multiple>
                            <option value="1">Action</option>
                            <option value="2">Adventure</option>
                            <option value="3">Biographical</option>
                            <option value="4">Comedy</option>
                            <option value="5">Drama</option>
                            <option value="6">Family</option>
                            <option value="7">Fantasy</option>
                            <option value="8">Gangster</option>
                            <option value="9">Historical</option>
                            <option value="10">Horror</option>
                            <option value="11">Costume drama</option>
                            <option value="12">Crime</option>
                            <option value="13">Musical</option>
                            <option value="14">Mystery</option>
                            <option value="15">War</option>
                            <option value="16">Porn</option>
                            <option value="17">Psychological thriller</option>
                            <option value="18">Disaster</option>
                            <option value="19">Roadmovie</option>
                            <option value="20">Romantic</option>
                            <option value="21">Science fiction</option>
                            <option value="22">Sports</option>
                            <option value="23">Thriler</option>
                            <option value="24">Western</option>
                            <option value="25">3D</option>
                            <option value="26">Documentary</option>
                            <option value="27">Advertisement</option>
                        </select>

                        <div class="seriBar">
                            <span>Seasons: </span>
                            <input class="no-style" type="number" name="seasons" value="" placeholder="1"/>
                        </div>

                        <div class="seriBar">
                            <span>Episodes: </span>
                            <input class="no-style" type="number" name="episodes" value="" placeholder="24"/>
                        </div>

                        <div class="seriBar">
                            <span>Aired: </span>
                            <input class="no-style" type="date" name="aired[]" value="" /> - <input class="no-style" type="date" name="aired[]" value="" />
                        </div>

                        <div class="seriBar">
                            <span>Duration: </span>
                            <input class="no-style" name="duration" value="" placeholder="23 per ep." />
                        </div>

                        <div><small class="label">*The following fields will not be shown if empty</small></div>

                        <span>Rating: </span>
                        <select class="tags no-style" name="additional_information[rating]" multiple>
                            <option value="1">G (General audience)</option>
                            <option value="2">PG (Parental Guidance Suggestion)</option>
                            <option value="3">PG-13 (Parents Strongly Cautioned)</option>
                            <option value="4">R (Restricted)</option>
                            <option value="5">NC-17 (Adults only)</option>
                            <option value="6">18+</option>
                            <option value="7">15+</option>
                            <option value="8">14+</option>
                        </select>

                        <span>Producers: </span>
                        <select class="tags no-style" name="additional_information[producers]" multiple>
                            <option value="1">TOHO Animation</option>
                            <option value="2">Shuesiha</option>
                        </select>

                        <span>Licensors: </span>
                        <select class="tags no-style" name="additional_information[licensors]" multiple>
                            <option value="1">Funimation</option>
                        </select>

                        <span>Studios: </span>
                        <select class="tags no-style" name="additional_information[bones]" multiple>
                            <option value="1">Funimation</option>
                        </select>

                        <?php // To add: episodes, aired (date to date)?, duration, rating, producers & licensors & studios? ?>
                        <?php // see also: https://myanimelist.net/anime/36456/Boku_no_Hero_Academia_3rd_Season ?>

                    </div>

                    <div class="col-12 col-md-8 col-lg-9">
                        <div class="steps">

                            <h3>Details</h3>
                            <section>
                                <div class="description expand">
                                    <h4>Description</h4>
                                    <textarea class="blend-style" name="description" placeholder="Insert description here...">Dit is een test. The Avengers, will they survive against the monsters that have taken over the earth?</textarea>
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
                                <h3>Stars</h3>
                                <div class="crew-group stars">
                                    <a class="crew-add" data-popup="crew" data-type="stars">
                                        <span><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>

                                <h3>Directors</h3>
                                <div class="crew-group directors">
                                    <a class="crew-add" data-popup="crew" data-type="directors">
                                        <span><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>

                                <h3>Cast</h3>
                                <div class="crew-group cast">
                                    <a class="crew-add" data-popup="crew" data-type="cast">
                                        <span><i class="fa fa-plus"></i></span>
                                    </a>
                                </div>

                                <h3>Writers</h3>
                                <div class="crew-group writers">
                                    <a class="crew-add" data-popup="crew" data-type="writers">
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

                        <div class="mt-3 w-100 d-flex">
                            <input type="submit" class="btn btn-primary green flatButton ml-auto" id="submit" value="Submit" />
                        </div>
                    </div>=

                </div>
        </form>

    </div>

@endsection
