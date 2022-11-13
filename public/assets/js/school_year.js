
function search() {
    let str = ``;
    let query = document.getElementById('query').value;
    let url = '/school/year/search/' + query;
    fetch(url, {
        method: 'GET',
    })
    .then(res => res.json()) 
    .then(res => {
        console.log(res);
        for (const year of res) {
            str += `
            <tr>
                <th scope="row">
                  ${year.id}
                </th>
                <th scope="row">
                  ${year.name}
                </th>
                <th scope="row">
                  ${year.description}
                </th>
                <th scope="row">
                  ${year.start_at}
                </th>
                <th scope="row">
                  ${year.end_at}
                </th>
                <th scope="row">
                    ${isActive(year.status)}
                 
                </th>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v text-primary"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="/school/year/${year.id}/status">
                        <span><i class="fas fa-success"></i></i></span>
                        Activar
                      </a>
                      <a class="dropdown-item" href="/school/year/${year.id}/status">
                        <span><i class="fas fa-danger"></i></i></span>
                        Inactivar
                      </a>
                      <a class="dropdown-item" href="/school/year/detail/${year.id}">
                        <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                        Configurar
                      </a>
                      <a class="dropdown-item" href="/school/year/update/${year.id}">
                        <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
                        Editar
                      </a>
                      
                    </div>
                  </div>
                </td>
          </tr
            
            
            
            `;
        }
        document.getElementById('tbody-search').innerHTML = '';
        document.getElementById('tbody-search').innerHTML = str;
    })
    .catch(err => {

    });
}

function isActive(item) {
    if(item == 1) {
        return '<span class="badge badge-pill badge-success">Activo</span>'
    }

    return '<span class="badge badge-pill badge-danger">Inactivo</span>'

}
