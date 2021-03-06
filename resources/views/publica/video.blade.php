@extends('publica.templates.main')

@section('name')
    ARTIO
@endsection

@section('body')

<link rel="stylesheet" href="{{ asset('css/public-navbar.css') }}">

<div id="vcontainer" class="container" style="min-height: 100vh">
    <h1 class="text-center font-weight-light mt-5 delighted-text mb-2">@lang('video.title')</h1>
    <video width="720" height="480" controls class="mx-auto mt-4" style="width: 100%; height: auto">
        <source src="{{ asset('media/publica/SPAM_DEFDEF.mp4') }}" type="video/mp4">
        @lang('video.videoFail')
    </video>
    <h3 class="hidden-video text-center font-weight-light mt-5 delighted-text">@lang('video.qq')</h3>
    <h4 id="pregunta" class="hidden-video text-center font-weight-light mt-5">¿Cuántos perros de razas potencialmente peligrosas crees que SPAM acogió en este último año?</h4>
    <div class="row my-5 justify-content-center">

    </div>
    <h2 class='text-center font-weight-light mt-5 delighted-text mb-5' style='display: none'>@lang('video.thxLbl')</h2>
    <button type="button" class="btn btn-success mb-5 btn-sx" style='display: none'>@lang('video.retBtn')</button>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/video.js') }}"></script>
@endsection
