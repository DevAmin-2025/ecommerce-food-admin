<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::latest()->with('category')->paginate(5);
        return view('products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::where('status', 1)->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'primary_image' => 'required|image|max:1024',
            'images' => 'nullable',
            'images.*' => 'image|max:1024',
            'name' => 'required|string|min:3',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'is_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
            'is_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
            'description' => 'required|min:10',
        ]);

        $fileName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
        $request->primary_image->storeAs('images/products', $fileName);

        if ($request->images) {
            $imagesList = [];
            foreach ($request->images as $image) {
                $imageName = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                array_push($imagesList, $imageName);
                $image->storeAS('images/products', $imageName);
            };
        };

        try {
            DB::beginTransaction();
            $product = Product::create([
                'name' => $request->name,
                'slug' => slugify($request->name),
                'category_id' => $request->category_id,
                'primary_image' => $fileName,
                'status' => $request->status,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'sale_price' => $request->sale_price ? $request->sale_price : 0,
                'is_on_sale_from' => $request->is_on_sale_from ? toGregorian($request->is_on_sale_from) : null,
                'is_on_sale_to' => $request->is_on_sale_to ? toGregorian($request->is_on_sale_to) : null,
                'description' => $request->description
            ]);

            if (isset($imagesList)) {
                foreach ($imagesList as $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $image
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with('success', 'محصول موردنظر با موفقیت افزوده شد.');
        } catch (\Exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'عملیات با خطا مواجه شد');
        }
    }

    public function edit(Product $product): View
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'primary_image' => 'nullable|image|max:1024',
            'images' => 'nullable',
            'images.*' => 'image|max:1024',
            'name' => 'required|string|min:3',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'is_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
            'is_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
            'description' => 'required|min:10',
        ]);

        if ($request->primary_image) {
            Storage::delete('images/products/' . $product->primary_image);
            $fileName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
            $request->primary_image->storeAs('images/products', $fileName);
        }

        if ($request->images) {
            foreach ($product->images as $productImage) {
                Storage::delete('images/products/' . $productImage->image);
            }
            $imagesList = [];
            foreach ($request->images as $image) {
                $imageName = Carbon::now()->microsecond . '-' . $image->getClientOriginalName();
                array_push($imagesList, $imageName);
                $image->storeAS('images/products', $imageName);
            };
        }

        try {
            DB::beginTransaction();
            $product->update([
                    'name' => $request->name,
                    'slug' => slugify($request->name),
                    'category_id' => $request->category_id,
                    'primary_image' => isset($fileName) ? $fileName : $product->primary_image,
                    'status' => $request->status,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'sale_price' => $request->sale_price ? $request->sale_price : 0,
                    'is_on_sale_from' => $request->is_on_sale_from ? toGregorian($request->is_on_sale_from) : null,
                    'is_on_sale_to' => $request->is_on_sale_to ? toGregorian($request->is_on_sale_to) : null,
                    'description' => $request->description
            ]);

            if (isset($imagesList)) {
                ProductImage::where('product_id', $product->id)->delete();
                foreach ($imagesList as $image) {
                     ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $image
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('product.index')->with('success', 'محصول موردنظر با موفقیت ویرایش شد.');
        } catch (\Exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'عملیات با خطا مواجه شد');
        }
    }

    public function show(Product $product): View
    {
        return view('products.show', compact('product'));
    }

    public function destroy(Product $product): RedirectResponse
    {
        Storage::delete('images/products/' . $product->primary_image);
        foreach ($product->images as $productImage) {
            Storage::delete('images/products/' . $productImage->image);
        }
        $product->delete();
        return redirect()->route('product.index')->with('warning', 'محصول مورد نظر با موفقیت حذف شد.');
    }
}
