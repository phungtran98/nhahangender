@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm loại bàn
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
                    <form role="form" action="{{URL::to('/luu-loaiban')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID loại bàn</label>
                            <input type="number" name="IdLoaiBan" class="form-control" id="id_loaiban">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên loại bàn</label>
                            <input type="text" name="TenLoaiBan" class="form-control" id="ten_loaiban" placeholder="Thêm tên loại bàn">
                        </div>

                        <button type="submit" name="them_loaiban" class="btn btn-info">Thêm loại bàn</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
