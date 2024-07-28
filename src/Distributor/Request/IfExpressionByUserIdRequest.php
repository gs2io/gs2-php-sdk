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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Distributor\Model\VerifyAction;
use Gs2\Distributor\Model\ConsumeAction;

class IfExpressionByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var VerifyAction */
    private $condition;
    /** @var array */
    private $trueActions;
    /** @var array */
    private $falseActions;
    /** @var bool */
    private $multiplyValueSpecifyingQuantity;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): IfExpressionByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): IfExpressionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getCondition(): ?VerifyAction {
		return $this->condition;
	}
	public function setCondition(?VerifyAction $condition) {
		$this->condition = $condition;
	}
	public function withCondition(?VerifyAction $condition): IfExpressionByUserIdRequest {
		$this->condition = $condition;
		return $this;
	}
	public function getTrueActions(): ?array {
		return $this->trueActions;
	}
	public function setTrueActions(?array $trueActions) {
		$this->trueActions = $trueActions;
	}
	public function withTrueActions(?array $trueActions): IfExpressionByUserIdRequest {
		$this->trueActions = $trueActions;
		return $this;
	}
	public function getFalseActions(): ?array {
		return $this->falseActions;
	}
	public function setFalseActions(?array $falseActions) {
		$this->falseActions = $falseActions;
	}
	public function withFalseActions(?array $falseActions): IfExpressionByUserIdRequest {
		$this->falseActions = $falseActions;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): IfExpressionByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): IfExpressionByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): IfExpressionByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?IfExpressionByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new IfExpressionByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCondition(array_key_exists('condition', $data) && $data['condition'] !== null ? VerifyAction::fromJson($data['condition']) : null)
            ->withTrueActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('trueActions', $data) && $data['trueActions'] !== null ? $data['trueActions'] : []
            ))
            ->withFalseActions(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('falseActions', $data) && $data['falseActions'] !== null ? $data['falseActions'] : []
            ))
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "condition" => $this->getCondition() !== null ? $this->getCondition()->toJson() : null,
            "trueActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTrueActions() !== null && $this->getTrueActions() !== null ? $this->getTrueActions() : []
            ),
            "falseActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFalseActions() !== null && $this->getFalseActions() !== null ? $this->getFalseActions() : []
            ),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}