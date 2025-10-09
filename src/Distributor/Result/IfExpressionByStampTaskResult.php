<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Distributor\Result;

use Gs2\Core\Model\IResult;
use Gs2\Distributor\Model\VerifyActionResult;
use Gs2\Distributor\Model\ConsumeActionResult;
use Gs2\Distributor\Model\AcquireActionResult;
use Gs2\Distributor\Model\TransactionResult;

class IfExpressionByStampTaskResult implements IResult {
    /** @var TransactionResult */
    private $item;
    /** @var bool */
    private $expressionResult;
    /** @var string */
    private $newContextStack;

	public function getItem(): ?TransactionResult {
		return $this->item;
	}

	public function setItem(?TransactionResult $item) {
		$this->item = $item;
	}

	public function withItem(?TransactionResult $item): IfExpressionByStampTaskResult {
		$this->item = $item;
		return $this;
	}

	public function getExpressionResult(): ?bool {
		return $this->expressionResult;
	}

	public function setExpressionResult(?bool $expressionResult) {
		$this->expressionResult = $expressionResult;
	}

	public function withExpressionResult(?bool $expressionResult): IfExpressionByStampTaskResult {
		$this->expressionResult = $expressionResult;
		return $this;
	}

	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

	public function withNewContextStack(?string $newContextStack): IfExpressionByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?IfExpressionByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new IfExpressionByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? TransactionResult::fromJson($data['item']) : null)
            ->withExpressionResult(array_key_exists('expressionResult', $data) ? $data['expressionResult'] : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "expressionResult" => $this->getExpressionResult(),
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}