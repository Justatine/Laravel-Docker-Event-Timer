<?php

namespace App\Livewire;

use App\Models\Posts;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Post extends Component
{
    public $posts, $title, $content, $id;
    public $isOpen = 0;

    protected $rules = [
        'title' => 'required|string|min:5|max:100',
        'content' => 'required|string',
    ];

    public function render(){
        $this->posts = Posts::orderByDesc('created_at')->get();
        return view('livewire.post', [
            'posts' => $this->posts
        ]);
    }

    public function createPost(){
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields(){
        $this->title = '';
        $this->content = '';
        $this->id = '';
    }

    public function store(){

        $this->validate();

        Posts::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Post added');
        
        $this->closeModal();
        $this->resetInputFields();
        // return $this->redirect('/posts');
    }

    public function edit($id){
        $post = Posts::findOrFail($id);

        $this->id = $id;
        $this->title = $post->title;
        $this->content = $post->content;

        $this->openModal();
    }

    public function update(){
        $this->validate();

        $post = Posts::find($this->id);
        $post->update([
            'title' => $this->title,
            'content' => $this->content 
        ]);

        session()->flash('status', 'success');
        session()->flash('message', 'Post updated');
    
        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id){
        Posts::find($id)->delete();

        session()->flash('status', 'success');
        session()->flash('message', 'Post removed');
    }
}
