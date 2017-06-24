@if (Session::has('success'))

	<div class="container">
		<div class="card-panel green">
			<span class="white-text"><strong>Success:</strong> {{ Session::get('success') }}</span>
		</div>	
	</div>

@endif


@if (count($errors) > 0)

	<div class="container">
		<div class="card-panel red">
			<span class="white-text"><strong>Errors:</strong></span>
			<ul class="white-text">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>

@endif