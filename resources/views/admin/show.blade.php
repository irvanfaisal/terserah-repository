@extends('master', ['title' => "Lootslog - Admin"])
@extends('header')

@section('content')

    <section id="admin">
        <div class="container">
            @if($list_page == 'Product')
                @include('partials._list_product')
            @elseif($list_page == 'Review')
                @include('partials._list_review')
            @elseif($list_page == 'User')
                @include('partials._list_user')
            @elseif($list_page == 'Vote')
                @include('partials._list_vote')
            @else
                <h3>Nothing Here</h3>
            @endif

            <div class="row text-center paginate">
                {!! $lists->render() !!}
            </div>
        </div>
    </section>

   @stop
