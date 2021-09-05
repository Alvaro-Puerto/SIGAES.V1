


document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('container-repeat').style.visibility = "hidden";
    document.getElementById('container-repeat').style.height = "0px";

});

function isRepeat() {
    document.getElementById('container-repeat').style.visibility = "visible";
    document.getElementById('container-repeat').style.height = "100px";
}


function resetForm() {
    document.getElementById('container-repeat').style.visibility = "hidden";
    document.getElementById('container-repeat').style.height = "0px";
    document.getElementById('repeat').checked = false;
    document.getElementById('reason').value = '';
    document.getElementById('count_repeat').value = '';

}