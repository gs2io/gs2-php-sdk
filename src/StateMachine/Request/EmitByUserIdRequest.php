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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for emitByUserId: Send an event to the state machine by User ID
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#emitbyuserid
 */
class EmitByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Status name */
    private $statusName;
    /** @var string Event name */
    private $eventName;
    /** @var string Arguments to be passed to the state machine */
    private $args;
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
     * @return EmitByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): EmitByUserIdRequest {
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
     * @return EmitByUserIdRequest
     */
	public function withUserId(?string $userId): EmitByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Status name */
	public function getStatusName(): ?string {
		return $this->statusName;
	}
    /** @param string|null $statusName Status name */
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
    /**
     * @param string|null $statusName Status name
     * @return EmitByUserIdRequest
     */
	public function withStatusName(?string $statusName): EmitByUserIdRequest {
		$this->statusName = $statusName;
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
     * @return EmitByUserIdRequest
     */
	public function withEventName(?string $eventName): EmitByUserIdRequest {
		$this->eventName = $eventName;
		return $this;
	}
    /** @return string|null Arguments to be passed to the state machine */
	public function getArgs(): ?string {
		return $this->args;
	}
    /** @param string|null $args Arguments to be passed to the state machine */
	public function setArgs(?string $args) {
		$this->args = $args;
	}
    /**
     * @param string|null $args Arguments to be passed to the state machine
     * @return EmitByUserIdRequest
     */
	public function withArgs(?string $args): EmitByUserIdRequest {
		$this->args = $args;
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
     * @return EmitByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): EmitByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): EmitByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?EmitByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new EmitByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStatusName(array_key_exists('statusName', $data) && $data['statusName'] !== null ? $data['statusName'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "statusName" => $this->getStatusName(),
            "eventName" => $this->getEventName(),
            "args" => $this->getArgs(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}