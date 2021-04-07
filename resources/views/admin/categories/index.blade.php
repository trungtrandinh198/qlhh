@extends('admin.layout.default')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div style="float: right;">
                            <a class="btn btn-success" href="{{route('admin.categories.create')}}">Thêm mới</a>
                        </div>
                        <p class="card-title">DANH SÁCH DANH MỤC</p>
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
                                            <th>Mô tả</th>
                                            <th>Chức năng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>
                                                <a href="{{route('admin.categories.edit', ['category' => $category])}}">{{$category->name}}</a>
                                            </td>
                                            <td>{{$category->description}}</td>
                                            <td>
                                                <form method="POST" action="{{route('admin.categories.destroy', ['category' => $category])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                                </form>
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
                                {{$categories->links('view.vendor.pagination.bootstrap-4')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection