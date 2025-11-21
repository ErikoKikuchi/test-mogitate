@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="detail-form">
    <div class ="back-form">
        <a class ="back-form__title" href="/products">商品一覧</a>
        <div class="back-form__inner">>{{$detail->name}}</div>
    </div>
    <div class="detail-form__inner">
        <form action="{{route('products.update',['productId' => $detail->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="detail-form__inner-top">
                <div class="detail-form__inner-image--area">
                    <img class="detail-form__inner-image" src="{{asset('storage/'.$detail->image)}}"></img>
                    <div class="file-name__inner">
                        <input class="detail-form__image--change" type="file" name="image" >
                        <p class="file-name">
                            ファイルを選択：{{ basename($detail->image) }}</p>
                        <div class = "form__error">
                        @if($errors->has('image'))
                            <div class="form__error--all">
                                @foreach($errors->get('image') as $message)
                                    <div>{{$message}}</div>
                                @endforeach
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="detail-form__inner-content">
                    <div class="detail-form__inner-name">
                        <div class="detail-form__inner-name--title">商品名</div>
                        <input class="detail-form__inner-name--input" type="text" name="name" value="{{old('name',$detail->name)}}">
                        <div class = "form__error">
                            @if($errors->has('name'))
                            <div class="form__error--all">
                                @foreach($errors->get('name') as $message)
                                    {{$message}}
                                @endforeach
                            </div>
                            @endif
                        </div>
                     </div>
                    <div class="detail-form__inner-price">
                        <div class="detail-form__inner-price-title">値段</div>
                        <input class="detail-form__inner-price--input" type="text" name="price" value="{{old('price',$detail->price)}}">
                        <div class = "form__error">
                            @if($errors->has('price'))
                            <div class="form__error--all">
                                @foreach($errors->get('price') as $message)
                                    <div>{{$message}}</div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="detail-form__inner-season">
                        <div class="detail-form__inner-season--title">季節</div>
                        <div class="detail-form__inner-season--input--area">
                        @foreach($seasons as $season)
                            <input class="detail-form__inner-season--input" type="checkbox"  name = "season_id[]" value = "{{$season->id}}" {{$detail->seasons->contains($season->id)? 'checked':''}} >{{$season->name}}
                        @endforeach
                        </div>
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
                </div>
            </div>
            <div class="detail-form__inner-description">
                <div class="detail-form__innner-description--title">商品説明</div>
                <textarea class="detail-form__innner-description--input" type="textarea" name="description" cols="40" rows="3">{{old('description',$detail->description)}}</textarea>
                <div class = "form__error">
                @if($errors->has('description'))
                    <div class="form__error--all">
                        @foreach($errors->get('description') as $message)
                            <div>{{$message}}</div>
                        @endforeach
                    </div>
                @endif
                </div>
            </div>
            <div class="detail-form__buttons">
                <a class ="back-form__inner--submit" href="/products">戻る</a>
                <button class = "update-form" type="submit">変更を保存</button>
            </div>
        </form>
        <form action="{{route('products.delete',['productId' => $detail->id])}}" method="post" class="delete-form">
            @csrf
            @method('DELETE')
            <input class="delete-form__item" src="{{asset('storage/965_tr_h.png')}}" type="image" name="trash"></input>
        </form>
    </div>
</div>
@endsection