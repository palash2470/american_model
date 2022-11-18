@if(count($user_images) > 0)
    @foreach ($user_images->sortByDesc('id') as $image)
        <div id="photo_{{$image->id}}" class="photo-list">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                    <div class="popup-img">
                        <img class="img-block photo_Height" src="{{url('img/user/images/'.$image->image)}}">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 col-12">
                    <div class="ftr-cmnt photo_Height">
                        <div class="photo-comments-main">
                            <div class="photo-comments" id="photo_cmt_{{$image->id}}">
                                @if (count($image->comments) > 0)
                                    @foreach ($image->comments as $comment)
                                        <div class="photo-comments-wrap d-flex">
                                            <div class="photo-comments-wrap-lft">
                                                <a href="{{url('/profile/'.$comment->user->category->slug.'/'.$comment->user->name_slug)}}" class="photo-comments-img">
                                                    <img class="img-block" src="{{url('/img/user/profile-image/'.$comment->user->userDetails->profile_image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="photo-comments-wrap-rgt">
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <h4><a href="{{url('/profile/'.$comment->user->category->slug.'/'.$comment->user->name_slug)}}">{{$comment->user->name}}</a> <span>{{$comment->user->category->name}}</span></h4>
                                                    <div class="cmnts-rply-date">
                                                        <ul class="d-flex">
                                                            <li>{{\Carbon\Carbon::parse(now())->diffInDays(\Carbon\Carbon::parse($comment->created_at))}} days ago</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <p>{{$comment->comment}}</p>
                                                {{-- <div class="cmnts-rply-date">
                                                    <ul class="d-flex">
                                                        <li><a href="#"><i class="far fa-thumbs-up"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-reply"></i></a></li>
                                                        <li><a href="#"><i class="fas fa-trash-alt"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="photo-input-wrap">
                                                    <input type="text" class="form-control photo-input-style" placeholder="Type your comment">
                                                    <span class="photo-input-btn-wrap">
                                                        <button class="photo-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                                    </span>
                                                </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="row h-100 align-items-center" id="no_comment_msg_{{$image->id}}">
                                        <div class="col-12">
                                            <div class="not-found-text no-msg-area">
                                                <i class="far fa-comments"></i>
                                                <p>no Comments yet</p>
                                                <p><small>Be the first comment</small></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="msg-cmnt when-fixed">
                                <form  action="{{route('photo.comment.store')}}" method="post" class="photo_comment">
                                    @csrf
                                    <div class="profile-input-wrap">
                                        <input type="text" class="form-control profile-input-style" name="comment" placeholder="Type your comment" id="comment">
                                        <input type="hidden" name="photo_id" value="{{Crypt::encrypt($image->id)}}">
                                        <span class="profile-input-btn-wrap">
                                            <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif