@extends('admin.layout.default')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">DANH SÁCH DANH MỤC</p>
                        <a class="btn btn-success">Thêm mới</a>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="display expandable-table" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Mô tả</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>
                                                <a href="{{route('category.update', $category->id)}}">{{$category->name}}</a>
                                            </td>
                                            <td>{{$category->description}}</td>
                                            <td>
                                                <button class="btn btn-danger">Xóa</button>
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