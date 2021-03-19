@extends('admin.layout.default')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">Số lượng danh mục</p>
                            <p class="fs-30 mb-2">{{$totalCategory}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Số lượng sản phẩm</p>
                            <p class="fs-30 mb-2">{{$totalProduct}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection