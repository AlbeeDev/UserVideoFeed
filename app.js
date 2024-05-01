document.addEventListener('DOMContentLoaded', function() {

    var linkpreview = document.getElementById('link');
    var videopreview = document.getElementById('videopreview')
    if(linkpreview){
        linkpreview.addEventListener('input', function() {
            var videoID = this.value.split('=')[1]
            videopreview.setAttribute('src','https://www.youtube.com/embed/' + videoID)
        });
    }
    

    const dropdownMenu = document.getElementById('theme-selector')
    const themeElements = document.querySelectorAll('.control-bg');
    dropdownMenu.addEventListener('click', function (event) {
        console.log(event.target.name)
        var themeclass = event.target.name.split(' ')

        themeElements.forEach(function(element) {
            element.classList.forEach(className => {
                if (className.startsWith('bg-') || className.startsWith('btn-')) {
                    element.classList.remove(className)
                }
            })
            element.classList.add(themeclass)
        })

    });


    if (sessionStorage.scrollPosition) {
        window.scrollTo(0, parseInt(sessionStorage.scrollPosition));
    }

    // Save scroll position before the page unloads
    window.addEventListener('beforeunload', function() {
        sessionStorage.scrollPosition = window.scrollY || window.pageYOffset;
    });
});




function setRating(rating, element) {
    console.log(rating)
    document.getElementById('rating').value = rating;

    const parent = element.closest('.rating-form');

    const stars = parent.querySelectorAll('.fa-star');
    stars.forEach(star => {
        
        if (parseInt(star.id) <= rating) {
            star.classList.add('text-light');
            
        } else {
            star.classList.remove('text-light');
        }
    });
    parent.querySelector('.submitstar').classList.remove('disabled');
}



