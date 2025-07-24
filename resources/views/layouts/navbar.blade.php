  <style>
    
  .navbar {
  position: sticky;
  top: 0;
  width: calc(100% - 250px); /* Adjust for sidebar width */
  margin-left: 250px;
  background-color: #1e1e2f;
  color: #fff;
  padding: 0.7rem 1.5rem;
  z-index: 999;
  display: flex;
  align-items: center;
  justify-content: space-between;
  max-width: calc(100% - 250px);
  box-sizing: border-box;
}

.navbar-logo {
  font-size: 1.5rem;
  font-weight: bold;
}

.navbar-links {
  list-style: none;
  display: flex;
  align-items: center;
  gap: 1.5rem;
  margin: 0;
  padding: 0;
}

.navbar-links li a {
  color: #ddd;
  text-decoration: none;
  font-size: 1rem;
  transition: color 0.3s ease;
}

.navbar-links li a:hover {
  color: #00adb5;
}

/* Dropdown */
.dropdown {
  position: relative;
}

.dropdown-menu {
  position: absolute;
  top: 40px;
  left: 0;
  background: #2c2c3e;
  border-radius: 4px;
  display: none;
  min-width: 150px;
  z-index: 10;
  list-style: none;
  padding: 0;
  margin: 0;
}

.dropdown-menu li {
  padding: 10px 15px;
}

.dropdown-menu li a {
  color: #ddd;
}

.dropdown:hover .dropdown-menu {
  display: block;
}

/* Search and profile */
.navbar-right {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.search-box {
  position: relative;
}

.search-box input {
  padding: 6px 30px 6px 10px;
  border: none;
  border-radius: 4px;
  outline: none;
  font-size: 0.9rem;
}

.search-box i {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  color: #777;
}

.profile img {
  width: 35px;
  height: 35px;
  border-radius: 50%;
  cursor: pointer;
}

/* Mobile toggle */
.menu-toggle {
  display: none;
  font-size: 1.5rem;
  cursor: pointer;
  color: #ddd;
}

/* Responsive */
@media (max-width: 768px) {
  .navbar {
    width: 100%;
    margin-left: 0;
    max-width: 100%;
    padding: 0.7rem 1rem;
  }

  .navbar-links {
    position: absolute;
    top: 60px;
    left: 0;
    width: 100%;
    background: #1e1e2f;
    flex-direction: column;
    align-items: flex-start;
    padding: 1rem 0;
    display: none;
    z-index: 999;
  }

  .navbar-links.show {
    display: flex;
  }

  .navbar-links li {
    width: 100%;
    padding: 10px 1.5rem;
  }

  .menu-toggle {
    display: block;
  }
}
.navbar-logo{
    margin-left: 30px;
}
</style>
  <nav class="navbar">
    <div class="navbar-logo">Lawyer Management System</div>

    

    <div class="navbar-right">
      <div class="search-box">
        <input type="text" placeholder="Search..." />
        <i class="fas fa-search"></i>
      </div>
      <div class="profile">
        <img src="https://i.pravatar.cc/40" alt="User" />
      </div>
      <div class="menu-toggle" id="mobile-menu">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>