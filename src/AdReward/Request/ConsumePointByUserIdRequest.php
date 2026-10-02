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
 * Request for consumePointByUserId: Consume Point by User ID
 *
 * @see https://docs.gs2.io/api_reference/ad_reward/sdk/#consumepointbyuserid
 */
class ConsumePointByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Consume Points */
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
     * @return ConsumePointByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ConsumePointByUserIdRequest {
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
     * @return ConsumePointByUserIdRequest
     */
	public function withUserId(?string $userId): ConsumePointByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Consume Points */
	public function getPoint(): ?int {
		return $this->point;
	}
    /** @param int|null $point Consume Points */
	public function setPoint(?int $point) {
		$this->point = $point;
	}
    /**
     * @param int|null $point Consume Points
     * @return ConsumePointByUserIdRequest
     */
	public function withPoint(?int $point): ConsumePointByUserIdRequest {
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
     * @return ConsumePointByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): ConsumePointByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ConsumePointByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumePointByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ConsumePointByUserIdRequest())
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