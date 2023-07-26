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

class EmitByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $statusName;
    /** @var string */
    private $eventName;
    /** @var string */
    private $args;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): EmitByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): EmitByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getStatusName(): ?string {
		return $this->statusName;
	}
	public function setStatusName(?string $statusName) {
		$this->statusName = $statusName;
	}
	public function withStatusName(?string $statusName): EmitByUserIdRequest {
		$this->statusName = $statusName;
		return $this;
	}
	public function getEventName(): ?string {
		return $this->eventName;
	}
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
	public function withEventName(?string $eventName): EmitByUserIdRequest {
		$this->eventName = $eventName;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): EmitByUserIdRequest {
		$this->args = $args;
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
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "statusName" => $this->getStatusName(),
            "eventName" => $this->getEventName(),
            "args" => $this->getArgs(),
        );
    }
}