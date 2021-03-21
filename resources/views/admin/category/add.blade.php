@extends('admin.layout.default')

@section('content')
<div class="content-wrapper">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">THÊM MỚI DANH MỤC</p>
                    <form action="{{route('admin.categories.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Tên danh mục</label>
                                <input class="form form-control" name="name" id="name">
                            </div>
                            <div class="col-12">
                                <label for="description">Mô tả</label>
                                <textarea class="form form-control" name="description" id="description" rows="3"></textarea>
                            </div>
                        </div>
                        <div style="padding-top: 5px; text-align: right">
                            <button class="btn btn-success">Lưu</button>
                            <a class="btn btn-info" href="javascript:void(0)" onclick="window.history.back();">Trở về</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection