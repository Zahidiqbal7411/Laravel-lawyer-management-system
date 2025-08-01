@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                <span class="fw-normal">Project Details</span>
            </h4>
            <a href="#page_header" class="btn btn-light align-self-center collapsed ms-auto" data-bs-toggle="collapse">
                <i class="ph-caret-down"></i>
            </a>
        </div>
    </div>

    <div class="page-header-content d-lg-flex border-top">
        <div class="d-flex">
            <div class="breadcrumb py-2">
                <a href="{{ route(getPrefix() . 'dashboard') }}" class="breadcrumb-item"><i class="ph-house"></i></a>
                <a href="{{ route(getPrefix() . 'projects.index') }}" class="breadcrumb-item">Projects</a>
                <span class="breadcrumb-item active">{{ $project->title }}</span>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="row">
        <div class="col-lg-8">
            <!-- Project Details Card -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="ph-folder me-2"></i>
                        Project Information
                    </h5>
                    <div class="d-flex gap-2">
                        <a href="{{ route(getPrefix() . 'projects.edit', $project->id) }}" class="btn btn-primary btn-sm">
                            <i class="ph-pencil me-1"></i> Edit
                        </a>
                        @role('Admin|SUPER_ADMIN')
                            @if($project->isPending())
                                <button type="button" class="btn btn-success btn-sm" onclick="approveProject({{ $project->id }})">
                                    <i class="ph-check me-1"></i> Approve
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="rejectProject({{ $project->id }})">
                                    <i class="ph-x me-1"></i> Reject
                                </button>
                            @endif
                        @endrole
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Project Title</label>
                                <p class="mb-0">{{ $project->title }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Industry</label>
                                <p class="mb-0">{{ $project->industry ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <p class="mb-0">{{ $project->description ?? 'No description provided' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Budget</label>
                                <p class="mb-0">{{ $project->budget ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Time Spent</label>
                                <p class="mb-0">{{ $project->time_spent ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($project->technologies)
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Technologies</label>
                            <div class="d-flex flex-wrap gap-1">
                                @foreach(json_decode($project->technologies) as $tech)
                                    <span class="badge bg-light text-dark">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Progress</label>
                                <div class="d-flex align-items-center">
                                    <div class="progress me-2" style="width: 150px; height: 8px;">
                                        <div class="progress-bar bg-success" style="width: {{ $project->progress }}%"></div>
                                    </div>
                                    <span class="text-muted">{{ $project->progress }}%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Status</label>
                                <p class="mb-0">
                                    <span class="badge {{ $project->getStatusBadgeClass() }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Client</label>
                                <p class="mb-0">{{ $project->client->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Created By</label>
                                <p class="mb-0">{{ $project->creator->name ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Assigned Developers</label>
                        @if($project->users && $project->users->count())
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($project->users as $developer)
                                    <span class="badge bg-info text-dark">
                                        <i class="ph-user me-1"></i>{{ $developer->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">No developers assigned.</p>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Created Date</label>
                                <p class="mb-0">{{ $project->created_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Last Updated</label>
                                <p class="mb-0">{{ $project->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status History -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="ph-clock me-2"></i>
                        Status History
                    </h5>
                </div>
                <div class="card-body">
                    @if($project->statusLogs->count() > 0)
                        <div class="timeline">
                            @foreach($project->statusLogs->sortByDesc('created_at') as $log)
                                <div class="timeline-item">
                                    <div class="timeline-marker"></div>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">{{ ucfirst($log->status) }}</h6>
                                                <p class="text-muted mb-1">{{ $log->remarks }}</p>
                                                <small class="text-muted">
                                                    Changed by {{ $log->changedBy->name ?? 'Unknown' }}
                                                </small>
                                            </div>
                                            <small class="text-muted">
                                                {{ $log->created_at->format('M d, Y H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted mb-0">No status history available.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Project Image -->
            @if($project->image)
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="ph-image me-2"></i>
                            Project Image
                        </h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"
                             class="img-fluid rounded" style="max-height: 200px;">
                    </div>
                </div>
            @endif

            <!-- Approval Status -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="ph-check-circle me-2"></i>
                        Approval Status
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <span class="badge {{ $project->getApprovalBadgeClass() }} fs-6">
                            {{ ucfirst($project->approval_status) }}
                        </span>
                    </div>

                    @if($project->isPending())
                        <div class="mt-3">
                            <p class="text-muted small text-center">
                                This project is waiting for admin approval.
                            </p>
                        </div>
                    @elseif($project->isRejected())
                        <div class="mt-3">
                            <p class="text-danger small text-center">
                                This project has been rejected.
                            </p>
                        </div>
                    @elseif($project->isApproved())
                        <div class="mt-3">
                            <p class="text-success small text-center">
                                This project has been approved and is active.
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="ph-gear me-2"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route(getPrefix() . 'projects.edit', $project->id) }}" class="btn btn-primary">
                            <i class="ph-pencil me-2"></i> Edit Project
                        </a>
                        <a href="{{ route(getPrefix() . 'assets.index') }}?project={{ $project->id }}" class="btn btn-outline-primary">
                            <i class="ph-folder me-2"></i> View Assets
                        </a>
                        <a href="{{ route(getPrefix() . 'chat.create', $project->id) }}" class="btn btn-outline-warning">
                            <i class="ph-chats-circle me-2"></i> Chat about {{ $project->title }}
                        </a>
                        @if($project->status === 'completed' && !$project->subscription)
                            <a href="{{ route('admin.projects.subscriptions.create', $project->id) }}" class="btn btn-outline-success">
                                <i class="ph-plus-circle me-2"></i> Add Subscription
                            </a>
                        @endif
                        @role('Admin|SUPER_ADMIN')
                            <button type="button" class="btn btn-outline-success" onclick="updateStatus({{ $project->id }})">
                                <i class="ph-arrow-clockwise me-2"></i> Update Status
                            </button>
                        @endrole
                        <!-- Assign Developer Button -->
                        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#assignDeveloperModal">
                            <i class="ph-user-plus me-2"></i> Assign Developer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Update Modal -->
<div class="modal fade" id="statusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Project Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="statusForm">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="active">Active</option>
                            <option value="paused">Paused</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks (Optional)</label>
                        <textarea class="form-control" id="remarks" name="remarks"
                                  rows="3" placeholder="Add any remarks about this status change..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitStatusUpdate()">Update Status</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Forms -->
<form id="approve-form" action="{{ route(getPrefix() . 'projects.approve', $project->id) }}" method="POST" style="display: none;">
    @csrf
</form>

<form id="reject-form" action="{{ route(getPrefix() . 'projects.reject', $project->id) }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="rejection_reason" id="rejection-reason">
</form>

<form id="status-form" action="{{ route(getPrefix() . 'projects.update-status', $project->id) }}" method="POST" style="display: none;">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="status-input">
    <input type="hidden" name="remarks" id="remarks-input">
</form>

<!-- Assign Developer Modal -->
<div class="modal fade" id="assignDeveloperModal" tabindex="-1" aria-labelledby="assignDeveloperModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="assignDeveloperModalLabel">Assign Developer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
          @foreach($developers as $developer)
            @php
              $isAssigned = $project->users->contains('id', $developer->id);
            @endphp
            <li class="list-group-item d-flex justify-content-between align-items-center" data-developer-id="{{ $developer->id }}">
              <span>
                <i class="ph-user me-2"></i>{{ $developer->name }} <small class="text-muted">({{ $developer->email }})</small>
              </span>
              @if($isAssigned)
                <span class="badge bg-success"><i class="ph-check"></i> Assigned</span>
                <!-- Optionally, add a Remove button here -->
                <!--
                <button class="btn btn-sm btn-danger ms-2" onclick="removeDeveloperFromProject({{ $developer->id }})">
                  <i class="ph-x"></i> Remove
                </button>
                -->
              @else
                <button class="btn btn-sm btn-primary" onclick="assignDeveloperToProject({{ $developer->id }})">
                  Assign
                </button>
              @endif
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

<script>
function approveProject(id) {
    if (confirm('Are you sure you want to approve this project?')) {
        document.getElementById('approve-form').submit();
    }
}

function rejectProject(id) {
    const reason = prompt('Please provide a reason for rejection:');
    if (reason && reason.trim()) {
        document.getElementById('rejection-reason').value = reason.trim();
        document.getElementById('reject-form').submit();
    } else if (reason !== null) {
        alert('Please provide a rejection reason.');
    }
}

function updateStatus(id) {
    document.getElementById('status').value = '{{ $project->status }}';
    document.getElementById('remarks').value = '';
    new bootstrap.Modal(document.getElementById('statusModal')).show();
}

function submitStatusUpdate() {
    const status = document.getElementById('status').value;
    const remarks = document.getElementById('remarks').value;

    document.getElementById('status-input').value = status;
    document.getElementById('remarks-input').value = remarks;
    document.getElementById('status-form').submit();
}

function removeDeveloperFromProject(developerId) {
    fetch(`/projects/{{ $project->id }}/remove-developer`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=\'csrf-token\']').getAttribute('content')
        },
        body: JSON.stringify({ developer_id: developerId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove the developer from the list
            const listItem = document.querySelector(`li[data-developer-id='${developerId}']`);
            if (listItem) listItem.remove();
        } else {
            alert('Failed to remove developer.');
        }
    })
    .catch(() => alert('Error removing developer.'));
}
</script>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #007bff;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px #007bff;
}

.timeline-item::before {
    content: '';
    position: absolute;
    left: -29px;
    top: 17px;
    width: 2px;
    height: calc(100% + 3px);
    background-color: #e9ecef;
}

.timeline-item:last-child::before {
    display: none;
}
</style>
@endsection
