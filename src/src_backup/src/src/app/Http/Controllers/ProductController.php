<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index(){
        $products = Product::paginate(6)->withQueryString();
        return view('index',compact('products'));
    }
    public function show(){
        $seasons=Season::all();
        return view('register',compact('seasons'));
    }
    public function store(ProductRequest $request){
        //ファイルをパブリックに保存⇒パスの保存
        if( $request->hasFile('image')){
            $originalName=$request->file('image')->getClientOriginalName();
            $path =$request->file('image')->storeAs('images', $originalName,'public');
            }else{
            $path = null;}

        $product = Product ::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $path,
            'description' => $request->description
        ]);

        //中間テーブルに保存
        if($request->has('season_id')){
        $product->seasons()->attach($request->season_id);

        return redirect('/products');
        }
    }
    public function search(Request$request){
        $products = Product::NameSearch($request->name)->paginate(6)->withQueryString();
        return view('index',compact('products'));
    }
    public function sort(Request$request){
        $query = Product::query();
        if($request-> price === 'asc'){
            $query->orderBy('price','asc');
        }elseif($request-> price === 'desc'){
            $query->orderBy('price','desc');
        }
        $products = $query->paginate(6)->withQueryString();
        return view('index',compact('products'));
    }
}