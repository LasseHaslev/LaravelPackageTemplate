{{ csrf_field() }}

<label class="label" for="%packagename%-name">@lang( '%packagename%::models.retail.properties.name' )</label>
<p class="control">
    <input id="%packagename%-name" class="input" type="text" name="name" value="{{ $retail->name or '' }}" placeholder="@lang( '%packagename%::models.retail.properties.name' )" autofocus>
</p>

<label class="label" for="%packagename%-slug">Slug</label>
<p class="control">
    <input id="%packagename%-slug" class="input" type="text" name="slug" value="{{ $retail->slug or '' }}" placeholder="Slug">
    <span class="help">Changing this will result in reset of "Search optimalization"</span>
</p>

<label class="label" for="%packagename%-description">@lang( '%packagename%::models.retail.properties.description' )</label>
<p class="control">
    <textarea id="%packagename%-description" class="textarea" type="text" name="description" placeholder="@lang( '%packagename%::models.retail.properties.description' )">{{ $retail->description or '' }}</textarea>
</p>
