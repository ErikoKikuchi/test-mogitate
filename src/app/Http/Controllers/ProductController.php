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
        $query = Product::query();
        if($request->name){
            $query->where('name', 'like', '%' .$request->name .'%');
        }
        
        $sort = $request->input('price'); 

        if($request-> sort === 'asc'){
            $query->orderBy('price','asc');
            $sort = '低い順に表示';
        }elseif($request-> sort === 'desc'){
            $query->orderBy('price','desc');
            $sort = '高い順に表示';
        }
        $products = $query->paginate(6)->withQueryString();
        return view('index',compact('sort','products'));
    }

    public function edit($productId){
        $detail = Product::find($productId);
        $seasons= Season::all();
        return view('detail',compact('detail','seasons'));
    }
    public function update(ProductRequest $request,$productId){
        $product = Product::find($productId);
        
         //ファイルをパブリックに保存⇒パスの更新
        if( $request->hasFile('image')){
            $originalName=$request->file('image')->getClientOriginalName();
            $path =$request->file('image')->storeAs('images', $originalName,'public');
            }else{
            $path = $product->image;}

        $product ->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $path,
            'description' => $request->description
        ]);

        //中間テーブル更新
        if($request->has('season_id')){
        $product->seasons()->sync($request->season_id);
        }
        return redirect('/products');
    }
    public function destroy($productId){
        $product = Product::find($productId);
        if($product){
            $product->seasons()->detach();
            $product->delete();
        }
        return redirect('/products');
    }
}