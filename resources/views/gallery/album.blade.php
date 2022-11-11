@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Gallery</h3>
                </div>
            </div>
        </div>
        <div class="model-photos-wrap">
            <div class="row g-3">
                @forelse ($albums as $album)
                    <div class="col-lg-3 col-md-6 col-ms-6 col-12">
                        <div class="model-photos-gallery add-scle gal-count">
                            <a class="gal-img" href="{{route('gallery.image.list',$album->id)}}">
                                <img class="img-block" src="{{url('img/album/'.$album->image)}}">
                            </a>
                            <span class="gal-count-wrap">
                                <h4>{{$album->name}}</h4>
                                <p>{{count($album->images)}} images</p>
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="not-found-text">
                            <i class="fas fa-exclamation-triangle"></i>
                            <p>no data found</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection