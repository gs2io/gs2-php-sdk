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

namespace Gs2\AdReward\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for acquirePointByUserId: Acquire Point by User ID
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#acquirepointbyuserid
 */
class AcquirePointByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Acquire Points */
    private $point;
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
     * @return AcquirePointByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquirePointByUserIdRequest {
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
     * @return AcquirePointByUserIdRequest
     */
	public function withUserId(?string $userId): AcquirePointByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Acquire Points */
	public function getPoint(): ?int {
		return $this->point;
	}
    /** @param int|null $point Acquire Points */
	public function setPoint(?int $point) {
		$this->point = $point;
	}
    /**
     * @param int|null $point Acquire Points
     * @return AcquirePointByUserIdRequest
     */
	public function withPoint(?int $point): AcquirePointByUserIdRequest {
		$this->point = $point;
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
     * @return AcquirePointByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquirePointByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquirePointByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquirePointByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquirePointByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPoint(array_key_exists('point', $data) && $data['point'] !== null ? $data['point'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "point" => $this->getPoint(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}