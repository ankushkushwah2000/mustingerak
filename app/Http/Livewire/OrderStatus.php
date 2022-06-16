<?php

namespace App\Http\Livewire;

use App\Models\Status;
use Livewire\Component;

class OrderStatus extends Component
{

    public $order;
    public $currentStatus;
    public $statuses;
    public $status_id = 1;


    public function render()
    {
        $this->statuses = Status::where("status", 1)->get();
        $order_statuses = $this->order->statuses;
        $this->currentStatus = $order_statuses[0]->title;
        return view('livewire.order-status');
    }
}
