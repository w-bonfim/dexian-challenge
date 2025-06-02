<p>Olá,</p>
<p>O pedido #{{ $order->id }} foi cadastrado com sucesso.</p>

<h4>Cliente:</h4>
<ul>
    <li>Nome: {{ $order->customer->name }}</li>
    <li>Email: {{ $order->customer->email }}</li>
</ul>

<h4>Produtos do Pedido:</h4>
<ul>
    @foreach($order->products as $product)
        <li>
            {{ $product->name }} - R$ {{ number_format($product->price, 2, ',', '.') }}
        </li>
    @endforeach
</ul>
