
@if (Session::has('success'))
<div class="alert alert-success text-center">
    <small>
        {{Session::get('success')}}
    </small>
</div>
@endif
@if (Session::has('error'))
<div class="alert alert-danger text-center">
    <small>
        {{Session::get('error')}}
    </small>
</div>
@endif