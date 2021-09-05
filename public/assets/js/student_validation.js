
const Http = new XMLHttpRequest();

document.addEventListener('DOMContentLoaded', (event) => {
    hidden_search();

})

function hide_or_show() {
    if(document.getElementById('search-student').style.visibility == 'hidden') {
        show_search();
    } else {
        hidden_search();
    }
}

function show_search() {
    document.getElementById('search-student').style.visibility = 'visible';
    document.getElementById('search-student').style.height = '150px';
    document.getElementById('btn-search').style.visibility = 'hidden';
    document.getElementById('btn-cancel-search').style.visibility = 'visible'
}

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
        'code': document.getElementById('input-code').value,
        'first_name': document.getElementById('input-name').value,
        'last_name': document.getElementById('input-last-name').value
    }
    
    const url='search/student';
    console.log(data);
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

    let tbody = document.getElementById('tbody-student');
    let table = document.getElementById('table-student').getElementsByTagName('tbody')[0];
    // while (tbody.hasChildNodes()) {
    //     tbody.removeChild(tbody.lastChild);
    // }

    $('#table-student tbody').empty();
    
    $('#table-student tbody').html(data);


}