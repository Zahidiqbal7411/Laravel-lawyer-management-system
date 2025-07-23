<style>
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
</style>






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

<div class="sidebar">
    <div class="sidebar-header">
        <h2 class="custom-header">LMS</h2>
    </div>
    <ul class="sidebar-menu">
        <li><a ><i class="fas fa-home"></i> Dashboard</a></li>
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
