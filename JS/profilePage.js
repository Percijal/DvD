
// function okej(){
//     console.log("test");
// }

let photoId;
const userPhoto = document.getElementById('mainPhoto');

function whichImage(){
    if(document.getElementById('radioPicture1').checked) {
        photoId = document.getElementById('ID1');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
        
    }else if(document.getElementById('radioPicture2').checked) {
        photoId = document.getElementById('ID2');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture3').checked) {
        photoId = document.getElementById('ID3');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture4').checked) {
        photoId = document.getElementById('ID4');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture5').checked) {
        photoId = document.getElementById('ID5');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture6').checked) {
        photoId = document.getElementById('ID6');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture7').checked) {
        photoId = document.getElementById('ID7');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    else if(document.getElementById('radioPicture8').checked) {
        photoId = document.getElementById('ID8');
        srcArray = photoId.src.split('/');
        userPhoto.src = "../images/ProfileIcons/" + srcArray[srcArray.length - 1];
    }
    $.ajax({
        type: "POST",
        url: "profileAvatar.php",
        data: {
            photoId: srcArray[srcArray.length - 1]
            }
        })
            .done(function(response) {
                console.log(response)
        });
}
