@extends('layouts.myapp')
@section('content')
<h1>เกี่ยวกับร้าน ชอบช้อป</h1>
<ul>
    <li>เจ้าของร้าน : {{ $name }}</li>
    <li>เบอร์โทรศัพท์ : {{$phone }}</li>
    <li>ที่ต้งัร้าน : {{ $address }}</li>
</ul>
@endsection
