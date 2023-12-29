<?php
namespace App\Http\viewComposer;

use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoryComposer {
    public $categories ;

    public function __construct(Category $category)
    {
        $this->categories = $category ;
    }

    public function compose(View $view){
        return $view->with('categories' , $this->categories::take(5)->get());
    }
}