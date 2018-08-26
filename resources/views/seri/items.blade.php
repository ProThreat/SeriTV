@extends('layouts.index')

@section('content')
    
    <div class="flex">
        @foreach([
                    [
                        'image' => 'pexels-photo(1).jpg',
                        'title' => 'Test 1 titel',
                        'description' => 'Dit is de description van test 1',
                        'categories' => ['Action', 'Fantasy', 'RPG', 'test1', 'test2'],
                    ],
                    [
                        'image' => 'test2.png',
                        'title' => 'Test 2 titel',
                        'description' => 'Dit is de description van test 2',
                        'categories' => ['Multiplayer', 'Fantasy', 'RPG'],
                    ],
                    [
                        'image' => 'test3.png',
                        'title' => 'Test 3 titel',
                        'description' => 'Dit is de description van test 3',
                        'categories' => ['Action', 'Test', 'RPG'],
                    ]
                ] as $item)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="item">
                    <div class="top">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>
                        <span>Weather</span>
                        <i class="fa fa-window-maximize" aria-hidden="true"></i>
                    </div>

                    <div class="image" style="background-image: url('{{ Storage::url('img/'.$item['image']) }}')" ></div>

                    <div class="item-overflow">
                        <div class="title">{{ $item['title'] }}</div>
                        <div class="description">{{ $item['description'] }}</div>
                        <div class="categories owl-carousel owl-theme">
                            @foreach($item['categories'] as $category)
                                <div class="slide">{{ $category }}</div>
                            @endforeach
                        </div>
                    </div>

                    <div class="go-to-item"><a class="btn btn-primary" href="#">Go to Seri</a></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
