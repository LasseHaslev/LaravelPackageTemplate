@extends( config( 'retails.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ $retail->name }}</h1>
@if ( $retail->description )
<div class="content">
{!! $retail->description !!}
</div>
@endif

@include( 'retails::stores.index' )

@endsection
