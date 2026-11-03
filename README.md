# PHP AI SDK — Fireworks AI

Text generation, streaming, tool calling, and embeddings through Fireworks AI. Part of the framework-agnostic [PHP AI SDK](https://phpaisdk.com).

## Installation

```bash
composer require aisdk/fireworks
```

Set `FIREWORKS_API_KEY` in your environment.

## Usage

```php
use AiSdk\Fireworks;
use AiSdk\Generate;

$result = Generate::text('Explain closures in PHP in one sentence.')
    ->model(Fireworks::model('accounts/fireworks/models/deepseek-v4p1-flash-1017'))
    ->run();

echo $result->text;
```

## Documentation

[Read the documentation](https://phpaisdk.com/docs/0.x/providers/fireworks) for configuration, supported features, and more examples.

[Contributing](https://github.com/phpaisdk/.github/blob/main/CONTRIBUTING.md) · [Support](https://github.com/phpaisdk/.github/blob/main/SUPPORT.md)

## License

The MIT License (MIT). See [LICENSE](LICENSE) for details.
