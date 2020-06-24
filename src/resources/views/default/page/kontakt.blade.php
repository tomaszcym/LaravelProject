@extends('layouts.default')
@section('content')

    <section id="content" class="contact-index welcome-animation">


        <div class="container">
            <div class="row header-row">
                <div class="col-12">
                    <div class="content">
                        <h2>Kontakt</h2>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6">
                    <div class="company">
                        <h3 class="heading-4">Dane kontaktowe</h3>
                        <p class="par-2 text">
                            <strong>{{GetConstField('company_name')}}</strong>
                        </p>
                        <div class="par-2 text mb-5">
                            {!! GetConstField('address') !!}
                        </div>

                        <h3 class="heading-4 mb-3">Zadzwoń do nas</h3>
                        <div>
                            <a href="mailto:{{GetConstField('email_1')}}" class="par-2">
                                <i class="far fa-envelope color-pink"></i>
                                {{GetConstField('email_1')}}
                            </a>
                        </div>
                        <div class="mb-5">
                            <a href="tel:{{GetConstField('phone_1')}}" class="par-2">
                                <i class="fas fa-mobile-alt color-pink"></i>
                                {{GetConstField('phone_1')}}
                            </a>
                            <br>
                            <br>
                            <p>{{GetConstField('page_owner')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="heading-4 mb-4">Formularz kontaktowy</h3>
                    @include('default.forms.contact_form')
                </div>
            </div>

        </div>

    </section>


    <div class="map">
        <iframe src="{{GetConstField('map_link')}}"
                frameborder="0" style="border:0; width: 100%; height: 450px" allowfullscreen=""
                aria-hidden="false" tabindex="0"></iframe>
    </div>


    <script>
        $(document).ready(e => {
            $('.footer-global .map').hide();
        });
    </script>


@endsection

