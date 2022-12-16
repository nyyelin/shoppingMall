@extends('backendTemplate')
@section('content')
  <div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </nav>
    <a class="btn btn-primary" href="{{route('main-category.create')}}">New Category</a>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="cols-10 mx-auto">
        <div class="card recent-sales overflow-auto">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Sales <span>| Today</span></h5>

            <table class="table table-borderless" id="main-category">
              <thead>
                <tr>
                  
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                  
                </tr>
              </thead>
              <tbody>
                
                
              </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </section>
@endsection
@section('script')
<script>
  $(document).ready(function() {
    $('#main-category').DataTable({
        bSort: false,
        ordering: false,
        processing: true,
        serverSide: true,
        deferRender: true,
        targets: 'no-sort',
        destroy: true,
        responsive: false,
        ajax: {
            type: 'post',
            url: "{{route('ajax.main-category.list')}}",
        },
        columns: [
            { data: 'name', name: 'name', searchable: true, render: $.fn.dataTable.render.text() },
            {
                data: 'action',
                name: 'action',
                searchable: true,
                render: function (data, type, row) {
                  let url = "{{route('main-category.edit',':id')}}";
                  url = url.replace(':id', row.uuid);
                    let buttons = '';

                    if (data.canEdit === true) {
                        buttons += `<a class="btn btn-warning btn-sm text-white" href="${url}"
                            data-bs-toggle="tooltip" createcreatedata-bs-placement="left" title="Edit">
                            <i class="bi bi-pencil-square" aria-hidden="true"></i></a>`;
                    }

                   if (data.canDelete === true) {
                        buttons += `&nbsp;<a class="btn btn-sm btn-danger text-white" href="#" onclick="deleteByKey(this, 'equipment-type')" id="${row.uuid}"
                            data-bs-toggle="tooltip" data-bs-placement="right" title="delete"><i class="bi bi-trash" aria-hidden="true"></i></a>`;
                    }
                    
                    return buttons;
                }
            }
        ],
        "columnDefs": [
            {"searchable": false}
        ],
    });
  })
</script>
@endsection
