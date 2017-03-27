@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.edit.model', [ 'name'=>trans_choice( '%packagename%::models.%instance%.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '%packagename%.%instance_plural%.update', $%instance%->id ) }}">
        <input type="hidden" name="_method" value="PUT">
@include( '%packagename%::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.update', [ 'item'=>trans_choice('%packagename%::models.%instance%.name', 1) ] )</button>

                    <a class="button is-danger" href="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $%instance%->id }}').submit();">
@lang( 'crudlang::buttons.delete', [ 'item'=>trans_choice('%packagename%::models.%instance%.name', 1) ] )
                    </a>

        <a href="{{ route( '%packagename%.%instance_plural%.index' ) }}" class="button is-default">@lang( 'crudlang::buttons.cancel' )</a>
    </form>
                    <form id="delete-form-{{ $%instance%->id }}" action="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
</div>

@endsection
