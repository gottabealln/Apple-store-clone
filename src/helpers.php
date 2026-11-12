<?php
// src/helpers.php

/**
 * Escapes HTML output to prevent XSS.
 */
function e(?string $value): string
{
    return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

/**
 * Helper to fetch all rows from a query using prepared statements.
 */
function fetchAll(string $sql, array $params = []): array
{
    $stmt = getDB()->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Helper to fetch a single row.
 */
function fetchOne(string $sql, array $params = []): ?array
{
    $stmt = getDB()->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch();
    return $result ?: null;
}