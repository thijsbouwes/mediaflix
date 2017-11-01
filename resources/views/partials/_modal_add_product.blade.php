<!-- Modal Structure -->
<div id="modal_add_product" class="modal">
    <div class="modal-content">
        <h4>Add product</h4>
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">shopping_cart</i>
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" data-length="255" value="{{ old('name') }}" required>
                </div>

                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">euro_symbol</i>
                    <label for="price">Price</label>
                    <input id="price" type="number" step="0.01" min="0" class="form-control" name="price" required>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">timeline</i>
                    <label for="price">Quantity</label>
                    <input id="price" type="number" min="0" class="form-control" name="quantity" required>
                </div>
                <div class="file-field input-field col s12 m6 l6">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>
            </div>

            <div class="input-field center-align col s12">
                <input type="submit" value="Add product" class="btn waves-effect waves-light">
            </div>
        </form>
    </div>
</div>