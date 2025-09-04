<!-- Carousel Navigation Controls -->

<!-- Navigation Arrows -->
<button class="carousel-nav-btn carousel-prev position-absolute" 
        style="left: 20px; 
               top: 50%; 
               transform: translateY(-50%); 
               width: 50px; 
               height: 50px; 
               font-size: 1.2rem; 
               z-index: 10;">
    <i class="fas fa-chevron-left"></i>
</button>

<button class="carousel-nav-btn carousel-next position-absolute" 
        style="right: 20px; 
               top: 50%; 
               transform: translateY(-50%); 
               width: 50px; 
               height: 50px; 
               font-size: 1.2rem; 
               z-index: 10;">
    <i class="fas fa-chevron-right"></i>
</button>

<!-- Carousel Indicators -->
<div class="carousel-indicators text-center mt-4 position-absolute" 
     style="bottom: -50px; 
            left: 50%; 
            transform: translateX(-50%); 
            width: 100%;">
    @for ($i = 0; $i < $totalSlides; $i++)
        <span class="carousel-indicator d-inline-block" 
              data-slide="{{ $i }}"
              style="width: 12px; 
                     height: 12px; 
                     border-radius: 50%; 
                     background: {{ $i === 0 ? '#FFCA4C' : '#ddd' }}; 
                     margin: 0 5px; 
                     cursor: pointer;">
        </span>
    @endfor
</div>