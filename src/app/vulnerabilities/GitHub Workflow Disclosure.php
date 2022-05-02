<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app->get(
    '/.github/workflows/ci.yml',
    function (Request $request, Response $response) {
        $response->getBody()->write('
name: ci

on:
    push:
    branches: [main]
    pull_request:
    branches: [main]

jobs:
    test:
    runs-on: ${{ matrix.os }}
    timeout-minutes: 30
    strategy:
        fail-fast: false
        matrix:
        # TODO(ry): reenable canary when on-going builds in deno repo do not
        # result in red builds in std.
        deno: [1.x] # [1.x, canary]
        os: [macOS-latest, ubuntu-latest, windows-2019]

    steps:
        - name: Clone repository
        uses: actions/checkout@v2
        with:
            submodules: true
            persist-credentials: false

        - name: Set up Deno
        uses: denoland/setup-deno@v1.0.0
        with:
            deno-version: ${{ matrix.deno }}

        - name: Run tests
        run: deno test --unstable --allow-all

        - name: Type check browser compatible modules
        shell: bash
        run: |
            git grep --name-only "// This module is browser compatible." | grep -v ".github/workflows" | xargs deno cache --config browser-compat.tsconfig.json

        - name: Generate lcov
        run: deno coverage --unstable --lcov ./cov > cov.lcov

        - name: Upload coverage
        uses: codecov/codecov-action@v1
        with:
            name: ${{ matrix.os }}-${{ matrix.deno }}
            files: cov.lcov

    lint:
    runs-on: ubuntu-latest
    steps:
        - name: Clone repository
        uses: actions/checkout@v2
        with:
            submodules: false
            persist-credentials: false

        - name: Set up Deno
        uses: denoland/setup-deno@v1.0.0

        - name: Format
        run: deno fmt --check

        - name: Lint
        run: deno lint

    hash-wasm:
    name: "hash/_wasm/"
    runs-on: ubuntu-latest
    steps:
        - name: Clone repository
        uses: actions/checkout@v2
        with:
            # required to check for changes
            fetch-depth: 2
            submodules: false
            persist-credentials: false

        - name: Check for changes to hash/_wasm/
        id: source
        run: |-
            set -o errexit
            shopt -s inherit_errexit
            declare modifications="$(git diff --name-only HEAD~ -- ./hash/_wasm/)"
            declare modified="$([[ "$modifications" ]] && echo true || echo false)"
            echo "::set-output name=modified::$modified"
            echo "Hash source modified in this commit? $modified"
            echo "$modifications"

        - name: Set up Deno
        uses: denoland/setup-deno@v1.0.0
        if: success() && steps.source.outputs.modified == \'true\'

        - name: Set up Rust
        uses: hecrj/setup-rust-action@v1
        if: success() && steps.source.outputs.modified == \'true\'
        with:
            # This must match the version in hash/_wasm/rust-toolchain:
            rust-version: 1.53.0
            targets: wasm32-unknown-unknown

        - name: Set up wasm-bindgen-cli
        run: |-
            # This must match the version in hash/_wasm/Cargo.lock:
            cargo install -f wasm-bindgen-cli --version 0.2.74
        if: success() && steps.source.outputs.modified == \'true\'

        - name: Rebuild WASM and verify it\'s unchanged
        id: build
        if: success() && steps.source.outputs.modified == \'true\'
        run: |-
            ./hash/_wasm/build.ts

            set -o errexit
            shopt -s inherit_errexit
            declare modifications="$(git status --porcelain)"
            declare modified="$([[ "$(git status --porcelain)" ]] && echo true || echo false)"
            echo "::set-output name=modified::$modified"
            echo "Generated code modified? $modified"
            echo "$modifications"

            if [[ "$modified" = "true" ]]; then
            echo "::error ::Rebuilt WASM doesn\'t match committed WASM. Please rebuild and commit."
            exit 1
            fi
        
        ');
        return $response->withHeader("content-type", "text/yaml")
                        ->withStatus(200);
    }
);

$app->get(
    '/.github/workflows/main.yml',
    function (Request $request, Response $response) {
        $response->getBody()->write('
name: main
on: [ push, pull_request ]
jobs:
    test:
    runs-on: ubuntu-latest
    strategy:
        matrix:
        experimental:
            - false
        php-version:
            - \'7.2\'
            - \'7.3\'
            - \'7.4\'
            - \'8.0\'

        include:
            - php-version: \'8.1\'
            experimental: true

    name: PHP ${{ matrix.php-version }}

    steps:
        - name: Checkout
        uses: actions/checkout@v2

        - name: Setup PHP, with composer and extensions
        uses: shivammathur/setup-php@v2
        with:
            php-version: ${{ matrix.php-version }}
            coverage: none

        - name: Get composer cache directory
        id: composer-cache
        run: echo "::set-output name=dir::$(composer config cache-files-dir)"

        - name: Cache composer dependencies
        uses: actions/cache@v2
        with:
            path: ${{ steps.composer-cache.outputs.dir }}
            key: ${{ runner.os }}-composer-${{ hashFiles(\'**/composer.lock\') }}
            restore-keys: ${{ runner.os }}-composer-

        - name: Delete composer lock file
        id: composer-lock
        if: ${{ matrix.php-version == \'8.1\' }}
        run: |
            echo "::set-output name=flags::--ignore-platform-reqs"

        - name: Install dependencies
        run: composer update --no-progress --prefer-dist --optimize-autoloader ${{ steps.composer-lock.outputs.flags }}

        - name: Setup problem matchers for PHP
        run: echo "::add-matcher::${{ runner.tool_cache }}/php.json"

        - name: Setup problem matchers for PHPUnit
        run: echo "::add-matcher::${{ runner.tool_cache }}/phpunit.json"

        - name: "Run PHPUnit tests (Experimental: ${{ matrix.experimental }})"
        env:
            FAILURE_ACTION: "${{ matrix.experimental == true }}"
        run: vendor/bin/phpunit --verbose || $FAILURE_ACTION

    phpcs:
    runs-on: ubuntu-latest
    steps:
        - name: Checkout
        uses: actions/checkout@v2

        - name: Setup PHP, with composer and extensions
        uses: shivammathur/setup-php@v2
        with:
            php-version: 7.4
            coverage: none
            tools: cs2pr

        - name: Get composer cache directory
        id: composer-cache
        run: echo "::set-output name=dir::$(composer config cache-files-dir)"

        - name: Cache composer dependencies
        uses: actions/cache@v2
        with:
            path: ${{ steps.composer-cache.outputs.dir }}
            key: ${{ runner.os }}-composer-${{ hashFiles(\'**/composer.lock\') }}
            restore-keys: ${{ runner.os }}-composer-

        - name: Install dependencies
        run: composer install --no-progress --prefer-dist --optimize-autoloader

        - name: Code style with PHP_CodeSniffer
        run: ./vendor/bin/phpcs -q --report=checkstyle classes/src/ | cs2pr

    versions:
    runs-on: ubuntu-latest
    steps:
        - name: Checkout
        uses: actions/checkout@v2

        - name: Setup PHP, with composer and extensions
        uses: shivammathur/setup-php@v2
        with:
            php-version: 7.4
            coverage: none
            tools: cs2pr

        - name: Get composer cache directory
        id: composer-cache
        run: echo "::set-output name=dir::$(composer config cache-files-dir)"

        - name: Cache composer dependencies
        uses: actions/cache@v2
        with:
            path: ${{ steps.composer-cache.outputs.dir }}
            key: ${{ runner.os }}-composer-${{ hashFiles(\'**/composer.lock\') }}
            restore-keys: ${{ runner.os }}-composer-

        - name: Install dependencies
        run: composer install --no-progress --prefer-dist --optimize-autoloader

        - name: Code Version Compatibility check with PHP_CodeSniffer
        run: ./vendor/bin/phpcs -q --report-width=200 --report=summary,full classes/src/ --standard=PHPCompatibility --runtime-set testVersion 7.2-

    coverage:
    runs-on: ubuntu-latest
    steps:
        - name: Checkout
        uses: actions/checkout@v2

        - name: Setup PHP, with composer and extensions
        uses: shivammathur/setup-php@v2
        with:
            php-version: 7.4
            coverage: pcov

        - name: Get composer cache directory
        id: composer-cache
        run: echo "::set-output name=dir::$(composer config cache-files-dir)"

        - name: Cache composer dependencies
        uses: actions/cache@v2
        with:
            path: ${{ steps.composer-cache.outputs.dir }}
            key: ${{ runner.os }}-composer-${{ hashFiles(\'**/composer.lock\') }}
            restore-keys: ${{ runner.os }}-composer-

        - name: Install dependencies
        run: composer install --no-progress --prefer-dist --optimize-autoloader

        - name: Test Coverage
        run: ./vendor/bin/phpunit --verbose --coverage-text
        ');
        return $response->withHeader("content-type", "application/yaml")
                        ->withStatus(200);
    }
);