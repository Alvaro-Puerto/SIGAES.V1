const Http = new XMLHttpRequest();

function search() {
    var el = document.getElementById('list-teacher');
    let teacherName = document.getElementById('search-teacher').value;
    var url = '/teacher/search/' + teacherName;
    el.innerHTML = '';
    fetch(url, {
        method: 'GET'
    }).then(res => res.json())
    .catch(err => {
        alert('Hubo un error al procesar tu solicitud');
    }).then(res => {
        console.log(res);
        for (const item of res) {
            let strEl = '<li class="list-group-item">' + 
                                '<div class="row">' + 
                                    '<div class="col-7">'+
                                        '<p>'+ item.user.first_name + ' ' + item.user.last_name +'</p>'
                                        +'<small class="font-weight-bold">' + item.user.email + '</small>'
                                    +'</div>'
                                    +'<div class="col-5 d-flex justify-content-end">'+
                                        '<button class="btn btn-primary" onclick="saveAddTeacher('+item.id+')">Anexar</button>'
                                    +'</div>' + 
                                '</div>' 
                            +'</li>'
            el.innerHTML += strEl;
        }
    })
}



function get_data_form() {
    let data = {
        'code': document.getElementById('input-code').value,
        'first_name': document.getElementById('input-name').value,
        'last_name': document.getElementById('input-last-name').value
    }
    
    const url='search/teacher';
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