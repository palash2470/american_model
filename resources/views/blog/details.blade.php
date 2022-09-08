@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-12">
                <div class="blog-page-single">
                    <div class="blog-big-thumb position-relative">
                        <img class="img-block" src="{{url('images/photography/photography2.jpg')}}" alt="">
                        <span class="blog-post-date">22 Nov 2021</span>
                    </div>
                    <div class="single-blog-content">
                        <h4>Many people limit themselves</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non laoreet dui. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est. Integer sit amet mi id sapien tempor molestie in nec massa. Vestibulum pellentesque,
                            purus ut dignissim consectetur, nulla erat ultrices purus, ut consequat sem elit non sem. Morbi lacus massa, euismod ut turpis molestie, tristique sodales est.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                <div class="recnt-blog-stcky">
                    <div class="blog-title-head">
                        <h3>Recent Blog</h3>
                    </div>
                    <div class="recnt-blog">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="rcnt-blog-img">
                                        <img src="{{url('images/photography/photography2.jpg')}}" alt="">
                                    </div>
                                    <div class="rcnt-blog-txt">
                                        <h5>Lorem ipsum dolor sit</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur .</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="rcnt-blog-img">
                                        <img src="{{url('images/photography/photography2.jpg')}}" alt="">
                                    </div>
                                    <div class="rcnt-blog-txt">
                                        <h5>Lorem ipsum dolor sit</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur .</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection