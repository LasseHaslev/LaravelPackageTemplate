@extends( config( '%packagename%.views.backend.layout' ) )

@section( 'content' )
    <h1 class="title">{{ $retail->name }}</h1>
@if ( $retail->description )
<div class="content">
{!! $retail->description !!}
</div>
@endif

@include( '%packagename%::stores.index' )

@endsection
