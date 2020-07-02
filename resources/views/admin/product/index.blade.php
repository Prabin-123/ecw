@extends('admin.master')

@section('title', 'List Products')

@section('content')
    
    <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h3 style="text-decoration: underline; margin-top: 50px;">Products</h3>
        <br>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><img src="{{ url('images', $product->image) }}" alt="" width="80"></td>
                        <td>{{ $product->pro_name }}</td>
                        <td>$ {{ $product->pro_price }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE' )}}
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

@endsection