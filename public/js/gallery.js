// Element variables
const galleryImg = document.getElementsByClassName('gallery-img');
const galleryRemove = document.getElementsByClassName('gallery-img-remove');
const galleryBack = document.querySelector('#galleryBack');
const galleryForward = document.querySelector('#galleryForward');

let counter = 0;    // Images counter for progression or regression

// Slide right animation
function slideRight(img) {
    let animation = anime({
        targets: img,
        translateX: 400,
        easing: 'linear',
        duration: 300,
      });
      animation.reverse;
    // setTimeout(() => {})
}

// Slide left animation
function slideLeft() {
    anime({
        targets: '.gallery-img',
        translateX: 400,
        easing: 'linear',
        duration: 300,
      });
}

// Hide all images
for (let i = 0; i < galleryImg.length; i++) {
    galleryImg[i].classList.add('hidden');
    if (galleryRemove.length != 0) {
        galleryRemove[i].classList.add('hidden');
    }
}

// Show first image when gallery first loads
galleryImg[counter].classList.remove('hidden');
if (galleryRemove.length != 0) {
    galleryRemove[counter].classList.remove('hidden');
}

// Listen for next image event
galleryForward.addEventListener('click', () => {
    counter++;
    //galleryImg[counter].style.marginLeft = "-800px";
    //slideRight(galleryImg[counter]);
    if (counter > galleryImg.length - 1) {
        counter = 0;
        galleryImg[galleryImg.length - 1].classList.add('hidden');
        if (galleryRemove.length != 0) {
            galleryRemove[galleryRemove.length - 1].classList.add('hidden');
        }
    } else {
        galleryImg[counter - 1].classList.add('hidden');
        if (galleryRemove.length != 0) {
            galleryRemove[counter - 1].classList.add('hidden');
        }
    }
    galleryImg[counter].classList.remove('hidden');
    if (galleryRemove.length != 0) {
        galleryRemove[counter].classList.remove('hidden');
    }
});

// Listen for last image event
galleryBack.addEventListener('click', () => {
    counter--;
    if (counter < 0) {
        counter = galleryImg.length - 1;
        galleryImg[0].classList.add('hidden');
        galleryImg[galleryImg.length - 1].classList.remove('hidden');
        if (galleryRemove.length != 0) {
            galleryRemove[0].classList.add('hidden');
            galleryRemove[galleryRemove.length - 1].classList.remove('hidden');
        }
    } else {
        galleryImg[counter + 1].classList.add('hidden');
        if (galleryRemove.length != 0) {
            galleryRemove[counter + 1].classList.add('hidden');
        }
    }
    galleryImg[counter].classList.remove('hidden');
    if (galleryRemove.length != 0) {
        galleryRemove[counter].classList.remove('hidden');
    }
});