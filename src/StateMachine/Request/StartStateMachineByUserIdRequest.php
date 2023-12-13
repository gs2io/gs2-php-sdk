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

class StartStateMachineByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $args;
    /** @var int */
    private $ttl;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): StartStateMachineByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): StartStateMachineByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getArgs(): ?string {
		return $this->args;
	}
	public function setArgs(?string $args) {
		$this->args = $args;
	}
	public function withArgs(?string $args): StartStateMachineByUserIdRequest {
		$this->args = $args;
		return $this;
	}
	public function getTtl(): ?int {
		return $this->ttl;
	}
	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}
	public function withTtl(?int $ttl): StartStateMachineByUserIdRequest {
		$this->ttl = $ttl;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): StartStateMachineByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?StartStateMachineByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new StartStateMachineByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withArgs(array_key_exists('args', $data) && $data['args'] !== null ? $data['args'] : null)
            ->withTtl(array_key_exists('ttl', $data) && $data['ttl'] !== null ? $data['ttl'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "args" => $this->getArgs(),
            "ttl" => $this->getTtl(),
        );
    }
}