<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $tableName;
    public $table;
    public $items;
    public $humanReadableName;
    public function __construct($tableName, $table, $items, $humanReadableName)
    {
        $this->tableName=$tableName;
        $this->table=$table;
        $this->items=$items;
        $this->humanReadableName = $humanReadableName;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin-card');
    }
}
