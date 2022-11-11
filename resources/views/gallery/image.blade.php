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
        {{-- <div class="row justify-content-end mt-3 mb-3">
            <div class="col-auto">
                <div class="src-select-wrap">
                    <select class="form-control src-select-style selectOption2">
                        <option>Recent</option>
                        <option>Popular</option>
                        <option>Most like</option>
                    </select>
                </div>
            </div>
        </div> --}}
        <div class="model-photos-wrap">
            <div class="row g-3">
                @forelse ($gallery_images as $image)
                    <div class="col-lg-3 col-md-6 col-ms-6 col-12">
                        <div class="model-photos-gallery no-overlay add-scle">
                            <a class="gal-img" data-fancybox="img-gallery" href="{{url('img/gallery/'.$image->image)}}">
                                <img class="img-block" src="{{url('img/gallery/'.$image->image)}}">
                            </a>
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
            <div class="pagination-wrap">{{ $gallery_images->appends($_GET)->links() }}</div>
        </div>
    </div>
</section>
@endsection