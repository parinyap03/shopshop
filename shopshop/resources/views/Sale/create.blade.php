@extends('layouts.myapp')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>สั่งซื้อสินค้า</h6>
                </div>

                <div class="card-body pb-2">

                    <form action="{{route('store_sale')}}" method="POST">
                        @csrf <!-- Laravel CSRF protection token -->
                        <div class="form-group">
                            <label for="shipping_name">ชื่อผู้รับ:</label>
                            <input type="text" class="form-control" id="shipping_name"
                                   name="shipping_name" required>
                        </div>

                        <div class="form-group">

                            <label for="shipping_tel">เบอร์โทรศัพท์:</label>
                            <input type="tel" class="form-control" id="shipping_tel"
                                   name="shipping_tel" required>
                        </div>

                        <div class="form-group">

                            <label for="shipping_address">ที่อยู่จัดส่ง:</label>
                            <textarea class="form-control" id="shipping_address"
                                      name="shipping_address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="discount">ส่วนลด:</label>
                            <input type="number" step="0.01" class="form-control"
                                   id="discount" name="discount" required>
                        </div>

                        <button type="submit" class="btn btn-primary">ยืนยันการสั่งซ้ือ</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
