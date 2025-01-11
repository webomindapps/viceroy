<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomerProfile extends Component
{
    /**
     * Create a new component instance.
     */
    public $customer;
    public function __construct()
    {
        $this->customer = auth('customer')->user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.customer-profile');
    }
}
