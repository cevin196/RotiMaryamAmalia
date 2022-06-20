<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Pesanan as PesananUser;
use Livewire\Component;

class Pesanan extends Component
{
    public $detailPesanans;
    public $menus;
    public $pesanan;
    public $total;

    protected $listeners = ['change'];

    public function mount()
    {
        $this->menus = Menu::all();
        if ($this->pesanan) {
            $pesananMenus = PesananUser::find($this->pesanan->id)->menus;
            foreach ($pesananMenus as $pesananMenu) {
                $jumlah = $pesananMenu->pivot->qty * $pesananMenu->pivot->harga;
                $this->detailPesanans[] = [
                    'menu_id' => $pesananMenu->pivot->menu_id,
                    'qty' => $pesananMenu->pivot->qty,
                    'harga' => $pesananMenu->pivot->harga,
                    'jumlah' => $jumlah,
                ];
                $this->total += $jumlah;
            }
        } else {
            $this->detailPesanans[] = [
                'menu_id' => '', 'qty' => 0, 'harga' => 0, 'jumlah' => 0
            ];
            $total = 0;
        }
    }

    public function addRow()
    {
        $this->detailPesanans[] = [
            'menu_id' => '', 'qty' => 0, 'harga' => 0, 'jumlah' => 0
        ];
    }

    public function removeRow($index)
    {
        $this->total -= $this->detailPesanans[$index]['jumlah'];
        unset($this->detailPesanans[$index]);
        array_values($this->detailPesanans);
    }

    public function change($index)
    {
        $this->total -= $this->detailPesanans[$index]['jumlah'];
        $this->detailPesanans[$index]['harga'] = Menu::find($this->detailPesanans[$index]['menu_id'])->harga;
        $this->detailPesanans[$index]['jumlah'] =   (int) $this->detailPesanans[$index]['qty'] * (int) $this->detailPesanans[$index]['harga'];
        $this->total += $this->detailPesanans[$index]['jumlah'];
    }

    public function render()
    {
        // $this->total = number_format($this->total, 0, ',', '.');
        return view('livewire.pesanan');
    }
}