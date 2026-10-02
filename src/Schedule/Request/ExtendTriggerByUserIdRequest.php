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
 * Request for extendTriggerByUserId: Extend the period of a trigger by User ID
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#extendtriggerbyuserid
 */
class ExtendTriggerByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Trigger name */
    private $triggerName;
    /** @var string User ID */
    private $userId;
    /** @var int Trigger extension period (seconds) */
    private $extendSeconds;
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
     * @return ExtendTriggerByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): ExtendTriggerByUserIdRequest {
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
     * @return ExtendTriggerByUserIdRequest
     */
	public function withTriggerName(?string $triggerName): ExtendTriggerByUserIdRequest {
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
     * @return ExtendTriggerByUserIdRequest
     */
	public function withUserId(?string $userId): ExtendTriggerByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Trigger extension period (seconds) */
	public function getExtendSeconds(): ?int {
		return $this->extendSeconds;
	}
    /** @param int|null $extendSeconds Trigger extension period (seconds) */
	public function setExtendSeconds(?int $extendSeconds) {
		$this->extendSeconds = $extendSeconds;
	}
    /**
     * @param int|null $extendSeconds Trigger extension period (seconds)
     * @return ExtendTriggerByUserIdRequest
     */
	public function withExtendSeconds(?int $extendSeconds): ExtendTriggerByUserIdRequest {
		$this->extendSeconds = $extendSeconds;
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
     * @return ExtendTriggerByUserIdRequest
     */
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