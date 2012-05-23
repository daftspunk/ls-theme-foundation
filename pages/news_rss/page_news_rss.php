<?=
  Blog_Post::get_rss(
    "My blog",
    "My news and updates",
    site_url('rss'),
    site_url('blog/post'),
    site_url('blog/category'),
    site_url('blog'),
    20);
?>