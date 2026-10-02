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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getEventByUserId: Get Event by User ID
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#geteventbyuserid
 */
class GetEventByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Event name */
    private $eventName;
    /** @var string User ID */
    private $userId;
    /** @var bool Are only current events eligible for acquisition */
    private $isInSchedule;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetEventByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): GetEventByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Event name */
	public function getEventName(): ?string {
		return $this->eventName;
	}
    /** @param string|null $eventName Event name */
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
    /**
     * @param string|null $eventName Event name
     * @return GetEventByUserIdRequest
     */
	public function withEventName(?string $eventName): GetEventByUserIdRequest {
		$this->eventName = $eventName;
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
     * @return GetEventByUserIdRequest
     */
	public function withUserId(?string $userId): GetEventByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return bool|null Are only current events eligible for acquisition */
	public function getIsInSchedule(): ?bool {
		return $this->isInSchedule;
	}
    /** @param bool|null $isInSchedule Are only current events eligible for acquisition */
	public function setIsInSchedule(?bool $isInSchedule) {
		$this->isInSchedule = $isInSchedule;
	}
    /**
     * @param bool|null $isInSchedule Are only current events eligible for acquisition
     * @return GetEventByUserIdRequest
     */
	public function withIsInSchedule(?bool $isInSchedule): GetEventByUserIdRequest {
		$this->isInSchedule = $isInSchedule;
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
     * @return GetEventByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetEventByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withIsInSchedule(array_key_exists('isInSchedule', $data) ? $data['isInSchedule'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "eventName" => $this->getEventName(),
            "userId" => $this->getUserId(),
            "isInSchedule" => $this->getIsInSchedule(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}