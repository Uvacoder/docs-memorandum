---
title: Useful commands
description: ''
position: 3
category: 'Work in progress'
---

## PHP / Laravel

<code-group>
  <code-block label="Composer" active>

  ```bash
  composer install
  ```

  </code-block>
  <code-block label="Ignore">

  ```bash
  composer install --ignore-platform-reqs
  ```

  </code-block>
</code-group>

<code-group>
  <code-block label="Migrate" active>

  ```bash
  php artisan migrate:fresh
  ```

  </code-block>
  <code-block label="Seeding">

  ```bash
  php artisan migrate:fresh --seed
  ```

  </code-block>
</code-group>

<code-group>
  <code-block label="Windows" active>

  ```bash
  php artisan key:generate ; php artisan storage:link
  ```

  </code-block>
  <code-block label="Linux">

  ```bash
  php artisan key:generate && php artisan storage:link
  ```

  </code-block>
</code-group>