@extends('layouts.template')

@section('content')
    <div id="map" data-address="7060 Hollywood Blvd, Los Angeles, CA"> </div>

    @include('blocks.navbar')
   
    <div id="form-container" class="container">
        @include('forms.update-form')
    </div>

  
@endsection

@push('scripts')
    <script src="{{ asset('js/userAdditionalInfo.js') }}"></script>     
    <script src="{{ asset('js/googlemap.js') }}"></script>   
    <script src="{{ asset('js/buttons.js') }}"></script>  
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ config('constants.GOOGLE_API_KEY') }}&callback=initMap"></script>
    <script async defer src="https://apis.google.com/js/platform.js">  {lang: 'en-GB'}  </script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"> </script>      
@endpush
