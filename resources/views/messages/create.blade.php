@extends('layouts.app')

@section('content')

    <h1>メッセージ新規作成ページ</h1>

    <div class="row">
      <div class="col-6">
        <form action="{{ route('messages.store') }}" method="post">
          @csrf {{-- // CSRF対策 --}}
          <div class="form-group">
              <label for="content">メッセージ:</label>
              <textarea id="message" name="content"></textarea>
          </div>
          <input type="submit" value="投稿" class="btn btn-primary">
      </form>
      </div>
  </div>
@endsection