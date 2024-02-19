@if($carts->count()> 0 )
<div class="col-4">
    <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col">
                    <h6>รถสิบล้อ ({{count($carts)}}รายการ)</h6>
                </div>
                <div class="col-4">

                    <a href="{{route('empty_cart')}}" class="btn btn-danger px-3 py-2">
                        <i class="fa fa-trash"></i> ทิ้ง</a>
                </div>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>

                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">หมวดหมู่
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ราคา
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            จำนวน</th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $item)
                    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div>
                                    @if($item->product->image_url == "")
                                    <img src="/assets/img/box.png"
                                         class="avatar avatar-sm me-3" alt="user1">
                                    @else
                                    <img src="{{$item->product->image_url}}"
                                         class="avatar avatar-sm me-3" alt="user1">
                                    @endif
                                </div>
                                <div class="d-flex flex-column justify-content-center max-width-150 text-wrap">
                                    <h6 class="mb-0 text-sm">{{$item->product->name}}</h6>
                                    <p class="text-xs text-secondary mb-0"></p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->product->price}}</p>
                            <p class="text-xs text-secondary mb-0">บาท</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->qty}}</p>
                            <p class="text-xs text-secondary mb-0">ชิ้น</p>
                        </td>
                        <td class="align-middle">

                            <a href="{{route('remove_from_cart',$item->product_id)}}"  class="btn btn-outline-danger px-3 py-2r btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i
                                    class="fa fa-minus"></i></a>

                            <a href="{{route('add_to_cart',$item->product_id)}}" class="btn btn-outline-primary px-3 py-2">
                                <i class="fas fa-plus"></i></a>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="card-footer">
            <a href="#" class="form-control btn btn-lg btn-success px-3 py-2">
                <i class="fas fa-shopping-cart"></i> สั่งซื้อ</a>
        </div>
    </div>
</div>
@endif
