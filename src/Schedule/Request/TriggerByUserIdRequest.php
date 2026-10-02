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
 * Request for triggerByUserId: Execute the Trigger by User ID
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#triggerbyuserid
 */
class TriggerByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Trigger name */
    private $triggerName;
    /** @var string User ID */
    private $userId;
    /** @var string Trigger Execution Policy */
    private $triggerStrategy;
    /** @var int Trigger expiration time (seconds) */
    private $ttl;
    /** @var string Event GRN */
    private $eventId;
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
     * @return TriggerByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): TriggerByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Trigger name */
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
    /** @param string|null $triggerName Trigger name */
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
    /**
     * @param string|null $triggerName Trigger name
     * @return TriggerByUserIdRequest
     */
	public function withTriggerName(?string $triggerName): TriggerByUserIdRequest {
		$this->triggerName = $triggerName;
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
     * @return TriggerByUserIdRequest
     */
	public function withUserId(?string $userId): TriggerByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Trigger Execution Policy */
	public function getTriggerStrategy(): ?string {
		return $this->triggerStrategy;
	}
    /** @param string|null $triggerStrategy Trigger Execution Policy */
	public function setTriggerStrategy(?string $triggerStrategy) {
		$this->triggerStrategy = $triggerStrategy;
	}
    /**
     * @param string|null $triggerStrategy Trigger Execution Policy
     * @return TriggerByUserIdRequest
     */
	public function withTriggerStrategy(?string $triggerStrategy): TriggerByUserIdRequest {
		$this->triggerStrategy = $triggerStrategy;
		return $this;
	}
    /** @return int|null Trigger expiration time (seconds) */
	public function getTtl(): ?int {
		return $this->ttl;
	}
    /** @param int|null $ttl Trigger expiration time (seconds) */
	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}
    /**
     * @param int|null $ttl Trigger expiration time (seconds)
     * @return TriggerByUserIdRequest
     */
	public function withTtl(?int $ttl): TriggerByUserIdRequest {
		$this->ttl = $ttl;
		return $this;
	}
    /** @return string|null Event GRN */
	public function getEventId(): ?string {
		return $this->eventId;
	}
    /** @param string|null $eventId Event GRN */
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}
    /**
     * @param string|null $eventId Event GRN
     * @return TriggerByUserIdRequest
     */
	public function withEventId(?string $eventId): TriggerByUserIdRequest {
		$this->eventId = $eventId;
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
     * @return TriggerByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): TriggerByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): TriggerByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?TriggerByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new TriggerByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTriggerStrategy(array_key_exists('triggerStrategy', $data) && $data['triggerStrategy'] !== null ? $data['triggerStrategy'] : null)
            ->withTtl(array_key_exists('ttl', $data) && $data['ttl'] !== null ? $data['ttl'] : null)
            ->withEventId(array_key_exists('eventId', $data) && $data['eventId'] !== null ? $data['eventId'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "triggerName" => $this->getTriggerName(),
            "userId" => $this->getUserId(),
            "triggerStrategy" => $this->getTriggerStrategy(),
            "ttl" => $this->getTtl(),
            "eventId" => $this->getEventId(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}