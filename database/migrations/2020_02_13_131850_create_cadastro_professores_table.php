<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCadastroProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cadastro_Professores', function (Blueprint $table) {
            $table->string('Codigo_Professor', 5)->default('');
            $table->string('Nome', 100)->default('');
            $table->tinyInteger('Caixa_Postal')->default(0);
            $table->string('Endereco', 63)->default('');
            $table->string('Numero', 6)->default('');
            $table->string('Complemento', 50)->default('');
            $table->string('Bairro', 59)->default('');
            $table->string('Cidade', 32)->default('');
            $table->string('Estado', 2)->default('');
            $table->string('CEP', 9)->default('');
            $table->string('DDD_Telefone_Residencial', 2)->default('');
            $table->string('Telefone_Residencial', 20)->default('');
            $table->string('Telefone_Residencial_Ramal', 9)->default('');
            $table->string('DDD_Telefone_Comercial', 2)->default('');
            $table->string('Telefone_Comercial', 9)->default('');
            $table->string('Telefone_Comercial_Ramal', 9)->default('');
            $table->string('DDD_Telefone_Celular', 2)->default('');
            $table->string('Telefone_Celular', 15)->default('');
            $table->string('CPF', 14)->default('');
            $table->string('RG', 15)->default('');
            $table->string('PIS', 15)->default('');
            $table->string('Naturalidade', 40)->default('BRASILEIRO');
            $table->tinyInteger('Estado_Civil')->default(0);
            $table->string('CTPS', 11)->default('');
            $table->string('CTPS_Serie', 6)->default('');
            $table->dateTime('Data_Inicio')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Aniversario')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Modificacao')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Carteirinha')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Validade')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Carencia')->default(\Carbon\Carbon::now());
            $table->dateTime('Data_Situacao')->default(\Carbon\Carbon::now());
            $table->tinyInteger('Sexo')->default(0);
            $table->smallInteger('Situacao')->default(1);
            $table->smallInteger('Materia')->default(0);
            $table->smallInteger('Pre')->default(0);
            $table->smallInteger('[1_4Serie]')->default(0);
            $table->smallInteger('[5_8Serie]')->default(0);
            $table->smallInteger('Ens_Medio')->default(0);
            $table->smallInteger('Ens_Superior')->default(0);
            $table->smallInteger('[2_3Grau]')->default(0);
            $table->smallInteger('Tecnico')->default(0);
            $table->smallInteger('Supletivo')->default(0);
            $table->smallInteger('Curso_Livre')->default(0);
            $table->tinyInteger('Emissao_Carteira')->default(1);
            $table->string('Email', 120)->default('');
            $table->string('Sindicalizado', 50)->default('');
            $table->string('Recuperado', 50)->default('');
            $table->integer('Avulsas')->default(0);
            $table->tinyInteger('Correspondencia')->default(1);
            $table->tinyInteger('NewsLetter')->default(1);
            $table->tinyInteger('Info_Email')->default(0);
            $table->tinyInteger('Info_Carta')->default(0);
            $table->tinyInteger('Info_NaoReceber')->default(0);
            $table->string('Banco',3)->default('000');
            $table->string('Agencia', 8)->default('');
            $table->string('Conta', 18)->default('');
            $table->tinyInteger('Poupanca')->default(0);
            $table->tinyInteger('Conjunta')->default(0);
            $table->char('Ok')->default('');
            $table->string('Status', 1)->default('');
            $table->string('Nome_Mae', 100)->default('');
            $table->string('Orgao_Expedidor', 6)->default('');
            $table->string('Observacao', 30)->default('');
            $table->char('Senha', 8)->default('');
            $table->tinyInteger('Votou')->default(0);
            $table->string('Cidade_Nasc', 21)->default('');
            $table->char('UF_Nasc', 2)->default('');
            $table->dateTime('Data_Expedicao')->default('1/1/1900');
            $table->string('Nome_Pai', 100)->default('');
            $table->tinyInteger('Passar_Urna')->default(0);
            $table->integer('Urna')->default(0);
            $table->tinyInteger('Agenda')->default(0);
            $table->tinyInteger('Rec_Agenda')->default(0);
            $table->tinyInteger('Envio_Agenda')->default(0);
            $table->string('Obs_Eleicao', 200)->default('');
            $table->string('ds_latitude', 15)->default('');
            $table->string('ds_longitude', 15)->default('');
            $table->char('id_operadora', 5)->default('');
            $table->string('password')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cadastro_Professores');
    }
}
