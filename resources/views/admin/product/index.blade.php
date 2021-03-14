@extends('admin.layout.default')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div style="float: right">
                            <a class="btn btn-success" href="{{route('product.add')}}">Thêm mới</a>
                        </div>
                        <p class="card-title">DANH SÁCH SẢN PHẨM</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="display expandable-table" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Giá</th>
                                            <th>Mô tả</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                                <a href="{{route('product.update', $product->id)}}">{{$product->name}}</a>
                                            </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>
                                            <td>
                                                <form method="POST" action="{{route('product.delete',['id'=>$product->id])}}">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                                </form>
                                            </td>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4"></td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection