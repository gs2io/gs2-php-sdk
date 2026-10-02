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

/**
 * Request for ifExpressionByUserId: Validate the condition and switch the contents of the Consume Action
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#ifexpressionbyuserid
 */
class IfExpressionByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var VerifyAction Condition */
    private $condition;
    /** @var array List of Consume Actions to be executed when the condition is true */
    private $trueActions;
    /** @var array List of Consume Actions to be executed when the condition is false */
    private $falseActions;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return IfExpressionByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): IfExpressionByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return IfExpressionByUserIdRequest
     */
	public function withUserId(?string $userId): IfExpressionByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return VerifyAction|null Condition */
	public function getCondition(): ?VerifyAction {
		return $this->condition;
	}
    /** @param VerifyAction|null $condition Condition */
	public function setCondition(?VerifyAction $condition) {
		$this->condition = $condition;
	}
    /**
     * @param VerifyAction|null $condition Condition
     * @return IfExpressionByUserIdRequest
     */
	public function withCondition(?VerifyAction $condition): IfExpressionByUserIdRequest {
		$this->condition = $condition;
		return $this;
	}
    /** @return array|null List of Consume Actions to be executed when the condition is true */
	public function getTrueActions(): ?array {
		return $this->trueActions;
	}
    /** @param array|null $trueActions List of Consume Actions to be executed when the condition is true */
	public function setTrueActions(?array $trueActions) {
		$this->trueActions = $trueActions;
	}
    /**
     * @param array|null $trueActions List of Consume Actions to be executed when the condition is true
     * @return IfExpressionByUserIdRequest
     */
	public function withTrueActions(?array $trueActions): IfExpressionByUserIdRequest {
		$this->trueActions = $trueActions;
		return $this;
	}
    /** @return array|null List of Consume Actions to be executed when the condition is false */
	public function getFalseActions(): ?array {
		return $this->falseActions;
	}
    /** @param array|null $falseActions List of Consume Actions to be executed when the condition is false */
	public function setFalseActions(?array $falseActions) {
		$this->falseActions = $falseActions;
	}
    /**
     * @param array|null $falseActions List of Consume Actions to be executed when the condition is false
     * @return IfExpressionByUserIdRequest
     */
	public function withFalseActions(?array $falseActions): IfExpressionByUserIdRequest {
		$this->falseActions = $falseActions;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return IfExpressionByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): IfExpressionByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return IfExpressionByUserIdRequest
     */
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
            ->withTrueActions(!array_key_exists('trueActions', $data) || $data['trueActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['trueActions']
            ))
            ->withFalseActions(!array_key_exists('falseActions', $data) || $data['falseActions'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['falseActions']
            ))
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "condition" => $this->getCondition() !== null ? $this->getCondition()->toJson() : null,
            "trueActions" => $this->getTrueActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTrueActions()
            ),
            "falseActions" => $this->getFalseActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getFalseActions()
            ),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}