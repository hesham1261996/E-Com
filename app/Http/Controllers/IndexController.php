<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Item;
use Dotenv\Util\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use PHPUnit\Event\SubscriberTypeAlreadyRegisteredException;

class IndexController extends Controller
{
    public function home(){
        $items = Item::where('discount' , null)->orderBy('id' , 'DESC')->take(5)->get();
        $categories = Category::paginate(4);
        $offers = Item::whereNot('discount' , null )->get();
        $title = __('الرئيسيه');

        return view('index' , compact('items' , 'categories' , 'offers' , 'title'));
    }
    public function companies(){
        $companies = Company::paginate(10);
        return view('companies.index' , compact('companies'));
    }

    public function show_item($item){
        $item = Item::find($item);
        return view('items.details' , compact('item'));
    }

    public function create(){
        return view('users.login');
    }

}
