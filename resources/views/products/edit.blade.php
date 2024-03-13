@extends('master')

@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <form action="{{ route('product.update', ['product' => $product->product]) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">

        <h2>Editar Produto</h2>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}">

        <label for="product_cat">Categoria do Produto:</label>
        <select name="product_cat" id="">
            @foreach ($categories as $product_cat)
                <option value="{{ $product_cat->product_cat }}" {{ $product_cat->product_cat == $product->product_cat ? 'selected' : '' }}>
                    {{ $product_cat->name}}
                </option>
            @endforeach
        </select>

        <label for="quantity">Quantidade:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}">

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10">{{ $product->descript }}</textarea>

        <label for="exp_date">Data de Validade:</label>
        <input type="date" name="exp_date" id="exp_date" value="{{ $product->exp_date }}">

        <label for="company">Empresa:</label>
        <select name="company" id="company">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($companies as $company)
                <option value="{{ $company->company }}" {{ $company->company == $product->company ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <label for="generic">Genérico:</label>
        <select name="generic" id="generic">
            <option value="1" {{ $product->generic ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ !$product->generic ? 'selected' : '' }}>Não</option>
        </select>

        <!-- Adicione mais campos conforme necessário -->

        <button type="submit">Salvar</button>
    </form>
@endsection
