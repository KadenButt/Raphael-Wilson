<script>
// Category Box Interactions
document.addEventListener('DOMContentLoaded', function() {

    const searchForm = document.querySelector('.search-form');
    const searchInput = document.querySelector('.search-input');

    if (searchForm) {
        
    }
    // Get all category boxes (both types)
    const categoryBoxes = document.querySelectorAll('.category-box, .category-box1');

    categoryBoxes.forEach(box => {
        // Add hover effect with text change
        box.addEventListener('mouseenter', function() {
            const originalText = this.textContent;
            this.setAttribute('data-original-text', originalText);
            
            // Change text based on category
            switch(originalText.trim()) {
                case 'CATEGORY 1':
                    this.textContent = 'TRAINERS';
                    break;
                case 'CATEGORY 2':
                    this.textContent = 'BOOTS';
                    break;
                case 'CATEGORY 3':
                    this.textContent = 'SHOES';
                    break;
                case 'CATEGORY 4':
                    this.textContent = 'SANDALS';
                    break;
                case 'CATEGORY 5':
                    this.textContent = 'SLIPPERS';
                    break;
            }
        });

        // Restore original text on mouse leave
        box.addEventListener('mouseleave', function() {
            const originalText = this.getAttribute('data-original-text');
            this.textContent = originalText;
        });

        // Click animation and navigation
        box.addEventListener('click', function() {
            // Add click animation
            this.style.transform = 'scale(0.95)';
            
            // Get the category text
            const category = this.textContent.trim().toLowerCase();
            
            // After animation, navigate to category page
            setTimeout(() => {
                this.style.transform = '';
                // You can uncomment and modify this line when you have the category pages ready
                // window.location.href = `/${category}.blade.php`;
                console.log(`Navigating to ${category} page`);
            }, 200);
        });

        // Add ripple effect on click
        box.addEventListener('click', function(e) {
            const ripple = document.createElement('div');
            ripple.classList.add('ripple');
            
            // Position the ripple at click coordinates
            const rect = this.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            this.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});


<!-- Add these styles for the ripple effect -->
<style>
.category-box, .category-box1 {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 50%;
    transform: scale(0);
    animation: ripple 0.6s linear;
    pointer-events: none;
    width: 100px;
    height: 100px;
    margin: -50px;
}

@keyframes ripple {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

.category-box, .category-box1 {
    transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease;
}

.category-box:active, .category-box1:active {
    transform: scale(0.95);
}
</style>
</script>