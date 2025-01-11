<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideBar extends Component
{
    public $menus = [
        [
            'title' => 'Dashboard',
            'icon' => 'bx bx-grid-alt',
            'route' => 'admin.dashboard',
            'isSubMenu' => false,
            'name' => 'dashboard',
        ],
       

        // [
        //     'title' => 'CMS',
        //     'icon' => 'fal fa-file-alt',
        //     'isSubMenu' => true,
        //     'name' => 'cms',
        //     'subMenus' => [
        //         [
        //             'title' => 'Pages',
        //             'icon' => 'bx bx-chevron-right',
        //             'route' => 'admin.cms.pages.index',
        //         ],

        //     ]
        // ],
        // [
        //     'title' => 'Masters',
        //     'icon' => 'fal fa-cogs',
        //     'isSubMenu' => true,
        //     'name' => 'masters',
        //     'subMenus' => [
        //         [
        //             'title' => 'Settings',
        //             'icon' => 'bx bx-chevron-right',
        //             'route' => 'admin.masters.settings.index',
        //         ],
        //         [
        //             'title' => 'Emoji',
        //             'icon' => 'bx bx-chevron-right',
        //             'route' => 'admin.masters.emoji.index',
        //         ],
        //         [
        //             'title' => 'Subscription Plans',
        //             'icon' => 'bx bx-chevron-right',
        //             'route' => 'admin.masters.subscription-plans.index',
        //         ],
        //         [
        //             'title' => 'Weekly Tips',
        //             'icon' => 'bx bx-chevron-right',
        //             'route' => 'admin.masters.weekly-tips.index',
        //         ],
        //     ]
        // ],
    ];


    public function __construct()
    {
        $this->menus = collect($this->menus);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.side-bar');
    }
}
