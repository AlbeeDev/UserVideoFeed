function setRating(rating) {
    console.log(rating)
    document.getElementById('rating').value = rating;

    const stars = document.querySelectorAll('.fa-star');
    stars.forEach(star => {
        document.querySelector('.submitstar').classList.remove('disabled')
        if (parseInt(star.id) <= rating) {
            star.classList.add('text-light');
            
        } else {
            star.classList.remove('text-light');
        }
    });
}

