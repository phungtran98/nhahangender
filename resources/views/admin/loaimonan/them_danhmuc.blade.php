@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục món ăn
            </header>

            <?php
                    $message = Session::get('message');
                    if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                    }
                ?>

            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-danhmuc')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID danh mục</label>
                            <input type="number" name="IdLoai" class="form-control" id="id_loaimonan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="TenLoai" class="form-control" id="ten_loaimonan" placeholder="Thêm tên danh mục">
                        </div>

                        <button type="submit" name="them_danhmuc" class="btn btn-info">Thêm Danh Mục</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
