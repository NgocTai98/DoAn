@extends('backend.master.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <label>Sửa các thuộc tính</label>
        <table class="edit-varriant" style="margin-left: 50px; margin-top: 50px">
            <thead>
                <tr>
                    @foreach ($product->product_size_color as $item)
                        <th style="width: 100px">{{ $item->size->value }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($product->product_size_color as $item)
                    <td> <input class="form-check-input" checked type="checkbox" name="size[]"
                        value="{{ $item->size->id }}"> </td>
                    @endforeach
                </tr>
            </tbody>
            <tbody>
                <tr>
                    <label>Chọn size và số lượng theo từng size</label>
                    @foreach ($product->product_size_color as $item)
                        <td>
                            <input type="text" class="form-control" name="quantity[]" style="width: 45px; height: 30px; border: solid 1px" value="{{ $item->quantity }}">
                        </td>
                    @endforeach
                </tr>
            </tbody>
        </table>
            </div>
        </div>
    </div>

@endsection