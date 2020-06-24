@extends('layouts.default')
@section('content')


    <section class="home-index welcome-animation">


        <section class="home-slider">
            @foreach($slider->items as $item)
                @php
                    $img_title = explode(' ', $item->gallery_item_title, 3);
                    $title = $img_title[0] . ' ' . $img_title[1];
                    $text = $img_title[2];
                @endphp
                <div class="slide">
                    <img src="{{asset('storage/image/'.$item->gallery_item_src)}}" alt="{{$item->gallery_item_title}}" class="thumb">
                    <div class="container">
                        <div class="row main-row">
                            <div class="col-12 col-md-auto">
                                <div class="content-holder">
                                    <div class="content">
                                        <h1>{{$title}}</h1>
                                        <p>{{$text}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>



        <section id="content" class="about-us-section">
            <div class="container">
                <div class="row header-row">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="content">
                            <h2>{{$text1}}</h2>
                            {!! $text2 !!}
                        </div>
                    </div>
                </div>

                <div class="row main-row">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('image/icons/blueprint.svg')}}" alt="">
                            </div>
                            <h3 class="title">{{$text3}}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('image/icons/construction.svg')}}" alt="">
                            </div>
                            <h3 class="title">{{$text4}}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('image/icons/engineer.svg')}}" alt="">
                            </div>
                            <h3 class="title">{{$text5}}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('image/icons/robot.svg')}}" alt="">
                            </div>
                            <h3 class="title">{{$text6}}</h3>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="item">
                            <div class="thumb">
                                <img src="{{asset('image/icons/skills.svg')}}" alt="">
                            </div>
                            <h3 class="title">{{$text7}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="company-building-section">
            <div class="container">
                <div class="row main-row">
                    <div class="col-md-8 col-lg-6">
                        <div class="content">
                            {!! $text8 !!}
                            <a href="{{route('page.show.realizacje')}}" class="button-blue">Czytaj więcej</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="offer-section">
            <div class="container">
                <div class="row header-row">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="content">
                            {!! $text9 !!}
                        </div>
                    </div>
                </div>

                <div class="row main-row">
                    @include('default.offer.home', ['max_items' => 4])
                </div>

                <div class="row footer-row">
                    <div class="col-12">
                        <div class="content">
                            {!! $text10 !!}
                            <a href="{{route('offer.index')}}" class="button-blue-outline">Cała oferta</a>
                        </div>
                        <div class="worker">
                            <img src="{{asset('image/worker.png')}}" alt="pracownik">
                        </div>
                    </div>
                </div>

            </div>
        </section>


        <section class="contact-section">
            <div class="container">
                <div class="row main-row">
                    <div class="col-md-10 col-lg-9">
                        <div class="content">
                            {!! $text11 !!}
                            <a href="{{route('page.show.kontakt')}}" class="button-grey-outline">Przejdź do kontaktu</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="references-section">
            <div class="container">
                <div class="row header-row">
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="content">
                            {!! $text12 !!}
                        </div>
                    </div>
                </div>

                <div class="row main-row">
                    <div class="col-md-11 col-lg-8 col-xl-7">
                        <div class="references-slider">
                            <div class="slide">
                                <div class="lines top left"></div>
                                <div class="lines top right"></div>
                                <div class="lines bottom right"></div>
                                <div class="lines bottom left"></div>
                                <div class="content references-slider">
                                    @include('default.realization.home')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </section>


@endsection

