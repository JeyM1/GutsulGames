@php
	// preserve backwards compatibility with Widgets in Backpack 4.0
	if (isset($widget['wrapperClass'])) {
		$widget['wrapper']['class'] = $widget['wrapperClass'];
	}
@endphp

@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_start')
	<div class="jumbotron mb-2">
		@php
			$user = Auth::user();
		@endphp
		<h1 class="display-3">Ласкаво просимо, {{ $user->name }}<sub>{{ $user->roles()->orderBy('permissions', 'DESC')->first()->name }}</sub></h1>
		<p>Використовуйте вкладки зліва щоб створювати або редагувати контент</p>
		<p class="lead">
			<a class="btn btn-primary" href="{{ backpack_url('logout') }}" role="button">Вийти з аккаунту</a>
		</p>
	</div>
@includeWhen(!empty($widget['wrapper']), 'backpack::widgets.inc.wrapper_end')