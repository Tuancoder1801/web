<?php


namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $users;

    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $categies = Category::select('id', 'name')->orderByDesc('id')->get();

        $view->with('categoties', $categies);
    }
}