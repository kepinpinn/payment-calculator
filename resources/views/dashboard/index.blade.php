@extends('admin/admin')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>150</h3>
                <p>Total Hutang</p>
            </div>
            <div class="icon">
               <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>

    </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>
                    <p>Total Piutang</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bar"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Total Spend</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
