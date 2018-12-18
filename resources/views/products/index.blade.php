@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Products List</div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No results</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
@endsection
