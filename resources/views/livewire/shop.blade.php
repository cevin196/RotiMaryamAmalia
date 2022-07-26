<section class="shop spad">
    <div class="col-lg-12 text-center">
        <div class="section-title">
            <h2>Menu Kami</h2>
        </div>
    </div>
    @include('admin.includes.formater')
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-12 col-md-7">
                    <div class="shop__option__search">
                        <form>
                            <input type="text" placeholder="Cari Menu..." wire:model='searchKey'>
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach ($menus as $menu)
            <form wire:submit.prevent='addToCart({{$menu->id}})' class="col-lg-3 col-md-6 col-sm-6">
                @csrf
                    {{-- <input type="hidden" name="menu_id" value="{{$menu->id}}"> --}}
                    <div class="product__item">
                        <div class="product__item__pic" 
                        style="
                            background-image: url({{($menu->picture)?asset('menu/' . $menu->picture):'menu/menu-default.png'}});
                            background-repeat: no-repeat;
                            background-size: cover;
                            background-position: top center;" wire:key="lang{{$loop->index}}">
                            <div class="product__label">
                                <span>Roti Maryam</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$menu->name}}</a></h6>
                            <div class="product__item__price">{{rupiah($menu->price)}}</div>
                            <div class="cart_add">
                                @if ($cart->where('id', $menu->id)->count())
                                    <a href="#">Sudah di Keranjang</a>
                                @else
                                <button type="submit" class="btn btn-warning text-white">Tambah ke Keranjang</button>
                                @endif
                            </div>
                        </div>
                    </div>
            </form>
            @endforeach

        </div>

        {{$menus->links('vendor.pagination.custom')}}
        
    </div>
</section>