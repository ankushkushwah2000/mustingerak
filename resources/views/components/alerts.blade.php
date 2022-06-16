@if(Session::has('message'))
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-primary" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Message !</strong> {{ Session::get('message') }}</span></div>
</div>
@endif
@if(Session::has('success'))
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-success" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Success !</strong> {{ Session::get('success') }}</span></div>
</div>
@endif
@if(Session::has('info'))
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-info" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Info !</strong> {{ Session::get('info') }}</span></div>
</div>
@endif
@if(Session::has('danger'))
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Error !</strong> {{ Session::get('danger') }}</span></div>
</div>
@endif
@if(Session::has('warning'))
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-warning" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Warning !</strong> {{ Session::get('danger') }}</span></div>
</div>
@endif

@if ($errors->any())
@foreach ($errors->all() as $error)
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Error !</strong> {{ $error }}</span></div>
</div>
@endforeach
@endif

@if (auth()->user()->profile == null)
<div role="alert" aria-live="polite" aria-atomic="true" class="alert alert-danger" data-v-3bcd05f2="">
    <div class="alert-body"><span><strong>Urgent !</strong> Please complete your profile before making any action
        </span></div>
</div>
@endif