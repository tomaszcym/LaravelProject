@extends('layouts.default')
@section('content')

    <section class="realization-index welcome-animation page-index triangle bottom-left">

        <section class="realization-section">
            <div class="container">
                <div class="row main-row mb-5">
                    <div class="col-12">
                        <div class="content">
                            <h2 class="heading-2 heading-line mb-5">Galeria</h2>
                        </div>
                    </div>
                </div>

                <div class="row realization-row">

                    @foreach($items as $item)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <div class="item">
                                <a href="{{$item->seo->url}}" title="{{$item->realization_title}}" class="thumb">
                                    <img src="{{asset('storage/image/'.$item->realization_img)}}" alt="{{$item->realization_title}}" class="img-fluid">
                                </a>
                                <a href="{{$item->seo->url}}" title="{{$item->realization_title}}" class="content">
                                    <h2 class="label-3 title">{{$item->realization_title}}</h2>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </section>

@endsection
