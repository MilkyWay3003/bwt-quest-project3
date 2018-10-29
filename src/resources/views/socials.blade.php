@extends('layouts.template')

@section('content')
    <div id="map" data-address="7060 Hollywood Blvd, Los Angeles, CA"> </div>

    @include('blocks.navbar')

  <div id ="button-social-network">
        <div class="container">
            <div class="col-md-6 col-md-offset-3">

                <div id="fb-root"></div>
                <div class="fb-share-button" 
                     data-href="{{ url()->to('/participant/create') }}" 
                     data-layout="button_count" 
                     data-size="large" 
                     data-mobile-iframe="true">
                     <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->to('/participant/create') }};src=sdkpreparse" 
                     class="fb-xfbml-parse-ignore">Поделиться</a>
                </div>
                
               
                <a class="twitter-share-button"
                    href="{{ config('constants.twitter.href') }}"
                    data-text= "{{ config('constants.twitter.text') }}"
                    data-url="{{ url()->to('/participant/create') }}"
                    data-size="large"
                    data-show-count="true">
                 Tweet
                </a>

                <div class="g-plus"
                data-action="share"
                data-href="{{ url()->to('/participant/create') }}"
                data-height="28">               

                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts') 
    <script src="{{ asset('js/buttons.js') }}"></script> 
    <script src="{{ asset('js/googlemap.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.GOOGLE_API_KEY') }}&callback=initMap"></script>
    <script async defer src="https://apis.google.com/js/platform.js">  {lang: 'en-GB'}  </script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"> </script>
@endpush