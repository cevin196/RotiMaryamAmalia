@include('includes.formater')
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keranjang as $item)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        @if (App\Models\Menu::find($item->id)->gambar)
                                            <img src="{{asset('menu/' . App\Models\Menu::find($item->id)->gambar)}}" alt="" style="width: 70px; height: 70px">
                                        @else
                                            <img src="{{asset('menu/menu-default.png')}}" alt="" style="width: 70px; height: 70px">
                                        @endif
                                        
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{$item->name}}</h6>
                                        {{-- <h5>Rp. {{$item->price}}</h5> --}}
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">                                        
                                        <a type="button" wire:click='tambahQty("{{$item->rowId}}")' class="btn btn-lg">+</a>
                                        <span>{{$item->qty}}</span>
                                        <a wire:click='kurangQty("{{$item->rowId}}")' class="btn btn-lg">-</i></a>
                                        {{-- <div class="pro-qty">
                                            <input type="text" wire:model='keranjang.{{$index}}.qty'>
                                        </div> --}}
                                    </div>
                                </td>
                                <td class="cart__price">{{rupiah($item->price)}}</td>
                                <td class="cart__price">{{rupiah((int)$item->price * (int) $item->qty)}}</td>
                                <td class="cart__close"><a type="button" wire:click='hapusItem("{{$item->rowId}}")'><span class="icon_close"></span></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('belanja')}}">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">                    
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        {{-- <li>Subtotal <span>$ 169.50</span></li> --}}
                        <li>Total <span>Rp.  {{$cartTotal}}</span></li>
                    </ul>
                    <a href="{{route('checkout.index')}}" class="primary-btn">Menu Checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>