@props(['type', 'message'])
@if ($message)
@if ($type=="error")
<div {{ $attributes->merge(['class' => 'alert alert-danger alert-dismissible','role'=>'alert']) }}>
    {{ $message }}
</div>
@elseif ($type=="success")
<div {{ $attributes->merge(['class' => 'alert alert-success alert-dismissible','role'=>'alert']) }}>
    {{ $message }}
</div>
@elseif ($type=="warning")
<div {{ $attributes->merge(['class' => 'alert alert-warning alert-dismissible','role'=>'alert']) }}>
    {{ $message }}
</div>
@else
<div {{ $attributes->merge(['class' => 'alert alert-primary alert-dismissible','role'=>'alert']) }}>
    {{ $message }}
</div>
@endif
@endif

