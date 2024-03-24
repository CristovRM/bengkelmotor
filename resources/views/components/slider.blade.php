<!-- resources/views/components/Slider.blade.php -->

<div class="glide">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      @foreach($images as $image)
        <li class="glide__slide">
          <img src="{{ $image }}" alt="Slide Image">
        </li>
      @endforeach
    </ul>
  </div>
  <div class="glide__arrows" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left" data-glide-dir="<">prev</button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">">next</button>
  </div>
</div>

@push('scripts')
<script src="{{ asset('js/glide.min.js') }}"></script>
<script>
  new Glide('.glide', {
    type: 'carousel',
    autoplay: 5000, // Ubah sesuai kebutuhan
    animationDuration: 1000, // Ubah sesuai kebutuhan
  }).mount();
</script>
@endpush
