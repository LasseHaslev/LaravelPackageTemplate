@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.edit.model', [ 'name'=>trans_choice( '%packagename%::models.retail.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '%packagename%.update', $retail->id ) }}">
        <input type="hidden" name="_method" value="PUT">
@include( '%packagename%::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.update', [ 'item'=>trans_choice('%packagename%::models.retail.name', 1) ] )</button>
    </form>
</div>

@endsection
