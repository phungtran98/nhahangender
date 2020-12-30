@extends('admin_layout')
@section('admin_content')

<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sảnh
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
                    <form role="form" action="{{URL::to('/luu-sanh')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">ID sảnh</label>
                            <input type="number" name="IdSanh" class="form-control" id="id_sanh">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sảnh</label>
                            <input type="text" name="TenSanh" class="form-control" id="ten_sanh" placeholder="Thêm tên sảnh">
                        </div>

                        <button type="submit" name="them_sanh" class="btn btn-info">Thêm Sảnh</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
