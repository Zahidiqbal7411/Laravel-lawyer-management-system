@extends('layouts.app')

@section('styles')
<style>
.dashboard-container {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  padding: 24px;
  margin-left:100px;
  background: #f8fafc;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  justify-content: center;
}

.admin-card {
  background: #fff;
  border-radius: 16px;
  padding: 28px 24px;
  width: 280px;
  box-shadow: 0 8px 20px rgba(0,0,0,0.08);
  color: #2c3e50;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  transition: box-shadow 0.3s, transform 0.3s;
}

.admin-card:hover {
  box-shadow: 0 12px 28px rgba(0,0,0,0.15);
  transform: translateY(-5px);
}

.card-header {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 18px;
}

.card-icon {
  background: #e4e9f2;
  padding: 12px;
  border-radius: 12px;
  box-shadow: inset 0 0 10px rgba(0,0,0,0.05);
  transition: background-color 0.3s;
}

.admin-card:hover .card-icon {
  background-color: #d2dbf1;
}

.card-title {
  font-size: 1.25rem;
  font-weight: 700;
  margin: 0;
  color: #34495e;
}

.card-body {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.card-value {
  font-size: 2rem;
  font-weight: 800;
  margin: 0;
  color: #2c3e50;
}

.card-trend {
  display: flex;
  align-items: center;
  gap: 8px;
  font-weight: 600;
  font-size: 1rem;
}

.card-trend.positive { color: #27ae60; }
.card-trend.negative { color: #e74c3c; }

.card-trend svg {
  transition: transform 0.3s;
}

.card-trend.positive svg { transform: translateY(-1px); }
.card-trend.negative svg { transform: translateY(1px); }

@media (max-width: 600px) {
  .admin-card {
    width: 100%;
    max-width: 320px;
  }
}
</style>
@endsection

@section('contents')
<div class="dashboard-container">

  <!-- Example Card 1 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">📄</div>
      <h4 class="card-title">Users</h4>
    </div>
    <div class="card-body">
        
      <h2 class="card-value">{{$countUsers}}</h2>

      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +5%
      </p>
    </div>
  </div>

  <!-- Example Card 2 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">🕒</div>
      <h4 class="card-title">Cases</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">24</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +2%
      </p>
    </div>
  </div>

  <!-- Example Card 3 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">💰</div>
      <h4 class="card-title">Appointments</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">18</h2>
      <p class="card-trend negative">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M19 9l-7 7-7-7h14z" />
        </svg>
        -3%
      </p>
    </div>
  </div>
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">📄</div>
      <h4 class="card-title">Documents</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">150</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +5%
      </p>
    </div>
  </div>

  <!-- Example Card 2 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">🕒</div>
      <h4 class="card-title">Hearings</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">24</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +2%
      </p>
    </div>
  </div>

  <!-- Example Card 3 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">💰</div>
      <h4 class="card-title">Invoices</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">18</h2>
      <p class="card-trend negative">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M19 9l-7 7-7-7h14z" />
        </svg>
        -3%
      </p>
    </div>
  </div>
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">📄</div>
      <h4 class="card-title">Payments</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">150</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +5%
      </p>
    </div>
  </div>

  <!-- Example Card 2 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">🕒</div>
      <h4 class="card-title">Review</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">24</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +2%
      </p>
    </div>
  </div>

  <!-- Example Card 3 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">💰</div>
      <h4 class="card-title">Specialization</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">18</h2>
      <p class="card-trend negative">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M19 9l-7 7-7-7h14z" />
        </svg>
        -3%
      </p>
    </div>
  </div>
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">📄</div>
      <h4 class="card-title">Documents</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">150</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +5%
      </p>
    </div>
  </div>

  <!-- Example Card 2 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">🕒</div>
      <h4 class="card-title">Hearings</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">24</h2>
      <p class="card-trend positive">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M5 15l7-7 7 7H5z" />
        </svg>
        +2%
      </p>
    </div>
  </div>

  <!-- Example Card 3 -->
  <div class="admin-card">
    <div class="card-header">
      <div class="card-icon">💰</div>
      <h4 class="card-title">Invoices</h4>
    </div>
    <div class="card-body">
      <h2 class="card-value">18</h2>
      <p class="card-trend negative">
        <svg width="16" height="16" viewBox="0 0 24 24">
          <path d="M19 9l-7 7-7-7h14z" />
        </svg>
        -3%
      </p>
    </div>
  </div>

  <!-- Add more cards as needed -->

</div>
@endsection
