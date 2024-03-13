@extends('master')

@section('content')
    <div>
        @if (session()->has('message'))
            {{ session()->get('message') }}
        @endif
    </div>
    <form action="{{ route('product.store') }}" method="post">
        @csrf

        <h2>Adicionar Produto</h2>

        <label for="name">Nome:</label>
        <input type="text" name="name" id="name">

        <label for="product_cat">Categoria do Produto:</label>
        <select name="product_cat" id="product_cat">
            @foreach ($categories as $product_cat)
                <option value="{{ $product_cat->product_cat }}">
                    {{ $product_cat->name}}
                </option>
            @endforeach
        </select>

        <label for="quantity">Quantidade:</label>
        <input type="number" name="quantity" id="quantity" >

        <label for="descript">Descrição:</label>
        <textarea name="descript" id="descript" cols="30" rows="10"></textarea>

        <label for="exp_date">Data de Validade:</label>
        <input type="date" name="exp_date" id="exp_date" >

        <label for="company">Empresa:</label>
        <select name="company" id="company">
            <!-- Adicione opções dinamicamente com base nos seus dados -->
            @foreach ($companies as $company)
                <option value="{{ $company->company }}">
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <label for="generic">Genérico:</label>
        <select name="generic" id="generic">
            <option value="1">Sim</option>
            <option value="0">Não</option>
        </select>

        <!-- Adicione mais campos conforme necessário -->

        <button type="submit">Adicionar</button>
    </form>
@endsection
