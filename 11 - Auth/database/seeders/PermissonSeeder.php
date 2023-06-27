<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => '1',
            'nome' => 'PROFESSOR',
        ]);
        DB::table('types')->insert([
            'id' => '2',
            'nome' => 'COORDENADOR',
        ]);
        DB::table('types')->insert([
            'id' => '3',
            'nome' => 'DIRETOR',
        ]);
       

        // PROFESSOR curso
        DB::table('permissions')->insert([
            'regra' => 'cursos.index','permissao' => '1','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.create','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.edit','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.show','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.destroy','permissao' => '0','type_id' => '1',
        ]);

        // PROFESSOR eixos
        DB::table('permissions')->insert([
            'regra' => 'eixos.index','permissao' => '1','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.create','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.edit','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.show','permissao' => '0','type_id' => '1',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.destroy','permissao' => '0','type_id' => '1',
        ]);
        // PROFESSOR disciplinas
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.index','permissao' => '0','type_id' => '1',
        ]);
        // PROFESSOR professores
        DB::table('permissions')->insert([
            'regra' => 'professores.index','permissao' => '0','type_id' => '1',
        ]);
        // PROFESSOR alunos
        DB::table('permissions')->insert([
            'regra' => 'alunos.index','permissao' => '0','type_id' => '1',
        ]);


        // COORDENADOR eixos
        DB::table('permissions')->insert([
            'regra' => 'eixos.index','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.create','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.edit','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.show','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.destroy','permissao' => '1','type_id' => '2',
        ]);
        // COORDENADOR cursos
        DB::table('permissions')->insert([
            'regra' => 'cursos.index','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.create','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.edit','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.show','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.destroy','permissao' => '1','type_id' => '2',
        ]);
        // COORDENADOR disciplinas
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.index','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.create','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.edit','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.show','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.destroy','permissao' => '0','type_id' => '2',
        ]);
        // COORDENADOR professores
        DB::table('permissions')->insert([
            'regra' => 'professores.index','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.create','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.edit','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.show','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.destroy','permissao' => '0','type_id' => '2',
        ]);
        // COORDENADOR alunos
        DB::table('permissions')->insert([
            'regra' => 'alunos.index','permissao' => '1','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.create','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.edit','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.show','permissao' => '0','type_id' => '2',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.destroy','permissao' => '0','type_id' => '2',
        ]);

        // DIRETOR eixos
        DB::table('permissions')->insert([
            'regra' => 'eixos.index','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.create','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.edit','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.show','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'eixos.destroy','permissao' => '1','type_id' => '3',
        ]);

        // DIRETOR cursos
        DB::table('permissions')->insert([
            'regra' => 'cursos.index','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.create','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.edit','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.show','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'cursos.destroy','permissao' => '1','type_id' => '3',
        ]);

        // DIRETOR disciplinas
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.index','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.create','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.edit','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.show','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'disciplinas.destroy','permissao' => '1','type_id' => '3',
        ]);

        // DIRETOR professores
        DB::table('permissions')->insert([
            'regra' => 'professores.index','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.create','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.edit','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.show','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'professores.destroy','permissao' => '1','type_id' => '3',
        ]);

        // DIRETOR alunos
        DB::table('permissions')->insert([
            'regra' => 'alunos.index','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.create','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.edit','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.show','permissao' => '1','type_id' => '3',
        ]);
        DB::table('permissions')->insert([
            'regra' => 'alunos.destroy','permissao' => '1','type_id' => '3',
        ]);

        
        
    }
        
}
