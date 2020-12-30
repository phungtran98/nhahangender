@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm chức vụ
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
                    <form role="form" action="{{URL::to('/luu-chucvu')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID chức vụ</label>
                            <input type="number" name="IdCV" class="form-control" id="id_cv">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">ID lương</label>
                            <input type="number" name="IdLuong" class="form-control" id="id_luong">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên chức vụ</label>
                            <input type="text" name="TenCV" class="form-control" id="ten_cv" placeholder="Thêm tên chức vụ">
                        </div>

                        <button type="submit" name="them_chucvu" class="btn btn-info">Thêm chức vụ</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
