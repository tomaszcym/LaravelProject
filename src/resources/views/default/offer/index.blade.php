@extends('layouts.default')
@section('content')


    <section id="content" class="offer-index welcome-animation">

        <section class="main-section">
            <section class="offer-section">
                <div class="container">
                    <div class="row header-row">
                        <div class="col-12 col-md-10 col-lg-8">
                            <div class="content">
                                {!! $fields['text13'] !!}
                            </div>
                        </div>
                    </div>

                    <div class="row main-row">
                        @include('default.offer.home')
                    </div>
                </div>
            </section>
        </section>

    </section>


@endsection
