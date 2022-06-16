<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Role;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    public function index()
    {
        return view("admin.products.list", [
            "products" => Product::all()
        ]);
    }


    public function create()
    {
        return view("admin.products.create", [
            "users" => User::where('status', 1)->whereIn("role_id", [Role::IS_SELLER])->get(),
            "brands" => Brand::all(),
            "categories" => Category::all(),
            "subcategories" => SubCategory::all(),
            "subsubcategories" => SubSubCategory::all(),
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            "seller_id" => ["seller_id"],
            "title" => ["required"],
            "summary" => ["required"],
            "description" => ["required"],
            "features" => ["required"],
            "box_content" => ["required"],
            "category_id" => ["required"],
            "sub_category_id" => ["required"],
            "sub_sub_category_id" => ["required"],
            "mrp" => ["required"],
            "price" => ["required"],
            "selling_price" => ["required"],
            "gst" => ["required"],
            "pin_code" => ["required"],
            "manufacture" => ["required"],
            "country" => ["required"],
            "quantity" => ["required"],
            "brand" => ["required"],
            "model" => ["required"],
            "hsn" => ["required"],
            "sku" => ["required"],
            "warranty" => ["required"],
            "image" => ["required"],
            "multiple_images" => ["required", "max:5"],
            "key_features" => ["required"],
            "legal_disclaimer" => ["max:255"],
        ]);

        $filePath = $request->file("image")->store("/products");

        $product = Product::create([
            "seller_id" => $request->seller ?? auth()->id(),
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "summary" => $request->summary,
            "description" => $request->description,
            "features" => $request->features,
            "box_content" => $request->box_content,
            "status" => $request->status ? 1 : 0,
            "in_stock" => $request->in_stock ? 1 : 0,
            "cod_enable" => $request->cod_enable ? 1 : 0,
            "is_popular" => $request->is_popular ? 1 : 0,
            "is_featured" => $request->is_featured ? 1 : 0,
            "is_gift_wrap_available" => $request->is_gift_wrap_available ? 1 : 0,
            "category_id" => $request->category_id,
            "sub_category_id" => $request->sub_category_id,
            "sub_sub_category_id" => $request->sub_sub_category_id,
            "mrp" => $request->mrp,
            "price" => $request->price,
            "selling_price" => $request->selling_price,
            "gst" => $request->gst,
            "pin_code" => $request->pin_code,
            "manufacture" => $request->manufacture,
            "country" => $request->country,
            "quantity" => $request->quantity,
            "brand_id" => $request->brand,
            "model" => $request->model,
            "hsn" => $request->hsn,
            "sku" => $request->sku,
            "warranty" => $request->warranty,
            "image" => $filePath,
            "key_features" => $request->key_features,
            "legal_disclaimer" => $request->legal_disclaimer,
            "condition" => $request->condition,
            "condition_note" => $request->condition_note,
            "maximum_order_quantity" => $request->maximum_order_quantity ?? 0,
        ]);

        /* store multiple images */

        $multiple_images = $request->multiple_images;

        if ($multiple_images) {
            foreach ($multiple_images as $image) {
                $imagePath = $image->store("/products/multiple");
                ProductImage::create([
                    "product_id" => $product->id,
                    "path" => $imagePath,
                ]);
            }
        }

        Session::flash('success', 'New Product has been created');
        return back();
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        // dd($product->images);
        return view("admin.products.edit", [
            "product" => $product,
            "brands" => Brand::all(),
            "categories" => Category::all(),
            "users" => User::where('status', 1)->whereIn("role_id", [Role::IS_SELLER])->get(),
            "subcategories" => SubCategory::all(),
            "subsubcategories" => SubSubCategory::all(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        // dd($request->all());

        $request->validate([
            "seller" => ["required"],
            "title" => ["required"],
            "summary" => ["required"],
            "description" => ["required"],
            "features" => ["required"],
            "box_content" => ["required"],
            "category_id" => ["required"],
            "sub_category_id" => ["required"],
            "sub_sub_category_id" => ["required"],
            "mrp" => ["required"],
            "price" => ["required"],
            "selling_price" => ["required"],
            "gst" => ["required"],
            "pin_code" => ["required"],
            "manufacture" => ["required"],
            "country" => ["required"],
            "quantity" => ["required"],
            "brand" => ["required"],
            "model" => ["required"],
            "hsn" => ["required"],
            "sku" => ["required"],
            "warranty" => ["required"],
            "multiple_images" => ["max:5"],
            "key_features" => ["required"],
            "legal_disclaimer" => ["max:255"],
        ]);

        // dd($request->all());

        if ($request->file("image")) {
            Storage::delete($product->image);
            $filePath = $request->file("image")->store("/products");
        } else {
            $filePath = $product->image;
        }

        $product->update([
            "seller_id" => $request->seller,
            "title" => $request->title,
            "slug" => Str::slug($request->title),
            "summary" => $request->summary,
            "description" => $request->description,
            "features" => $request->features,
            "box_content" => $request->box_content,
            "status" => $request->status ? 1 : 0,
            "in_stock" => $request->in_stock ? 1 : 0,
            "cod_enable" => $request->cod_enable ? 1 : 0,
            "is_popular" => $request->is_popular ? 1 : 0,
            "is_featured" => $request->is_featured ? 1 : 0,
            "is_gift_wrap_available" => $request->is_gift_wrap_available ? 1 : 0,
            "category_id" => $request->category_id,
            "sub_category_id" => $request->sub_category_id,
            "sub_sub_category_id" => $request->sub_sub_category_id,
            "mrp" => $request->mrp,
            "price" => $request->price,
            "selling_price" => $request->selling_price,
            "gst" => $request->gst,
            "pin_code" => $request->pin_code,
            "manufacture" => $request->manufacture,
            "country" => $request->country,
            "quantity" => $request->quantity,
            "brand_id" => $request->brand,
            "model" => $request->model,
            "hsn" => $request->hsn,
            "sku" => $request->sku,
            "warranty" => $request->warranty,
            "image" => $filePath,
            "key_features" => $request->key_features,
            "legal_disclaimer" => $request->legal_disclaimer,
            "condition" => $request->condition,
            "condition_note" => $request->condition_note,
            "maximum_order_quantity" => $request->maximum_order_quantity ?? 0,
            "restock_at" => $request->restock_at,

        ]);

        /* store multiple images */

        $multiple_images = $request->multiple_images;

        if ($multiple_images) {

            foreach ($multiple_images as $image) {
                $imagePath = $image->store("/products/multiple");
                ProductImage::create([
                    "product_id" => $product->id,
                    "path" => $imagePath,
                ]);
            }
        }

        Session::flash('info', 'Product has been updated');
        return back();
    }

    public function destroy(Product $product)
    {
        // delete product multiple_images
        foreach ($product->images as $productImage) {
            Storage::delete($productImage->getRawOriginal("path"));
            $productImage->delete();
        }

        Storage::delete($product->image);
        $product->delete();
        Session::flash('success', 'Product has been Deleted');
        return back();
    }


    function productImageDestroy(ProductImage $productImage)
    {
        Storage::delete($productImage->getRawOriginal("path"));
        $productImage->delete();
        Session::flash('success', 'Product Image has been Deleted');
        return back();
    }
}
