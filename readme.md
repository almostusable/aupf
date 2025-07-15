# 🐘 AUPF – Almost Usable PHP Framework

> _"Because building another PHP framework seemed like a totally reasonable idea at 2 AM."_  
> _— No one, ever_

**AUPF (Almost Usable PHP Framework)** is your new favorite microframework that you didn't ask for, definitely don’t need, but somehow ended up using anyway. It does *just enough* to feel like a framework, and *just little enough* to avoid being helpful.

---

## ✨ Features

- ✅ Routing (if `if-else` statements count)
- ✅ "MVC" structure (More Vague Concepts)
- ✅ Zero dependencies! (because nothing works)
- ✅ Blazing-fast performance*  
  <sub>\*when idle</sub>
- ✅ Fully documented**  
  <sub>\**in our dreams</sub>
- ✅ PSR-ish compliance

---

## 🧪 Installation

```bash
composer require almostusable/aupf
```
Or, if you're truly hardcore:

```bash
git clone https://github.com/your-username/aupf.git
```
And then:

```bash
cd aupf
php -S localhost:8000
```
🧱 Basic Example

```php
<?php
require 'vendor/autoload.php';

$app = new AUPF\App();

$app->get('/', function () {
    return 'Hello from the void!';
});

$app->post('/form', function ($request) {
    return 'We received... something.';
});

$app->run();
```

🤡 Why AUPF?

- Because Laravel is too mainstream

- Because Symfony makes you feel stupid

- Because Slim is too fat

- Because your codebase deserves the chaos

🤝 Contributing

- Fork the repo

- Write spaghetti

- Open PR with no tests

- ???

- Merge

🔥 Roadmap

- Add real router

- Add fake ORM that just returns arrays

- Remove features no one uses (all of them)

- Get at least 1 GitHub star

- Add pointless YAML config file

- Rename to LaravelUltra in v2

📄 License

MIT, obviously. Because no one wants to be responsible for this mess.

📢 Final Words

    “It’s not a bug, it’s a feature. Or maybe a framework. Who knows.”
