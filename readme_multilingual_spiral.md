# README — SPIRAL (Multilingual: PT-BR / EN / ZH-CN)

> Arquivo único contendo **3 READMEs separados por idioma** prontos para serem salvos como:
> - `README.pt-BR.md`
> - `README.en.md`
> - `README.zh-CN.md`

---

# 📚 README.pt-BR.md — SPIRAL — Plataforma Informativa sobre TDAH

> **Nycolas Antony Salvego**  
> **Data:** 2026-01-03

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue?logo=php)](https://www.php.net/) [![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-purple?logo=bootstrap)](https://getbootstrap.com/) [![License](https://img.shields.io/badge/License-CC--BY--NC%204.0-blue?logo=creativecommons)](https://creativecommons.org/licenses/by-nc/4.0/)

---

## Resumo (Abstract)

SPIRAL é uma plataforma educacional sobre o Transtorno do Déficit de Atenção com Hiperatividade (TDAH). O objetivo é fornecer conteúdo acessível, referências acadêmicas, e materiais multimídia para apoiar estudantes, familiares e profissionais. Este repositório reúne a estrutura front-end (Bootstrap + CSS), páginas PHP estáticas e ativos (imagens / GIFs).

> **Nota importante:** Este projeto **não substitui** avaliação ou diagnóstico clínico. Conteúdo com objetivo educativo.

---

## Índice / Sumário

1. Estrutura do repositório
2. Tecnologias e badges
3. Como executar localmente
4. Correção de estilo CSS (fix rápido)
5. Estrutura de arquivos importante
6. Contribuição e fluxo de trabalho
7. Citação e créditos
8. Licença

---

## 1) Estrutura do repositório (snapshot)

```
/ (repo root)
├─ paginas/
│  ├─ styles/
│  │  └─ Home.css
│  ├─ image/
│  │  └─ (imagens, gifs)
│  └─ Home.php
├─ scripts/
│  └─ Home.js
├─ .github/ (opcional)
│  └─ workflows/
└─ README.pt-BR.md
```

---

## 2) Tecnologias e badges

- PHP (7.4+ recomendado)
- Bootstrap 5.x
- CSS personalizado (paginas/styles/Home.css)
- JS (jquery + scripts locais)

Badges incluídos no cabeçalho para rápida identificação de stack.

---

## 3) Como executar localmente (rápido)

1. Instale PHP 7.4+.
2. No diretório raiz do repositório execute:

```bash
php -S localhost:8000
```

3. Abra no navegador: `http://localhost:8000/paginas/Home.php`.

**Atenção:** o arquivo `Home.php` contém um bloco que pode redirecionar se `$url` estiver vazio. Para desenvolvimento local, comente ou ajuste o bloco:

```php
// if (empty($url)) { header("location: ../"); }
```

---

## 4) Correção de estilo (CSS) — solução imediata

Para forçar a cor dos títulos listados no projeto (corrigindo conflito com Bootstrap), cole o seguinte ao final de `paginas/styles/Home.css`:

```css
/* Fix: garantir cor nos títulos do TDAH */
section.about h1.text2,
section.about .content h2,
section.feedback h1.text2,
section.about .content h6 {
  color: #900C3F !important;
}
```

> Observação: `!important` é usado como correção rápida. Em produção, prefira organizar especificidade e variáveis CSS (`:root`).

---

## 5) Arquivos de interesse

- `paginas/Home.php` — página principal (conteúdo estático + PHP minimal).
- `paginas/styles/Home.css` — estilos principais.
- `paginas/image/` — imagens usadas nas seções.
- `scripts/Home.js` — scripts de interação (se existir).

---

## 6) Contribuição e fluxo Git (recomendado)

```bash
git checkout -b feat/readme/pt-br
# editar README.pt-BR.md
git add README.pt-BR.md
git commit -m "Docs: add README PT-BR"
git push origin feat/readme/pt-br
# abrir PR e solicitar revisão
```

Sugestões: crie PRs separados por tipo (docs, style, fix) e use descrições claras.

---

## 7) Citação e créditos

**Autor / Maintainer:** Nycolas Antony Salvego (ZYONSpiral084)  
**Contexto:** projeto com finalidade acadêmica/educativa — FATEC / estudos pessoais.

---

## 8) Licença

Uso acadêmico / educacional. Recomendado: Creative Commons Attribution-NonCommercial 4.0 (CC BY-NC 4.0).

---

# --------------------------------------------

# 📚 README.en.md — SPIRAL — Informational Platform about ADHD

> **Nycolas Antony Salvego**  
> **Date:** 2026-01-03

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue?logo=php)](https://www.php.net/) [![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-purple?logo=bootstrap)](https://getbootstrap.com/) [![License](https://img.shields.io/badge/License-CC--BY--NC%204.0-blue?logo=creativecommons)](https://creativecommons.org/licenses/by-nc/4.0/)

---

## Abstract

SPIRAL is an educational web platform about Attention Deficit Hyperactivity Disorder (ADHD). It aims to provide accessible content, academic references and multimedia resources to support students, families and professionals. The repo includes a Bootstrap-based front-end, PHP static pages and media assets.

> **Important:** This project is educational and **does not** replace clinical evaluation or diagnosis.

---

## Table of Contents

1. Repository structure
2. Technologies & badges
3. Quick local run
4. CSS style fix (quick)
5. Files of interest
6. Contribution & workflow
7. Citation & credits
8. License

---

## 1) Repository snapshot

```
/ (repo root)
├─ paginas/
│  ├─ styles/
│  │  └─ Home.css
│  ├─ image/
│  │  └─ (images, gifs)
│  └─ Home.php
├─ scripts/
│  └─ Home.js
├─ .github/ (optional)
│  └─ workflows/
└─ README.en.md
```

---

## 2) Technologies & badges

- PHP (7.4+ recommended)
- Bootstrap 5.x
- Custom CSS (`paginas/styles/Home.css`)
- JS and local scripts

Badges are included at the top for quick stack recognition.

---

## 3) How to run locally (quick)

1. Install PHP 7.4+.
2. From the project root run:

```bash
php -S localhost:8000
```

3. Open `http://localhost:8000/paginas/Home.php` in your browser.

**Note:** `Home.php` contains a redirect guard that depends on `$url`. For local testing, comment or adjust the check:

```php
// if (empty($url)) { header("location: ../"); }
```

---

## 4) CSS style fix (quick)

To ensure the specific headings display the intended burgundy color when Bootstrap overrides styles, append:

```css
section.about h1.text2,
section.about .content h2,
section.feedback h1.text2,
section.about .content h6 {
  color: #900C3F !important;
}
```

---

## 5) Files of interest

- `paginas/Home.php` — main page content and PHP logic.
- `paginas/styles/Home.css` — primary stylesheet.
- `paginas/image/` — media assets used by pages.
- `scripts/Home.js` — front-end scripts.

---

## 6) Contribution & recommended git flow

Create feature branches, open PRs for changes and request reviews. Example:

```bash
git checkout -b feat/docs/readme-en
git add README.en.md
git commit -m "Docs: add README (EN)"
git push origin feat/docs/readme-en
```

---

## 7) Citation & credits

**Author / Maintainer:** Nycolas Antony Salvego (ZYONSpiral084)  
**Context:** Academic / Educational project (FATEC).

---

## 8) License

Educational / academic use. Suggested license: CC BY-NC 4.0.

---

# --------------------------------------------

# 📚 README.zh-CN.md — SPIRAL（关于 TDAH 的信息平台）

> **作者**：Nycolas Antony Salvego  
> **日期**：2026-01-03

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue?logo=php)](https://www.php.net/) [![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-purple?logo=bootstrap)](https://getbootstrap.com/) [![License](https://img.shields.io/badge/License-CC--BY--NC%204.0-blue?logo=creativecommons)](https://creativecommons.org/licenses/by-nc/4.0/)

---

## 项目概述

SPIRAL 是一个关于注意力缺陷多动障碍（ADHD / TDAH）的教育性网站，旨在提供易于理解的内容、学术参考与多媒体资源，帮助学生、家庭与专业人员。仓库包含基于 Bootstrap 的前端、PHP 静态页面及媒体资源。

> **重要提示：** 本项目仅供教育用途，不替代临床诊断或医学建议。

---

## 目录

1. 仓库结构
2. 技术栈与徽章
3. 本地快速运行
4. CSS 样式修复（快速）
5. 关键文件
6. 贡献与工作流程
7. 引用与致谢
8. 许可证

---

## 1）仓库结构示意

```
/ (仓库根)
├─ paginas/
│  ├─ styles/
│  │  └─ Home.css
│  ├─ image/
│  │  └─ (图片、gif)
│  └─ Home.php
├─ scripts/
│  └─ Home.js
└─ README.zh-CN.md
```

---

## 2）技术栈

- PHP（建议 7.4+）
- Bootstrap 5.x
- 自定义 CSS (`paginas/styles/Home.css`)
- JavaScript 本地脚本

---

## 3）本地运行（快速）

1. 安装 PHP（7.4 及以上）。
2. 在仓库根目录运行：

```bash
php -S localhost:8000
```

3. 在浏览器打开：`http://localhost:8000/paginas/Home.php`。

**注意：** `Home.php` 中有基于 `$url` 的重定向检查。为便于本地调试，请注释或调整此检查：

```php
// if (empty($url)) { header("location: ../"); }
```

---

## 4）CSS 快速修复

为防止 Bootstrap 覆盖特定标题颜色，请在 `paginas/styles/Home.css` 末尾追加：

```css
section.about h1.text2,
section.about .content h2,
section.feedback h1.text2,
section.about .content h6 {
  color: #900C3F !important;
}
```

---

## 5）关键文件

- `paginas/Home.php` — 主页内容与 PHP。  
- `paginas/styles/Home.css` — 主要样式文件。  
- `paginas/image/` — 使用的图片资源。  
- `scripts/Home.js` — 前端脚本（若存在）。

---

## 6）贡献建议 & Git 流程

建议使用分支与 PR 流：

```bash
git checkout -b feat/readme/zh-cn
git add README.zh-CN.md
git commit -m "Docs: add README (ZH-CN)"
git push origin feat/readme/zh-cn
```

---

## 7）引用与致谢

**作者 / 维护者：** Nycolas Antony Salvego（ZYONSpiral084）  
**背景：** 学术 / 教育项目（FATEC）

---

## 8）许可证

建议许可：CC BY-NC 4.0（学术 / 教育用途，非商业使用，请注明作者）。

---


***

> ✅ Estes três blocos estão prontos para serem salvos como arquivos separados.
> - Se desejar, eu posso:  
>   1. Salvar individualmente como arquivos (`README.pt-BR.md`, `README.en.md`, `README.zh-CN.md`) na canvas (um arquivo por vez) — ou gerar um único arquivo ZIP contendo os três;  
>   2. Gerar badges alternativos (ex.: versão PHP específica, licença diferente) — informe qual licença prefere se quiser outra.  

