@extends('layouts.myapp')
@section('content')
    @if(session('status'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success text-white" role="alert">
                    <strong>Success!</strong> {{ session('status') }}
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div
            @if(count($carts)>0)
                class="col-8"
            @else
                class="col-12"
            @endif
            >
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>สินค้าของเรา ({{ $products -> count() }})</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ชื่อ
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    ราคา
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    จำนวนคงเหลือ
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    เครื่องมือ
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                <td>
                                    <p class="text-xs px-4 font-weight-bold mb-0">{{$product->id}}</p>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ $product->image_url == '' ? '/assets/img/box.png' : $product->image_url }}"  class="avatar avatar-sm me-3" alt="user1">
                                        </div>

                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                                            <p class="text-xs text-secondary mb-0">{{$product->productType->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$product->price}}</p>
                                    <p class="text-xs text-secondary mb-0">บาท</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{$product->qty}}</p>
                                    <p class="text-xs text-secondary mb-0">ชิ้น</p>
                                </td>
                                <td class="align-middle">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" class="btn btn-outline-success px-3 py-2"><i
                                                class="fa fa-pencil"></i> แก้ไข</a>
                                        <button type="submit" class="btn btn-outline-danger px-3 py-2"
                                                onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่?')"><i
                                                class="fa fa-trash"></i> ลบ
                                        </button>
                                        <a href="{{route('create_sale')}}" class="form-control btn btn-lg btn-success px-3 py-2"><i
                                                class="fa fa-shopping-cart"></i> สั่งซื้อ</a>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('product.cart',['carts'=>$carts])
    </div>
@endsection
