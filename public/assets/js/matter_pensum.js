function addPensumTeacher(id_matter) {
    let id = document.getElementById('id_pensum_id').value;

    document.getElementById('pensum_id').value = id;
    document.getElementById('matter_id').value = id_matter;

    console.log(id_matter);
}

function saveAddTeacher() {
    let data = {
        'pensum_id': document.getElementById('pensum_id').value,
        'matter_id': document.getElementById('matter_id').value,
        'teacher_id': document.getElementById('teacher_id').value
    }

    //let id_pensum = document.getElementById('pensum_id').value;
    let url = '/course/pensum/matter';
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(res => res.json())
    .catch(err => {
        console.log(err)
    }).then(res => {
        console.log(res);
        //window.location.reload();
    });
}
  