@extends('layouts.dashboard')
  
  @section('content')
  <div class="w-50">
      <h1>商品登録</h1>

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <hr>

      <form method="POST" action="/dashboard/products" class="mb-5" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-name" class="col-2 d-flex justify-content-start">商品名</label>
              <input type="text" name="name" id="product-name" class="form-control col-8">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-price" class="col-2 d-flex justify-content-start">価格</label>
              <input type="number" name="price" id="product-price" class="form-control col-8">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-category" class="col-2 d-flex justify-content-start">カテゴリ</label>
              <select name="category_id" class="form-control col-8" id="product-category">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-image" class="col-2 d-flex justify-content-start">画像</label>
              <img src="#" id="product-image-preview">
              <input type="file" name="image" id="product-image">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-price" class="col-2 d-flex justify-content-start">オススメ?</label>
              <input type="checkbox" name="recommend" id="product-recommend" class="samuraimart-check-box">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-carriage" class="col-2 d-flex justify-content-start">送料</label>
              <input type="checkbox" name="carriage" id="product-carriage" class="samuraimart-check-box">
          </div>
          <div class="form-inline mt-4 mb-4 row">
              <label for="product-description" class="col-2 d-flex justify-content-start align-self-start">商品説明</label>
              <textarea name="description" id="product-description" class="form-control col-8" rows="10"></textarea>
          </div>
          <div class="d-flex justify-content-end">
              <button type="submit" class="w-25 btn samuraimart-submit-button">商品を登録</button>
          </div>
      </form>
  
      <div class="d-flex justify-content-end">
          <a href="/products">商品一覧に戻る</a>
      </div>
  </div>

  <script type="text/javascript">
      $("#product-image").change(function() {
          if (this.files && this.files[0]) {
              let reader = new FileReader();
              reader.onload = function(e) {
                  $("#product-image-preview").attr("src", e.target.result);
              }
              reader.readAsDataURL(this.files[0]);
          }
      });
  </script>
  @endsection