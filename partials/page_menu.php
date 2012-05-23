<?

  $page_menu = array(
    'home'=>array('Home', root_url('/')),
    'store'=>array('Store', root_url('/store')),
    'news'=>array('News', root_url('/news'))
  );

  if (!$this->customer)
  {
    $page_menu['login'] = array('Login', root_url('/store/login'));
  } else {
    $page_menu['orders'] = array('My Orders', root_url('store/orders'));
    $page_menu['logout'] = array('Logout', root_url('/store/logout'));
    $page_menu['password'] = array('Change Password', root_url('/store/change-password'));
  }

  // The $current_tab variable should be defined in the PRE Action Code field of all pages in the following way:
  // $this->data['current_tab'] = 'news';
  //
  $current_tab = isset($current_tab) ? $current_tab : 'home';

?>
<form method="get" action="<?= root_url('/store/search') ?>">
  <ul class="nav-bar">
    <? foreach ($page_menu as $menu_id=>$menu_info): ?>
      <li class="<?= $menu_id?> <?= $current_tab == $menu_id ? 'active' : null ?>"><a href="<?= $menu_info[1] ?>" class="main"><?= h($menu_info[0]) ?></a></li>
    <? endforeach  ?>
    <li class="right">
        <input type="text" placeholder="Find products" name="query" value="<?= isset($query) ? $query : null ?>"/>
    </li>
  </ul>
</form>
