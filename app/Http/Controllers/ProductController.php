<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @var PostRepositoryInterface|\App\Repositories\Repository
     */
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        $products = $this->productRepo->getAll();
        $count = is_countable($products) ? count($products) : 0;

        return view('home.products', [
            'products' => $products,
            'count' => $count
        ]);
    }

    public function show($id)
    {
        $product = $this->productRepo->find($id);

        return view('home.product', ['product' => $product]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->productRepo->create($data);

        return view('home.products');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        //... Validation here

        $product = $this->productRepo->update($id, $data);

        return view('home.products');
    }

    public function destroy($id)
    {
        $this->productRepo->delete($id);
        
        return view('home.products');
    }

    /**
     * Basic hello endpoint
     */
    public function getHello()
    {
        return response('Hello');
    }

    // Hàm sai convention (tên hàm không đúng camelCase)
    public function Get_Hello_Wrong()
    {
                $test_sai = 111;
        for($i = 0; $i < 10; $i++) { 
            if ($i = 5) {
                return view('home.products');
            }
        }


        return 'Sai convention!';
    }
}
