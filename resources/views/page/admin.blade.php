@extends('main')

@section('title', ' | Events')

@section('content')

    <div class="container">
        @verbatim


            <table class="highlight">
                <thead>
                    <th>Prodcut</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    <tr v-for="product in products">
                        <td>{{ product.name }}</td>
                        <td>{{ product.price }}</td>
                    </tr>
                </tbody>
            </table>











            <h4>Add product</h4>
            <form role="form" method="POST" @submit.prevent="addProduct">
                <div class="row">
                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix">shopping_cart</i>
                        <input id="name" type="email" class="form-control validate" name="name" data-length="255" v-model="name" required>
                        <label for="name" :data-error="errors.get('name')">Name</label>
                    </div>

                    <div class="input-field col s12 m6 l6">
                        <i class="material-icons prefix">euro_symbol</i>
                        <input id="price" type="number" step="0.01" min="0" class="form-control" name="price" v-model="price" required>
                        <label for="price">Price</label>
                    </div>
                </div>

                <div class="input-field center-align col s12">
                    <input type="submit" value="Add product" class="btn waves-effect waves-light">
                </div>
            </form>

        @endverbatim
    </div>

@stop