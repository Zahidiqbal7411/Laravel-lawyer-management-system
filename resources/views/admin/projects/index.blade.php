@extends('layouts.app')

@section('title', 'Projects Management')

@section('content')
<div class="page-header page-header-light">
    <div class="page-header-content d-lg-flex">
        <div class="d-flex">
            <h4 class="page-title mb-0">
                <span class="fw-normal">Projects</span>
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
                <span class="breadcrumb-item active">All Projects</span>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">
                    <i class="ph-folder me-2"></i>
                    Project Management
                </h5>
                <span class="badge bg-primary ms-2">{{ $projects->count() }} Total</span>
            </div>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route(getPrefix() . 'projects.create') }}" class="btn btn-primary">
                    <i class="ph-plus me-2"></i>
                    Create New Project
                </a>

                <div class="dropdown">
                    <button type="button"
                        class="btn btn-outline-secondary dropdown-toggle"
                        data-bs-toggle="dropdown">
                        <i class="ph-gear me-2"></i>
                        Actions
                    </button>

                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="#" class="dropdown-item">
                            <i class="ph-download me-2"></i>
                            Export Projects
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ph-upload me-2"></i>
                            Import Projects
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="ph-gear me-2"></i>
                            Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Client</th>
                        <th>Progress</th>
                        <th>Status</th>
                        <th>Approval</th>
                        <th>Subscription</th>
                        <th>Created By</th>
                        <th>Created</th>
                        <th class="text-center" style="width: 20px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="#" class="d-block me-3">
                                        <img src="{{ asset($project->image ?? 'assets/images/placeholder.jpg') }}"
                                             class="rounded-circle" width="40" height="40" alt="">
                                    </a>
                                    <div>
                                        <a href="{{ route(getPrefix() . 'projects.show', $project->id) }}"
                                           class="text-body fw-semibold">{{ $project->title }}</a>
                                        <div class="text-muted small">{{ $project->industry ?? 'N/A' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted">{{ $project->client->name ?? 'N/A' }}</span>
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
                            </td>
                            <td>
                                @if($project->subscription)
                                    <div><strong>Plan:</strong> {{ $project->subscription->type }}</div>
                                    @if($project->subscription->user_site)
                                        <div><strong>Site:</strong> <a href="{{ $project->subscription->user_site }}" target="_blank">{{ $project->subscription->user_site }}</a></div>
                                    @endif
                                    <div><strong>Period:</strong> {{ \Carbon\Carbon::parse($project->subscription->start_date)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($project->subscription->end_date)->format('M d, Y') }}</div>
                                    @php
                                        $now = \Carbon\Carbon::now();
                                        $expired = $now->gt(\Carbon\Carbon::parse($project->subscription->end_date));
                                    @endphp
                                    <div>
                                        <span class="badge {{ $expired ? 'bg-danger' : 'bg-success' }}">
                                            {{ $expired ? 'Expired' : 'Active' }}
                                        </span>
                                        @if($expired)
                                            <a href="{{ route('admin.projects.subscriptions.create', $project->id) }}" class="btn btn-sm btn-warning ms-2">Renew</a>
                                        @endif
                                    </div>
                                @else
                                    <span class="text-muted">No Subscription</span>
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
                                    <!-- View Button -->
                                    <a href="{{ route(getPrefix() . 'projects.show', $project->id) }}"
                                       class="btn btn-sm btn-outline-primary"
                                       title="View Project"
                                       data-bs-toggle="tooltip">
                                        <i class="ph-eye"></i>
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route(getPrefix() . 'projects.edit', $project->id) }}"
                                       class="btn btn-sm btn-outline-success"
                                       title="Edit Project"
                                       data-bs-toggle="tooltip">
                                        <i class="ph-pencil"></i>
                                    </a>

                                    <!-- Approval Actions (Admin Only) -->
                                    @role('Admin|SUPER_ADMIN')
                                        @if($project->isPending())
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-success"
                                                    title="Approve Project"
                                                    data-bs-toggle="tooltip"
                                                    onclick="approveProject({{ $project->id }})">
                                                <i class="ph-check"></i>
                                            </button>
                                            <button type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Reject Project"
                                                    data-bs-toggle="tooltip"
                                                    onclick="rejectProject({{ $project->id }})">
                                                <i class="ph-x"></i>
                                            </button>
                                        @endif
                                    @endrole

                                    <!-- Chat Button -->
                                    <a href="{{ route(getPrefix() . 'chat.create', $project->id) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       title="Chat about {{ $project->title }}"
                                       data-bs-toggle="tooltip">
                                        <i class="ph-chats-circle"></i>
                                    </a>

                                    <!-- Assign Developer Button -->
                                    @role('Developer|Admin|SUPER_ADMIN')
                                    <a href="{{ route('developer.project.show', $project->id) }}" class="btn btn-sm btn-outline-primary" title="View Project">
                                        <i class="ph-eye"></i> View Project
                                    </a>
                                    @endrole

                                    <!-- Delete Button -->
                                    <button type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Delete Project"
                                            data-bs-toggle="tooltip"
                                            onclick="confirmDelete({{ $project->id }}, '{{ $project->title }}')">
                                        <i class="ph-trash"></i>
                                    </button>
                                </div>

                                <!-- Hidden Delete Form -->
                                <form id="delete-form-{{ $project->id }}"
                                      action="{{ route(getPrefix() . 'projects.destroy', $project->id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Hidden Approve Form -->
                                <form id="approve-form-{{ $project->id }}"
                                      action="{{ route(getPrefix() . 'projects.approve', $project->id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <!-- Hidden Reject Form -->
                                <form id="reject-form-{{ $project->id }}"
                                      action="{{ route(getPrefix() . 'projects.reject', $project->id) }}"
                                      method="POST" style="display: none;">
                                    @csrf
                                    <input type="hidden" name="rejection_reason" id="rejection-reason-{{ $project->id }}">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
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

<!-- Rejection Modal -->
<div class="modal fade" id="rejectionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reject Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="rejectionForm">
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">Rejection Reason</label>
                        <textarea class="form-control" id="rejection_reason" name="rejection_reason"
                                  rows="3" placeholder="Please provide a reason for rejection..." required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="submitRejection()">Reject Project</button>
            </div>
        </div>
    </div>
</div>

<script>
let currentProjectId = null;

function confirmDelete(id, title) {
    if (confirm(`Are you sure you want to delete "${title}"?`)) {
        document.getElementById(`delete-form-${id}`).submit();
    }
}

function approveProject(id) {
    if (confirm('Are you sure you want to approve this project?')) {
        document.getElementById(`approve-form-${id}`).submit();
    }
}

function rejectProject(id) {
    currentProjectId = id;
    document.getElementById('rejection_reason').value = '';
    new bootstrap.Modal(document.getElementById('rejectionModal')).show();
}

function submitRejection() {
    const reason = document.getElementById('rejection_reason').value.trim();
    if (!reason) {
        alert('Please provide a rejection reason.');
        return;
    }

    document.getElementById(`rejection-reason-${currentProjectId}`).value = reason;
    document.getElementById(`reject-form-${currentProjectId}`).submit();
}
</script>
@endsection
