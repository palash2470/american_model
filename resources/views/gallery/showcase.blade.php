@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3 class="clr-red">Photo Gallery</h3>
                </div>
            </div>
            {{-- <div class="col-lg-7 col-12">
                <div class="text-center">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper</p>
                </div>
            </div> --}}
        </div>
        <!-- <div class="row justify-content-end mt-3 mb-3">
            <div class="col-auto">
                <div class="src-select-wrap">
                    <select class="form-control src-select-style selectOption2">
                        <option>Recent</option>
                        <option>Popular</option>
                        <option>Most like</option>
                    </select>
                </div>
            </div>
        </div> -->
        <div class="model-photos-wrap">
            <div class="row g-2 justify-content-between align-items-center mt-3 mb-3">
                <div class="col-auto">
                    <div class="top-filter-gallery">
                        <ul class="filter-list d-flex flex-wrap">
                            <li class="{{Route::currentRouteName() == 'gallery.album.list' ? 'active' : ''}}"><a href="{{route('gallery.album.list')}}">Showcases</a></li>
                            <li class="{{Route::currentRouteName() == 'gallery.featured_models.image.list' ? 'active' : ''}}"><a href="{{route('gallery.featured_models.image.list')}}">Featured Models</a></li>
                            <li class="{{Route::currentRouteName() == 'gallery.featured_photographers.image.list' ? 'active' : ''}}"><a href="{{route('gallery.featured_photographers.image.list')}}">Featured Photographers</a></li>
                            <li class="{{Route::currentRouteName() == 'gallery.new_image.list' ? 'active' : ''}}"><a href="{{route('gallery.new_image.list')}}">New Images</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="top-filter-gallery">
                        <form action="" method="GET">
                            <div class="src-filter position-relative">
                                <div class="ui-widget">
                                    <input type="text" name="search_key" class="form-control src-filter-style ui-autocomplete-input" placeholder="Search for a glamour, fashion" id="image_category_autocomplete" value="{{$request->search_key}}">
                                    {{-- <input type="hidden" name="location" id="image_cat_id" value=""> --}}
                                </div>
                                
                                <span class="src-icon-gal">
                                    <button type="submit" class="src-icon-gal-btn"><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="top-filter-gallery">
                        <div class="allplan-choose">
                            <div class="d-flex align-items-center">
                                <span>Filter Mature Content</span>
                                <label class="switch">
                                    <input type="checkbox" name="">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                @forelse ($image_categories as $category)
                    <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                        <div class="model-photos-gallery add-scle gal-count new-gal">
                            <a class="gal-img" href="{{route('gallery.showcase.image.list',$category->id)}}">
                                <img class="img-block" src="{{url('img/photo_cat_image/'.$category->image)}}">
                            </a>
                            <div class="gal-count-wrap">
                                <ul class="d-flex justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <h4><span class="camera-pic me-1"><img src="{{url('images/camera.png')}}" alt=""></span> 
                                        {{$category->name}}</h4>
                                    </li>
                                    <li class="img-total">
                                        <p><strong>{{$category->images->count()}}</strong> images
                                        <span class="camera-pic ms-1"><img src="{{url('images/img-pic.png')}}" alt=""></span> 
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
                
                {{-- <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                    <div class="model-photos-gallery add-scle gal-count new-gal">
                        <a class="gal-img" href="#">
                            <img class="img-block" src="images/feutered-model/model1.jpg">
                        </a>
                        <div class="gal-count-wrap">
                            <ul class="d-flex justify-content-between">
                                <li class="d-flex align-items-center">
                                    <h4><span class="camera-pic me-1"><img src="images/camera.png" alt=""></span> 
                                        Fitness</h4>
                                </li>
                                <li class="img-total">
                                    <p><strong>125</strong> images
                                    <span class="camera-pic ms-1"><img src="images/img-pic.png" alt=""></span> 
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-ms-6 col-12">
                    <div class="model-photos-gallery add-scle gal-count new-gal">
                        <a class="gal-img" href="#">
                            <img class="img-block" src="images/feutered-model/model5.jpg">
                        </a>
                        <div class="gal-count-wrap">
                            <ul class="d-flex justify-content-between">
                                <li class="d-flex align-items-center">
                                    <h4><span class="camera-pic me-1"><img src="images/camera.png" alt=""></span> 
                                    Swimwear</h4>
                                </li>
                                <li class="img-total">
                                    <p><strong>125</strong> images
                                    <span class="camera-pic ms-1"><img src="images/img-pic.png" alt=""></span> 
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')
    <script>
        $("#image_category_autocomplete").autocomplete({
        source: function(request, response) {
            $('#image_cat_id').val(); 
            //console.log(request.term);
            $("#loading_container").attr("style", "display:block");
            $.ajax({
                url: base_url + "/fetch-image-category-autocomplete",
                dataType: "json",
                type: "POST",
                data: {
                    _token: csrf,
                    q: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                    $("#loading_container").attr("style", "display:none");
                }
            });
        },
        /*  select: function(event, ui) {
             $('#city_autocomplete').val(ui.item.value);
             console.log(ui.item);
             return false;
         }, */
        select: function(event, ui) {
            // Set selection
            $('#image_category_autocomplete').val(ui.item.label); // display the selected text
            $('#image_cat_id').val(ui.item.value); // save selected id to input
            return false;
        }
    });
    </script>
@endpush