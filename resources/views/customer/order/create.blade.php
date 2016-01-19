@extends('app')

@section('content')
    <div class="container">
        <h3>Novo Pedido</h3>

        @include('errors._check')

        <div class="container">
            {!! Form::open(['route'=>'customer.order.store', 'class'=>'form']) !!}
            <div class="form-group">
                <label for="total">Total</label>
                <p id="total"></p>
                <a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select name="items[0][product_id]" id="" class="form-control">
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}" data-price="{{ $p->price }}"> {{ $p->name }}
                                        --- {{ $p->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', 1, ['class'=>'form-control']) !!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Form Input -->
            <div class="form-group">
                {!! Form::submit('Criar pedido', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
@endsection

@section('post-script')
<script>
    $('#btnNewItem').click(function(){
        var row = $('table tbody > tr:last'),
            newRow = row.clone(),
            length = $('table tbody tr').length,
            td     = '',
            input  = '',
            name   = '';

        newRow.find('td').each(function(){
            td = $(this),
            input = td.find('input, select'),
            name = input.attr('name');

            input.attr('name', name.replace((length - 1) + "", length + ""));
        });

        newRow.find('input').val(1);
        newRow.insertAfter(row);
        calculateTotal();
    });

    $(document.body).on('click', 'select', function() {
        calculateTotal();
    });

    $(document.body).on('blur', 'input', function() {
        calculateTotal();
    });

    function calculateTotal() {
        var total = 0,
            $table = $('table'),
            trLen = $('tbody tr', $table).length,
            tr    = null, price, qtd;

        for (var i = 0; i < trLen; i++) {
            tr = $('tbody tr', $table).eq(i);
            price = tr.find(':selected').data('price');
            qtd = tr.find('input').val();
            total += price * qtd;
        }

        $('#total').html(total);
    }

</script>
@endsection
