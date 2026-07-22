# Fireworks provider for PHP AI SDK

```bash
composer require aisdk/fireworks
```

```php
use AiSdk\Generate;
use AiSdk\Fireworks;

Fireworks::create(['apiKey' => $_ENV['FIREWORKS_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Fireworks::model('gpt-oss-120b'))
    ->run();
```

This package uses Fireworks AI's official OpenAI-compatible API at `https://api.fireworks.ai/inference/v1`. It supports chat and streaming generation plus embeddings. Tool calling, structured output, reasoning, and vision input are passed through when the selected Fireworks model supports them. See [Fireworks API documentation](https://docs.fireworks.ai/tools-sdks/openai-compatibility) and [PHP AI SDK documentation](https://phpaisdk.com/docs/fireworks).
