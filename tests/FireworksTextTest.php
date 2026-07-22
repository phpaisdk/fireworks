<?php

declare(strict_types=1);
use AiSdk\Fireworks;
use AiSdk\Fireworks\Tests\Fakes\FakeHttpClient;
use AiSdk\Generate;
use AiSdk\Support\Sdk;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Fireworks::reset();
});
it('uses Fireworks general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'fireworks-chat', 'model' => 'gpt-oss-120b', 'choices' => [['message' => ['content' => 'Hello from Fireworks Inference'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Fireworks::create(['apiKey' => 'fireworks-test']);
    $result = Generate::text('Hi')->model(Fireworks::model('gpt-oss-120b'))->run();
    expect($result->text)->toBe('Hello from Fireworks Inference')->and((string) $client->lastRequest?->getUri())->toBe('https://api.fireworks.ai/inference/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer fireworks-test')->and($client->sentBody()['model'])->toBe('gpt-oss-120b');
});
it('accepts opaque Fireworks model identifiers', function (): void {
    Fireworks::create(['apiKey' => 'fireworks-test']);
    expect(Fireworks::model('private-gpt-oss-120b-model')->modelId())->toBe('private-gpt-oss-120b-model');
});

it('generates OpenAI-compatible Fireworks embeddings', function (): void {
    $client = new FakeHttpClient(200, json_encode(['data' => [['index' => 0, 'embedding' => [0.1, 0.2]]], 'usage' => ['prompt_tokens' => 2, 'total_tokens' => 2]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Fireworks::create(['apiKey' => 'fireworks-test']);

    $result = Generate::embedding('A document')
        ->model(Fireworks::model('Qwen/Qwen3-Embedding-8B'))
        ->run();

    expect($result->output->vector)->toBe([0.1, 0.2])
        ->and((string) $client->lastRequest?->getUri())->toBe('https://api.fireworks.ai/inference/v1/embeddings');
});
