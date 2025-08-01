@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                <span class="fw-normal">User Dashboard</span>
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
                <span class="breadcrumb-item active">Dashboard</span>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <!-- Stats Cards -->
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">{{ $projects->count() }}</h3>
                        <span class="text-uppercase font-size-xs text-muted">Total Projects</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="ph-folder icon-3x opacity-75"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">{{ $projects->where('approval_status', 'approved')->count() }}</h3>
                        <span class="text-uppercase font-size-xs text-muted">Approved Projects</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="ph-check-circle icon-3x opacity-75 text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">{{ $projects->where('approval_status', 'pending')->count() }}</h3>
                        <span class="text-uppercase font-size-xs text-muted">Pending Approval</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="ph-clock icon-3x opacity-75 text-warning"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0">{{ $projects->where('approval_status', 'rejected')->count() }}</h3>
                        <span class="text-uppercase font-size-xs text-muted">Rejected Projects</span>
                    </div>
                    <div class="ml-3 align-self-center">
                        <i class="ph-x-circle icon-3x opacity-75 text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="ph-folder me-2"></i>
                        My Projects
                    </h5>
                    <a href="{{ route(getPrefix() . 'projects.create') }}" class="btn btn-primary">
                        <i class="ph-plus me-2"></i>
                        Create New Project
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th>Project</th>
                                <th>Progress</th>
                                <th>Status</th>
                                <th>Approval</th>
                                <th>Created By</th>
                                <th>Created</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="d-block me-3">
                                                <img src="{{ asset($project->image ?? 'assets/images/placeholder.jpg') }}"
                                                     class="rounded-circle" width="36" height="36" alt="">
                                            </a>
                                            <div>
                                                <a href="{{ route(getPrefix() . 'projects.show', $project->id) }}"
                                                   class="text-body fw-semibold">{{ $project->title }}</a>
                                                <div class="text-muted small">{{ $project->industry ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 6px;">
                                                <div class="progress-bar bg-success"
                                                     style="width: {{ $project->progress }}%"></div>
                                            </div>
                                            <span class="text-muted small">{{ $project->progress }}%</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge {{ $project->getStatusBadgeClass() }}">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge {{ $project->getApprovalBadgeClass() }}">
                                            {{ ucfirst($project->approval_status) }}
                                        </span>
                                        @if($project->isPending())
                                            <small class="d-block text-muted">Waiting for admin approval</small>
                                        @elseif($project->isRejected())
                                            <small class="d-block text-danger">Project was rejected</small>
                                        @elseif($project->isApproved())
                                            <small class="d-block text-success">Project is active</small>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $project->creator->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <span class="text-muted">{{ $project->created_at->format('M d, Y') }}</span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route(getPrefix() . 'projects.show', $project->id) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="View Project"
                                               data-bs-toggle="tooltip">
                                                <i class="ph-eye"></i>
                                            </a>

                                            <a href="{{ route(getPrefix() . 'projects.edit', $project->id) }}"
                                               class="btn btn-sm btn-outline-success"
                                               title="Edit Project"
                                               data-bs-toggle="tooltip">
                                                <i class="ph-pencil"></i>
                                            </a>

                                            @if($project->isApproved())
                                                <a href="{{ route(getPrefix() . 'assets.index') }}?project={{ $project->id }}"
                                                   class="btn btn-sm btn-outline-info"
                                                   title="View Assets"
                                                   data-bs-toggle="tooltip">
                                                    <i class="ph-folder"></i>
                                                </a>
                                            @endif

                                            <!-- Chat Button for Project -->
                                            <a href="{{ route(getPrefix() . 'chat.create', $project->id) }}"
                                               class="btn btn-sm btn-outline-warning"
                                               title="Chat about {{ $project->title }}"
                                               data-bs-toggle="tooltip">
                                                <i class="ph-chats-circle"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="ph-folder ph-2x mb-2"></i>
                                            <p>No projects found</p>
                                            <a href="{{ route(getPrefix() . 'projects.create') }}" class="btn btn-primary">
                                                Create Your First Project
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="ph-clock me-2"></i>
                        Recent Activity
                    </h5>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="refreshActivities()">
                            <i class="ph-arrow-clockwise"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="showAllActivities()">
                            View All
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="activities-container">
                        @if($activities->count() > 0)
                            <div class="timeline">
                                @foreach($activities as $activity)
                                    <div class="timeline-item">
                                        <div class="timeline-marker bg-{{ $activity->color }}"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex align-items-center mb-1">
                                                        <i class="ph {{ $activity->icon }} me-2 text-{{ $activity->color }}"></i>
                                                        <h6 class="mb-0">{{ $activity->description }}</h6>
                                                    </div>
                                                    @if($activity->project)
                                                        <p class="text-muted mb-1">
                                                            <i class="ph-folder me-1"></i>
                                                            {{ $activity->project->title }}
                                                        </p>
                                                    @endif
                                                    <small class="text-muted">
                                                        <i class="ph-user me-1"></i>
                                                        {{ $activity->user->name }}
                                                    </small>
                                                </div>
                                                <small class="text-muted ms-2">
                                                    {{ $activity->formatted_time }}
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4">
                                <i class="ph-clock ph-2x text-muted mb-3"></i>
                                <p class="text-muted mb-0">No recent activity.</p>
                                <small class="text-muted">Your activities will appear here once you start using the system.</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.timeline-item:hover {
    transform: translateX(5px);
}

.timeline-marker {
    position: absolute;
    left: -35px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid #fff;
    box-shadow: 0 0 0 2px currentColor;
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

.activity-loading {
    text-align: center;
    padding: 20px;
}

.activity-loading .spinner-border {
    width: 2rem;
    height: 2rem;
}

.activity-empty {
    text-align: center;
    padding: 40px 20px;
    color: #6c757d;
}

.activity-empty i {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}
</style>

<script>
// Refresh activities
function refreshActivities() {
    const container = document.getElementById('activities-container');
    const button = event.target.closest('button');
    const originalContent = button.innerHTML;

    button.innerHTML = '<i class="ph-arrow-clockwise ph-spin"></i>';
    button.disabled = true;

    // Show loading state
    container.innerHTML = `
        <div class="activity-loading">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Refreshing activities...</p>
        </div>
    `;

    // Simulate refresh (in real implementation, this would be an AJAX call)
    setTimeout(() => {
        location.reload();
    }, 1000);
}

// Show all activities modal
function showAllActivities() {
    // Create modal for showing all activities
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'allActivitiesModal';
    modal.innerHTML = `
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ph-clock me-2"></i>
                        All Activities
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center py-4">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Loading all activities...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(modal);

    const modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();

    // Load activities via AJAX
    fetch('{{ route(getPrefix() . "activities.index") }}')
        .then(response => response.text())
        .then(html => {
            modal.querySelector('.modal-body').innerHTML = html;
        })
        .catch(error => {
            modal.querySelector('.modal-body').innerHTML = `
                <div class="text-center py-4">
                    <i class="ph-warning ph-2x text-danger mb-3"></i>
                    <p class="text-danger">Failed to load activities</p>
                    <small class="text-muted">Please try again later.</small>
                </div>
            `;
        });

    // Clean up modal when closed
    modal.addEventListener('hidden.bs.modal', function() {
        document.body.removeChild(modal);
    });
}

// Auto-refresh activities every 30 seconds
setInterval(() => {
    // Only refresh if user is on the dashboard
    if (window.location.pathname.includes('dashboard')) {
        // You could implement a more sophisticated refresh here
        // For now, we'll just update the timestamps
        updateActivityTimestamps();
    }
}, 30000);

// Update activity timestamps
function updateActivityTimestamps() {
    const timestamps = document.querySelectorAll('.timeline-item small.text-muted');
    timestamps.forEach(timestamp => {
        // This would need to be implemented with actual data
        // For now, it's just a placeholder
    });
}

// Initialize tooltips
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endsection
