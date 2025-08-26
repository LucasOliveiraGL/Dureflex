# 🚀 Como Iniciar o Site Dureflex em Localhost

## 📋 Instruções Rápidas

### 1. **Iniciar o Servidor**

Escolha uma das opções abaixo:

#### **Opção A: PowerShell (Recomendado)**
```powershell
# No diretório Dureflex-theme
.\iniciar-servidor.ps1
```

#### **Opção B: Batch**
```cmd
# No diretório Dureflex-theme
iniciar-servidor.bat
```

### 2. **Acessar o Site**

Abra seu navegador e acesse:
```
http://localhost:8080
```

### 3. **Parar o Servidor**

Pressione `Ctrl + C` no terminal onde o servidor está rodando.

---

## 🛠️ Configuração do Ambiente

### **Estrutura dos Arquivos**

```
Dureflex-theme/
├── 📁 php-portable/          # PHP 8.2.12 portátil
├── 📄 iniciar-servidor.ps1   # Script PowerShell para iniciar
├── 📄 iniciar-servidor.bat   # Script Batch alternativo
├── 📄 wp-config-local.php    # Configuração WordPress local
├── 📄 index.php              # Página principal
├── 📄 header.php             # Cabeçalho
├── 📄 footer.php             # Rodapé
├── 📄 style.css              # Estilos do tema
└── 📁 assets/                # Recursos (CSS, JS, imagens)
```

### **Funcionalidades Disponíveis**

✅ **Catálogo de Produtos**
- Sistema de Racks Industriais
- Esteira Transportadora
- Especificações técnicas completas

✅ **Depoimentos de Clientes**
- Avaliações com sistema de estrelas
- Informações da empresa e cargo

✅ **Formulário de Contato**
- Campos para informações empresariais
- Seleção de produtos de interesse
- Validação de campos obrigatórios

✅ **Design Responsivo**
- Layout adaptável para desktop e mobile
- Cores da marca Dureflex
- Animações e transições suaves

---

## 🔧 Personalização

### **Alterar Informações da Empresa**

Edite o arquivo `wp-config-local.php`:

```php
// Personalizar informações de contato
function get_theme_mod($name, $default = '') {
    $mods = array(
        'contact_phone' => 'SEU_TELEFONE',
        'contact_email' => 'SEU_EMAIL',
        'contact_address' => 'SEU_ENDEREÇO'
    );
    return isset($mods[$name]) ? $mods[$name] : $default;
}
```

### **Adicionar Novos Produtos**

Modifique a função `get_sample_products()` em `wp-config-local.php`:

```php
function get_sample_products() {
    return [
        [
            'id' => 3,
            'title' => 'Novo Produto',
            'price' => 1200.00,
            'category' => 'Nova Categoria',
            'specs' => [
                'Especificação 1',
                'Especificação 2'
            ]
        ]
        // ... mais produtos
    ];
}
```

### **Personalizar Cores**

Edite o arquivo `style.css` para alterar as cores principais:

```css
:root {
    --primary-blue: #1e40af;    /* Azul principal */
    --accent-yellow: #fbbf24;   /* Amarelo destaque */
    --neutral-gray: #6b7280;    /* Cinza neutro */
}
```

---

## 📱 Recursos do Tema

### **Seções da Página**

1. **Hero Section**
   - Título principal com call-to-action
   - Ícones com benefícios principais
   - Botões para catálogo e consultoria

2. **Catálogo de Produtos**
   - Grid responsivo de produtos
   - Preços e especificações
   - Botões de solicitação de orçamento

3. **Depoimentos**
   - Cards com avaliações de clientes
   - Sistema de estrelas
   - Informações da empresa

4. **Formulário de Contato**
   - Campos para dados empresariais
   - Seleção de produtos de interesse
   - Informações de contato da empresa

5. **Rodapé**
   - Links de navegação
   - Redes sociais
   - Informações de contato completas

### **JavaScript Incluído**

- ✅ Smooth scroll para âncoras
- ✅ Validação de formulário
- ✅ Animações de hover
- ✅ Menu responsivo

---

## 🚨 Solução de Problemas

### **Erro: "Porta já em uso"**

Se a porta 8080 estiver ocupada, o script tentará usar a 8081 automaticamente.

Para usar uma porta específica:

```powershell
# Edite o arquivo iniciar-servidor.ps1
$serverPort = 9000  # Sua porta preferida
```

### **Erro: "PHP não encontrado"**

Verifique se você está no diretório correto:

```powershell
cd C:\Dureflex\Dureflex\Dureflex-theme
```

### **Problemas de CSS/JS**

Certifique-se de que os arquivos estão no local correto:
- `style.css` na raiz do tema
- `assets/js/main.js` para scripts personalizados

### **Erro de Função Indefinida**

Se aparecer erro de função WordPress não encontrada, adicione-a ao arquivo `wp-config-local.php`:

```php
if (!function_exists('nome_da_funcao')) {
    function nome_da_funcao() {
        // Implementação simulada
        return 'valor_padrao';
    }
}
```

---

## 📞 Suporte

Para dúvidas técnicas ou personalizações:

- 📧 Email: contato@dureflex.com.br
- 📱 Telefone: +55 (11) 9999-8888
- ⏰ Horário: Segunda a Sexta, 8h às 18h

---

## 🎯 Próximos Passos

1. **Integração WordPress Real**
   - Instalar WordPress completo
   - Migrar tema para ambiente WordPress
   - Configurar banco de dados

2. **Funcionalidades Avançadas**
   - Sistema de cotação online
   - Catálogo com filtros
   - Integração com CRM

3. **Otimizações**
   - Compressão de imagens
   - Minificação CSS/JS
   - Cache de páginas

---

*Desenvolvido para Dureflex - Suprimentos Logísticos* 🏭
