@extends('layouts.default')
@section('content')

    <section class="realization-index page-index triangle bottom-right">

        <section class="realization-section">
            <div class="container">
                <div class="row main-row mb-5">
                    <div class="col-12">
                        <div class="content">
                            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-between mb-4">
                                <h2 class="heading-2 heading-line">{{$item->realization_title}}</h2>
                                <a href="{{route('realization.index')}}" class="button-primary">Powrót do galerii</a>
                            </div>


                            @if($item->realization_lead)
                                <div class="par-2 mb-5">{!! $item->realization_lead !!}</div>
                            @endif

                            @if($item->realization_text)
                                <div class="par-2 mb-5">{!! $item->realization_text !!}</div>
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
                    @else
                        Dodaj nową galerię o nazwie - gallery1
                    @endif
                </div>

            </div>
        </section>

    </section>

@endsection
