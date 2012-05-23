<?
if (isset($posts)){
    $this->data['pagination'] = $posts->paginate($this->request_param(1, 1)-1, 5);
    $this->data['post_list'] = $posts->find_all(); 
  }
  
  if ($category)
    $this->page->title = $category->name;
?>