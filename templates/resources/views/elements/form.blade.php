{{ csrf_field() }}

<label class="label" for="%instance%-name">@lang( '%packagename%::models.%instance%.properties.name' )</label>
<p class="control">
    <input id="%instance%-name" class="input" type="text" name="name" value="{{ $%instance%->name or '' }}" placeholder="@lang( '%packagename%::models.%instance%.properties.name' )" autofocus>
</p>

<label class="label" for="%instance%-description">@lang( '%packagename%::models.%instance%.properties.description' )</label>
<p class="control">
    <textarea id="%instance%-description" class="textarea" type="text" name="description" placeholder="@lang( '%packagename%::models.%instance%.properties.description' )">{{ $%instance%->description or '' }}</textarea>
</p>
