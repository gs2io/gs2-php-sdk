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

namespace Gs2\Enchant\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enchant\Model\BalanceParameterValue;

class SetBalanceParameterStatusByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $parameterName;
    /** @var string */
    private $propertyId;
    /** @var array */
    private $parameterValues;
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
	public function withNamespaceName(?string $namespaceName): SetBalanceParameterStatusByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SetBalanceParameterStatusByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
	public function withParameterName(?string $parameterName): SetBalanceParameterStatusByUserIdRequest {
		$this->parameterName = $parameterName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): SetBalanceParameterStatusByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getParameterValues(): ?array {
		return $this->parameterValues;
	}
	public function setParameterValues(?array $parameterValues) {
		$this->parameterValues = $parameterValues;
	}
	public function withParameterValues(?array $parameterValues): SetBalanceParameterStatusByUserIdRequest {
		$this->parameterValues = $parameterValues;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): SetBalanceParameterStatusByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetBalanceParameterStatusByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetBalanceParameterStatusByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new SetBalanceParameterStatusByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withParameterValues(!array_key_exists('parameterValues', $data) || $data['parameterValues'] === null ? null : array_map(
                function ($item) {
                    return BalanceParameterValue::fromJson($item);
                },
                $data['parameterValues']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "parameterName" => $this->getParameterName(),
            "propertyId" => $this->getPropertyId(),
            "parameterValues" => $this->getParameterValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParameterValues()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}