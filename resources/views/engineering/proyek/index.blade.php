@extends('layout.main')

@section('content')
<div class="row"> 
  <div class="col-sm-12"> 
    <div class="card"> 
      <div class="card-body">
        <div class="list-product-header">
          <div> 
            <a class="btn btn-primary" href="/export-proyek"><i class="fa fa-plus"></i>Export Excel</a>
          </div>
          @if (Session('success'))
            <div class="alert alert-primary dark alert-dismissible fade show my-3" role="alert">
              {{Session('success')}}
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
          @if (Session('fail'))
            <div class="alert alert-danger dark alert-dismissible fade show my-3" role="alert">
              {{Session('fail')}}
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif
        </div>
        <div class="list-product">
          <table class="table" id="project-status">
            <thead> 
            <tr class="ligth">
                            <th>No</th>
                            <th>Kode SPK</th>
                            <th>Nama Proyek</th>
                            <th>Tanggal</th>
                            <th>Tipe Konstruksi</th>
                            <th>Prioritas</th>
                            <th>Persentase</th>
                            <th>Status</th>
                            <th>Anggota Tim</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>

            </thead>
            <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarProyek as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->kode_spk}}</td>
                            <td>{{$item->nama_proyek}}</td>
                            <td>{{$item->tanggal}}</td>
                            <td>{{$item->tipe_konstruksi}}</td>
                            <td>{{$item->prioritas}}</td>
                            <td>{{$item->realisasi}}%</td>
                            <td>
                                <span class="status-box {{ $item->status_implementasi == 'Closed' ? 'closed' : 'open' }}">
                                    {{ $item->status_implementasi }}
                                </span>
                            </td>

                            <td> <a href="/daftar-proyek-user/{{$item->id_proyek}}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Tim Proyek" data-original-title="Tim Proyek">
                                        <span class="btn-inner">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                          
                                        </span>
                                    </a></td>
                                    <td>
    <div class="flex align-items-center list-user-action" style="display: flex; gap: 10px;">
        <!-- Detail Button -->
        <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_proyek}}" data-placement="top" title="Detail Proyek" data-original-title="Detail">
            <span class="btn-inner">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                    <circle cx="12" cy="12" r="5" stroke="currentColor"></circle>
                    <circle cx="12" cy="12" r="3" fill="#130F26"></circle>
                    <mask mask-type="alpha" maskUnits="userSpaceOnUse" x="9" y="9" width="6" height="6">
                        <circle cx="12" cy="12" r="3" fill="#130F26"></circle>
                    </mask>
                    <circle opacity="0.89" cx="13.5" cy="10.5" r="1.5" fill="white"></circle>
                </svg>
            </span>
        </button>

        <!-- Edit Button -->
        <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Edit User" data-original-title="Edit" href="/edit-proyek/{{$item->id_proyek}}">
            <span class="btn-inner">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
        </a>

        <!-- Delete Button -->
        <button type="button" class="btn btn-sm btn-icon btn-danger btn-delete" data-toggle="tooltip" data-href="/hapus-proyek/{{$item->id_proyek}}" data-content="Apakah Anda yakin akan hapus data ini?" data-placement="top" title="Hapus User" data-original-title="Delete">
            <span class="btn-inner">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </span>
        </button>
    </div>
</td>

                        </tr>
                        @endforeach
                    </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection