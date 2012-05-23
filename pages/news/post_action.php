<?
$this->data['pagination'] = $posts->paginate($this->request_param(0, 1)-1, 5);
  $this->data['post_list'] = $posts->find_all();
?>