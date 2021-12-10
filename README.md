# Teste Técnico para PHP Back-End Developer JR.

<h4 align="center">

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
  <img alt="Laravel" src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white">
</p>

  Repositório criado para o Teste Técnico de **desenvolvedor backend**. <br>
  O projeto faz integração com a API do OpenWeatherMap para consultar informações sobre o clima/temperatura da cidade.
</h4>



<br>

*******
## Tabela de conteúdo 
 1. [Instalação](#installation)
 2. [Demonstração](#demonstration)

*******

<br>

## **Atenção**
Para você fazer a integração com a API OpenWeatherMap você terá que colocar a sua chave no arquivo .env

API_KEY = **Sea_Chave_Aqui**

Você pode ver mais sobre a documentação da API aqui:
https://openweathermap.org/current

<br>

---
<div id="installation">

# **Instalação**:

### **1 -** Clone o repositório.
```console
git clone https://github.com/faelfernandes/api-clima.git
```

### **2 -** Entre na pasta **"src"**.
```console
cd src
```

### **3 -** Instale as dependências via **composer**.
```console
composer update
```

### **6 -** Faça uma **cópia** do arquivo **.env.example** para **.env**.
```console
cp .env.example .env
```
Não se esqueça de colocar a sua chave no arquivo .env

### **7 -** Criando **tabelas** no banco de dados **(migration)**.
```console
php artisan migrate
```
### Iniciando servidor **(opcional)**.

```console
php artisan serve
```
O servidor está funcionando em **127.0.0.1:8000**.

---

</div>
<div id="demonstration">

## **Testando**

<br>

```console
GET | 127.0.0.1:8000/api/climates
```
-  Mostra todos os dados do banco da coluna climates 
---
```console
GET | 127.0.0.1:8000/api/climate/{nome_cidade}
```
-  Mostra uma cidade específica e o clima
---
```console
POST | 127.0.0.1:8000/api/climate
```
-  Salva os dados no banco via POST
---
```console
PUT | 127.0.0.1:8000/api/climate/{id}
```
-  Atualiza os dados no banco via PUT pelo ID
---
```console
DELETE | 127.0.0.1:8000/api/climate/{id}
```
-  Deleta os dados no banco via DELETE pelo ID
---
</div>
