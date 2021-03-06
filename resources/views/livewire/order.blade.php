
<div class="col-12 mt-2 border p-3 rounded">
    <h5>Detail Produksi</h5>
    <table class="w-100 ">
        <thead>
            <th class="col">Menu</th>
            <th class="col-3">Harga</th>
            <th class="col-1">Qty</th>
            <th class="col-3">Jumlah</th>
            <th class="col-1"></th>
        </thead>
        <tbody>
            @foreach($orderDetails as $index => $orderDetail)
            <tr>
                <td>
                    <select name="orderDetails[{{$index}}][menu_id]" id="selectSearch-{{$index}}" class="form-select"
                        wire:model="orderDetails.{{$index}}.menu_id" wire:key="{{ $loop->index }}"
                        onmouseover="dselect(document.querySelector('#selectSearch-{{$index}}'), {search: true,maxHeight: '360px',size: '',});"
                        value="{{old('detailKonfirmasi[$index][menu_id]')}}" wire:change="change({{$index}})">
                        <option value="">-- Pilih Menu --</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->id}}" {{($orderDetail['menu_id']==$menu->id)?"selected":""}}>
                            {{$menu->id .' - '.$menu->name}}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <input type="text" wire:model="orderDetails.{{$index}}.price" class="form-control" disabled>
                    <input type="hidden" name="orderDetails[{{$index}}][price]"
                        wire:model="orderDetails.{{$index}}.price" class="form-control">
                </td>

                <td>
                    <input type="number" name="orderDetails[{{$index}}][qty]"
                        wire:model="orderDetails.{{$index}}.qty" class="form-control"
                        wire:change="change({{$index}})">
                </td>

                <td>
                    <input type="text" wire:model="orderDetails.{{$index}}.total" class="form-control" disabled>
                    <input type="hidden" name="orderDetails[{{$index}}][total]"
                        wire:model="orderDetails.{{$index}}.total" class="form-control">
                </td>

                <td>
                    <button wire:click.prevent="removeRow({{$index}})" type="button"
                        class="btn btn-danger">Hapus</button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{-- <span>Total: </span><input type="text" wire:model="total" class="form-control w-50 right-0 absolute mt-3" disabled> --}}
        <div class="row g-3 align-items-center mt-3">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Total: </label>
            </div>
            <div class="col-auto">
                <input type="text" wire:model="total" class="form-control" disabled>
                <input type="hidden" name="total" wire:model="total">
            </div>
        </div>
    </div>
    <button wire:click.prevent="addRow" type="button" class="btn btn-primary mt-1">Tambah Data</button>

</div>
