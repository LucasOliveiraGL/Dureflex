# Dureflex WordPress Theme

Tema WordPress profissional para empresas de suprimentos logísticos com catálogo de produtos, depoimentos e formulário de contato.

## Instalação

### Método 1: Upload via WordPress Admin
1. Faça download do tema como arquivo ZIP
2. Acesse: Aparência → Temas → Adicionar Novo → Upload do Tema
3. Selecione o arquivo ZIP e instale
4. Ative o tema

### Método 2: Upload via FTP
1. Extraia o conteúdo do ZIP
2. Faça upload da pasta `dureflex` para `/wp-content/themes/`
3. Acesse: Aparência → Temas e ative o tema

## Configuração Inicial

### 1. Configurar Menu de Navegação
1. Acesse: Aparência → Menus
2. Crie um menu chamado "Menu Principal"
3. Adicione as páginas: Início, Produtos, Depoimentos, Contato
4. Defina como "Menu Principal" na localização do tema

### 2. Configurar Informações de Contato
1. Acesse: Aparência → Personalizar → Informações de Contato
2. Configure:
   - Telefone: +55 (11) 9999-8888
   - Email: contato@dureflex.com.br
   - Endereço: Av. Industrial, 1234 - São Paulo, SP

### 3. Importar Conteúdo Demo (Opcional)

#### Produtos de Exemplo
1. Acesse: Produtos → Adicionar Novo
2. Adicione os produtos com as seguintes informações:

**Sistema de Racks Industriais**
- Preço: 450.00
- Categoria: Sistemas de Armazenamento
- Especificações:
  - Capacidade de carga: 3000kg por nível
  - Altura ajustável: 2-6 metros
  - Profundidade: 800-1200mm
  - Largura do compartimento: 2700mm
  - Construção em aço com revestimento em pó

**Esteira Transportadora**
- Preço: 2800.00
- Categoria: Equipamentos de Movimentação
- Especificações:
  - Comprimento personalizável: 5-50 metros
  - Velocidade ajustável: 0.1-2.0 m/s
  - Capacidade de carga: 50kg/m
  - Potência do motor: 1.5-7.5kW
  - Correia de qualidade alimentícia

#### Depoimentos de Exemplo
1. Acesse: Depoimentos → Adicionar Novo
2. Adicione os depoimentos:

**Carlos Mendes - Logística Expressa S.A.**
- Cargo: Gerente de Operações
- Avaliação: 5 estrelas
- Conteúdo: "A Dureflex transformou nossa operação logística. Os equipamentos aumentaram nossa capacidade em 40%."

**Marina Silva - Distribuidora Central**
- Cargo: Diretora de Compras
- Avaliação: 5 estrelas
- Conteúdo: "Excelente custo-benefício. O sistema de esteiras reduziu nosso tempo de processamento em 60%."

## Shortcodes Disponíveis

### [dureflex_products]
Exibe o catálogo de produtos com opções de filtro.

**Parâmetros:**
- `category=""` - Filtrar por categoria (slug)
- `limit="-1"` - Número de produtos a exibir (-1 para todos)
- `featured="false"` - Mostrar apenas produtos em destaque

**Exemplos:**
```
[dureflex_products]
[dureflex_products category="sistemas-de-armazenamento" limit="6"]
[dureflex_products featured="true"]
```

### [dureflex_testimonials]
Exibe os depoimentos de clientes.

**Parâmetros:**
- `limit="-1"` - Número de depoimentos a exibir

**Exemplo:**
```
[dureflex_testimonials limit="3"]
```

## Estrutura do Tema

```
dureflex/
├── style.css              # Estilos principais
├── functions.php          # Funcionalidades do tema
├── index.php             # Página inicial
├── header.php            # Cabeçalho
├── footer.php            # Rodapé
├── single-products.php   # Página individual de produto
├── template-parts/
│   ├── product-card.php  # Card de produto
│   └── testimonial-card.php # Card de depoimento
├── assets/
│   ├── css/              # Estilos adicionais
│   └── js/               # JavaScript
└── woocommerce/          # Integração WooCommerce
```

## Personalização

### Cores do Tema
As cores principais podem ser personalizadas via CSS:
- Azul principal: `#1e40af`
- Amarelo destaque: `#fbbf24`
- Cinza neutro: `#6b7280`

### Tipografia
O tema usa a fonte padrão do sistema. Para alterar, adicione em Aparência → Personalizar → CSS Adicional:
```css
body {
    font-family: 'Sua Fonte', sans-serif;
}
```

## Suporte

Para suporte técnico ou dúvidas sobre o tema:
1. Verifique a documentação completa em: [URL da documentação]
2. Acesse o fórum de suporte: [URL do fórum]
3. Entre em contato: contato@dureflex.com.br

## Requisitos do Sistema

- WordPress 5.8 ou superior
- PHP 7.4 ou superior
- MySQL 5.7 ou superior

## Plugins Recomendados

- **Contact Form 7** - Formulários adicionais
- **Yoast SEO** - Otimização para buscadores
- **WooCommerce** - Loja online (opcional)
- **Smush** - Otimização de imagens

## Atualizações

Para atualizar o tema:
1. Faça backup do site
2. Baixe a nova versão
3. Substitua os arquivos via FTP ou reinstale via WordPress Admin

## Licença

Este tema é licenciado sob GPLv2 ou superior. Consulte o arquivo LICENSE para mais informações.