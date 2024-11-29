<?php

namespace App\Livewire\Modal\Member;

use App\Models\Member;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class Update extends Component
{
    public ?Member $member = null;

    public string $name;

    #[On(('update'))]
    public function prepare(string $id)
    {
        $this->member = Member::findOrFail($id);

        $this->name = $this->member->name;

        $this->dispatch('open-modal', modal: 'update user');
    }

    public function update()
    {
        $data = $this->validate();

        $this->member->update($data);

        Session::flash('success', 'Member berhasil diperbarui');
        $this->dispatch('close-modal');

        return $this->redirectRoute('manage user');
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', Rule::unique('members', 'name')->ignore($this->member->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa huruf',
            'name.unique' => 'Member sudah ada',
        ];
    }

    public function render()
    {
        return view('livewire.modal.member.update');
    }
}