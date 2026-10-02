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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Grade\Model\AcquireAction;

/**
 * Request for multiplyAcquireActionsByUserId: Multiply acquire actions by grade-based rate
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#multiplyacquireactionsbyuserid
 */
class MultiplyAcquireActionsByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Grade Model Name */
    private $gradeName;
    /** @var string Property ID */
    private $propertyId;
    /** @var string Reward Addition Table Name */
    private $rateName;
    /** @var array List of Acquire Actions */
    private $acquireActions;
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
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): MultiplyAcquireActionsByUserIdRequest {
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
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withUserId(?string $userId): MultiplyAcquireActionsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Grade Model Name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model Name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model Name
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withGradeName(?string $gradeName): MultiplyAcquireActionsByUserIdRequest {
		$this->gradeName = $gradeName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): MultiplyAcquireActionsByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return string|null Reward Addition Table Name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Reward Addition Table Name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Reward Addition Table Name
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withRateName(?string $rateName): MultiplyAcquireActionsByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
    /** @return array|null List of Acquire Actions */
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
    /** @param array|null $acquireActions List of Acquire Actions */
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
    /**
     * @param array|null $acquireActions List of Acquire Actions
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withAcquireActions(?array $acquireActions): MultiplyAcquireActionsByUserIdRequest {
		$this->acquireActions = $acquireActions;
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
     * @return MultiplyAcquireActionsByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): MultiplyAcquireActionsByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MultiplyAcquireActionsByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MultiplyAcquireActionsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new MultiplyAcquireActionsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withAcquireActions(!array_key_exists('acquireActions', $data) || $data['acquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['acquireActions']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "gradeName" => $this->getGradeName(),
            "propertyId" => $this->getPropertyId(),
            "rateName" => $this->getRateName(),
            "acquireActions" => $this->getAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}