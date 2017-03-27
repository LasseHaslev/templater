@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.create.model', [ 'name'=>trans_choice( '%packagename%::models.%instance%.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '%packagename%.%instance_plural%.store' ) }}">
@include( '%packagename%::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.create' )</button>
        <a href="{{ route( '%packagename%.%instance_plural%.index' ) }}" class="button is-default">@lang( 'crudlang::buttons.cancel' )</a>
    </form>
</div>

@endsection
