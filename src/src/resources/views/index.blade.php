@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class = "products__content">
    <div class="products__content-title">
        <h2 class = "section__title">商品一覧</h2>
        <form class = "products__add" action="/register" method="get">@csrf
            <button class= "products__add-button" type="submit">商品を追加</button>
        </form>
    </div>
    <div class="search-form">
        <form class="search-form__inner" action="/products/search" method="get">
            @csrf
            <input class ="search-form__item-input" type="text" name="name" placeholder="商品名で検索" value="{{old('name')}}">
            <div class="search-form__button">
                <button class="search-form__button--submit">検索</button>
            </div>
        </form>
        <div class="sort-form">
            <form class = 'sort-form__inner' action="/products/sort" method = "get">
                <select class = "sort-form__select" name="price" onchange="this.form.submit()">
                    <option value = "">価格で並び替え</option>
                    <option value = "desc" >高い順に表示</option>
                    <option value = "asc" >低い順に表示</option>
                </select>
                <div class ="sort-form__modal">
                    @livewire('modal')
                </div>
            </form>
        </div>
        <div class = "card-list">
            @foreach($products as $product)
                <a class = "product-card__link" href="/products/detail/{productId}">
                    <div class="product-card__inner">
                        <img class = "product__image" src="{{asset('storage/'.$product->image)}}"></img>
                        <div class = "product__info">
                            <p class ="product__name">{{$product->name}}</p>
                            <p class = "product__price">{{$product->price}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <div class="product__pagination">
        {{ $products->links() }}
    </div>
</div>
@endsection