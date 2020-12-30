@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm lương
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
                    <form role="form" action="{{URL::to('/luu-luong')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID lương</label>
                            <input type="number" name="IdLuong" class="form-control" id="id_luong">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hệ số lương</label>
                            <input type="number" name="HeSoLuong" class="form-control" id="heso_luong">
                        </div>

                        <button type="submit" name="them_luong" class="btn btn-info">Thêm lương</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
