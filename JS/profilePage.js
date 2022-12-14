
// function okej(){
//     console.log("test");
// }

let photoId;
const userPhoto = document.getElementById('mainPhoto');

function whichImage(){
    if(document.getElementById('radioPicture1').checked) {
        photoId = document.getElementById('ID1');
        userPhoto.src = photoId.src;
        
    }else if(document.getElementById('radioPicture2').checked) {
        photoId = document.getElementById('ID2');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture3').checked) {
        photoId = document.getElementById('ID3');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture4').checked) {
        photoId = document.getElementById('ID4');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture5').checked) {
        photoId = document.getElementById('ID5');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture6').checked) {
        photoId = document.getElementById('ID6');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture7').checked) {
        photoId = document.getElementById('ID7');
        userPhoto.src = photoId.src;
    }
    else if(document.getElementById('radioPicture8').checked) {
        photoId = document.getElementById('ID8');
        userPhoto.src = photoId.src;
    }
}
