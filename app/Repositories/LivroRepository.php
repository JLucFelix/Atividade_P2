<?php
namespace App\Repositories;

use App\Models\Livro;

class LivroRepository
{
    public function all()
    {
        return Livro::with(['autor', 'genero'])->get();
    }

    public function find($id)
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Livro::create($data);
    }

    public function update($id, array $data)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($data);
        return $livro;
    }

    public function delete($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
    }

    public function reviews($livroId)
    {
        return Livro::findOrFail($livroId)->reviews()->with('usuario')->get();
    }

    public function completos()
    {
        return Livro::with(['autor', 'genero', 'reviews.usuario'])->get();
    }
}
