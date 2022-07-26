<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use App\Models\Order as UserOrder;
use Livewire\Component;

class Order extends Component
{
    public $orderDetails;
    public $menus;
    public $order;
    public $total;

    protected $listeners = ['change'];

    public function mount()
    {
        $this->menus = Menu::all();
        if ($this->order) {
            $orderMenus = UserOrder::find($this->order->id)->menus;
            foreach ($orderMenus as $orderMenu) {
                $total = $orderMenu->pivot->qty * $orderMenu->price;
                $this->orderDetails[] = [
                    'menu_id' => $orderMenu->pivot->menu_id,
                    'qty' => $orderMenu->pivot->qty,
                    'price' => $orderMenu->price,
                    'total' => $total,
                ];
                $this->total += $total;
            }
        } else {
            $this->orderDetails[] = [
                'menu_id' => '', 'qty' => 0, 'price' => 0, 'total' => 0
            ];
            $this->total = 0;
        }
    }

    public function addRow()
    {
        $this->orderDetails[] = [
            'menu_id' => '', 'qty' => 0, 'price' => 0, 'total' => 0
        ];
    }

    public function removeRow($index)
    {
        $this->total -= $this->orderDetails[$index]['total'];
        unset($this->orderDetails[$index]);
        array_values($this->orderDetails);
    }

    public function change($index)
    {
        $this->total -= $this->orderDetails[$index]['total'];
        $this->orderDetails[$index]['price'] = Menu::find($this->orderDetails[$index]['menu_id'])->price;
        $this->orderDetails[$index]['total'] =   (int) $this->orderDetails[$index]['qty'] * (int) $this->orderDetails[$index]['price'];
        $this->total += $this->orderDetails[$index]['total'];
    }

    public function render()
    {
        // $this->total = number_format($this->total, 0, ',', '.');
        return view('livewire.order');
    }
}