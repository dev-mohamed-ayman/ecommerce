@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || @lang('word.Order Summary')
        @endsection

        @section('content')
            <!--============================
        BREADCRUMB START
    ==============================-->
            <section id="wsus__breadcrumb">
                <div class="wsus_breadcrumb_overlay">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h4>@lang('word.subtotal')</h4>
                                <ul>
                                    <li><a href="{{route('home')}}">@lang('word.shipping fee(+)')</a></li>
                                    <li><a href="javascript:;">@lang('word.coupon(-)')</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--============================
                BREADCRUMB END
            ==============================-->


            <!--============================
                PAYMENT PAGE START
            ==============================-->
            <section id="wsus__cart_view">
                <div class="container">
                    <div class="wsus__pay_info_area">
                        <div class="row">
                            <h1>@lang('word.Paymet success!')</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!--============================
                PAYMENT PAGE END
            ==============================-->
        @endsection
