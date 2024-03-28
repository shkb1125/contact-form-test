@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('link')
    <a href="" class="header__link">logout</a>
@endsection

@section('content')
    <div class="admin__content">
        <div class="admin__header">
            <h2>Admin</h2>
        </div>
    </div>

    <div class="admin__search">
        <form action="/admin" class="search-form" method="post">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{ old('search') }}">
                <select class="search-form__item-select" name="gender">
                    <option value="">性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="search-form__item-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <input class="search-form__item-input" type="date" name="date" placeholder="日付検索">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <input type="reset" name="reset" value="リセット" >
            </div>

        </form>
    </div>

    <div class="admin-table">
        <table class="admin-table__inner">

            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
            </tr>

            @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__col">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td class="admin-table__col">{{ $contact->gender }}</td>
                    <td class="admin-table__col">{{ $contact->email }}</td>
                    <td class="admin-table__col">{{ $contact->category->content }}</td>
                </tr>
            @endforeach

        </table>
        <div class="pagination">
           {{ $contacts->links() }}
        </div>
    </div>
@endsection
