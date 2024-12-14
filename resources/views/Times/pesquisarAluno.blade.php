@extends('cabecalho')

@section('content')
<div class="fundoPesquisarAluno">
    <div style="widht: 100%; display: flex; justify-content: center;">
        <form style="widht: 100%;" class="formPesquisarAluno">
            @csrf
            <input id="search" type="text" name="query" placeholder="Pesquisar por nome" />
        </form>
    </div>


    <!-- Lista de Alunos -->
    <div id="alunosList">
        <!-- Tabela de resultados da pesquisa -->
        <table class="alunosTable">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Curso</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aqui os resultados da pesquisa vão ser renderizados com JS -->
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('search').addEventListener('input', function () {
        let query = this.value;
        let idTime = <?php echo json_encode($idTime); ?>;

        fetch("{{ route('pesquisarAlunosAjax') }}?query=" + query)
            .then(response => response.json())
            .then(data => {
                let alunosList = document.getElementById('alunosList');
                let alunosTable = alunosList.querySelector('.alunosTable tbody');
                alunosTable.innerHTML = '';

                if (data.length > 0) {
                    data.forEach(aluno => {
                        let alunoElement = document.createElement('tr');
                        alunoElement.innerHTML = `
                                <td>${aluno.name}</td>
                                <td>${aluno.turma}</td>
                                <td>${aluno.curso}</td>
                                <td>
                                    <a href="/alunos/verPerfilAluno/${aluno.id}" class="btnVer">Ver</a>
                                    <a href="/alunos/adicionarAluno/${aluno.id}/${idTime}" class="btnMensagem">Adicionar ao Time</a>

                                </td>
                            `;
                        alunosTable.appendChild(alunoElement);
                    });
                } else {
                    alunosTable.innerHTML = '<tr><td colspan="4">Nenhum aluno encontrado.</td></tr>';
                }
            })
            .catch(error => console.error('Erro na requisição:', error));
    });
</script>
@endsection