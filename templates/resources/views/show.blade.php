@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ $<% model.instances.single %>->name }}</h1>
@if ( $<% model.instances.single %>->description )
<div class="content">
{!! $<% model.instances.single %>->description !!}
</div>
@endif

@if( Auth::check() )
<a class="button is-warning" href="{{ route( '<% package.name %>.<% model.instances.plural %>.edit', $<% model.instances.single %>->id ) }}">{{ trans( 'crudlang::buttons.update', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instances.single %>.name', 1) ] ) }}</a>
<a class="button is-danger" href="{{ route( '<% package.name %>.<% model.instances.plural %>.destroy', $<% model.instances.single %>->id ) }}"
    onclick="event.preventDefault();
                document.getElementById('delete-form-{{ $<% model.instances.single %>->id }}').submit();">
{{ trans( 'crudlang::buttons.delete', [ 'item'=>trans_choice('<% package.name %>::models.<% model.instances.single %>.name', 1) ] ) }}
</a>

<form id="delete-form-{{ $<% model.instances.single %>->id }}" action="{{ route( '<% package.name %>.<% model.instances.plural %>.destroy', $<% model.instances.single %>->id ) }}" method="POST" style="display: none;">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE" />
</form>
@endif

@endsection
