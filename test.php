@extends('layouts.app')

@section('title', 'Simple Sales Dashboard')

@section('content')
<style>
  .container {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
  }

  /* Style each card */
  .custom-card {
    width: 250px;
    height: 200px;
    background-color: white;
    border-radius: 0.5rem;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    font-weight: bold; /* Make all text bold */
  }

  /* Hover effect: card moves up slightly */
  .custom-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  /* Remove link underline and blue color */
  a {
    text-decoration: none;
    color: inherit;
  }

  a:hover {
    text-decoration: none;
  }

</style>

<div class="container mx-auto p-6">
   <div class="custom-card bg-white w-100 mt-3 h-10">
  <header class="mb-6 text-center">
    <h1 class="text-2xl font-bold">Sales Dashboard</h1>
    <p class="text-gray-600">Updated: July 30, 2025</p>
  </header>
  </div>

  <!-- Responsive Grid System -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 container">

    <a href="">
      <div class="custom-card">
        <p class="text-gray-700">Total Sales</p>
        <p class="text-xl text-blue-600">$1,250,000</p>
      </div>
    </a>

    <a href="">
      <div class="custom-card">
        <p class="text-gray-700">Monthly Revenue</p>
        <p class="text-xl text-green-600">$120,000</p>
      </div>
    </a>

    <a href="">
      <div class="custom-card">
        <p class="text-gray-700">New Customers</p>
        <p class="text-xl text-purple-600">850</p>
      </div>
    </a>

    <a href="">
      <div class="custom-card">
        <p class="text-gray-700">Conversion Rate</p>
        <p class="text-xl text-pink-600">5.2%</p>
      </div>
    </a>

    <a href="">
      <div class="custom-card">
        <p class="text-gray-700">Refunds</p>
        <p class="text-xl text-red-600">45</p>
      </div>
    </a>

  </div>
</div>
@endsection
