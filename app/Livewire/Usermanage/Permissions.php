<?php

namespace App\Livewire\Usermanage;

use Livewire\Component;
use App\Models\Permission;

class Permissions extends Component
{
    public $permissions, $title, $url_slug, $route_name, $permission_id;
    public $updateMode = false;

    public function render()
    {
        $this->permissions = Permission::all();
        return view('livewire.usermanage.permissions')->layout('layouts.index');
    }

    public function resetInputFields()
    {
        $this->title = '';
        $this->url_slug = '';
        $this->route_name = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'url_slug' => 'required',
            'route_name' => 'required',
        ]);

        Permission::create([
            'title' => $this->title,
            'url_slug' => $this->url_slug,
            'route_name' => $this->route_name,
        ]);

        session()->flash('message', 'Permission Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        $this->permission_id = $id;
        $this->title = $permission->title;
        $this->url_slug = $permission->url_slug;
        $this->route_name = $permission->route_name;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'url_slug' => 'required',
            'route_name' => 'required',
        ]);

        if ($this->permission_id) {
            $permission = Permission::find($this->permission_id);
            $permission->update([
                'title' => $this->title,
                'url_slug' => $this->url_slug,
                'route_name' => $this->route_name,
            ]);

            session()->flash('message', 'Permission Updated Successfully.');
            $this->resetInputFields();
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        Permission::find($id)->delete();
        session()->flash('message', 'Permission Deleted Successfully.');
    }
}
