@extends('layouts.app')

@push('before-sidebar')
<aside style="width: 100%!important;" id="ais-facets">
  <section class="ais-facets" id="facet-post-types"></section>
  <section class="ais-facets" id="facet-categories"></section>
  <section class="ais-facets" id="facet-tags"></section>
  <section class="ais-facets" id="facet-users"></section>
</aside>
@endpush



@section('content')
      @include('partials.page-header')
      @include('partials.algolia.algolia-content')
@endsection
