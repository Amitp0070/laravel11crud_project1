<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    // This method will show all the products
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        return view('products.product_list',[
            'products' => $product
        ]);
    }
    // This method will show single product page
    public function create()
    {
        return view('products.create');
    }

    // This method will store the product
    public function store(Request $request)
    {
        // Validation ke rules define kar rahe hain
        $rules = [
            'name' => 'required|min:5', // 'name' field required hai aur minimum 5 characters hone chahiye
            'sku' => 'required|min:3',  // 'sku' field required hai aur minimum 3 characters hone chahiye
            'price' => 'required|numeric', // 'price' field required hai aur yeh sirf numbers accept karega
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';
        }

        // Validator ka use karke request data ko validate kar rahe hain
        $validator  = Validator::make($request->all(), $rules);

        // Agar validation fail ho jata hai toh
        if ($validator->fails()) {
            // User ko 'products.create' page par wapas bhej rahe hain 
            // Errors ke saath jo validation ke time generate hue hain
            // Aur jo input user ne diya tha wo bhi wapas bhej rahe hain taki dobara fill kar sake
            return redirect()->route('products.create')->withErrors($validator)->withInput();
        }

        // here we will insert products in db 
        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        if ($request->image != "") {
            // here we will upload image
            $image = $request->image;
            $ext  = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext; //Unique image name 

            // Save image to product directory
            $image->move(public_path('uploads/products'), $imageName);

            // save image in db 
            $product->image = $imageName;
            $product->save();
        }



        return redirect()->route('products.index')->with('success', 'Product has been added successfully!');
    }

    // This methos will show the edit product page 
    public function edit() {}

    // This method will update the product
    public function update() {}

    // This method will delete the product
    public function delete() {}
}
