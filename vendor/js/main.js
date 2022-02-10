let btn = document.getElementById('image');
btn.onchange =( function (evt) {
    let files = evt.target.files;
    let f = files[0]
    if (!f.type.match('image.*')) {
        alert('This file not download');
    }
    let reader = new FileReader();
    reader.onload = (function(theFile) {
        return function(e) {
            let imgPlace = document.getElementById('new_photo');
            imgPlace.innerHTML = ['<img id="photo" class="span3" src="', e.target.result,
                '" title="', theFile.name, '"/>'].join('');
        };
    })(f);
    reader.readAsDataURL(f);
});
document.getElementById('new_photo').addEventListener('change', handleFileSelect, false);