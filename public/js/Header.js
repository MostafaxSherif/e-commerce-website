let slideIndex = 0;
const slidesToShow = 5; // Number of slides to show at once

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    slideIndex++;

    if (slideIndex > slides.length - slidesToShow) {
        slideIndex = 0;
    }

    let startIndex = slideIndex;
    let endIndex = Math.min(startIndex + slidesToShow, slides.length);

    // Hide all slides
    slides.forEach(slide => {
        slide.style.display = 'none';
    });

    // Show the slides within the range
    for (let i = startIndex; i < endIndex; i++) {
        slides[i].style.display = 'block';
    }
}

function prevSlide() {
    slideIndex--;
    if (slideIndex < 0) {
        slideIndex = Math.max(document.querySelectorAll('.slide').length - slidesToShow, 0);
    }
    showSlides();
}

function nextSlide() {
    slideIndex++;
    if (slideIndex > document.querySelectorAll('.slide').length - slidesToShow) {
        slideIndex = 0;
    }
    showSlides();
}

// Automatic slideshow every 0.2 seconds
setInterval(showSlides, 2000);

// add to cart---------------------------------------------------------------------------------
 /* Set rates + misc */
// var taxRate = 0.05;
// var shippingRate = 15.00; 
// var fadeTime = 300;


// /* Assign actions */
// $('.product-quantity input').change( function() {
//   updateQuantity(this);
// });

// $('.product-removal button').click( function() {
//   removeItem(this);
// });


// /* Recalculate cart */
// function recalculateCart()
// {
//   var subtotal = 0;
  
//   /* Sum up row totals */
//   $('.product').each(function () {
//     subtotal += parseFloat($(this).children('.product-line-price').text());
//   });
  
//   /* Calculate totals */
//   var tax = subtotal * taxRate;
//   var shipping = (subtotal > 0 ? shippingRate : 0);
//   var total = subtotal + tax + shipping;
  
//   /* Update totals display */
//   $('.totals-value').fadeOut(fadeTime, function() {
//     $('#cart-subtotal').html(subtotal.toFixed(2));
//     $('#cart-tax').html(tax.toFixed(2));
//     $('#cart-shipping').html(shipping.toFixed(2));
//     $('#cart-total').html(total.toFixed(2));
//     if(total == 0){
//       $('.checkout').fadeOut(fadeTime);
//     }else{
//       $('.checkout').fadeIn(fadeTime);
//     }
//     $('.totals-value').fadeIn(fadeTime);
//   });
// }


// /* Update quantity */
// function updateQuantity(quantityInput)
// {
//   /* Calculate line price */
//   var productRow = $(quantityInput).parent().parent();
//   var price = parseFloat(productRow.children('.product-price').text());
//   var quantity = $(quantityInput).val();
//   var linePrice = price * quantity;
  
//   /* Update line price display and recalc cart totals */
//   productRow.children('.product-line-price').each(function () {
//     $(this).fadeOut(fadeTime, function() {
//       $(this).text(linePrice.toFixed(2));
//       recalculateCart();
//       $(this).fadeIn(fadeTime);
//     });
//   });  
// }


// /* Remove item from cart */
// function removeItem(removeButton)
// {
//   /* Remove row from DOM and recalc cart total */
//   var productRow = $(removeButton).parent().parent();
//   productRow.slideUp(fadeTime, function() {
//     productRow.remove();
//     recalculateCart();
//   });
// }