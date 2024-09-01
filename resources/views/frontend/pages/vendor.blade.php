@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || @lang('word.Payment')
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
                        <h4>@lang('word.vendors')</h4>
                        <ul>
                            <li><a href="{{url('/')}}">@lang('word.home')</a></li>
                            <li><a href="javascript:;">@lang('word.vendors')</a></li>
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
      VENDORS START
    ==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="row">
                        @foreach ($vendors as $vendor)
                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__vendor_single">
                                <img src="{{asset($vendor->banner)}}" alt="vendor" class="img-fluid w-100">
                                <div class="wsus__vendor_text">
                                    <div class="wsus__vendor_text_center">
                                        <h4>{{$vendor->shop_name}}</h4>

                                        <a href="javascript:;"><i class="far fa-phone-alt"></i>
                                            {{$vendor->phone}}</a>
                                        <a href="javascript:;"><i class="fal fa-envelope"></i>
                                            {{$vendor->email}}</a>
                                        <a href="{{route('vendor.products', $vendor->id)}}" class="common_btn">@lang('word.visit store')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-12">
                    <section id="pagination">
                        <div class="mt-5">
                            @if ($vendors->hasPages())
                                {{$vendors->links()}}
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--============================
       VENDORS END
    ==============================-->
@endsection
