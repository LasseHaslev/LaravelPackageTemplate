@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ trans( 'crudlang::pages.index.model', [ 'name'=>trans_choice( '%packagename%::models.retail.name', false ) ] ) }}</h1>
<crud-table
:heads="[ '{{ trans( '%packagename%::models.retail.properties.name' ) }}', '{{ trans( '%packagename%::models.retail.properties.description' ) }}', { name: 'Actions', style: {'text-align':'right'} } ]"
:properties="[ 'name', 'description' ]"
:show-url="function( item ) { return '/backend/%packagename%/' + item.id; }"
:edit-url="function( item ) { return '/backend/%packagename%/' + item.id + '/edit'; }"
:delete-url="function( item ) { return '/api/%packagename%/' + item.id; }"
:objects="{{ $%packagename% }}"></crud-table>

<a class="button is-primary" href="{{ route( '%packagename%.create' ) }}">@lang( 'crudlang::buttons.create' )</a>

@endsection
