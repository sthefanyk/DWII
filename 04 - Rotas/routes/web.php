<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', 'aluno', 301);

Route::prefix('/aluno')->group(function() {
    Route::get('/', function() {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<ul>";
        foreach($dados as $matricula => $aluno) {
            $nome = $aluno['nome'];
            $alunos .= "<li>$matricula - $nome</li>";
        }
        $alunos .= "</ul>";

        return $alunos;
    });

    Route::get('/limite/{total}', function($total) {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<ul>";

        if($total <= count($dados)) {
            $cont = 0;
            foreach($dados as $matricula => $aluno) {
                $nome = $aluno['nome'];
                $alunos .= "<li>$matricula - $nome</li>";
                $cont++;
                if($cont >= $total) break;
            }
        }

        $alunos .= "</ul>";
        return $alunos;

    })->where('total', '[0-9]+');

    Route::get('/matricula/{matricula}', function($matricula) {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $aluno = "<ul>";

        if (isset($dados[$matricula])) {
            $nome = $dados[$matricula]['nome'];
            $aluno .= "<li>$matricula - $nome</li>";
        }else{
            $aluno .= "<li>NÃO ENCONTRADO!</li>";
        }

        $aluno .= "</ul>";
        return $aluno;

    })->where('matricula', '[0-9]+');

    Route::get('/nome/{nome}', function($nome) {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<ul>";
        $texto = "<li>NÃO ENCONTRADO!</li>";
        foreach($dados as $matricula => $aluno) {
            if ($aluno['nome'] == $nome) {
                $nome = $aluno['nome'];
                $texto = "<li>$matricula - $nome</li>";
                break;
            }
        }

        $alunos .= $texto;
        
        $alunos .= "</ul>";
        return $alunos;

    })->where('nome', '[A-Za-z]+');

});

Route::prefix('/nota')->group(function() {
    Route::get('/', function() {
        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<table>";

        $alunos .= "<thead>
            <tr>
                <th scope='col'>Matricula</th>
                <th scope='col'>Aluno</th>
                <th scope='col'>Nota</th>
            </tr>
        </thead>";

        $alunos .= "<tbody align='center'>";
        foreach($dados as $matricula => $aluno) {
            $alunos .= "<tr>";
            $nome = $aluno['nome'];
            $nota = $aluno['nota'];

            $alunos .= "<td>$matricula</td>";
            $alunos .= "<td>$nome</td>";
            $alunos .= "<td>$nota</td>";

            $alunos .= "</tr>";
        }
        $alunos .= "</tbody>";

        $alunos .= "</table>";
        return $alunos;


    });

    Route::get('/limite/{valor}', function($valor) {
        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<table>";

        $alunos .= "<thead>
            <tr>
                <th scope='col'>Matricula</th>
                <th scope='col'>Aluno</th>
                <th scope='col'>Nota</th>
            </tr>
        </thead>";

        $alunos .= "<tbody align='center'>";

        if($valor <= count($dados)) {
            $cont = 0;
            foreach($dados as $matricula => $aluno) {
                $alunos .= "<tr>";
                $nome = $aluno['nome'];
                $nota = $aluno['nota'];

                $alunos .= "<td>$matricula</td>";
                $alunos .= "<td>$nome</td>";
                $alunos .= "<td>$nota</td>";

                $alunos .= "</tr>";
                $cont++;
                if($cont >= $valor) break;
            }
        }
        $alunos .= "</tbody>";

        $alunos .= "</table>";
        return $alunos;
    })->where('valor', '[0-9]+');

    Route::get('/lancar/{nota}/{matricula}/{nome?}', function($nota, $matricula, $nome=null) {
        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $encontrou = false;

        // busca por matricula
        if ($nome == null) {
            if (isset($dados[$matricula])) {
                $dados[$matricula]['nota'] = $nota;
                $encontrou = true;
            }   
        }else{ // busca por nome
            foreach($dados as $m => $aluno) {
                if ($aluno['nome'] == $nome) {
                    $dados[$m]['nota'] = $nota;
                    $encontrou = true;
                    break;
                }
            }
        }

        if (!$encontrou) {
            return "<li>NÃO ENCONTRADO!</li>";
        }

        $alunos = "<table>";

        $alunos .= "<thead>
            <tr>
                <th scope='col'>Matricula</th>
                <th scope='col'>Aluno</th>
                <th scope='col'>Nota</th>
            </tr>
        </thead>";

        $alunos .= "<tbody align='center'>";
        foreach($dados as $matricula => $aluno) {
            $alunos .= "<tr>";
            $nome = $aluno['nome'];
            $nota = $aluno['nota'];

            $alunos .= "<td>$matricula</td>";
            $alunos .= "<td>$nome</td>";
            $alunos .= "<td>$nota</td>";

            $alunos .= "</tr>";
        }
        $alunos .= "</tbody>";

        $alunos .= "</table>";
        return $alunos;


    })->where('nota', '[0-9]+')->where('matricula', '[0-9]+')->where('nome', '[A-Za-z]+');

    Route::get('/conceito/{A}/{B}/{C}', function($A, $B, $C) {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<table>";

        $alunos .= "<thead>
            <tr>
                <th scope='col'>Matricula</th>
                <th scope='col'>Aluno</th>
                <th scope='col'>Nota</th>
            </tr>
        </thead>";

        $alunos .= "<tbody align='center'>";
        foreach($dados as $matricula => $aluno) {
            $alunos .= "<tr>";
            $nome = $aluno['nome'];
            $conceito = "D";

            if ($aluno['nota'] >= $A) {
                $conceito = "A";
            }else if ($aluno['nota'] >= $B) {
                $conceito = "B";
            }else if ($aluno['nota'] >= $C) {
                $conceito = "C";
            }

            $alunos .= "<td>$matricula</td>";
            $alunos .= "<td>$nome</td>";
            $alunos .= "<td>$conceito</td>";

            $alunos .= "</tr>";
        }
        $alunos .= "</tbody>";

        $alunos .= "</table>";
        return $alunos;

    })->where('A', '[0-9]+')->where('B', '[0-9]+')->where('C', '[0-9]+');

    Route::post('/conceito', function(Request $request) {

        $dados = array(
            "1" => array(
                "nome" => "Ana",
                "nota" => 9,
            ),
            "2" => array(
                "nome" => "Bruno",
                "nota" => 2,
            ),
            "3" => array(
                "nome" => "Carol",
                "nota" => 8,
            ),
            "4" => array(
                "nome" => "Danilo",
                "nota" => 6,
            ),
            "5" => array(
                "nome" => "Ellen",
                "nota" => 4,
            ),
        );

        $alunos = "<table>";

        $alunos .= "<thead>
            <tr>
                <th scope='col'>Matricula</th>
                <th scope='col'>Aluno</th>
                <th scope='col'>Nota</th>
            </tr>
        </thead>";

        $alunos .= "<tbody align='center'>";
        foreach($dados as $matricula => $aluno) {
            $alunos .= "<tr>";
            $nome = $aluno['nome'];
            $conceito = "D";
            
            if ($aluno['nota'] >= $request->A) {
                $conceito = "A";
            }else if ($aluno['nota'] >= $request->B) {
                $conceito = "B";
            }else if ($aluno['nota'] >= $request->C) {
                $conceito = "C";
            }

            $alunos .= "<td>$matricula</td>";
            $alunos .= "<td>$nome</td>";
            $alunos .= "<td>$conceito</td>";

            $alunos .= "</tr>";
        }
        $alunos .= "</tbody>";

        $alunos .= "</table>";

        return $alunos;

    })->where('A', '[0-9]+')->where('B', '[0-9]+')->where('C', '[0-9]+');

});


            
