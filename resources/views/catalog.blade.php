@extends('layouts.page')


@section('content')

    <div class="main-content">
        <div class="wrapper flex">
                    <div class="portfolio_area" id="projects">
                        <div class="container">
                            <div class="row">
                                <!--section title-->
                                <div class="col-md-12">
                                    <div class="section_title">
                                        <br/><br/><br/><br/><br/>
                                        <h2 class="title"><span>Ассортимент</span></h2>
                                        <div class="portfolio_nav">
                                        <ul>
                                            @foreach($groups as $direction)
                                                <li
                                                    @if($direction->id==$data->id)
                                                    class="filter selected"
                                                    @else
                                                    class="filter"
                                                    @endif
                                                    >
                                                    <a href="/{{ $direction->url }}">
                                                        {{ $direction->name }}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                        </div>
                                        {!! $data->text !!}

                                    </div>
                                </div>
                                <!--end section title-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portfolio_nav">
                                        @foreach($goods as $item)
                                            <div class="col-md-4 col-sm-6 mix {{ $item->name }}">
                                                <div class="portfolio  ">
                                                    <div class="single_protfolio">
                                                        <div class="prot_imag">
                                                            <a data-fancybox="gallery" class="/venobox"
                                                               href="/uploads/images/{{ $item->image }}"
                                                               data-gall="myGallery">
                                                                <img src="/uploads/images/thumbnail/{{ $item->image }}"
                                                                     alt=""/>

                                                                <div class="hover_port_text">
                                                                    <h2>{{ $item->name }} </h2>
                                                                    <p> {{ $item->text }}</p>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{ $goods->links() }}
                                    </div>
                                </div>
                                <div class="project_maxitup">
                                    <!--single portfolio item-->
{{--                                    @foreach($data->goods as $good)--}}

{{--                                        <div class="col-md-12 col-sm-12 mix {{ $good->name }}">--}}
{{--                                            {!! $good->text !!}--}}
{{--                                        </div>--}}
{{--                                        @foreach($direction->items as $item)--}}
{{--                                            <div class="col-md-4 col-sm-6 mix {{ $direction->name }}">--}}
{{--                                                <div class="portfolio  ">--}}
{{--                                                    <div class="single_protfolio">--}}
{{--                                                        <div class="prot_imag">--}}
{{--                                                            <a  data-fancybox="gallery" class="/venobox" href="/uploads/images/{{ $item->image }}" data-gall="myGallery">--}}
{{--                                                                <img src="/uploads/images/thumbnail/{{ $item->image }}" alt="" />--}}

{{--                                                            <div class="hover_port_text">--}}
{{--                                                                <h2>{{ $direction->name }} {{ $item->title }}</h2>--}}
{{--                                                                <p> {{ $item->text }}</p>--}}
{{--                                                            </div>--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        @endforeach--}}
{{--                                    @endforeach--}}
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
    </div>

@stop
