@if (Session::has('error_notify'))
    @php
        notify()->error(Session::get('error_notify'), 'Помилка!', ['timeOut' => 6000]);
    @endphp
@endif
@if (Session::has('success_notify'))
    @php
        notify()->success(Session::get('success_notify'), 'Успішно!', ['timeOut' => 6000]);
    @endphp
@endif
