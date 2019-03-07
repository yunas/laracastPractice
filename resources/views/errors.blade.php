@if( $errors->any()	)
<div id="notification" class="notification is-danger" style="margin-top: 1em;">
	<button class="delete" onclick="hideNofication()"></button>
	<ul>
		@foreach ($errors->all() as $error)


		<li> {{ $error }}</li>


		@endforeach
	</ul>
</div>

@endif