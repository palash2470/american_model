@if(count($user_images) > 0)
    @foreach ($user_images as $image)
        <div class="col-lg-4 col-md-6 col-ms-6 col-12">
            <div class="model-photos-gallery add-dlt">
                <span class="gal-img photo_view" data-photo="photo_{{$image->id}}">
                    <img class="img-block" src="{{url('img/user/images/'.$image->image)}}" alt="">
                </span>
                {{-- <a class="gal-img add-dlt" data-fancybox="img-gallery" href="{{url('img/user/images/'.$image->image)}}"><img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                </a> --}}
                <span class="delete-btn" onclick="deletePhoto({{$image->id}})"><i class="fas fa-trash-alt"></i></span>
                <div class="model-photos-like-cmnt">
                    <ul class="d-flex justify-content-between">
                        <li><a href="javascript:void(0)"><i class="far fa-thumbs-up"></i></a><span id="image_like_{{$image->id}}">{{count($image->likes)}}</span></li>
                        <li class="photo_view" data-photo="photo_{{$image->id}}"><a href="javascript:void(0)"><i class="far fa-comment-alt"></i></a>{{count($image->comments)}}</li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
@else
    {{-- <div class="col-12">
        <div class="not-found-text">
            <i class="fas fa-exclamation-triangle"></i>
            <p>no photo found</p>
        </div>
    </div> --}}
@endif

