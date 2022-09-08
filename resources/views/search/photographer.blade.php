@extends('layouts.app')
@section('content')
<section class="galleries">
    <div class="container-fluid left-right-40">
        <div class="row">
            <div class="col-12">
                <div class="gelleries-page-head">
                    <h3>Photographer</h3>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                        <div class="search-head">
                            {{-- <h4>Search Results <span class="search-results d-block ms-0 mt-2">Showing results 1-10 out of 237 matches</span></h4> --}}
                            <h4>Search Results <span class="search-results d-block ms-0 mt-2">
                                Showing 
                                @if ($users->firstItem())
                                    {{ $users->firstItem() }} to {{ $users->lastItem() }}
                                @else
                                    {{ $users->count() }}
                                @endif
                                of {{ $users->total() }} results
                            </span></h4>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                        <form method="get" action="" id="model_filter_frm">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="src-select-wrap model-src-top">
                                        <select class="form-control src-select-style selectOption2" name="exprience">
                                            <option value="">Experience</option>
                                            <option value="0" @if (isset($request) && $request->exprience == '0') selected @endif>0 years</option>
                                            @foreach(range(1, 40) as $exprience)
                                                <option value="{{$exprience}}" @if (isset($request) && $request->exprience == $exprience) selected @endif>{{$exprience}} years</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="src-select-wrap model-src-top">
                                        <select class="form-control src-select-style selectOption2" name="language">
                                            <option value="">Language</option>
                                            @if(Helper::languageArr())
                                                @foreach (Helper::languageArr() as $key => $data)
                                                    <option value="{{$key}}" @if (isset($request) && $request->language == $key) selected @endif>{{$data}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="src-select-wrap model-src-top">
                                        <select class="form-control src-select-style selectOption2">
                                            <option>Available For</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="model-src-top">
                                        <button type="submit" class="model-src-top-btn">apply</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="pagination-wrap">{{ $users->appends($_GET)->links() }}</div>
                {{-- <div class="search-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i>Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next<i class="fas fa-angle-double-right"></i></a>
                          </li>
                        </ul>
                    </nav>
                </div> --}}
                <div class="row">
                    @forelse ($users as $key => $user)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                            <div class="model-box-wrap wow fadeInUp delay1 only-for-photographer" data-aos="fade-up">
                                <div class="model-box-design hover-efects">
                                    <span class="model-box-img position-relative hover-ly">
                                        <img class="img-block" src="{{url('img/user/profile-image/'.$user->userDetails->profile_image)}}" alt="">
                                        <div class="hover-efects-size">
                                            <h5>Lorem ipsum</h5>
                                            <p>dolor sit amet consectetur adipisicing elit.</p>
                                        </div>
                                        <div class="hover-efects-social-link">
                                            <ul>
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </span>
                                    <div class="model-box-text">
                                        <h4><a href="{{route('user.view.profile',[$category->slug,$user->name_slug])}}">{{@$user->userDetails->name}}</a></h4>
                                        <div class="same_height_model_text">
                                            <p>Available for:<span class="info-model">Commercial</span></p>
                                            <p>City:<span class="info-model">{{$user->userDetails->city_name}}</span></p>
                                            <p>State:<span class="info-model">{{@$user->userDetails->getState->name}}</span></p>
                                        </div>
                                        <ul class="box-view-more d-flex justify-content-end">
                                            <li><a href="{{route('user.view.profile',[$category->slug,$user->name_slug])}}">view profile</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    @empty
                    <div><p>No Data Found</p></div>
                    @endforelse
                    
                    
                </div>
                <div class="pagination-wrap">{{ $users->appends($_GET)->links() }}</div>
                {{-- <div class="search-pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i>Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next<i class="fas fa-angle-double-right"></i></a>
                          </li>
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
</section>

@endsection
@push('scripts')
<script>

</script>
@endpush