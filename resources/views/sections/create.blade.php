@include('sections.show')

@include('errors.errors')

@if(\Auth::check())
    @include('sections.form')
@endif