@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ trans( 'crudlang::pages.index.model', [ 'name'=>trans_choice( '%packagename%::models.%instance%.name', false ) ] ) }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>{{ trans( '%packagename%::models.%instance%.properties.name' ) }}</th>
            <th>{{ trans( '%packagename%::models.%instance%.properties.icon' ) }}</th>
            <th>{{ trans( '%packagename%::models.%instance%.properties.description' ) }}</th>
            <th><div class="has-text-right">Actions</div></th>
        </tr>
    </thead>
    <tbody>
@foreach( $%instance_plural% as $%instance% )
        <tr>
            <td>{{ $%instance%->name }}</td>
            <td>{{ $%instance%->icon }}</td>
            <td>{{ $%instance%->description }}</td>
            <td>
                <div class="has-text-right">
                    <a href="{{ route( '%packagename%.%instance_plural%.show', $%instance%->id ) }}"><span class="icon"><i class="fa fa-eye"></i></span></a>
                    <a href="{{ route( '%packagename%.%instance_plural%.edit', $%instance%->id ) }}"><span class="icon"><i class="fa fa-pencil"></i></span></a>
                    <a href="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}"
                        onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{ $%instance%->id }}').submit();">
                        <i class="fa fa-trash"></i>
                    </a>

                    <form id="delete-form-{{ $%instance%->id }}" action="{{ route( '%packagename%.%instance_plural%.destroy', $%instance%->id ) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE" />
                    </form>
                </div>
            </td>
        </tr>
@endforeach
    </tbody>
</table>

<a class="button is-primary" href="{{ route( '%packagename%.%instance_plural%.create' ) }}">@lang( 'crudlang::buttons.create' )</a>

@endsection
