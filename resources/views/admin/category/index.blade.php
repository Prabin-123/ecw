@extends('admin.master')

@section('title', 'Category Page')

@section('content')
<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
    <h3 style="text-decoration: underline; margin-top: 50px;">List Categories</h3>
    <br>
    <div class="col-md-9">     
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($categories))
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td><td>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE' )}}
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>No Category</tr>    
                @endforelse
                @endif
            </tbody>
        </table>
    </div>
    <br><br>
    <div class="col-md-9">
        <form action="{{ route('category.store') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="category name">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</main>
@endsection