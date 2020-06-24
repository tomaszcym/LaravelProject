@extends('layouts.default')
@section('content')


    <section id="content" class="gallery-index welcome-animation">



        <div class="container">
            <div class="row header-row">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="content">
                            {!! $text14 !!}
                    </div>
                </div>
            </div>

            <div class="row gallery-row lightbox-gallery">
                @if(isset($gallery1))
                    @foreach($gallery1->items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <a href="{{asset('storage/image/'. $item->gallery_item_src)}}">
                                <img src="{{asset('storage/image/'. $item->gallery_item_src)}}" alt="{{$item->gallery_item_title}}" title="{{$item->gallery_item_title}}" class="img-fluid">
                            </a>
                        </div>
                    @endforeach
                @else
                    Dodaj nową galerię o nazwie - gallery1
                @endif
            </div>
        </div>


    </section>



@endsection
