<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
  </a>
  <ul class="dropdown-menu eb-search-dropdown-menu">
    <form class="navbar-form form-inline" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <div class="form-group">
        <input type="search" class="form-control" placeholder="Search..." value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'jokkmokk' ); ?>">
      </div>
      <button type="submit" class="btn btn-default" value="<?php echo esc_attr_x( 'Search', 'submit button', 'edinburgh' ); ?>">
        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      </button>
    </form>
  </ul>
</li>
