document.addEventListener('DOMContentLoaded', function() {

    var linkpreview = document.getElementById('link');
    var videopreview = document.getElementById('videopreview')
    linkpreview.addEventListener('input', function() {
        var videoID = this.value.split('=')[1]
        videopreview.setAttribute('src','https://www.youtube.com/embed/' + videoID)
    });
});




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



