<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Product;
use App\Models\SelectedProduct;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function home()
    {
        $pages = Page::where('slug', 'home')->first();
        $sections = $pages ? $pages->sections : [] ;
        $testimonials = Testimonial::all();

        return view('pages.home', compact('sections', 'testimonials'));
    }

    public function product()
    {
        $page = Page::where('slug', 'product')->first();
        $products = Product::with('details')->get();

        return view('pages.product', compact('products'));
    }

    public function checkout()
    {
        $page = Page::where('slug', 'checkout')->first();
        $selected_products = SelectedProduct::with('details')->get();

        return view('pages.checkout', compact('selected_products'));
    }

    // public function process()
    // {
    //     return view('pages.process');
    // }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Page::create($request->all());

        return redirect()->route('pages.index')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $page->update($request->all());

        return redirect()->route('pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully.');
    }
}
