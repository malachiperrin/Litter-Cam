<nav class="nav has-shadow">
  <div class="container is-flex is-justify-content-space-between">
    <div class="nav-left">
      <a href="/admin.php" class="nav-item">
        <?= bloginfo("name"); ?>
      </a>
    </div>
    <label for="menu-toggle" class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </label>
    <input type="checkbox" id="menu-toggle" class="is-hidden" />
    <div class="nav-right nav-menu">
      <a class="nav-item is-tab is-hidden-tablet">
        <span class="icon"><i class="fa fa-home"></i></span> Home
      </a>
      <a class="nav-item is-tab is-hidden-tablet">
        <span class="icon"><i class="fa fa-table"></i></span> Links
      </a>
      <a class="nav-item is-tab is-hidden-tablet">
        <span class="icon"><i class="fa fa-info"></i></span> About
      </a>

      <a class="nav-item is-tab is-active">
        <span><a href="/">Log in</a></span>
      </a>
      <a class="nav-item is-tab">
        <span><a href="/logout">Log out</a></span>
      </a>
    </div>
  </div>
</nav>