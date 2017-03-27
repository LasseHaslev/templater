@extends( config( '<% package.name %>.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ trans( 'crudlang::pages.index.model', [ 'name'=>trans_choice( '<% package.name %>::models.<% model.instances.single %>.name', false ) ] ) }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>{{ trans( '<% package.name %>::models.<% model.instances.single %>.properties.name' ) }}</th>
            <th>{{ trans( '<% package.name %>::models.<% model.instances.single %>.properties.icon' ) }}</th>
            <th>{{ trans( '<% package.name %>::models.<% model.instances.single %>.properties.description' ) }}</th>
            <th><div class="has-text-right">Actions</div></th>
        </tr>
    </thead>
    <tbody>
@foreach( $<% model.instances.plural %> as $<% model.instances.single %> )
        <tr>
            <td>{{ $<% model.instances.single %>->name }}</td>
            <td>{{ $<% model.instances.single %>->icon }}</td>
            <td>{{ $<% model.instances.single %>->description }}</td>
            <td>
                <div class="has-text-right">
                    <a href="{{ route( '<% package.name %>.<% model.instances.plural %>.show', $<% model.instances.single %>->id ) }}"><span class="icon"><i class="fa fa-eye"></i></span></a>
                    <a href="{{ route( '<% package.name %>.<% model.instances.plural %>.edit', $<% model.instances.single %>->id ) }}"><span class="icon"><i class="fa fa-pencil"></i></span></a>
                    <a href="{{ route( '<% package.name %>.<% model.instances.plural %>.destroy', $<% model.instances.single %>->id ) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $<% model.instances.single %>->id }}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>

                    <form id="delete-form-{{ $<% model.instances.single %>->id }}" action="{{ route( '<% package.name %>.<% model.instances.plural %>.destroy', $<% model.instances.single %>->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

<a class="button is-primary" href="{{ route( '<% package.name %>.<% model.instances.plural %>.create' ) }}">@lang( 'crudlang::buttons.create' )</a>

@endsection
