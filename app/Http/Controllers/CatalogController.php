<?php

namespace App\Http\Controllers;

use App\Page;
use App\Catalog;
use App\Good;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function __construct(Catalog $catalog, Good $good, Page $page)
    {
        $this->catalog = $catalog;
        $this->good = $good;
        $this->page = $page;
    }

    public function show(Catalog $catalog)
    {
//        foreach ($catalog->goods as $item) {
//            dd('TEST',$catalog);
//        }
        $perPage = 9;
        if(config('perPage'))
            $perPage = config('perPage');
        $template = 'catalog';
        $data = ['data' => $catalog];
        $data['groups'] = $this->catalog->all();
        $data['phone'] = config('phone');
        $data['email'] = config('email');
        $data['address'] = config('address');
        $data['goods'] = $catalog->goods()->paginate($perPage);
        $data['pages'] = $this->page->getMenu();

        return view($template, $data);
    }


}
