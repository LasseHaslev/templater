{{ csrf_field() }}

<label class="label" for="<% model.instances.single %>-name">@lang( '<% package.name %>::models.<% model.instances.single %>.properties.name' )</label>
<p class="control">
    <input id="<% model.instances.single %>-name" class="input" type="text" name="name" value="{{ $<% model.instances.single %>->name or '' }}" placeholder="@lang( '<% package.name %>::models.<% model.instances.single %>.properties.name' )" autofocus>
</p>

<label class="label" for="<% model.instances.single %>-description">@lang( '<% package.name %>::models.<% model.instances.single %>.properties.description' )</label>
<p class="control">
    <textarea id="<% model.instances.single %>-description" class="textarea" type="text" name="description" placeholder="@lang( '<% package.name %>::models.<% model.instances.single %>.properties.description' )">{{ $<% model.instances.single %>->description or '' }}</textarea>
</p>
