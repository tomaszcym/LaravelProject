@extends('layouts.default')
@section('content')

    <section class="single-offer-index welcome-animation">

        <div class="container">
            <div class="row main-row mb-5">
                <div class="col-12">
                    <div class="content">
                        <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-4">
                            <h2 class="heading-3 heading-line ">{{$item->offer_title}}</h2>
                            <a href="{{route('offer.index')}}" class="button-blue-outline">Powrót do oferty</a>
                        </div>


                        @if($item->offer_price)
                            <p class="label-5 price">Już od <b>{{$item->offer_price}}</b></p>
                        @endif
                        @if($item->offer_external_url)
                            <a href="{{$item->offer_external_url}}" target="_blank">Przejdź do oferty</a>
                        @endif
                        <hr>

                        @if($item->offer_lead)
                            <div class="par-2 mb-5">{!! $item->offer_lead !!}</div>
                        @endif

                        @if($item->offer_text)
                            <div class="par-2 mb-5">{!! $item->offer_text !!}</div>
                        @endif
                    </div>
                </div>
            </div>


            <div class="row gallery-row lightbox-gallery">
                @if(isset($item->gallery1))
                    @foreach($item->gallery1->items as $item)
                        <div class="col-md-4 col-lg-3">
                            <a href="{{asset('storage/image/'. $item->gallery_item_src)}}">
                                <img src="{{asset('storage/image/'. $item->gallery_item_src)}}" alt="{{$item->gallery_item_title}}" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section>


@endsection
