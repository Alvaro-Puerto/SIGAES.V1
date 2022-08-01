
const Http = new XMLHttpRequest();


function reload_app() {
    window.location.reload();
}

function hidden_search() {
    document.getElementById('btn-search').style.visibility = 'visible';
    document.getElementById('search-student').style.visibility = 'hidden';
    document.getElementById('btn-cancel-search').style.visibility = 'hidden'
    document.getElementById('search-student').style.height = '0px';
}

function get_data_form() {
    let data = {
        'dni': document.getElementById('input-code').value,
        'first_name': document.getElementById('input-name').value,
        'last_name': document.getElementById('input-last-name').value
    }
    
    const url='/search/tutor';
  
    Http.open("POST", url);
    Http.setRequestHeader('X-CSRF-Token', $('meta[name="_token"]').attr('content'));
    Http.setRequestHeader("Accept", "application/json");
    Http.setRequestHeader("Content-Type", "application/json");
    Http.send(JSON.stringify(data));

    Http.onreadystatechange = (e) => {
        console.log(Http.response)
        replaceRow(Http.response)
    }, err => {
        console.log(err);
    }

}

function replaceRow(data) {
    document.getElementById('table-tutor').innerHTML = data;
}