@extends('layout')
@section('title','danh sach san pham')
@section('content')
@if(Session::has('message'))
<h3>{{ Session::get('message') }}</h3>
@endif
<div class="row">
    
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <a  href="{{ route('products.create') }}" class="badge badge-warning btn btn-warning"> Create New</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>unit</th>
                            <th>desc</th>
                            <th>import_price</th>
                            <th>price</th>
                            <th>quantity</th>
                            <th>category_id</th>
                        
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    
                        @foreach ($productList as $product)
                        <tr>
                            <td>#</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->desc }}</td>
                            <td>{{ $product->import_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->category_id }}</td>
                            
                            <td>
                                <a class="badge badge-warning btn btn-warning" href="{{ route('products.edit',$product->id) }}">Pending</a>
                            </td>

                            <td>
                                <form action="{{ route('products.destroy',$product->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection