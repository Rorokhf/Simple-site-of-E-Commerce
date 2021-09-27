@extends('admin.app.app')

@section('content')
    <div class="col-12">
        <form method='post' id="addData " action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4d">Name</label>
                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror"
                        id="inputEmail4d" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="inputStateq">Category</label>
                    <select name="category_id" id="inputStateq"
                        class="form-control @error('category_id') is-invalid @enderror" value="{{ old('category_id') }}">
                        @foreach ($categories as $key => $cat)
                            <option {{ old('category_id') == $cat->id ? 'selected' : '' }} value="{{ $cat->id }}">
                                {{ $cat->name }}</option>
                        @endforeach

                    </select>
                    @error('category_id')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>


            </div>


            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Code</label>
                    <input type="number" name="code" class="form-control @error('code') is-invalid @enderror"
                        id="inputPassword4" value="{{ old('code') }}">
                    @error('code')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror"
                        id="inputAddress" placeholder="2000 eg" value="{{ old('price') }}">
                    @error('price')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="inputAddress2">Quantity</label>
                    <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                        id="inputAddress2" placeholder="4" value="{{ old('quantity') }}">
                    @error('quantity')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputStates">Status</label>
                    <select name="status" id="inputStates" class="form-control @error('status') is-invalid @enderror">
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>
                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Not Active</option>
                    </select>
                    @error('status')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="inputStated">Brand</label>
                    <select name="brand_id" id="inputStated" class="form-control @error('brand_id') is-invalid @enderror">
                        <option value="">No Brand</option>
                        @foreach ($brands as $key => $brand)
                            <option {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                    @error('brand_id')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="inputStateq">Sub-Category</label>
                    <select name="subcategory_id" id="inputStateq"
                        class="form-control @error('subcategory_id') is-invalid @enderror">
                        @foreach ($subcategories as $key => $subcat)
                            <option {{ old('subcategory_id') == $subcat->id ? 'selected' : '' }}
                                value="{{ $subcat->id }}">{{ $subcat->name }}</option>
                        @endforeach
                    </select>
                    @error('subcategory_id')
                        <div class="alert alert-danger"> {{ $message }} </div>
                    @enderror
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id=""
                        cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        value="{{old('image')}}">
                </div>
                @error('image')
                    <div class="alert alert-danger"> {{ $message }} </div>
                @enderror
            </div>
            <button type="submit" id="add" class="btn btn-primary" name="add" value='add'>Add Product</button>
            <button type="submit"  class="btn btn-primary" name="more" value='add'>more</button>

        </form>
    </div>
@endsection

@section('scripts')
    {{-- <script>
    $.(document).on('click','#add',function(e){
        e.preventDefault();
        var formData=new FormData($('#addData')[0]);
        $.ajax({
    type: "post",
    url: "{{route('product.store')}}",
    data:formData,
    dataType: "dataType",
    success: function (response) {

    }
});
    });


</script> --}}

@endsection
