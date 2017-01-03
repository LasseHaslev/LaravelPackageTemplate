@extends( config( 'retails.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ trans( 'crudlang::pages.index.model', [ 'name'=>trans_choice( 'retails::models.retail.name', false ) ] ) }}</h1>
<crud-table
:heads="[ '{{ trans( 'retails::models.retail.properties.name' ) }}', '{{ trans( 'retails::models.retail.properties.description' ) }}', { name: 'Actions', style: {'text-align':'right'} } ]"
:properties="[ 'name', 'description' ]"
:show-url="function( item ) { return '/backend/retails/' + item.id; }"
:edit-url="function( item ) { return '/backend/retails/' + item.id + '/edit'; }"
:delete-url="function( item ) { return '/api/retails/' + item.id; }"
:objects="{{ $retails }}"></crud-table>

<a class="button is-primary" href="{{ route( 'retails.create' ) }}">@lang( 'crudlang::buttons.create' )</a>

@endsection
