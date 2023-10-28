@props(['type','header' ,'title','desc','size'])
<div {{ $attributes->merge(['class' => 'card mb-3 border-'.$type,'style'=>'max-width: '.$size.';']) }}>
    <div {{ $attributes->merge(['class' => 'card-header text-bg-'.$type]) }}>{{ $header }}</div>
    <div class="card-body">
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $desc }}</p>
    </div>
  </div>
{{-- 
  <div class="row row-cols-1 row-cols-md-4 g-4">
    <div class="col">
        <x-card type="dark" header="Card 1" title="Card Title" desc="Card Description"
            size="15rem" />
    </div>
    <div class="col">
        <x-card type="danger" header="Card 2" title="Card Title" desc="Card Description"
            size="15rem" />
    </div>
    <div class="col">
        <x-card type="primary" header="Card 3" title="Card Title" desc="Card Description"
            size="15rem" />
    </div>
    <div class="col">
        <x-card type="warning" header="Card 4" title="Card Title" desc="Card Description"
            size="15rem" />
    </div>
    <div class="col">
        <x-card type="secondary" header="Card 5" title="Card Title" desc="Card Description"
            size="15rem" />
    </div>
</div> --}}