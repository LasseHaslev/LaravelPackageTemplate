@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )

<div class="content">
    <h1 class="title">{{ trans( 'crudlang::pages.create.model', [ 'name'=>trans_choice( '%packagename%::models.retail.name', true ) ] ) }}</h1>

    <form method="POST" action="{{ route( '%packagename%.store' ) }}">
@include( '%packagename%::elements.form' )
        <button type="submit" class="button is-primary">@lang( 'crudlang::buttons.create' )</button>
    </form>
</div>

@endsection
