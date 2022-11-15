@extends('layouts.app')
@section('content')
<section class="blog-page-sec">
    <div class="container-fluid left-right-40">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3 class="clr-red">Gallery <br>New Images</h3>
                </div>
            </div>
            {{-- <div class="col-lg-8 col-12">
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
            <div class="row justify-content-center align-items-center mt-3 mb-3">
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
                    {{-- <div class="top-filter-gallery d-flex flex-wrap align-items-center">
                        <div class="src-filter position-relative">
                            <input type="text" class="form-control src-filter-style" placeholder="Search for a model, photographer">
                            <span class="src-icon-gal">
                                <button type="submit" class="src-icon-gal-btn"><i class="fas fa-search"></i></button>
                            </span>
                        </div>
                        <div class="allplan-choose mt-sm-0 mt-2">
                            <div class="d-flex align-items-center">
                                <span>Filter Mature Content</span>
                                <label class="switch">
                                    <input type="checkbox" name="">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="row g-3">
                <div class="masonry-wrap">
                    @if(count($images) > 0)
                        <div class="masonry" id="gallery_cat_image">
                            @forelse ($images as $image)
                                <div class="masonry-item photo_view" data-photo="photo_{{$image->id}}">
                                    <img class="img-block" src="{{url('img/user/images/'.$image->image)}}">
                                </div>
                            @empty
                            
                            @endforelse
                            
                        </div>
                    @else
                        <div class="col-12">
                            <div class="not-found-text">
                                <i class="fas fa-exclamation-triangle"></i>
                                <p>no data found</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="d-flex justify-content-center " >
        <div class="meso-loader ajax-load" style="display:none">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</section>
<!-- Photo View Modal -->
<div class="popup-wrap popup_open">
    <div class="popup-body-main">
        <div class="popup-body new-design">
            <button class="popup-wrap-btn close_popup"><i class="far fa-times-circle"></i></button>
            <div class="photo-list-wrap" id="popup_img_load_ajax">
               @include('gallery.image_popup_data')
            </div>
            <div class="popup-nav-wrap">
                <div class="popup-next" id="next"><i class="fas fa-chevron-right"></i></div>
                <div class="popup-prev" id="prev"><i class="fas fa-chevron-left"></i></div>
            </div>
        </div>
    </div>
    <div class="loader-wrap" id="loading_container_modal" style="display: none">
        <div class="mesh-loader-wrap">
            <div class="mesh-loader">
            <div class="set-one">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            <div class="set-two">
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
{{-- end model photo popup --}}
@endsection
@push('scripts')
    <script>
        /* Start Load more  */
        var page = 1;
        var no_data = 0;
        $(window).scroll(function() {
            //console.log($('footer').height());
            //console.log(no_data);
            scrollDistance = $(window).scrollTop() + $(window).height();
            footerDistance = $('#footer').offset().top;
            if (scrollDistance >= footerDistance) {
                page++;
                if(no_data == 0){
                    loadMoreData(page);
                }
            } /* else {
                console.log("Keep going...");
            } */
            /* if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            } */
        });
        function loadMoreData(page){
            //console.log(page);
            $.ajax(
                {
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.data_count == 0){
                        no_data = 1;
                    }
                    //console.log(data);
                    if(data.html == ""){
                        no_data = 1;
                        $('.ajax-load').hide();
                        //console.log('dsfsfsdf');
                        //$('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#gallery_cat_image").append(data.image_data);
                    $("#popup_img_load_ajax").append(data.popup_html);

                    $(".photo-list-wrap .photo-list").each(function(e) {
                        /* if (e != 0) */
                            $(this).hide();
                    });
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                });
        }
        /* End load More */
        $(document).on('click', '.photo_view', function(){
            var photo_id  = $(this).data("photo");
            //console.log(photo_id);
            $('#'+photo_id).show();
            $(".popup_open").addClass("open");
            $('body').css('overflowY', 'hidden');
        });
        $(document).on('click', '.close_popup', function(){
            $(".photo-list-wrap .photo-list").hide();
            $(".popup_open").removeClass("open");
            $('body').css('overflowY', 'auto');
        });

        $(document).ready(function(){
            $(".photo-list-wrap .photo-list").each(function(e) {
                /* if (e != 0) */
                    $(this).hide();
            });

            $("#next").click(function(){
                if ($(".photo-list-wrap .photo-list:visible").next().length != 0)
                    $(".photo-list-wrap .photo-list:visible").next().show().prev().hide();
                else {
                    $(".photo-list-wrap .photo-list:visible").hide();
                    $(".photo-list-wrap .photo-list:first").show();
                }
                return false;
            });

            $("#prev").click(function(){
                if ($(".photo-list-wrap .photo-list:visible").prev().length != 0)
                    $(".photo-list-wrap .photo-list:visible").prev().show().next().hide();
                else {
                    $(".photo-list-wrap .photo-list:visible").hide();
                    $(".photo-list-wrap .photo-list:last").show();
                }
                return false;
            });


        });
         //form validation
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
        'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
                //console.log(forms);
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {

                        if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
                //photo height
            var photoHeight = 0;
            $('.photo_Height').each(function () {
                if ($(this).outerHeight() >= photoHeight) {
                    photoHeight = $(this).outerHeight();
                }
            });
            $('.photo_Height').css({
                'min-height': photoHeight
            });

        })()
    //end form validation
    //Photo comment submit
    $(document).on('submit','.photo_comment',function(e){
        e.preventDefault();
        var form_value = $(this).serialize();
        var form_valueArr = $(this).serializeArray();
        var comment = form_valueArr[1]['value'];
        //console.log(form_valueArr[1]['value']);
        if(comment == ''){
            toastr.options.timeOut = 2000;
            toastr.error('Please enter comment');
        }else{
            var check_login = '{{Auth::check()}}';
            if(check_login == ''){
                {{Session::put('url_back', url()->current())}}
                window.location.href = '{{route('login')}}';
            }else{
                //alert('sdfsdf');
                //var token = '{{csrf_token()}}';
                $("#loading_container_modal").attr("style", "display:block");
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{route('photo.comment.store')}}",
                    data: form_value,
                    success: function(responce){
                        $("#loading_container_modal").attr("style", "display:none");
                        $('.photo_comment').each(function(){
                            this.reset();
                        });
                        $('#no_comment_msg_'+responce.comment_details.photo_id).hide();
                        //console.log(responce.comment_details.photo_id);
                        $('#photo_cmt_'+responce.comment_details.photo_id).append(`<div class="photo-comments-wrap d-flex">
                                                    <div class="photo-comments-wrap-lft">
                                                        <a href="`+responce.comment_details.profile_url+`" class="photo-comments-img">
                                                            <img class="img-block" src="`+responce.comment_details.profile_img+`" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="photo-comments-wrap-rgt">
                                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                            <h4><a href="`+responce.comment_details.profile_url+`">`+responce.comment_details.user_name+`</a> <span>`+responce.comment_details.category_name+`</span></h4>
                                                            <div class="cmnts-rply-date">
                                                                <ul class="d-flex">
                                                                    <li>`+responce.comment_details.created_at
                                                                        +` days ago</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p>`+responce.comment_details.comment+`</p>
                                                    </div>
                                                </div>`);
                    }
                });

            }
        }

        //$("#loading_container_modal").attr("style", "display:block");

    });
     //Like photo
     function photoLike(photo_id){
        //console.log(photo_id);
        var check_login = '{{Auth::check()}}';
        if(check_login == ''){
            {{Session::put('url_back', url()->current())}}
            window.location.href = '{{route('login')}}';
        }else{
            $("#loading_container").attr("style", "display:block");
            var token = '{{csrf_token()}}';
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('user.like.photo')}}",
                data: {'_token': token,'photo_id':photo_id},
                success: function(data){
                    $("#loading_container").attr("style", "display:none");
                    if(data.type == 'add'){
                        //console.log(data);
                        var like_count = $('#image_like_'+data.photo_like.photo_id).text();
                        var count = (parseInt(like_count) + 1);
                        $('#image_like_'+data.photo_like.photo_id).text(count);
                        $('#like_icon_'+data.photo_like.photo_id).toggleClass("far fa-thumbs-up fas fa-thumbs-up");
                        toastr.success(data.massage);
                    }else if(data.type == 'remove'){
                        var like_count = $('#image_like_'+data.photo_like.photo_id).text();
                        var count = (parseInt(like_count) -1);
                        $('#image_like_'+data.photo_like.photo_id).text(count)
                        $('#like_icon_'+data.photo_like.photo_id).toggleClass("fas fa-thumbs-up far fa-thumbs-up");
                        toastr.success(data.massage);
                    }

                    //location.reload();
                }
            });

        }
    }
    </script>
@endpush