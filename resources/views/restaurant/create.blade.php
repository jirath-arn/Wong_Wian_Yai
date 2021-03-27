@extends('layouts.app2')

@section('content') 
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">สร้างร้านอาหาร</div>

                <div class="panel-body">
                @if (session('status'))
                    <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                        {{ session('status') }}
                    </div>


                @endif
                    <form class="form-horizontal" role="form" method="post" action="{{ route('createRestaurant') }}">
                        @csrf

                        <!-- ชื่อร้านอาหาร -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">ชื่อร้านอาหาร : </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"> 
                            </div>
                        </div>


                        <!-- หมายเหตุ -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">พิกัด : </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="location" id="location"> 
                            </div>
                        </div>

                        
                        <!-- ประเภทร้านอาาหร-->
                        <div class="form-group">
                            <label class="col-md-4 control-label">ประเภทร้านอาหาร : </label>

                            <div class="col-md-6">
                                <select type="select" class="form-control" name="type" id="type">
                                <option value="อาหารจานเดียว">อาหารจานเดียว</option>
                                <option value="อาหารเช้า">อาหารเช้า</option>
                                <option value="ร้านกาแฟ">ร้านกาแฟ</option>
                                <option value="อาหารไทย">อาหารไทย</option>
                                <option value="อาหารอีสาน">อาหารอีสาน</option>
                                <option value="อาหารตามสั่ง">อาหารตามสั่ง</option>
                                <option value="อาหารจีน">อาหารจีน</option>
                                <option value="อาหารญี่ปุ่น">อาหารญี่ปุ่น</option>
                                <option value="ก๋วยเตี๋ยว">ก๋วยเตี๋ยว</option>
                                <option value="ของหวาน">ของหวาน</option>
                            </select>
                            </div>
                        </div>

                        <!-- เวลาทำการ -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">เวลาทำการ : </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="time"> 
                            </div>
                        </div>

                        <!-- เบอร์โทร -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">เบอร์โทร : </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone"> 
                            </div>
                        </div>

                        <!-- รูปภาพ -->
                        <div class="form-group">-->
                            <label class="col-md-4 control-label">รูปภาพประกอบ : </label>

                            <div class="col-md-6">
                            <form action="upload.php" method="post" enctype="multipart/form-data">
                                เลือกรูปภาพ
                                <input type="file" name="pic" id="fileToUpload"><br>
                                <input type="submit" value="Upload Image" name="submit">
                            </form>
                            </div>
                        

                        <!-- Record button -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    สร้าง
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection