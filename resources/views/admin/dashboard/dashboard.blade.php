@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="dasboard-layout-wrap">
            <div class="row">
                <div class="col-12">
                    <h4 class="wrap-heading">Member Types</h4>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Models</span>
                        <span class="info-box-number">1850</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-camera"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Photographers</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-theater-masks"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Makeup Artists</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-theater-masks"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Agents/Managers</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dasboard-layout-wrap">
            <div class="row">
                <div class="col-12">
                    <h4 class="wrap-heading">Membership Levels</h4>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Free Members</span>
                        <span class="info-box-number">1850</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Silver Members</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Gold Members</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-users"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Platinum Members</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dasboard-layout-wrap">
            <div class="row">
                <div class="col-12">
                    <h4 class="wrap-heading">Content</h4>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-images"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Photos</span>
                        <span class="info-box-number">1850</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-video"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Videos</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-headset"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Casting Calls</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-star"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Reviews</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-black elevation-1"><i class="fas fa-comments"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Messages</span>
                        <span class="info-box-number">760</span>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-bullhorn"></i></span>    
                    <div class="info-box-content">
                        <span class="info-box-text">Blogs</span>
                        <span class="info-box-number">7360</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dasboard-layout-wrap">
            <div class="row">
                <div class="col-12">
                    <h4 class="wrap-heading">STATISTICS (Google Analytics)</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection