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

class TriggerByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $triggerName;
    /** @var string */
    private $userId;
    /** @var string */
    private $triggerStrategy;
    /** @var int */
    private $ttl;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): TriggerByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getTriggerName(): ?string {
		return $this->triggerName;
	}

	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}

	public function withTriggerName(?string $triggerName): TriggerByUserIdRequest {
		$this->triggerName = $triggerName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): TriggerByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getTriggerStrategy(): ?string {
		return $this->triggerStrategy;
	}

	public function setTriggerStrategy(?string $triggerStrategy) {
		$this->triggerStrategy = $triggerStrategy;
	}

	public function withTriggerStrategy(?string $triggerStrategy): TriggerByUserIdRequest {
		$this->triggerStrategy = $triggerStrategy;
		return $this;
	}

	public function getTtl(): ?int {
		return $this->ttl;
	}

	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}

	public function withTtl(?int $ttl): TriggerByUserIdRequest {
		$this->ttl = $ttl;
		return $this;
	}

    public static function fromJson(?array $data): ?TriggerByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new TriggerByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withTriggerName(empty($data['triggerName']) ? null : $data['triggerName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTriggerStrategy(empty($data['triggerStrategy']) ? null : $data['triggerStrategy'])
            ->withTtl(empty($data['ttl']) ? null : $data['ttl']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "triggerName" => $this->getTriggerName(),
            "userId" => $this->getUserId(),
            "triggerStrategy" => $this->getTriggerStrategy(),
            "ttl" => $this->getTtl(),
        );
    }
}