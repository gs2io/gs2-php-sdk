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

/**
 * Request for reDrawRarityParameterStatusByUserId: Re-draw Rarity Parameter Status by User ID
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#redrawrarityparameterstatusbyuserid
 */
class ReDrawRarityParameterStatusByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Rarity Parameter Model name */
    private $parameterName;
    /** @var string Property ID of the resource that owns the parameter */
    private $propertyId;
    /** @var array List of Parameter index not to re-draw */
    private $fixedParameterNames;
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
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ReDrawRarityParameterStatusByUserIdRequest {
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
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withUserId(?string $userId): ReDrawRarityParameterStatusByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Rarity Parameter Model name */
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
    /** @param string|null $parameterName Rarity Parameter Model name */
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
    /**
     * @param string|null $parameterName Rarity Parameter Model name
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withParameterName(?string $parameterName): ReDrawRarityParameterStatusByUserIdRequest {
		$this->parameterName = $parameterName;
		return $this;
	}
    /** @return string|null Property ID of the resource that owns the parameter */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID of the resource that owns the parameter */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID of the resource that owns the parameter
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): ReDrawRarityParameterStatusByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null List of Parameter index not to re-draw */
	public function getFixedParameterNames(): ?array {
		return $this->fixedParameterNames;
	}
    /** @param array|null $fixedParameterNames List of Parameter index not to re-draw */
	public function setFixedParameterNames(?array $fixedParameterNames) {
		$this->fixedParameterNames = $fixedParameterNames;
	}
    /**
     * @param array|null $fixedParameterNames List of Parameter index not to re-draw
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withFixedParameterNames(?array $fixedParameterNames): ReDrawRarityParameterStatusByUserIdRequest {
		$this->fixedParameterNames = $fixedParameterNames;
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
     * @return ReDrawRarityParameterStatusByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ReDrawRarityParameterStatusByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ReDrawRarityParameterStatusByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ReDrawRarityParameterStatusByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ReDrawRarityParameterStatusByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withFixedParameterNames(!array_key_exists('fixedParameterNames', $data) || $data['fixedParameterNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['fixedParameterNames']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "parameterName" => $this->getParameterName(),
            "propertyId" => $this->getPropertyId(),
            "fixedParameterNames" => $this->getFixedParameterNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getFixedParameterNames()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}