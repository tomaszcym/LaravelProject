
@foreach($items as $item)

    <div class="col-md-6 col-lg-4">
        <div class="item-holder">
            <div class="item">
                <a href="{{route('offer.show.'. $item->id_offer)}}" title="{{$item->offer_title}}" class="thumb">
                    <img src="{{ isset($item->image) ? asset('storage/image/'.$item->image) : ''}}" alt="{{$item->offer_title}}">
                </a>
                <a href="{{route('offer.show.'. $item->id_offer)}}" title="{{$item->offer_title}}" class="content">
                    <h3 class="title heading-3">{{$item->offer_title}}</h3>
                    <div class="par-2 text">{!! $item->offer_lead !!}</div>
                </a>
            </div>
        </div>
    </div>

{{--    <div class="col-md-4">--}}
{{--        <div class="item">--}}
{{--            <a href="{{route('offer.show.'. $item->id_offer)}}" title="{{$item->offer_title}}" class="thumb">--}}
{{--                <img src="{{ isset($item->image) ? asset('storage/image/'.$item->image) : ''}}" alt="thumb">--}}
{{--            </a>--}}
{{--            <div class="content">--}}
{{--                <a href="{{route('offer.show.'. $item->id_offer)}}" title="{{$item->offer_title}}" class="title">--}}
{{--                    <h2 class="label-3 heading-line">{{$item->offer_title}}</h2>--}}
{{--                </a>--}}
{{--                @if($item->offer_price != '')--}}
{{--                    <p class="label-5 price">Już od <b>{{$item->offer_price}}</b></p>--}}
{{--                @endif--}}
{{--                <div class="par-2 text">{!! $item->offer_lead !!}</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endforeach
