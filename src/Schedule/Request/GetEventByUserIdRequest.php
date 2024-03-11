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

class GetEventByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $eventName;
    /** @var string */
    private $userId;
    /** @var bool */
    private $isInSchedule;
    /** @var string */
    private $timeOffsetToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetEventByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getEventName(): ?string {
		return $this->eventName;
	}
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
	public function withEventName(?string $eventName): GetEventByUserIdRequest {
		$this->eventName = $eventName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetEventByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getIsInSchedule(): ?bool {
		return $this->isInSchedule;
	}
	public function setIsInSchedule(?bool $isInSchedule) {
		$this->isInSchedule = $isInSchedule;
	}
	public function withIsInSchedule(?bool $isInSchedule): GetEventByUserIdRequest {
		$this->isInSchedule = $isInSchedule;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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