<!-- Modal Structure -->
<div id="modal_add_event" class="modal">
    <div class="modal-content">
        <h4>Add event</h4>
        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">event</i>
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
                <div class="input-field col s12">
                    <i class="material-icons prefix">access_time</i>
                    <label for="date_event">Date event</label>
                    <input name="date_event" type="date" class="datepicker">
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12 m6 l6">
                    <i class="material-icons prefix">accessibility</i>
                    <select>
                        <option value="" disabled selected>Choose your option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                    <label>User</label>
                </div>
                <div class="col s2">
                    <input type="checkbox" id="payed_1" name="payed_1" />
                    <label for="payed_1">Betaald</label>
                </div>
                <div class="col s2">
                    <a href="#!" class="right btn waves-effect waves-light"><i class="material-icons">remove_circle_outline</i></a>
                </div>
                <div class="col s2">
                    <a href="#!" class="right btn waves-effect waves-light"><i class="material-icons">add_circle_outline</i></a>
                </div>
            </div>


            <div class="input-field center-align col s12">
                <input type="submit" value="Add event" class="btn waves-effect waves-light">
            </div>
        </form>
    </div>
</div>