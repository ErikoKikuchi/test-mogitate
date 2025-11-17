@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register-form">
    <div class= "register-form__title">
        <h2 class="section-title">商品登録</h2>
    </div>
    <div class = "register-form__inner">
        <form class = "register-form__inner" action="/products/register" method = "post" enctype="multipart/form-data" >
            @csrf
            <div class = "register-form__item">
                <p class = "register-form__item-title">商品名</p>
                <p class = "register-form__item-alert">必須</p>
                <input class = "register-form__item--input" type="text" name="name" placeholder = "商品名を入力" value="{{old('name')}}">
            </div>
            <div class = "form__error">
                @if($errors->has('name'))
                    <div class="form__error--all">
                        @foreach($errors->get('name') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
            </div>
            <div class = "register-form__item">
                <p class = "register-form__item-title">値段</p>
                <p class = "register-form__item-alert">必須</p>
                <input class = "register-form__item--input" type="number" name ="price" placeholder = "値段を入力" value="{{old('price')}}">
            </div>
            <div class = "form__error">
                @if($errors->has('price'))
                    <div class="form__error--all">
                        @foreach($errors->get('price') as $message)
                            <div>{{$message}}</div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class = "register-form__item">
                <p class = "register-form__item-title">商品画像</p>
                <p class = "register-form__item-alert">必須</p>
                <input class = "register-form__item--button" type="file" name = "image" >
            </div>
            <div class = "form__error">
                @if($errors->has('image'))
                    <div class="form__error--all">
                        @foreach($errors->get('image') as $message)
                            <div>{{$message}}</div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class = "register-form__item">
                <p class = "register-form__item-title">季節</p>
                <p class = "register-form__item-alert">必須</p>
                <p class = "register-form__item-alert--checkbox">複数選択可</p>
                @foreach($seasons as $season)
                <input class = "register-form__item--checkbox" type="checkbox" name = "season_id" value = "{{$season->id}}"  />{{$season->name}}
                @endforeach
            </div>
            <div class = "form__error">
                @if($errors->has('season_id'))
                    <div class="form__error--all">
                        @foreach($errors->get('season_id') as $message)
                            {{$message}}
                        @endforeach
                    </div>
                @endif
            </div>
            <div class = "register-form__item">
                <p class = "register-form__item-title">商品説明</p>
                <p class = "register-form__item-alert">必須</p>
                <textarea class = "register-form__item--input" type="textarea" name="description" cols="40" rows="3" name="description" placeholder = "商品の説明を入力">{{old('description')}}</textarea>
            </div>
            <div class = "form__error">
                @if($errors->has('description'))
                    <div class="form__error--all">
                        @foreach($errors->get('description') as $message)
                            <div>{{$message}}</div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class = "form__button">
                <a class="form__button--back" href = "/" >戻る</a>
                <button class = "form__button--register" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection