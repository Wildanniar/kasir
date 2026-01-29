<div class="form-group">
    <label>Kode Produk</label>
    <input type="text" name="code" class="form-control"
        value="{{ old('code',$product->code ?? '') }}">
</div>

<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name',$product->name ?? '') }}">
</div>

<div class="form-group">
    <label>Kategori</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $c)
            <option value="{{ $c->id }}"
                @selected(old('category_id',$product->category_id ?? '')==$c->id)>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Harga Jual</label>
    <input type="number" name="price_sell" class="form-control"
        value="{{ old('price_sell',$product->price_sell ?? '') }}">
</div>

<div class="form-group">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control"
        value="{{ old('stock',$product->stock ?? '') }}">
</div>

<div class="form-group">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control">
</div>
