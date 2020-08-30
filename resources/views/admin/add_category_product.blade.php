@extends('layouts.admin_layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm danh mục
                </header>
                    @php
						$message=Session::get('message');
						if ($message) {
							echo '<span class="text-alert">'.$message.'</span>';
							Session::put('message',null);
						}
					@endphp
                <div class="panel-body">
                    <div class="position-center">
                    <form action="{{route('CategoryProduct.save_category')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">tên danh mục</label>
                                <input type="text" name="category_name" class="form-control" placeholder="nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">mô tả</label>
                                <textarea class="form-control" placeholder="mô tả" name="category_description"></textarea>
                            </div>
                            <select class="form-control m-bot15">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                            <br>
                            <button type="submit" class="btn btn-info">Thêm</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
