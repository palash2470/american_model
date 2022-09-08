@extends('layouts.app')
@section('content')
<section class="verify-email">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="start-one complete-account">
                    <div class="head-form">
                        <h3>ALMOST THERE...</h3>
                        <p>To ensure that you get the most out of your profile, it is important that your profile be
                            complete. Since search function depends on member info, completing your profile will
                            help other members find you more easily.</p>
                    </div>
                    <form action="{{route('user.details.information.store')}}" method="post" id="details_info_frm">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="model-head-info">
                                    <div class="model-head-details">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-start">
                                                <h4>EYE COLOR</h4>
                                            </div>
                                            @if(Helper::getColoursByAttr('eye'))
                                                <div class="col-lg-9">
                                                    <ul class="model-head-listing d-flex flex-wrap">
                                                        @foreach (Helper::getColoursByAttr('eye') as $key => $colour)
                                                            <li class="radio">
                                                                @php 
                                                                    $checked = '';
                                                                    if(isset($user) && $user->userDetails->eye_color == $colour->id){
                                                                        $checked = 'checked';
                                                                    }else if($key == 0){
                                                                        $checked = 'checked';
                                                                    }
                                                                @endphp
                                                                <input type="radio" id="eye_{{$colour->name}}" value="{{$colour->id}}" name="eye_color" {{$checked}}>
                                                                <label for="eye_{{$colour->name}}">{{$colour->name}}</label>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="model-head-details">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-start">
                                                <h4>SKIN COLOR</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <ul class="model-head-listing d-flex flex-wrap">
                                                @if(Helper::getColoursByAttr('skin'))
                                                    <div class="col-lg-9">
                                                        <ul class="model-head-listing d-flex flex-wrap">
                                                            @foreach (Helper::getColoursByAttr('skin') as $key=> $colour)
                                                                @php 
                                                                    $checked = '';
                                                                    if(isset($user) && $user->userDetails->skin_color == $colour->id){
                                                                        $checked = 'checked';
                                                                    }else if($key == 0){
                                                                        $checked = 'checked';
                                                                    }
                                                                @endphp
                                                                <li class="radio">
                                                                    <input type="radio" id="skin_{{$colour->name}}" value="{{$colour->id}}" name="skin_color" {{$checked}}>
                                                                    <label for="skin_{{$colour->name}}">{{$colour->name}}</label>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="model-head-details">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-start">
                                                <h4>HAIR COLOR</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <ul class="model-head-listing d-flex flex-wrap">
                                                    @if(Helper::getColoursByAttr('hair'))
                                                        <div class="col-lg-9">
                                                            <ul class="model-head-listing d-flex flex-wrap">
                                                                @foreach (Helper::getColoursByAttr('hair') as $key=> $colour)
                                                                @php 
                                                                    $checked = '';
                                                                    if(isset($user) && $user->userDetails->hair_color == $colour->id){
                                                                        $checked = 'checked';
                                                                    }else if($key == 0){
                                                                        $checked = 'checked';
                                                                    }
                                                                @endphp
                                                                    <li class="radio">
                                                                        <input type="radio" id="hair_{{$colour->name}}" value="{{$colour->id}}" name="hair_color"
                                                                        {{$checked}}>
                                                                        <label for="hair_{{$colour->name}}">{{$colour->name}}</label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="model-head-details">
                                        <div class="row">
                                            <div class="col-lg-3 d-flex align-items-start">
                                                <h4>HAIR LENGTH</h4>
                                            </div>
                                            <div class="col-lg-9">
                                                <ul class="model-head-listing d-flex flex-wrap">
                                                    
                                                    @if($hairLenths)
                                                        <div class="col-lg-9">
                                                            <ul class="model-head-listing d-flex flex-wrap">
                                                                @foreach ($hairLenths as $key => $hairLenth)
                                                                    @php 
                                                                        $checked = '';
                                                                        if(isset($user) && $user->userDetails->hair_lenth == $hairLenth->id){
                                                                            $checked = 'checked';
                                                                        }else if($key == 0){
                                                                            $checked = 'checked';
                                                                        }
                                                                    @endphp
                                                                    <li class="radio">
                                                                        <input type="radio" id="hair_{{$hairLenth->hair_lenth}}" value="{{$hairLenth->id}}" name="hair_lenth" {{$checked}}>
                                                                        <label for="hair_{{$hairLenth->hair_lenth}}">{{$hairLenth->hair_lenth}}</label>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Weight</label>
                                    <select class="form-control src-select-style selectOption2" name="weight">
                                        <option value="">Please select weight</option>
                                        @if ($weights)
                                            @foreach ($weights as $weight)
                                                <option value="{{$weight->weight}}" @if (isset($user) && $user->userDetails->weight == $weight->weight) selected @endif>{{Helper::kgToLb($weight->weight)}} lbs / {{$weight->weight}} kg</option>
                                            @endforeach
                    
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Height</label>
                                    <select class="form-control src-select-style selectOption2" name="height">
                                        <option value="">Please select height</option>
                                        @if(Helper::getSizeByAttr('height'))
                                            @foreach (Helper::getSizeByAttr('height') as $data)
                                                <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->height == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Ethnicity</label>
                                    <select class="form-control src-select-style selectOption2" name="ethnicity">
                                        <option value="">Please select ethnicity</option>
                                        @if ($ethnicities)
                                            @foreach ($ethnicities as $ethnicity)
                                            <option value="{{$ethnicity->id}}" @if (isset($user) && $user->userDetails->ethnicity == $ethnicity->id) selected @endif>{{$ethnicity->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Shoe Size</label>
                                    <select class="form-control src-select-style selectOption2" name="shoe_size">
                                        <option value="">Please select shoe size</option>
                                        @if(Helper::shoeSizeArr())
                                            @foreach (Helper::shoeSizeArr() as $data)
                                                <option value="{{$data}}" @if (isset($user) && $user->userDetails->shoe_size == $data) selected @endif>{{$data}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Waist</label>
                                    <select class="form-control src-select-style selectOption2" name="waist">
                                        <option value="">Please select waist </option>
                                        @if(Helper::getSizeByAttr('waist'))
                                            @foreach (Helper::getSizeByAttr('waist') as $data)
                                                <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->waist == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>Chest/Bust</label>
                                    <select class="form-control src-select-style selectOption2" name="chest">
                                        <option value="">Please select chest/Bust</option>
                                        @if(Helper::getSizeByAttr('chest'))
                                            @foreach (Helper::getSizeByAttr('chest') as $data)
                                                <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->chest == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>dress/jacket size</label>
                                    <select class="form-control src-select-style selectOption2" name="dress_size">
                                        <option value="">Please select dress/jacket size</option>
                                        @foreach(range(0, 60) as $dressSize)
                                            <option value="{{$dressSize}}" @if (isset($user) && $user->userDetails->dress_size == $dressSize) selected @endif>{{$dressSize}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="src-select-wrap">
                                    <label>hip/inseam</label>
                                    <select class="form-control src-select-style selectOption2" name="hip">
                                        <option value="" >Please select hip/inseam</option>
                                        @if(Helper::getSizeByAttr('hip'))
                                            @foreach (Helper::getSizeByAttr('hip') as $data)
                                                <option value="{{$data->id}}" @if (isset($user) && $user->userDetails->hip == $data->id) selected @endif>{{Helper::cmTofeet($data->size)}} /{{$data->size}}cm</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="acc-save-wrap">
                                    <button type="submit" class="acc-save-btn">Save & continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')

<script>
   /* Validation  */
   $('#details_info_frm').validate({
        rules: {
            eye_color: {
                required:true,
            },
            skin_color: {
                required:true,
            },
            hair_color :{
                required:true,
            },
            hair_lenth :{
                required:true,
            },
            weight :{
                required:true,
            },
            height :{
                required:true,
            },
            ethnicity :{
                required:true,
            },
            shoe_size :{
                required:true,
            },
            waist :{
                required:true,
            },
            chest :{
                required:true,
            },
            dress_size :{
                required:true,
            },
            hip :{
                required:true,
            },
            
        },
    });
</script>
@endpush