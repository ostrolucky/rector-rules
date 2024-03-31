<?php

declare(strict_types=1);

namespace Ostrolucky\RectorRules;

use PhpParser\Node;
use PhpParser\Node\Expr\ArrayDimFetch;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\BooleanNot;
use PhpParser\Node\Expr\Cast\Bool_;
use PhpParser\Node\Expr\Empty_;
use PhpParser\Node\Stmt\Return_;
use Rector\Rector\AbstractRector;
use Rector\Strict\Rector\Empty_\DisallowedEmptyRuleFixerRector;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\ConfiguredCodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

use function array_filter;

final class RemoveUnnecessaryEmptyRector extends AbstractRector
{
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition('Remove unnecessary empty() calls', [new ConfiguredCodeSample(<<<'CODE_SAMPLE'
            function run(array $foos, array $bars)
            {
                if (!empty($foos)) {
                  return $foos;
                }

                return !empty($bars);
            }
            CODE_SAMPLE, <<<'CODE_SAMPLE'
            function run(array $foos, array $bars)
            {
                if ($foos) {
                  return $foos;
                }

                return (bool) $bars;
            }
            CODE_SAMPLE, [DisallowedEmptyRuleFixerRector::TREAT_AS_NON_EMPTY => false]),
        ]);
    }

    /** @return array<class-string<Node>> */
    public function getNodeTypes(): array
    {
        return [Return_::class, Array_::class, Empty_::class, BooleanNot::class];
    }

    public function refactor(Node $node): ?Node
    {
        if ($node instanceof BooleanNot) {
            return $this->isWantedEmpty($node->expr) ? $node->expr->expr : null;
        }

        if ($node instanceof Return_) {
            if ($node->expr instanceof BooleanNot && $this->isWantedEmpty($node->expr->expr)) {
                $node->expr = new Bool_($node->expr->expr->expr);
            }

            return $node;
        }

        if ($node instanceof Array_) {
            foreach (array_filter($node->items) as $item) {
                $value = $item->value;
                $key = $item->key;
                if ($value instanceof BooleanNot && $this->isWantedEmpty($value->expr)) {
                    $item->value = new Bool_($value->expr->expr);
                }
                if ($key instanceof BooleanNot && $this->isWantedEmpty($key->expr)) {
                    $item->key = new Bool_($key->expr->expr);
                }
            }

            return $node;
        }

        return $this->isWantedEmpty($node) ? new BooleanNot($node->expr) : null;
    }

    /** @psalm-assert-if-true Empty_ $node */
    private function isWantedEmpty(?Node $node): bool
    {
        return $node instanceof Empty_ && !$node->expr instanceof ArrayDimFetch;
    }
}
