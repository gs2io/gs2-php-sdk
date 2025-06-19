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

class ExtendTriggerByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $triggerName;
    /** @var string */
    private $userId;
    /** @var int */
    private $extendSeconds;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): ExtendTriggerByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getTriggerName(): ?string {
		return $this->triggerName;
	}
	public function setTriggerName(?string $triggerName) {
		$this->triggerName = $triggerName;
	}
	public function withTriggerName(?string $triggerName): ExtendTriggerByUserIdRequest {
		$this->triggerName = $triggerName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ExtendTriggerByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getExtendSeconds(): ?int {
		return $this->extendSeconds;
	}
	public function setExtendSeconds(?int $extendSeconds) {
		$this->extendSeconds = $extendSeconds;
	}
	public function withExtendSeconds(?int $extendSeconds): ExtendTriggerByUserIdRequest {
		$this->extendSeconds = $extendSeconds;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): ExtendTriggerByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): ExtendTriggerByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?ExtendTriggerByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new ExtendTriggerByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withTriggerName(array_key_exists('triggerName', $data) && $data['triggerName'] !== null ? $data['triggerName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withExtendSeconds(array_key_exists('extendSeconds', $data) && $data['extendSeconds'] !== null ? $data['extendSeconds'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "triggerName" => $this->getTriggerName(),
            "userId" => $this->getUserId(),
            "extendSeconds" => $this->getExtendSeconds(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}