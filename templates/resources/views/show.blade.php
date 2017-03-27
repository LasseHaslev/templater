@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ $%instance%->name }}</h1>
@if ( $%instance%->description )
<div class="content">
{!! $%instance%->description !!}
</div>
@endif

@if( Auth::check() )
<a class="button is-warning" href="{{ route( '%packagename%.%instance_plural%.edit', $%instance%->id ) }}">{{ trans( 'crudlang::buttons.update', [ 'item'=>trans_choice('%packagename%::models.%instance%.name', 1) ] ) }}</a>
<a class="button is-danger" href="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}"
    onclick="event.preventDefault();
                document.getElementById('delete-form-{{ $%instance%->id }}').submit();">
{{ trans( 'crudlang::buttons.delete', [ 'item'=>trans_choice('%packagename%::models.%instance%.name', 1) ] ) }}
</a>

<form id="delete-form-{{ $%instance%->id }}" action="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
</form>
@endif

@endsection
