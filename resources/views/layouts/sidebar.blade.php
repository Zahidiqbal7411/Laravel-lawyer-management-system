{{-- <style>
    .sidebar {
        width: 250px;
        background: #1e1e2f;
        color: #fff;
        height: 100vh;
        position: fixed;
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
    }

    .sidebar-header {
        padding: 20px;
        background: #161625;
        text-align: center;
        font-size: 1.5em;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .sidebar-menu {
        list-style: none;
        padding: 20px 0;
        margin: 0;
    }

    .sidebar-menu li {
        padding: 12px 20px;
    }

    .sidebar-menu a {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #ddd;
        text-decoration: none;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .sidebar-menu a:hover {
        background: #2e2e4d;
        color: #fff;
        border-left: 4px solid #00adb5;
        padding-left: 16px;
    }

    .custom-header {
        margin-top: 50px;
    }
</style> --}}






{{-- <div class="sidebar">
    <div class="sidebar-header">
        <h2 class="custom-header">LMS</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
        <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>


        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit"
                    style="background: none; border: none; padding: 0; margin: 0; color: inherit; cursor: pointer;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>


        

    </ul>
</div> --}}
<style>
.sidebar {
  width: 250px;
  background: #1e1e2f;
  color: #fff;
  height: 100vh;
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  flex-direction: column;
  z-index: 1000;
  overflow-y: auto;
}

.sidebar-header {
  padding: 20px;
  background: #161625;
  text-align: center;
  font-size: 1.5em;
  font-weight: bold;
  letter-spacing: 1px;
}

.sidebar-menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.sidebar-menu li {
  padding: 12px 20px;
}

.sidebar-menu a {
  display: flex;
  align-items: center;
  gap: 10px;
  color: #ddd;
  text-decoration: none;
  font-size: 1rem;
  transition: all 0.3s ease;
}

.sidebar-menu a:hover {
  background: #2e2e4d;
  color: #fff;
  border-left: 4px solid #00adb5;
  padding-left: 16px;
}

/* Logout button style to match links */
.sidebar-menu form button {
  background: none;
  border: none;
  color: inherit;
  font: inherit;
  font-size: 1rem;
  padding: 12px 20px;
  text-align: left;
  width: 100%;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: all 0.3s ease;
}

.sidebar-menu form button:hover {
  background: #2e2e4d;
  color: #fff;
  border-left: 4px solid #00adb5;
  padding-left: 16px;
}

/* Optional responsive tweaks */
@media (max-width: 768px) {
  .sidebar {
    position: absolute;
    width: 200px;
    height: 100%;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
  }

  .sidebar.active {
    transform: translateX(0);
  }

  main {
    margin-left: 0 !important;
  }
}
</style>
<div class="sidebar">
    <div class="sidebar-header">
        <h2 class="custom-header">LMS</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a ><i class="fas fa-user"></i> Profile</a></li>
        <li><a ><i class="fas fa-cog"></i> Settings</a></li>

        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit"
                    style=" font-size: 1rem; margin-left:10px; background: none; border: none;padding: 0;margin: 0;font: inherit;color: inherit;cursor: pointer;display: flex; align-items: center;
                ">
                    <i class="fas fa-sign-out-alt" style="margin-right: 25px;"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>
