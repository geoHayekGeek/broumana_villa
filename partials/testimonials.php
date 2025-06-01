<div class="testimonial-container fade-in-target">
    <h1 class="custom-heading">Testimonials</h1>
    
    <div class="testimonial-slider">
        <div class="testimonial-slides">
            <?php foreach($testimonials as $testimonial): ?>
                <div class="testimonial-slide">
                    <p class="testimonial-quote">"<?php echo $testimonial['quote']; ?>"</p>
                    <p class="testimonial-author"><?php echo $testimonial['author']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <div class="testimonial-nav">
        <button class="nav-button prev-button">&lt;</button>
        <button class="nav-button next-button">&gt;</button>
    </div>
</div>
