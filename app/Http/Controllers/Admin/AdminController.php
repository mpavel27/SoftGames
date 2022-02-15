<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Admin\CreateProduct;
use App\Http\Requests\Admin\CreateCategory;

class AdminController extends Controller
{
    public function viewProducts() {
        $categories = Categories::with('products')->get();
        $pterodactyl = new ApiController();
        $nests = $pterodactyl->getApplicationData('nests');
        return view('pages.admin.products', compact(['categories', 'nests']));
    }

    public function createProduct(CreateProduct $request) {
        if ($request->validated()) {
            $product = new Products();
            $product->name = $request->product_name;
            $product->description = $request->product_desc;
            $product->category = $request->product_category;
            $product->price = $request->product_price;
            $product->anual_price = $request->product_anual_price;
            $product->created_by = auth()->user()->id;
            $product->image = $request->product_image;
            $product->port = $request->product_port;
            $product->location = $request->product_location;
            $egg = json_decode($request->product_eggs);
            $pterodactyl_requirements = [
                'name' => $request->product_name,
                'egg' => $egg->attributes->id,
                'docker_image' => $egg->attributes->docker_image,
                'startup' => $egg->attributes->startup,
                'environment' => $request->except(['product_name', 'product_desc', 'product_eggs', 'product_category', 'product_price', 'product_anual_price', 'product_nest', 'product_image', '_token', 'product_ram_limit', 'product_swap', 'product_disk_limit', 'product_block_io', 'product_cpu_limit', 'product_database_limit', 'product_backup_limit', 'product_port', 'product_location']),
                'limits' => [
                    "memory" => $request->product_ram_limit,
                    "swap" => $request->product_swap,
                    "disk" => $request->product_disk_limit,
                    "io" => $request->product_block_io,
                    "cpu" => $request->product_cpu_limit
                ],
                'feature_limits' => [
                    "databases" => $request->product_database_limit,
                    "backups" => $request->product_backup_limit,
                ]

            ];
            $product->requirements = json_encode($pterodactyl_requirements);
            $product->save();
            toastr()->success('Ai adăugat cu success un nou produs!');
        }
        return redirect()->back();
    }

    public function createCategory(CreateCategory $request) {
        if ($request->validated()) {
            $category = new Categories();
            $category->name = $request->category_name;
            $category->created_by = auth()->user()->id;
            $category->save();
            toastr()->success('Ai adăugat cu success o nouă categorie!');
        }
        return redirect()->back();
    }
}
