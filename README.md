<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Controlador de Entregas

Este controlador é responsável por recuperar dados de entregas de uma API externa e apresentar informações sobre as entregas concluídas e em aberto, agrupando os valores por transportadora.

## Funcionalidades

- **Obtenção de Dados:**
  - O controlador faz uma requisição para uma API externa para obter dados das entregas.
  - As informações obtidas incluem o status, valor, nome e código da transportadora.

- **Agrupamento por Status:**
  - As entregas são separadas com base no status: "COMPROVADO" para entregas concluídas e "ABERTO" para entregas em aberto.

- **Agrupamento por Transportadora:**
  - Os valores são agrupados por transportadora, somando os valores correspondentes para cada transportadora.
  - Cada transportadora possui uma entrada no resultado final, mostrando o nome da transportadora, seu código e a soma dos valores das entregas correspondentes.

- **Retorno dos Resultados:**
  - Os resultados são estruturados em um objeto JSON.
  - Há duas seções no retorno: "Entregas concluídas" e "Entregas em aberto".
  - Cada seção contém uma lista das transportadoras com os valores consolidados.

## Uso

- **Requisição:**
  - O controlador é acessado via rota para obter as informações sobre as entregas.

## Observações

- Certifique-se de que a API externa está acessível e retornando os dados corretamente para que o controlador funcione adequadamente.
- Os dados das entregas são processados e agrupados de acordo com o status e a transportadora.

## Exemplo de Uso

- Acesse o controlador fazendo uma requisição HTTP para a rota apropriada.
  - Por exemplo: `GET /entregas`

## Como Executar

- Clone o projeto.
- Configure as variáveis de ambiente necessárias.
- Instale as dependências.
- Execute a aplicação.

## Dependências

- Framework Laravel
