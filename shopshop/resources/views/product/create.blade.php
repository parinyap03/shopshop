@extends('layouts.myapp')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>เพิ่มสินคา้ใหม่</h6>
                </div>
                <div class="card-body pb-2">
                    <form role="form" method="post"
                          enctype="multipart/form-data"
                          id="product-form"
                          action="{{ route('products.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">ชื่อสินค้า

                                    </label>

                                    <input class="form-control" type="text" value=""

                                           name="name" id="name">

                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="name" class="form-control-label">ประเภท

                                    </label>

                                    <select class="form-control" name="product_type_id" id="product_type_id">
                                        @foreach($ptypes as $pt)
                                            <option value="{{$pt->id}}">{{$pt->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">ราคาทุน

                                    </label>

                                    <input class="form-control" type="text" value=""

                                           name="price" id="price">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="price" class="form-control-label">ราคาขาย

                                    </label>

                                    <input class="form-control" type="text" value=""

                                           name="cost" id="cost">

                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="qty" class="form-control-label">จำนวนคงเหลือ

                                    </label>

                                    <input class="form-control" type="text" value=""

                                           name="qty" id="qty">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="image_url" class="form-control-label">รูปภาพ

                                    (url)</label>

                                <input class="form-control" type="text" value=""

                                       name="image_url" id="image_url">
                            </div>
                            <div class="col-6">
                                <label for="image" class="form-control-label">รูปภาพ

                                    (upload)</label>

                                <input class="form-control" type="file" value=""

                                       name="image" id="image">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success px-3 py-2"><i
                                            class="fa fa-save"></i> บันทึก
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="card-footer pb-0">
                </div>
            </div>
        </div>
    </div>
@endsection
