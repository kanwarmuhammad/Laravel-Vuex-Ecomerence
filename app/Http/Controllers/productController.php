<?php

namespace App\Http\Controllers;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    //
    public function storeProducts(Request $request) {
        // dd($request);
        return product::create([
            'title' => $request->title,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image' => $request->image,
            'categoery_id' => $request->categoery_id,
        ]);
    }
    public function getProducts(Request $request) {
        // $query = product::join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
        //     ->select('products.*', 'categoeries.name', 'categoeries.id as cat_id')
        //     ->get();
        // dd($query);
        $query = DB::table('products')
            ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
            ->select('products.*', 'categoeries.name', 'categoeries.id as cat_id')
            ->get();
        return $query;
    }
    public  function updateProducts(Request $request, $id){
        $page = product::find($id);
        // dd($page);
        $page->title = $request->title;
        $page->price = $request->price;
        $page->quantity = $request->quantity;
        $page->description = $request->description;
        $page->image = $request->image;
        $page->categoery_id = $request->categoery_id;
        $page->save();
        // $name->where('id', $request->id)->update(['name' => $request->name]);
    }
    public function deleteProducts(Request $request){
        $car = product::find($request->id)->delete();
    }


    public function getMeals(Request $request) {
             $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Make It Meal')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getEveryDay(Request $request) {
        // dd($request->searchFromDate);
        $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'EveryDay Value')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
        // return response()->json([$query]);
    }

    public function getBoxes(Request $request) {
            $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Signature Boxes')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getSharing(Request $request) {
            $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Sharing')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getPromotions(Request $request) {
            $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Promotions')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getSnacks(Request $request) {
            $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'Snacks')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getMidNightDeals(Request $request) {
            $selectedItem = ($request->input('selected'));
            if ($selectedItem == '') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->get();
            }
            if ($selectedItem == 'Oldest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('products.created_at','asc')
                ->get();
            }
            if ($selectedItem == 'NEwest') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('products.created_at','desc')
                ->get();
            }
            if ($selectedItem == 'Price(Low to High)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('products.price','asc')
                ->get();
            }
            if ($selectedItem == 'Price(High to Low)') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('price','desc')
                ->get();
            }
            if ($selectedItem == 'A-Z') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('title','asc')
                ->get();
            }
            if ($selectedItem == 'Z-A') {
                $query = DB::table('products')
                ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
                ->select('products.*')
                ->where('categoeries.name', '=', 'MidNight Deals')
                ->orderBy('title','desc')
                ->get();
            }
        return $query;
    }

    public function getHomoeKfc(Request $request) {
        $searchValue = $request->input('search');
        $query = DB::table('products')
            ->join('categoeries', 'products.categoery_id', '=', 'categoeries.id')
            ->select('products.*')
            ->where('categoeries.name',['HomeKfc']);
            if ($searchValue != '') {
                $query->where(function($query)use($searchValue){
                    $query->where('products.title',
                    'like',
                    '%' . $searchValue . '%')
                    ->orWhere('products.description',
                    'like',
                    '%' . $searchValue . '%')
                    ->orWhere('products.price',
                    'like',
                    '%' . $searchValue . '%');
                });
            }
            if ($searchValue = '') {
                $query->where(function($query)use($searchValue){
                    $query->where('products.title',
                    'like',
                    '%' . $searchValue . '%')
                    ->orWhere('products.description',
                    'like',
                    '%' . $searchValue . '%')
                    ->orWhere('products.price',
                    'like',
                    '%' . $searchValue . '%');
                });
            }
            $query=$query->get();
        return $query;
    }
}
