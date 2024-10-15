@extends('layout.main')

@section('content')
<div class="container mt-4">
    
    
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tasks</h5>
             
                    <a href="/tambah-task" class="btn btn-success mb-3">New Task</a>
                    <h6>Views</h6>
                    <ul class="list-group" id="taskStatusViews">
                        <li class="list-group-item" data-status="done">Done</li>
                        <li class="list-group-item" data-status="workingOnIt">Working On It</li>
                        <li class="list-group-item" data-status="start">Start</li>
                    </ul>
                    <h6 class="mt-3">Tags</h6>
                    <div class="tags">
                        <span class="badge bg-primary">Notification</span>
                        <span class="badge bg-secondary">Newsletter</span>
                        <span class="badge bg-success">Business</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card" id="taskCard">
                <div class="card-body">
                    <h5 class="card-title">Tasks Status</h5>
                    <table class="table table-striped" id="taskTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item Task</th>
                                <th>Timeline</th>
                                <th>Status</th>
                                <th>Status Komentar</th>
                                <th>Evidence</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Tugas akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const tasks = {
        done: [
            <?php $no = 1;?>
            @foreach ($daftarTask as $item)
            { {$no++}, {$item->item_task}, {$item->status}, {$item->komentar}, {$item->komentar}},
        ],
        workingOnIt: [
            { no: 1, item: 'Plan webinar', status: 'Working On It' },
            { no: 2, item: 'Email newsletter', status: 'Working On It' }
        ],
        start: [
            { no: 1, item: 'Lunch website', status: 'Start' },
            { no: 2, item: 'Client meeting', status: 'Start' }
        ]
    };

    document.querySelectorAll('#taskStatusViews li').forEach(item => {
        item.addEventListener('click', event => {
            const status = item.getAttribute('data-status');
            loadTasks(status);
        });
    });

    function loadTasks(status) {
        const taskTableBody = document.querySelector('#taskTable tbody');
        taskTableBody.innerHTML = ''; // Kosongkan tabel sebelum diisi

        if (tasks[status]) {
            tasks[status].forEach(task => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${task.no}</td>
                    <td>${task.item}</td>
                    <td><span class="badge ${task.status === 'Done' ? 'bg-success' : (task.status === 'Working On It' ? 'bg-warning' : 'bg-info')}">${task.status}</span></td>
                    <td>
                        <a href="/edit-task/${task.no}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/delete-task/${task.no}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                `;
                taskTableBody.appendChild(row);
            });
        }
    }

    // Muat tugas awal
    loadTasks('done');
</script>
@endsection
