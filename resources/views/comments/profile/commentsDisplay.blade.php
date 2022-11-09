<meta name="csrf-token" content="{{ csrf_token() }}">
@if (count($comments) > 0)
    <div class="profile-comments-main">
        @foreach ($comments as $comment)
            @if($comment->parent_comment_id ==0)
            <div class="profile-comments">
                <div class="profile-comments-wrap d-flex main-comment">
                    <div class="profile-comments-wrap-lft">
                        <a href="{{url('/profile/'.$comment->fromUser->category->slug.'/'.$comment->fromUser->name_slug)}}" class="profile-comments-img">
                            <img class="img-block" src="{{url('/img/user/profile-image/'.$comment->fromUser->userDetails->profile_image)}}" alt="">
                        </a>
                    </div>
                    <div class="profile-comments-wrap-rgt comment_section">
                        <h4><a href="#">{{@$comment->fromUser->name}}</a> <span>{{@$comment->fromUser->category->name}}</span></h4>
                        <p>{{@$comment->comment}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="cmnts-rply-date">
                                <ul class="d-flex">
                                    <li class="like-tag" id="{{$comment->id}}">
                                        <i class="{{isset($comment->getCommentLikeByUser)?'fas':'far'}} fa-thumbs-up change_like_thumb_{{$comment->id}}"></i>
                                        <span id="total_like_{{$comment->id}}">{{ $comment->totalLike }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cmnts-rply-date">
                                <ul class="d-flex">
                                    <li>{{\Carbon\Carbon::parse(now())->diffInDays(\Carbon\Carbon::parse($comment->created_at))}} days ago</li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-input-wrap reply_section" style="display: none;">
                            <form action="{{route('profile.comment.store')}}" method="post">
                                @csrf
                                <input type="text" name="comment" class="form-control profile-input-style" placeholder="Type your comment">
                                <input type="hidden" name="comment_to_user_id" value="{{Crypt::encrypt($user->id)}}">
                                <input type="hidden" name="parent_comment_id" value="{{Crypt::encrypt($comment->id)}}">
                                <span class="profile-input-btn-wrap">
                                    <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                </span>
                            </form>
                        </div>
                    </div>
                    </div>
                    {{-- @foreach ($comment->replies as $reply)
                        <div class="profile-comments-wrap d-flex with-reply">
                            <div class="profile-comments-wrap-lft">
                                <a href="#" class="profile-comments-img">
                                    <img class="img-block" src="{{url('/img/user/profile-image/'.$reply->fromUser->userDetails->profile_image)}}" alt="">
                                </a>
                            </div>
                            <div class="profile-comments-wrap-rgt comment_section">
                                <h4><a href="#">{{@$reply->fromUser->name}}</a> <span>{{@$reply->fromUser->category->name}}</span></h4>
                                <p>{{@$reply->comment}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="cmnts-rply-date">
                                        <ul class="d-flex">
                                            <li><a href="javascript:void(0)" id="reply"><i class="fas fa-reply"></i></a></li>

                                        </ul>
                                    </div>
                                    <div class="cmnts-rply-date">
                                        <ul class="d-flex">
                                            <li>{{\Carbon\Carbon::parse(now())->diffInDays(\Carbon\Carbon::parse($reply->created_at))}} days ago</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-input-wrap reply_section" style="display: none;">
                                    <form action="{{route('profile.comment.store')}}" method="post">
                                        @csrf
                                        <input type="text" name="comment" class="form-control profile-input-style" placeholder="Type your comment">
                                        <input type="hidden" name="comment_to_user_id" value="{{Crypt::encrypt($user->id)}}">
                                        <input type="hidden" name="parent_comment_id" value="{{Crypt::encrypt($comment->id)}}">
                                        <span class="profile-input-btn-wrap">
                                            <button class="profile-input-btn" type="submit"><i class="fas fa-paper-plane"></i></button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach --}}

                </div>
            @endif
        @endforeach
    </div>
@else
    <div class="row">
        <div class="col-12">
            <div class="not-found-text no-msg-area">
                <i class="far fa-comments"></i>
                <p>no Comments yet</p>
                <p><small>Be the first comment</small></p>
            </div>
        </div>
    </div>
@endif
@push('scripts')
<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','.like-tag', function() {
        var commentId = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "{{route('profile.comment.like.store')}}",
            data: { commentId: commentId },
            dataType: "json",
            success: function(response){
                if (response.success === true) {
                    $("#total_like_"+commentId).html(response.data.totalLike);
                    if (response.data.get_comment_like_by_user) {
                        $(".change_like_thumb_"+commentId).removeClass('far').addClass('fas');
                    } else {
                        $(".change_like_thumb_"+commentId).removeClass('fas').addClass('far');
                    }
                    toastr.options.timeOut = 2000;
                    toastr.success(response.message);
                }
                if (response.status === 422) {
                    toastr.options.timeOut = 2000;
                    toastr.error(response.error.commentId[0]);
                }
                // $("#loading_container_modal").attr("style", "display:none");
            }
        });
    });
});
</script>
@endpush
