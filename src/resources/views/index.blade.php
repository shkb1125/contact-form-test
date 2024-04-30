@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>

        <form class="form" action="/confirm" method="post">
            @csrf

            {{-- 名前入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                        <input type="text" name="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                    </div>
                    <div class="form__error">
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="form__error">
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 性別入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="radio" name="gender" value="0" />男性
                        <input type="radio" name="gender" value="1" />女性
                        <input type="radio" name="gender" value="2" />その他
                    </div>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- メールアドレス入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                    </div>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 電話番号入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="tel1" placeholder="080" value="{{ old('tell') }}" />
                        -
                        <input type="tel" name="tel2" placeholder="1234" value="{{ old('tell') }}" /> -
                        <input type="tel" name="tel3" placeholder="5678" value="{{ old('tell') }}" />
                    </div>
                    <div class="form__error">
                        {{-- if分で条件分岐させる？ --}}
                        {{-- 条件：'tel'のどれか1つでも入力されていない場合はエラーメッセージを表示させる --}}
                        @error('tel1')
                            {{ $message }}
                        @enderror
                        @error('tel2')
                            {{ $message }}
                        @enderror
                        @error('tel3')
                            {{ $message }}
                        @enderror
                        {{-- <input type="tel" name="tell" placeholder="09012345678" value="{{ old('tell') }}" />
                    </div>
                    <div class="form__error">
                        @error('tell')
                            {{ $message }}
                        @enderror --}}
                    </div>
                </div>
            </div>

            {{-- 住所入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3"
                            value="{{ old('address') }}" />
                    </div>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 建物名入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}" />
                    </div>
                </div>
            </div>

            {{-- お問い合わせの種類選択欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <select class="search-form__item-select" name="content">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->content }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- お問い合わせ内容入力欄 --}}
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="detail" placeholder="お問い合わせ内容をご記載ください"></textarea>
                    </div>
                    <div class="form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            {{-- 確認画面ボタン --}}
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>

    </div>
@endsection
