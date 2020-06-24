
@foreach($items as $item)
    <div class="reference">
        <div>{!! $item->realization_text !!}</div>
        <h4>{{$item->realization_lead}}</h4>
    </div>
@endforeach

