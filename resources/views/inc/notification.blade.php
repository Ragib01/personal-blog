@if(session()->has('notification.message'))
    <div class="alert alert-{{ session('notification.status') }}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{ session('notification.message') }}
    </div>
@endif